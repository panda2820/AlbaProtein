@extends('Admin.Screens.Layout')
@section('title', 'Users')






@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">{{ Request::is('admin/users*') ? 'All' : '' }}
                                {{ Request::is('admin/office-users*') ? 'Office' : '' }} Users</h4>
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
                                                    <h4 class="heading mb-0">{{ Request::is('admin/users*') ? 'All' : '' }}
                                                        {{ Request::is('admin/office-users*') ? 'Office' : '' }} Users</h4>
                                                    @if (Request::is('admin/office-users*'))
                                                        <div>
                                                            <a class="btn btn-danger btn-sm"
                                                                href="{{ URL::to('admin/add-office-user') }}" role="button">+ Add Office
                                                                User</a>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success alert-dismissible fade show">
                                                        <i data-feather="user-check"></i>
                                                        {{ Session::get('success') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="btn-close"></button>
                                                    </div>
                                                @endif
                                                <table id="example" class="display table">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>User</th>
                                                            <th>Phone</th>
                                                            <th>Joining Date</th>
                                                            <th>{{ $officeUsers ? 'Office Name' : 'Code' }}</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <td><span>{{ $user->id }}</span></td>
                                                                <td>
                                                                    <div class="products">
                                                                        <img src="{{ asset('uploads/' . $user->profile_pic) }}"
                                                                            class="avatar avatar-md" alt="">
                                                                        <div>
                                                                            <h6>{{ $user->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="text-danger">{{ $user->email }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $user->created_at }}</span>
                                                                </td>
                                                                @if($officeUsers)
                                                                <td>
                                                                    <span>{{ $user->office->name }}</span>
                                                                </td>
                                                                @else
                                                                <td>
                                                                    <span>{{ $user->code }}</span>
                                                                </td>
                                                                @endif
                                                                <td>
                                                                    @if($user->user_type == 0)
                                                                        @if($user->is_leader == 1)
                                                                        <a href="{{ URL::to('admin/users/remove-leader/' . $user->id) }}"
                                                                            class="badge badge-danger light border-0">Remove Leader
                                                                        </a>
                                                                        @else
                                                                        <a href="{{ URL::to('admin/users/make-leader' , $user->id) }}"
                                                                            class="badge badge-warning light border-0">Make Leader
                                                                        </a>
                                                                        @endif
                                                                    @endif
                                                                    <a href="{{ $user->user_type == '0' ? URL::to('admin/user/profile/' . $user->id) : URL::to('admin/office/profile/' . $user->office->id) }}"
                                                                        class="badge badge-success light border-0">View
                                                                        {{ $user->user_type == '0' ? 'Profile' : 'Office' }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
                        </script> © AlbaProtein.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            
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
