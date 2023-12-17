@extends('layout.admin',
[
'title' => 'Section Content Menu',
'breadcrumbs'=>[
[
'name'=> 'Section Content',
'url' => 'admin.section-content.content',
'id' => explode('/',url()->previous())[6]
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
                <h4>New Section Content</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.section-content.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="section_name" class="section_name">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Section</label>
                                    <select name="section_id" id="section_id" class="form-control" require>
                                        <option value="">-- Pilih Section --</option>
                                        @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <select name="name" id="name" class="form-control" require>
                                        <option value="">-- Pilih Name --</option>
                                        <option value="title">Title</option>
                                        <option value="subtitle">Subtitle</option>
                                        <option value="text">Text</option>
                                        <option value="background">Background</option>
                                        <option value="image">Image</option>
                                        <option value="feature">Feature</option>
                                        <option value="icon">Icon</option>
                                    </select>
                                    @error('name')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Value</label>
                                    <input name="value" type="text" class="form-control" value="{{old('value')}}">
                                    @error('value')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image">Image* for name Image</label>
                                    <input name="image" class="form-control" type="file" alt="" value="{{old('image')}}">
                                    @error('image')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-default" type="submit">Save</button>
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
<script>
    $("#section_id").on('change', function() {
        let name = $("#section_id").find(":selected").text();
        $(".section_name").val(name)
    });
</script>
@endpush