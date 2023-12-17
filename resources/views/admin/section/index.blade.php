@extends('layout.admin',
[
'title' => 'Section Menu',
'breadcrumbs'=>[
[
'name'=> 'Section',
'url' => 'section'
]
]
])

@section('content-admin')
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Section List </h4>
                <div class="card-header-right-icon">
                    <!-- <ul>
                        <li class=""><a href="#search"><i class="ti-search"></i></a></li>
                        <li class="doc-add"><a href="{{route('admin.section.create')}}"><i class="ti-plus"></i></a></li>
                    </ul> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-center" style="width:10%">Active</th>
                                <!-- <th class="text-center" style="width:10%">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sections as $section)
                            <tr>
                                <td scope="row">{{$sections->firstItem() + $loop->index}}</td>
                                <td>{{$section->name}}</td>
                                <td>{{($section->active) ? "YES" : "NO"}}</td>
                                <!-- <td>
                                    <a href="{{route('admin.section.edit',$section->id)}}"><i class="ti-pencil" data-toggle="tooltip" data-placement="top" title="Edit User"></i></a>
                                    <a href="" onclick="event.preventDefault();
                                                  document.getElementById('destroy-form{{$section->id}}').submit();" data-toggle="tooltip" data-placement="top" title="Delete User">
                                        <i class="ti-trash"></i>
                                    </a>
                                    <a href="{{route('admin.section.show',$section->id)}}"><i class="ti-eye" data-toggle="tooltip" data-placement="top" title="Add Question"></i></a>
                                    <form class="d-none" id="destroy-form{{$section->id}}" action="{{route('admin.section.destroy',$section->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$sections->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

</div>

@endsection