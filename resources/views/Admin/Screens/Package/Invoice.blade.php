@extends('Admin.Screens.Layout')
@section('title', 'Invoice')






@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Invoice</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col">

                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1 text-center" style="padding: 30px">
                            <img src="{{ asset('logo/logo.png') }}" style="height: 150px">
                            <table class="table mt-3">
                                <tr>
                                    <th style="text-align: left">Subscriber Name</th>
                                    <td style="text-align: left">{{ $active_package->user->name }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Phone</th>
                                    <td style="text-align: left">{{ $active_package->user->email }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Package Name</th>
                                    <td style="text-align: left">{{ $active_package->package->name }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Office ID</th>
                                    <td style="text-align: left">{{ $active_package->office->office_code }}</td>
                                </tr>
                            </table>
                            <div class="text-center mt-3" style="padding-top: 30px;">
                                {!! QrCode::size(250)->generate( Request::getSchemeAndHttpHost() . '/user/package/invoice/' . $encrypted ); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3"></div>
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
