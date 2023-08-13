@extends('Admin.Screens.Layout')
@section('title', 'Offices')






@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Offices</h4>


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
                                                    <h4 class="heading mb-0">Offices</h4>
                                                    <div>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ URL::to('admin/add-office') }}" role="button">+ Add
                                                            New Office</a>
                                                    </div>
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
                                                            <th>Office ID</th>
                                                            <th>Office</th>
                                                            <th>Address</th>
                                                            <th>Country</th>
                                                            <th>State</th>
                                                            <th>City</th>
                                                            <th>Office Code</th>
                                                            <th>Account Balance</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($offices as $office)
                                                            <tr>
                                                                <td><span>{{ $office->id }}</span></td>
                                                                <td>
                                                                    <div class="products">
                                                                        <div>
                                                                            <h6>{{ $office->name }}</h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><span class="text-danger">{{ $office->address }}</span>
                                                                </td>

                                                                <td>
                                                                    <span>{{ $office->country }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->state }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->city }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->office_code }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $office->account_balance }}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ URL::to('admin/office/profile/' . $office->id) }}"
                                                                        class="badge badge-success light border-0">View
                                                                        Profile</a>
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
