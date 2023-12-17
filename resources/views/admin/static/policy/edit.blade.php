@extends('layout.admin',
    [
    'title' => 'about Menu',
    'breadcrumbs'=>[
            [
                'name'=> 'Policy', 
                'url' => 'policy',
],
        ]
    ])

@section('content-admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Edit Policy</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.static.update',$staticContent->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name Static</label>
                                    <input name="name" type="text" class="form-control" value="{{old('name')?:$staticContent->name}}" disabled>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Content">Content</label>
                                    <textarea class="form-control" name="content" id="staticcontenteditor">{{old('content')?:$staticContent->content}}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
</div>
<!-- /# row -->
@endsection

@push('after-script-admin')
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script>
        ClassicEditor
          .create( document.querySelector( '#staticcontenteditor' ),{ 
                ckfinder: {
                      uploadUrl: "{{route('admin.content.uploadeditor').'?_token='.csrf_token()}}",
                }
          } )
          .then( editor => {
                console.log( editor );
          } )
          .catch( error => {
                console.error( error );
          } );
  </script>
@endpush

@push('after-style-admin')
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
        
        .ck-editor__editable_inline * {
            color: black;
            padding-left: 10px;
        }
    </style>

@endpush
