@extends('layout.admin',
    [
    'title' => 'Quiz Menu',
    'breadcrumbs'=>[
            [
                'name'=> 'Quiz', 
                'url' => 'admin.quiz.index'
],
[
                'name'=> 'Edit', 
                'url' => 'edit'
            ]
        ]
    ])

@section('content-admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Edit Quiz</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.quiz.update',$quiz->id)}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control" value="{{old('title')?:$quiz->title}}">
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
                                    <input name="start_date" type="date" class="form-control" value="{{old('start_date')?:date('Y-m-d',strtotime($quiz->start_date))}}">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Point</label>
                                    <input name="point" type="text" class="form-control" value="{{old('point')?:$quiz->point}}">
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
                                    <input name="end_date" type="date" class="form-control" value="{{old('end_date')?:date('Y-m-d',strtotime($quiz->end_date))}}">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Active</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{$quiz->is_active ? 'selected': ''}}>Yes</option>
                                        <option value="0" {{$quiz->is_active==0 ? 'selected': ''}}>No</option>
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
