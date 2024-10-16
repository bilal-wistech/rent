@extends('admin.template')

@section('main')

<div class="content-wrapper">
    <section class="content">
        <div class="card mx-auto border-0" style="">
            <div class="card-body p-4">
                <select name="" id="" class="form-control mb-5" style="width : 20%">
                    <option value="">This Month</option>
                </select>
                <table class="table table-stripped table-bordered ">
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>Invoice Number</th>
                        <th>
                            Description
                        </th>
                        <th>Total Amount</th>
                        <th>
                            Payments
                        </th>
                        <th>
                            Balance
                        </th>
                    </tr>
                    <tbody>
                        @php
                            $totalAmountDue = 0; // Initialize the total amount due
                        @endphp

                        @foreach ($invoices as $invoice)
                                                @php
                                                    // Calculate total payment for the current invoice
                                                    $totalPaymentForInvoice = $groupedPayments->has($invoice->reference_no)
                                                        ? $groupedPayments[$invoice->reference_no]->sum('payment')
                                                        : 0;

                                                    // Calculate the balance for this invoice
                                                    $balance = $invoice->grand_total - $totalPaymentForInvoice;

                                                    // Accumulate the balance into the total amount due
                                                    $totalAmountDue += $balance;
                                                @endphp

                                                <tr>
                                                    <td>{{ $invoice->created_at->format('y-m-d') }}</td>
                                                    <td>{{ $invoice->reference_no }}</td>
                                                    <td>{{ $invoice->description }}</td>
                                                    <td>{{ number_format($invoice->grand_total, 2) }}</td> <!-- Format grand total -->
                                                    <td>{{ number_format($totalPaymentForInvoice, 2) }}</td> <!-- Format payments -->
                                                    <td>{{ number_format($balance, 2) }}</td> <!-- Format balance -->
                                                </tr>
                        @endforeach

                        <!-- Final Amount Due Row -->
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Amount Due</strong></td>
                            <td></td>
                            <td><strong>{{ number_format($totalAmountDue, 2) }}</strong></td>
                            <!-- Format total amount due -->
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="panel panel-primary rounded">
                                    <div class="panel-body text-center">
                                        <span class="text-20">3232</span><br>
                                        <span>Total Ledgers</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="panel panel-primary rounded">
                                    <div class="panel-body text-center">
                                        <span class="text-20">123</span><br>
                                        Total Amount
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
</div>

@endsection