@extends('layout.admin',
[
'title' => 'Content Menu',
'breadcrumbs'=>[
[
'name'=> 'Content',
'url' => 'admin.content.index'
],
[
'name'=> 'Comment',
'url' => 'comment'
]
]
])

@section('content-admin')


<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Comment List </h4>
                <div class="card-header-right-icon">
                    <ul>
                        {{-- <li class="">
                                <form action="#" method="get">
                                    <input type="text" name="search" placeholder="Search..." class="text-dark">
                                    <button type="submit" class="btn-default"><i class="ti-search"></i></button>
                                </form>
                            </li> --}}
                        
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-center" style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <td scope="row">{{$comments->firstItem() + $loop->index}}</td>
                                <td>{{$comment->comment}}</td>
                                @if($comment->is_active == 1)
                                <td><span class="badge badge-primary">Aktif</span></td>
                                @else
                                <td><span class="badge badge-danger">Hold</span></td>
                                @endif
                                <td>{{$comment->created_at}}</td>
                                <td>
                                    <a href="{{ route('admin.comment.destroy',$comment->id) }}" onclick="event.preventDefault();
                                                  document.getElementById('destroy-form').submit();" data-toggle="tooltip" data-placement="top" title="Delete Content">
                                        <i class="ti-trash"></i>
                                    </a>
                                    <form id="destroy-form" action="{{route('admin.comment.destroy',$comment->id)}}" method="POST" class="d-none">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$comments->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->
</div>

@endsection
