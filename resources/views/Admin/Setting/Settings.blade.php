@extends('Admin.Screens.Layout')
@section('title', 'Settings')
@section('modal')
    <div class="modal fade" id="packageModal-changeMeatPrice">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change meat Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to('admin/setting/changePrice') }}" method="POST" class=" dz-form pb-3"
                        autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <input type="text" class="form-control" name="meet_kg" value="{{ old('meet_kg') }}"
                                    placeholder="Enter New Meat Price">
                                @error('meet_kg')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-left mb-5 forget-main">
                            <button type="submit" class="btn btn-danger">Change Price</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="packageModal-changePassword">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Admin Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to('admin/setting/changePassword') }}" method="POST" class=" dz-form pb-3"
                        autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                                @error('old_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 mb-3">
                                <input type="password" class="form-control" name="new_password" placeholder="New Password">
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
                            <button type="submit" class="btn btn-danger">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="packageModal-changeProfile">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Admin Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to('admin/setting/updateProfile') }}" method="POST" class=" dz-form pb-3"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Update user Name" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="profilePic" class="form-label">Profile Pic</label>
                                <input class="form-control" type="file" id="profilePic" name="profilePic">
                            </div>
                        </div>
                        <div class="form-group text-left mb-5 forget-main">
                            <button type="submit" class="btn btn-danger">Change Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Settings</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Settings</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col">

                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="table-responsive active-projects style-1" style="padding: 30px">
                                                <div class="tbl-caption">
                                                    <h4 class="heading mb-0">Admin Settings</h4>
                                                </div>
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success alert-dismissible fade show">
                                                        {{ Session::get('success') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="btn-close"></button>
                                                    </div>
                                                @endif
                                                @if (Session::has('failed') || Session::has('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        {{ Session::get('failed') ? Session::get('failed') : Session::get('error') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="btn-close"></button>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Meat Price: </th>
                                                                <td>{{ $settings[0]->meet_kg }}</td>
                                                                <td>
                                                                    <button data-bs-toggle="modal"
                                                                        data-bs-target="#packageModal-changeMeatPrice"
                                                                        class="badge badge-warning light border-0">
                                                                        <span class="badge badge-warning light border-0">
                                                                            <i class="fas fa-edit"></i>
                                                                            Edit
                                                                        </span>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Password</th>
                                                                <td>
                                                                    <button data-bs-toggle="modal"
                                                                        data-bs-target="#packageModal-changePassword"
                                                                        class="badge badge-warning light border-0">
                                                                        <span class="badge badge-warning light border-0">
                                                                            <i class="fas fa-edit"></i>
                                                                            Change Admin Password
                                                                        </span>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Profile</th>
                                                                <td>
                                                                    <button data-bs-toggle="modal"
                                                                        data-bs-target="#packageModal-changeProfile"
                                                                        class="badge badge-warning light border-0">
                                                                        <span class="badge badge-warning light border-0">
                                                                            <i class="fas fa-edit"></i>
                                                                            Change Admin Profile
                                                                        </span>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->


                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->

                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets-office/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('assets-office/vendor/draggable/draggable.js') }}"></script>
@endsection
