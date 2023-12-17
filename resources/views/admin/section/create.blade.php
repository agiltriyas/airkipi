@extends('layout.admin',
[
'title' => 'User Menu',
'breadcrumbs'=>[
[
'name'=> 'Section',
'url' => 'admin.section.index'
],
[
'name'=> 'Create',
'url' => 'create'
]
]
])

@section('content-admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>New Section</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.section.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" value="{{old('name')}}" required>
                                    @error('name')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-default" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /# row -->
@endsection