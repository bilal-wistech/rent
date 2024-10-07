@extends('admin.template')

@push('css')
    <!-- Ninja Slider CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('js/ninja/ninja-slider.min.css') }}" />
    <!-- Custom CSS -->
    <style>
        .invoice-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header,
        .invoice-footer {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }

        .invoice-header h3,
        .invoice-footer h3 {
            margin: 0;
            font-size: 24px;
        }

        .invoice-body {
            padding: 20px;
        }

        .invoice-section-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .invoice-details,
        .invoice-total {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .invoice-total strong {
            font-size: 18px;
        }

        .table th,
        .table td {
            padding: 10px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .btn-default {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-default:hover {
            background-color: #0056b3;
        }
    </style>
@endpush

@section('main')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-8 offset-sm-2">
                    <div class="invoice-container">
                        <!-- Invoice Header -->
                        <div class="invoice-header text-center">
                            <h3>Invoice Detail</h3>
                        </div>

                        <!-- Invoice Body -->
                        <div class="invoice-body">
                            <div class="row">
                                <!-- Company Information -->
                                <div class="col-sm-6">
                                    <div class="invoice-section-title">Company Information</div>
                                    <p><strong>Company Name</strong></p>
                                    <p>123 Company Street<br>
                                        City, State ZIP<br>
                                        Phone: (555) 555-5555<br>
                                        Email: info@company.com</p>
                                </div>

                                <!-- Customer Information -->
                                <div class="col-sm-6 text-right">
                                    <div class="invoice-section-title">Billed To</div>
                                    <p>{{ $invoice->customer->first_name . ' ' . $invoice->customer->last_name }}</p>
                                    <p>Phone: {{ $invoice->customer->phone ?? '' }}<br>
                                        Email: {{ $invoice->customer->email ?? '' }}</p>
                                </div>
                            </div>

                            <hr>

                            <!-- Invoice Information -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><strong>Invoice Number:</strong> {{ $invoice->reference_no }}</p>
                                    <p><strong>Invoice Date:</strong>
                                        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('m-d-Y') }}</p>
                                    <p><strong>Due Date:</strong>
                                        {{ \Carbon\Carbon::parse($invoice->due_date)->format('m-d-Y') }}</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p><strong>Payment Status:</strong> {{ $invoice->payment_status }}</p>
                                </div>
                            </div>

                            <hr>

                            <!-- Property & Booking Information -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><strong>Property:</strong> {{ $invoice->property->name ?? '' }}</p>
                                    <p><strong>Landlord:</strong>
                                        {{ $invoice->booking->host->first_name . ' ' . $invoice->booking->host->last_name }}
                                    </p>
                                    <p><strong>Check In:</strong>
                                        {{ \Carbon\Carbon::parse($invoice->booking->start_date)->format('m-d-Y') }}</p>
                                    <p><strong>Check Out:</strong>
                                        {{ \Carbon\Carbon::parse($invoice->booking->end_date)->format('m-d-Y') }}</p>
                                    <p><strong>Guests:</strong> {{ $invoice->booking->guest }}</p>
                                </div>

                                <div class="col-sm-6">
                                    <div class="invoice-section-title">Property Address</div>
                                    <p><strong>Address:</strong>
                                        {{ $invoice->property->property_address->address_line_1 ?? '' }}</p>
                                    @if (isset($invoice->property->property_address->area))
                                        <p><strong>Area:</strong> {{ $invoice->property->property_address->area ?? '' }}
                                        </p>
                                    @endif
                                    @if (isset($invoice->property->property_address->building))
                                        <p><strong>Building:</strong>
                                            {{ $invoice->property->property_address->building ?? '' }}</p>
                                    @endif
                                    <p><strong>City:</strong> {{ $invoice->property->property_address->city ?? '' }}</p>
                                    <p><strong>Country:</strong> {{ $invoice->property->property_address->country ?? '' }}
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <!-- Invoice Charges -->
                            <div class="invoice-details">
                                <table class="table">
                                    <tr>
                                        <th>Per Night Charges:</th>
                                        <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->per_night !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Cleaning Charges:</th>
                                        <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->cleaning_charge ?? 0 !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Guest Charges:</th>
                                        <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->guest_charge ?? 0 !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Service Charges:</th>
                                        <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->service_charge ?? 0 !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Security:</th>
                                        <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->security_money ?? 0 !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><strong>{!! $invoice->booking->currency->symbol . ' ' . $invoice->grand_total !!}</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Invoice Footer -->
                        <div class="invoice-footer text-center">
                            <a href="{{ url('admin/invoices') }}" class="btn-default">Back to Invoices</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/ninja/ninja-slider.js') }}"></script>
@endpush
