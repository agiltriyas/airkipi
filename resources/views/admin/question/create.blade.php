@extends('layout.admin',
[
'title' => 'Question Menu',
'breadcrumbs'=>[
[
'name'=> 'Question',
'url' => 'admin.question.index',
'id' => $quiz->id
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
                <h4>New Question</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.question.store',$quiz->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Question</label>
                                    <input name="question" type="text" class="form-control" value="{{old('question')}}">
                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input name="image" type="file" class="form-control" value="{{old('image')}}">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Answer</label>
                                    <input name="answer[]" type="text" class="form-control" value="{{old('answer')}}">
                                    @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <input name="answer[]" type="text" class="form-control" value="{{old('answer')}}">
                                    @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <input name="answer[]" type="text" class="form-control" value="{{old('answer')}}">
                                    @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <input name="answer[]" type="text" class="form-control" value="{{old('answer')}}">
                                    @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select name="is_true[]" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select name="is_true[]" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select name="is_true[]" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select name="is_true[]" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    </select>
                                </div>
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
<!-- /# row -->
@endsection