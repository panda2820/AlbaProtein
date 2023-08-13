@extends('Admin.Screens.Layout')
@section('title', 'All Transictions')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">All Transictions</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive active-projects style-1" style="padding: 30px">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0">Transactions</h4>
                                        </div>
                                        <div>
                                            <table class="table">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Performed By</th>
                                                    <th>Reason</th>
                                                    <th>Amount</th>
                                                    <th>Amount After</th>
                                                    <th style="text-align: center;">Date & Time</th>
                                                </tr>
                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td>{{ $transaction->transaction_id }}</td>
                                                        <td>{{ $transaction->user->name }}</td>
                                                        <td style="font-size: 10px">{{ $transaction->reason }}</td>
                                                        <td><strong>PKR
                                                                {{ $transaction->inout ? '+' : '-' }}{{ $transaction->amount }}</strong>
                                                        </td>
                                                        <td>PKR {{ $transaction->after_amount }}</td>
                                                        <td>{{ $transaction->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
@endsection
