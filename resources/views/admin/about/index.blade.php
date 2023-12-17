@extends('layout.admin',
[
'title' => 'About Menu',
'breadcrumbs'=>[
[
    'name' => 'About',
    'url' => 'about'
]
]
])

@section('content-admin')
<div class="row">
    <!-- /# column -->
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>About List</h4>
                <div class="card-header-right-icon">
                    <ul>
                        {{-- <li class=""><a href="#search"><i class="ti-search"></i></a></li>
                        <li class="doc-add"><a href="{{route('admin.question.create',$quiz->id)}}"><i class="ti-plus"></i></a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-center" style="width:10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $about)
                            <tr>
                                <td>{{$about->address}}</td>
                                <td>{{$about->phone}}</td>
                                <td>{{$about->email}}</td>
                                <td>
                                    <a href="{{route('admin.about.edit',$about->id)}}"><i class="ti-pencil"
                                            data-toggle="tooltip" data-placement="top" title="Edit Quiz"></i></a>
                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- /# column -->

</div>

@endsection
