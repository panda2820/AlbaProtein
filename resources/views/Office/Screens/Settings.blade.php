@extends('Office.Screens.Layout')
@section('title', 'Settings')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Settings</h5>
                </li>
            </ol>
        </div>
        <div class="container-fluid">
            <div class="row">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                @endif
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Update Your Profile</h4>
                                </div>
                                <form action="{{ URL::to('office/profile/update') }}" method="POST" class=" dz-form pb-3"
                                    autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="name" class="form-label">User Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Update user Name" value="{{ $user->name }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <label for="profilePic" class="form-label">Profile Pic</label>
                                            <input class="form-control" type="file" id="profilePic" name="profilePic">
                                        </div>
                                    </div>
                                    <div class="form-group text-left mb-5 forget-main">
                                        <button type="submit" class="btn btn-danger">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Change Your Password</h4>
                                </div>
                                <form action="{{ URL::to('office/password/update') }}" method="POST" class=" dz-form pb-3"
                                    autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <input type="password" class="form-control" name="old_password"
                                                placeholder="Old Password">
                                            @error('old_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <input type="password" class="form-control" name="new_password"
                                                placeholder="New Password">
                                            @error('new_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-3">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Confirm New Password">
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group text-left mb-5 forget-main">
                                        <button type="submit" class="btn btn-danger">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
