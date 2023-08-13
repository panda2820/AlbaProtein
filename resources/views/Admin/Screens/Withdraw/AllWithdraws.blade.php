@extends('Admin.Screens.Layout')
@section('title', 'All Withdraws')






@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All Withdraws</h4>
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
                                                    <h4 class="heading mb-0">Withdrawas</h4>
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
                                                            <th>Withdraw ID</th>
                                                            <th>User</th>
                                                            <th>Withdraw Amount</th>
                                                            <th>Status</th>
                                                            <th>Withdraw Type</th>
                                                            <th>Note</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($withdraws as $withdraw)
                                                            <tr>
                                                                <td><span>{{ $withdraw->withdraw_id }}</span></td>
                                                                <td>
                                                                    <div class="products">
                                                                        <img src="{{ asset('uploads/' . $withdraw->user->profile_pic) }}"
                                                                            class="avatar avatar-md" alt="">
                                                                        <div>
                                                                            <h6>{{ $withdraw->user->name }}</h6>
                                                                            <span>{{ $withdraw->user->accound_id }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span>PKR {{ $withdraw->amount }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ($withdraw->status == 0)
                                                                        <span
                                                                            class="badge badge-warning light border-0">Pending</span>
                                                                    @elseif($withdraw->status == 1)
                                                                        <span
                                                                            class="badge badge-success light border-0">Completed</span>
                                                                    @elseif($withdraw->status == 2)
                                                                        <span
                                                                            class="badge badge-danger light border-0">Declined</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span>
                                                                        {{ $withdraw->withdraw_type == '2' ? "Refference Wallet" : '' }}
                                                                        {{ $withdraw->withdraw_type=='1'?"Profit Wallet" :'' }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $withdraw->note }}</span>
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
