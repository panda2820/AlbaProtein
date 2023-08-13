@extends('User.Layouts.AppLayout')
@section('title', 'Settings')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Settings</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row align-items-sm-stretch">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-6">
                    <div class="card" style="height: 100%" style="height: 100%">
                        <div class="card-body">
                            <h4 class="card-title">Update Your Profile</h4>
                            <form action="{{ URL::to('user/profile/update') }}" method="POST" class=" dz-form pb-3 mt-3"
                                autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row align-items-end">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">User Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Update user Name" value="{{ $user->name }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="profilePic" class="form-label">Profile Pic</label>
                                        <input class="form-control" type="file" id="profilePic" name="profilePic">
                                    </div>
                                </div>
                                <div class="form-group text-left mb-5 forget-main">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-6">
                    <div class="card" style="height: 100%">
                        <div class="card-body">
                            <h4 class="card-title">Change Password</h4>
                            <form action="{{ URL::to('user/password/update') }}" method="POST" class=" dz-form pb-3 mt-3"
                                autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <input type="password" class="form-control" name="old_password"
                                            placeholder="Old Password">
                                        @error('old_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <input type="password" class="form-control" name="new_password"
                                            placeholder="New Password">
                                        @error('new_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12 mb-3">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Confirm New Password">
                                        @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-left mb-5 forget-main">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
@endsection