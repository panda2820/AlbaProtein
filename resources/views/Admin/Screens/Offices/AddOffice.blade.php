@extends('Admin.Screens.Layout')
@section('title', 'Add Office')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Add New Office</h4>
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
                                                    <h4 class="heading mb-0">Add New Office</h4>
                                                    {{-- <div>
                                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('admin/office/users') }}" role="button">All Users</a>
                                                    </div> --}}
                                                </div>
                                                <form action="{{ URL::to('admin/add-office') }}" method="POST" class=" dz-form pb-3" autocomplete="off">
                                                    @csrf
                                                    @if(Session::has('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                        {{ Session::get('error') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                                                    </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Office Name">
                                                            @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
                                                            @error('address')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="country" placeholder="Country">
                                                            @error('country')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="state" value="{{ old('state') }}" placeholder="State">
                                                            @error('state')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="City">
                                                            @error('city')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="office_code" value="{{ old('office_code') }}" placeholder="Office Code">
                                                            @error('office_code')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-left mb-5 forget-main">
                                                        <button type="submit" class="btn btn-danger">Create Office</button>
                                                    </div>
                                                </form>
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
