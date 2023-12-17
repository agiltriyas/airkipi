@extends('layout.admin',
    [
    'title' => 'User Menu',
    'breadcrumbs'=>[
            [
                'name'=> 'User', 
                'url' => 'admin.user.index'
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
                <h4>New Admin</h4>
            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form method="post" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" value="{{old('email')}}" required>
                                    @error('email')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" value="{{old('name')}}" required>
                                    @error('name')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" value="{{old('password')}}" required>
                                    @error('password')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Avatar</label>
                                    <input name="image" type="file" src="" alt="" value="{{old('image')}}" required>
                                    @error('image')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="male" selected>Male</option>
                                        <option value="female" >Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lastname" type="text" class="form-control" value="{{old('lastname')}}" required>
                                    @error('lastname')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input name="password_confirmation" type="password" class="form-control" value="{{old('password_confirmation')}}" required>
                                    @error('password_confirmation')
                                        <span role="alert">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="5" cols="2" maxlength="255" required>{{old('description')}}</textarea>
                                    @error('description')
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


