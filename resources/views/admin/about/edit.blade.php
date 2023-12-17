@extends('layout.admin',
    [
    'title' => 'about Menu',
    'breadcrumbs'=>[
            [
                'name'=> 'about', 
                'url' => 'admin.about.index',
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
                <h4>Edit About</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.about.update',$about->id)}}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control" value="{{old('address')?:$about->address}}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input name="description" type="text" class="form-control" value="{{old('description')?:$about->description}}">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" type="text" class="form-control" value="{{old('phone')?:$about->phone}}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input name="facebook_link" type="text" class="form-control" value="{{old('facebook_link')?:$about->facebook_link}}">
                                    @error('facebook_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Twitter Link</label>
                                    <input name="twitter_link" type="text" class="form-control" value="{{old('twitter_link')?:$about->twitter_link}}">
                                    @error('twitter_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Whatsapp</label>
                                    <input name="whatsapp_link" type="text" class="form-control" value="{{old('whatsapp_link')?:$about->whatsapp_link}}">
                                    @error('whatsapp_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" value="{{old('email')?:$about->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Telegram</label>
                                    <input name="telegram_link" type="text" class="form-control" value="{{old('telegram_link')?:$about->telegram_link}}">
                                    @error('telegram_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input name="linkedin_link" type="text" class="form-control" value="{{old('linkedin_link')?:$about->linkedin_link}}">
                                    @error('linkedin_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label></br>
                                    <img src="{{$about->image}}" alt="">
                                    <input name="imagelogo" type="file" src="" alt="" value="{{old('imagelogo')}}">
                                    @error('imagelogo')
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
