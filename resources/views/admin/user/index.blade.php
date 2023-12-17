@extends('layout.admin',
[
'title' => 'User Menu',
'breadcrumbs'=>[
    [
    'name'=> 'User',
    'url' => 'user'
    ]
]
])

@section('content-admin')
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>User List </h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class=""><a href="#search"><i class="ti-search"></i></a></li>
                        <li class="doc-add"><a href="{{route('admin.user.create')}}"><i class="ti-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Point</th>
                                <th>Gender</th>
                                <th>Active</th>
                                <th class="text-center" style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row">{{$users->firstItem() + $loop->index}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->name}} {{$user->lastname}}</td>
                                <td>{{$user->getRoleNames()[0]}}</td>
                                <td>{{$user->point}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{($user->is_active) ? "YES" : "NO"}}</td>
                                <td>
                                    @if($user->getRoleNames()[0] != 'superadmin')
                                    <a href="{{route('admin.user.edit',$user->id)}}"><i class="ti-pencil"
                                            data-toggle="tooltip" data-placement="top" title="Edit User"></i></a>
                                    <a href="" onclick="event.preventDefault();
                                                  document.getElementById('destroy-form{{$user->id}}').submit();"
                                        data-toggle="tooltip" data-placement="top" title="Delete User">
                                        <i class="ti-trash"></i>
                                    </a>
                                    <a href="{{route('admin.user.show',$user->id)}}"><i class="ti-eye"
                                            data-toggle="tooltip" data-placement="top" title="Add Question"></i></a>
                                    <form class="d-none" id="destroy-form{{$user->id}}"
                                        action="{{route('admin.user.destroy',$user->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

</div>

@endsection
