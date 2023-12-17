@extends('layout.admin',
[
'title' => 'Quiz Menu',
'breadcrumbs'=>[
    [
    'name'=> 'Quiz',
    'url' => 'quiz'
    ]
]
])

@section('content-admin')
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Quiz List </h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class=""><a href="#search"><i class="ti-search"></i></a></li>
                        <li class="doc-add"><a href="{{route('admin.quiz.create')}}"><i class="ti-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Point</th>
                                <th>Pertanyaan</th>
                                <th>Active</th>
                                <th class="text-center" style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quizzes as $quiz)
                            <tr>
                                <td scope="row">{{$quizzes->firstItem() + $loop->index}}</td>
                                <td>{{$quiz->title}}</td>
                                <td>{{$quiz->start_date}}</td>
                                <td>{{$quiz->end_date}}</td>
                                <td>{{$quiz->point}}</td>
                                <td>{{count($quiz->question)}}</td>
                                <td>{{($quiz->is_active) ? "YES" : "NO"}}</td>
                                <td>
                                    <a href="{{route('admin.quiz.edit',$quiz->id)}}"><i class="ti-pencil"
                                            data-toggle="tooltip" data-placement="top" title="Edit Quiz"></i></a>
                                    <a href="" onclick="event.preventDefault();
                                                  document.getElementById('destroy-form{{$quiz->id}}').submit();"
                                        data-toggle="tooltip" data-placement="top" title="Delete Quiz">
                                        <i class="ti-trash"></i>
                                    </a>
                                    <a href="{{route('admin.question.index',$quiz->id)}}"><i class="ti-eye"
                                            data-toggle="tooltip" data-placement="top" title="Add Question"></i></a>
                                    <form class="d-none" id="destroy-form{{$quiz->id}}"
                                        action="{{route('admin.quiz.destroy',$quiz->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$quizzes->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

</div>
@endsection
