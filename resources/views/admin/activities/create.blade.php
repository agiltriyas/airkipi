@extends('layout.admin',
[
'title' => 'Content Menu',
'breadcrumbs'=>[
[
'name'=> 'Activities',
'url' => 'admin.activities.index'
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
                <h4>New Activities</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.activities.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" id="title" type="text" class="form-control" value="{{old('title')}}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Subtitle</label>
                                    <input name="subtitle" type="text" class="form-control" value="{{old('subtitle')}}">
                                    @error('subtitle')
                                    <span class="text-danger" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="draft">draft</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="thumb">Thumbnail</label>
                                    <input name="thumb" type="file" class="form-control" alt="" value="{{old('thumb')}}">
                                    @error('thumb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input name="image" type="file" class="form-control" alt="" value="{{old('image')}}">
                                    <small>size 800x500</small>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Content">Content</label>
                                <textarea class="form-control" name="content" id="contenteditor">{{old('content')}}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
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

@push('after-script-admin')
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#contenteditor'), {
            ckfinder: {
                uploadUrl: `{{route('admin.activities.uploadeditor', ['_token' => csrf_token()])}}`,
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush

@push('after-style')
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }

    .ck-editor__editable_inline * {
        color: black;
        padding-left: 10px;
    }
</style>

@endpush