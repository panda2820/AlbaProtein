@extends('User.Layouts.AppLayout')
@section('title', 'Packages')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Pricing</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-5">
                    <h4>Choose your Package</h4>
                    <p class="text-muted">Select any of our investment package and earn amazing profits.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($packages as $package)
            <div class="col-xl-4 col-md-6">
                <div class="card plan-box">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h5>{{ $package->name }}</h5>
                                <p class="text-muted">PKR {{ $meetPrice }} per KG</p>
                            </div>
                        </div>
                        <div class="py-4">
                            <h2><sup><small>{{ $package->type == 1 ? 'min. ' : '' }}PKR</small></sup> {{ $meetPrice * $package->meat_kgs }}/ <span class="font-size-13">{{ $package->no_days }} Days</span></h2>
                        </div>
                        <div class="text-center plan-btn">
                            <a href="javascript: void(0);" class="btn btn-primary btn-sm waves-effect waves-light">{{ $package->type == 1 ? 'Min. ' : '' }}{{ $package->meat_kgs }} KGs {{ $package->type == 1 ? '& More' : '' }}</a>
                        </div>
                        @if ($package->type == 1)
                        <div class="plan-features mt-5">
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> {{ $package->profit_per_kg }}% Profit on Total Investment</p>
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> Get Withdraw & Investment both at the end of package</p>
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> Profit Return after 50 Days</p>
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> Withdraw after at the end of package</p>
                        </div>
                        <div class="text-center">
                            <p class="text-danger">No Daily Profits. Return at the end</p>
                        </div>
                        @else
                        <div class="plan-features mt-5">
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> PKR {{ $package->profit_per_kg }} profit per KG</p>
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> Daily Profit Return</p>
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> PKR {{ $package->profit_per_kg * $package->meat_kgs }} Daily Return</p>
                            <p><i class="bx bx-checkbox-square text-primary me-2"></i> 15 Days Easy Withdraw</p>
                        </div>
                        <div class="text-center">
                            <p class="text-danger">You'll not receive any profits on Saturday & Sunday</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection
@section('script')
<script>
    $(function(){
        $("#btnCopy").click(function(){
            const toCopy = $("#referLink").html();
            navigator.clipboard.writeText(toCopy);
            notyf.success('Invitation link copied!');
        });
    })
</script>
@endsection