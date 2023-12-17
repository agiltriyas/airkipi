<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\About;
use App\Models\Answer;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Score;
use App\Models\Section;
use App\Models\SectionContent;
use App\Models\StaticContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    public function index()
    {
        $data['activitiesContents'] = Content::take(6)->where('status', 'published')->get();
        $data['banner'] = $this->getVal('banner');
        $data['about'] = $this->getVal('about');
        $data['product'] = $this->getVal('product');
        $data['activities'] = $this->getVal('activities');
        $data['contact'] = $this->getVal('contact');
        $data['footer'] = $this->getVal('footer');
        $data['socmed'] = $this->getVal('socmed');
        // dd($data);

        return view('home', compact('data'));
    }

    public function getVal($name)
    {
        $section = Section::with('sectionContent')->where('name', $name)->first();
        $data = [];
        foreach ($section->sectionContent as $sec) {
            if (array_key_exists($sec->name, $data)) {

                if (!is_array($data[$sec->name]))
                    $data[$sec->name] = [$data[$sec->name]];

                array_push($data[$sec->name], $sec->value);
            } else {
                $data[$sec->name] = $sec->value;
            }
        }

        return $data;
    }


    public function detail($slug)
    {
        $data['socmed'] = $this->getVal('socmed');
        $data['footer'] = $this->getVal('footer');
        $content = Content::where('slug', $slug)->firstOrFail();
        // $content->increment('counter');
        return view('detail', compact('content', 'data'));
    }

    public function category()
    {
        $data['socmed'] = $this->getVal('socmed');
        $data['footer'] = $this->getVal('footer');
        $contents = Content::where('status', 'published')->paginate(20);

        return view('category', compact('contents', 'data'));
    }

    public function search(Request $request)
    {
        $contents = Content::where('title', 'like', '%' . $request->search . '%')->orWHere('subtitle', 'like', '%' . $request->search . '%')->orWhere('user_id', $request->search)->publish()->orderBy('created_at', 'DESC')->paginate(5);
        // dd($contents);
        return view('search', compact('contents'));
    }

    public function quiz()
    {
        $quizzes = Quiz::with('question')->active()->orderBy('start_date', 'DESC')->paginate(5);
        $data['latest'] = Content::with('user')->orderBy('created_at', 'DESC')->skip(1)->take(3)->publish()->content()->get();
        $data['latest2'] = Content::with('user')->orderBy('created_at', 'DESC')->skip(3)->take(1)->publish()->content()->get();

        return view('quiz', compact('quizzes', 'data'));
    }

    public function question($id)
    {
        $questions = Question::with('answer', 'quiz')->where('quiz_id', $id)->get();

        $score = Score::where('quiz_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($score)
            return to_route('lp-penilaian-result', $score->id);

        return view('question', compact('questions'));
    }

    public function quizSubmit(Request $request)
    {
        $data = $request->all();
        $quiz = Quiz::find($request->quiz_id);
        $point = $quiz->point;
        $answerArr = [];
        $score = 0;
        for ($i = 1; $i <= count($request->questions); $i++) {
            $answer = Answer::find($data['answer' . $i]);
            if ($answer->is_true) {
                $score += $point / count($request->questions);
            }
            array_push($answerArr, $data['answer' . $i]);
        }

        $scoreCreate = Score::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $request->quiz_id,
            'point' => $score,
            'answer' => serialize($answerArr),
        ]);

        $user = User::find(auth()->user()->id);
        $user->update(['point' => $user->point + $score]);

        return to_route('lp-penilaian-result', $scoreCreate->id);
    }

    public function quizResult($id)
    {
        $score = Score::with('quiz.question')->where('user_id', auth()->user()->id)->findOrFail($id);
        // dd($score);

        return view('quiz-result', compact('score'));
    }

    public function comment(CommentRequest $request)
    {
        // dd($request->all());
        Comment::create($request->all());

        return redirect()->back();
    }

    public function about()
    {
        $about = About::firstOrFail();
        return view('contact', compact('about'));
    }

    public function lamanSejarah()
    {
        $contents = Content::with('user')->publish()->post()->orderBy('created_at', 'DESC')->paginate(10);

        return view('post', compact('contents'));
    }

    public function lamanSejarahDetail($id)
    {
        $content = Content::with('user')->post()->findOrFail($id);
        $content->increment('counter');
        $data['comments'] = Comment::with(['user', 'reply.user'])->where('is_active', 1)->where('comment_id', null)->where('content_id', $content->id)->get();

        return view('post-detail', compact('content', 'data'));
    }

    public function lamanSejarahStore(Request $request)
    {
        $request['tagtitle'] = $request->title;
        $request['slug'] = Str::slug($request->title);
        $request['content'] = '-';
        $request['headerimage'] = '-';
        $request['tagimage'] = '-';
        $request['isPost'] = 1;
        $request['status'] = 'published';
        $request['tagtype'] = 'article';
        $request['tagdescription'] = strip_tags($request->title);
        $request['tagurl'] = url()->current();
        $request['tagsitename'] = "sejarahlokalsumut.org/" . Str::slug($request->title);
        $thumbnail = $request->file('thumb')->storeAs(
            'image/content/' . $request['slug'],
            $request['slug'] . '-thumb.' . $request->thumb->getClientOriginalExtension(),
            'public'
        );
        if ($request->file('image')) {
            $headerimage = $request->file('image')->storeAs(
                'image/content/' . $request['slug'],
                $request['slug'] . '-image.' . $request->image->getClientOriginalExtension(),
                'public'
            );
            $request['headerimage'] = $headerimage;
            $request['tagimage'] = explode('/', $headerimage)[4];
        }
        $request['thumbnail'] = $thumbnail;
        $request['user_id'] = auth()->user()->id;

        // dd($request->all(), $thumbnail, $headerimage);
        $content = Content::create($request->except('thumb', 'image'));

        return redirect()->back();
    }

    public function policy()
    {
        $staticContent = StaticContent::where('name', 'policy')->first();

        return view('policy', compact('staticContent'));
    }

    public function termofuse()
    {
        $staticContent = StaticContent::where('name', 'termofuse')->first();

        return view('termofuse', compact('staticContent'));
    }
}
