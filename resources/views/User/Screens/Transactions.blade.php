@extends('User.Layouts.AppLayout')
@section('title', 'Transactions')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Transaction</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Transactions</h4>
                        <table id="transactionsTable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Transaction ID</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>{{ $transaction->reason }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>PKR {{ $transaction->inout == 0 ? '-' : '+' }}{{ $transaction->amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection
@section('script')
<script>
    $("#transactionsTable").DataTable({
        "order": [[ 0, "desc" ]]
    });
</script>
@endsection