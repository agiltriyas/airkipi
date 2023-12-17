@extends('layout.admin',
[
'title' => 'Question Menu',
'breadcrumbs'=>[
    [
    'name'=> 'Quiz',
    'url' => 'admin.quiz.index',
    'id' => $quiz->id
],
[
    'name' => 'Question',
    'url' => 'Question'
]
]
])

@section('content-admin')
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Question List - {{$quiz->title}} </h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class=""><a href="#search"><i class="ti-search"></i></a></li>
                        <li class="doc-add"><a href="{{route('admin.question.create',$quiz->id)}}"><i class="ti-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Jawaban</th>
                                <th class="text-center" style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                            <tr>
                                <td scope="row">{{$questions->firstItem() + $loop->index}}</td>
                                <td>{{$question->question}}</td>
                                <td>{{$question->answer[0]->answer}}</td>
                                <td>
                                    <a href="{{route('admin.question.edit',$question->id)}}"><i class="ti-pencil"
                                            data-toggle="tooltip" data-placement="top" title="Edit Quiz"></i></a>
                                    <a href="" onclick="event.preventDefault();
                                                  document.getElementById('destroy-form{{$question->id}}').submit();"
                                        data-toggle="tooltip" data-placement="top" title="Delete Quiz">
                                        <i class="ti-trash"></i>
                                    </a>
                                    <a href="{{route('admin.question.show',$question->id)}}"><i class="ti-eye"
                                            data-toggle="tooltip" data-placement="top" title="Add Question"></i></a>
                                    <form class="d-none" id="destroy-form{{$question->id}}"
                                        action="{{route('admin.question.destroy',$question->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$questions->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

</div>

@endsection
