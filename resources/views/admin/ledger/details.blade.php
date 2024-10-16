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
                        <th>
                            Description
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Payments
                        </th>
                        <th>
                            Balance
                        </th>
                    </tr>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->created_at->format('y-m-d')}}</td>
                                <td>{{ $invoice->description}}</td>
                                <td>{{ $invoice->grand_total}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Amount Due</td>
                            <td></td>
                            <td>AED 12000</td>
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