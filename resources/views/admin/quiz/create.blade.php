@extends('layout.admin',
    [
    'title' => 'Quiz Menu',
    'breadcrumbs'=>[
            [
                'name'=> 'Quiz', 
                'url' => 'admin.quiz.index'
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
                <h4>New Quiz</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.quiz.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control" value="{{old('title')}}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input name="start_date" type="date" class="form-control" value="{{old('start_date')}}">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Point</label>
                                    <input name="point" type="text" class="form-control" value="{{old('point')}}">
                                    @error('point')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input name="end_date" type="date" class="form-control" value="{{old('end_date')}}">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Active</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" selected>Yes</option>
                                        <option value="0" >No</option>
                                    </select>
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


