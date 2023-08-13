@extends('Office.Screens.Layout')
@section('title', 'All Users')
@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Add New User</h5>
                </li>
            </ol>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                <div class="tbl-caption">
                                    <h4 class="heading mb-0">Add New User</h4>
                                    <div>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('office/users') }}"
                                            role="button">All Users</a>
                                    </div>
                                </div>
                                <form action="{{ URL::to('office/user/save') }}" method="POST" class=" dz-form pb-3"
                                    autocomplete="off">
                                    @csrf
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                                stroke-width="2" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" class="me-2">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                </polygon>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                            {{ Session::get('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="btn-close"></button>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" placeholder="User Name">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="email"
                                                value="{{ old('email') }}" placeholder="User Phone No">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="User Password">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <input type="text" class="form-control" name="reference_id"
                                                value="{{ old('reference_id', '') }}" placeholder="Reference ID (optional)">
                                            @error('reference_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group text-left mb-5 forget-main">
                                        <button type="submit" class="btn btn-danger">Create User</button>
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
