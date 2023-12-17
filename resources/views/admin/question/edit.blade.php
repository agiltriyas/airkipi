@extends('layout.admin',
[
'title' => 'Quiz Menu',
'breadcrumbs'=>[
[
'name'=> 'Question',
'url' => 'admin.question.index',
'id' => $question->quiz_id
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
                <h4>Edit Question</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.question.update',$question->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="question_id" value="{{$question->id}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Question</label>
                                    <input name="question" type="text" class="form-control" value="{{old('question')?:$question->question}}">
                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <img src="{{$question->image}}" alt="" width="200">
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
                                @foreach($question->answer as $answer)
                                <div class="form-group">
                                    <label>Answer</label>
                                    <input type="hidden" name="answer_id[]" value="{{$answer['id']}}">
                                    <input name="answer[]" type="text" class="form-control" value="{{$answer['answer']}}">
                                    @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @endforeach
                                @php $i= 4 - count($question->answer); @endphp
                                @for($i;$i < count($question->answer);$i++) <input name="answer[]" type="text" class="form-control" value="{{old('answer')}}">
                                    @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @endfor
                            </div>

                            <div class="col-md-6">
                                @foreach($question->answer as $answer)
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select name="is_true[]" class="form-control">
                                        <option value="1" {{$answer->is_true ? 'selected':''}}>Yes</option>
                                        <option value="0" {{$answer->is_true == 0 ? 'selected':''}}>No</option>
                                    </select>
                                </div>
                                @endforeach
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