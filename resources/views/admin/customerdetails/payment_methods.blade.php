@extends('admin.template')

@section('main')
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        <div class="content-wrapper">
                            <section class="content">
                                @include('admin.customerdetails.customer_menu')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">


                                            <!-- Payment Method Content Wrapper -->
                                            <div class="payment-method-content">
                                                <div class="panel panel-default">
                                                    <div class="panel-footer">
                                                        <div class="panel">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="table-responsive parent-table f-14">
                                                                        <table class="table table-striped" id="payout_methods">
                                                                            @if (count($payouts))
                                                                                <thead>
                                                                                    <tr class="text-truncate">
                                                                                        <th>Methods</th>
                                                                                        <th>Details/Account</th>
                                                                                        <th>Status</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                    @foreach ($payouts as $row)
                                                                                        <tr>
                                                                                            <td>
                                                                                                {{ $row->payment_methods->name }}
                                                                                                @if ($row->selected == 'Yes')
                                                                                                    <span class="label label-info">Default</span>
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $row->account }}
                                                                                                ({{ $row->currency_code }})
                                                                                            </td>
                                                                                            <td>
                                                                                                Ready
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            @else
                                                                                <tr><td colspan="3" class="text-center">No data available</td></tr>
                                                                            @endif
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Payment Method Content Wrapper -->

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
