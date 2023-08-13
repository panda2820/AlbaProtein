@extends('User.Layouts.AppLayout')
@section('title', 'Active Packages')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Active Packages</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <pre>
                @php
                    print_r($actives);
                @endphp

                </pre> --}}
                @foreach ($actives as $active)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="font-16 text-muted mb-2"></p>
                                    <h4><a href="javascript: void(0);" class="text-dark">{{ $active['package']->name }}</a></h4>
                                    <p class="font-16 text-muted mb-2">{{ $active['office_code'] }}</p>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="social-source text-center">
                                            {!! QrCode::size(250)->generate(Request::getSchemeAndHttpHost() . '/user/package/invoice/' . $active['qr']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    
@endsection
