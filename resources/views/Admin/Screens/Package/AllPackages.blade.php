@extends('Admin.Screens.Layout')
@section('title', 'Packages')
@section('modal')
    <div class="modal fade" id="packageModal-changeData">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Package Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to('admin/packages/changedata') }}" method="POST" class=" dz-form pb-3"
                        autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <input type="text" class="form-control" name="update_after" value="{{ old('update_after') }}"
                                    placeholder="Enter No. of Withdrawl Days">
                                @error('update_after')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <input type="text" class="form-control" name="profit_per_kg" value="{{ old('profit_per_kg') }}"
                                    placeholder="Enter Profit/Kg">
                                @error('profit_per_kg')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <input type="text" class="form-control" name="no_days" value="{{ old('no_days') }}"
                                    placeholder="Enter No. of Days">
                                @error('no_days')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 mb-3">
                                <input type="text" class="form-control" name="meat_kgs" value="{{ old('meat_kgs') }}"
                                    placeholder="Enter New Meat Amount">
                                @error('meat_kgs')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-left mb-5 forget-main">
                            <button type="submit" class="btn btn-danger">Change Data</button>
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
                            <h4 class="mb-sm-0">Packages</h4>

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
                                                    <h4 class="heading mb-0">Packages</h4>
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
                                                            <th>Package ID</th>
                                                            <th>Package Name</th>
                                                            <th>Withdraw After</th>
                                                            <th>Meat KGs</th>
                                                            <th>Profit Per KG</th>
                                                            <th>No. Of Days</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($packages as $package)
                                                            <tr>
                                                                <td><span>{{ $package->id }}</span></td>
                                                                <td><span>{{ $package->name }}</span></td>
                                                                <td><span>{{ $package->update_after }} Days</span>                                                       
                                                                </td>
                                                                <td><span>{{ $package->meat_kgs }} KGs</span></td>
                                                                @if($package->type == 0)
                                                                <td><span>PKR {{ $package->profit_per_kg }}</span></td>
                                                                @else
                                                                <td><span>{{ $package->profit_per_kg }} %</span></td>
                                                                @endif
                                                                <td><span>{{ $package->no_days }} Days
                                                                <button data-bs-toggle="modal"
                                                                        data-bs-target="#packageModal-changeData"
                                                                        class="badge badge-warning light border-0">
                                                                        <span class="badge badge-warning light border-0">
                                                                            <i class="fas fa-edit"></i>
                                                                            Edit
                                                                        </span>
                                                                    </button>
                                                                </span></td>
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
