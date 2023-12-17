@extends('layout.admin',
[
'title' => 'Activities Menu',
'breadcrumbs'=>[
[
'name'=> 'Activities',
'url' => 'activities'
]
]
])

@section('content-admin')
<div class="row">
    <div class="col-lg-12">
        <div class="card alert">
            <form action="#" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <div class="basic-form">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control border-none input-flat bg-ash">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-default btn-lg m-b-10 bg-warning border-none m-r-5 sbmt-btn" type="submit">Search</button>
                <a href="{{route('admin.activities.index')}}" class="btn btn-default btn-lg m-b-10 bg-secondary border-none m-r-5 sbmt-btn" type="button">Reset</a>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Content List </h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class=""><a href="#search"><i class="ti-search"></i></a></li>
                        <li class="doc-add"><a href="{{route('admin.activities.create')}}"><i class="ti-plus"></i></a></li>
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
                                <th>Status</th>
                                <th>Date</th>
                                <th>Author</th>
                                <th class="text-center" style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contents as $content)
                            <tr>
                                <td scope="row">{{$contents->firstItem() + $loop->index}}</td>
                                <td>{{$content->title}}</td>
                                @if($content->status == 'draft')
                                <td><span class="badge badge-danger">{{$content->status}}</span></td>
                                @else
                                <td><span class="badge badge-primary">{{$content->status}}</span></td>
                                @endif
                                <td>{{$content->created_at}}</td>
                                <td class="color-primary">{{$content->user->name}}</td>
                                <td>
                                    <a href="{{route('admin.activities.edit',$content->id)}}"><i class="ti-pencil" data-toggle="tooltip" data-placement="top" title="Edit Content"></i></a>
                                    <a href="" onclick="event.preventDefault();
                                                  document.getElementById('destroy-form{{$content->id}}').submit();" data-toggle="tooltip" data-placement="top" title="Delete Content">
                                        <i class="ti-trash"></i>
                                    </a>

                                    <form class="d-none" id="destroy-form{{$content->id}}" action="{{route('admin.activities.destroy',$content->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$contents->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

</div>

@endsection