@extends('layout.admin',
[
'title' => 'Section Content Menu',
'breadcrumbs'=>[
[
'name'=> 'Section Content',
'url' => 'section-content'
]
]
])

@section('content-admin')
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Section Content {{ucfirst($content)}}</h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class=""><a href="#search"><i class="ti-search"></i></a></li>
                        <li class="doc-add"><a href="{{route('admin.section-content.create')}}"><i class="ti-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Section</th>
                                <th>Name</th>
                                <th>Value</th>
                                <th class="text-center" style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sectionContents as $content)
                            <tr>
                                <td scope="row">{{$sectionContents->firstItem() + $loop->index}}</td>
                                <td>{{$content->section->name}}</td>
                                <td>{{$content->name}}</td>
                                <td>
                                    @if($content->name == "image" || $content->name == "background")
                                    <img src="{{url('storage/').'/' . $content->value}}" class="img img-thumbnail" width="100" alt="">
                                    @else
                                    {{$content->value}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.section-content.edit',$content->id)}}"><i class="ti-pencil" data-toggle="tooltip" data-placement="top" title="Edit User"></i></a>
                                    <a href="" onclick="event.preventDefault();
                                                  document.getElementById('destroy-form{{$content->id}}').submit();" data-toggle="tooltip" data-placement="top" title="Delete User">
                                        <i class="ti-trash"></i>
                                    </a>
                                    <a href="{{route('admin.section-content.show',$content->id)}}"><i class="ti-eye" data-toggle="tooltip" data-placement="top" title="Add Question"></i></a>
                                    <form class="d-none" id="destroy-form{{$content->id}}" action="{{route('admin.section-content.destroy',$content->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$sectionContents->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

</div>

@endsection