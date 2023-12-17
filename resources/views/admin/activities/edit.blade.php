@extends('layout.admin',
[
'title' => 'Activites Edit Menu',
'breadcrumbs'=>[
[
'name'=> 'Activities',
'url' => 'admin.activities.index'
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
                <h4>Edit Content</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.activities.update', $content->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control" value="{{$content->title}}">
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
                                    <input name="subtitle" type="text" class="form-control" value="{{$content->subtitle}}">
                                    @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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
                                        <option value="draft" {{$content->status == "draft" ? 'selected' : ''}}>draft</option>
                                        <option value="published" {{$content->status == "published" ? 'selected' : ''}}>Published</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label></br>
                                    <img src="{{$content->thumbnail}}" alt="" width="200">
                                    <input name="thumbnail" type="file" class="form-control" alt="">
                                    @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="image">Image</label></br>
                                    <small>size 800x500</small></br>
                                    <img src="{{$content->headerimage}}" alt="" width="200">
                                    <input name="headerimage" type="file" class="form-control" alt="">

                                    @error('headerimage')
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
                                <textarea class="form-control" name="content" id="contenteditor">{{$content->content}}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Seo Tag Manual</label>
                                  </div> --}}
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

@push('after-style-admin')
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