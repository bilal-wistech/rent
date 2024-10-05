@extends('admin.template')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/ninja/ninja-slider.min.css') }}" />
@endpush

@section('main')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-8 offset-sm-2">
                    <div class="box box-info box_info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Invoice Detail</h3>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <!-- Company Information -->
                                <div class="col-sm-6">
                                    <h5><strong>Company Name</strong></h5>
                                    <p>123 Company Street<br>
                                        City, State ZIP<br>
                                        Phone: (555) 555-5555<br>
                                        Email: info@company.com</p>
                                </div>

                                <!-- Customer Information -->
                                <div class="col-sm-6 text-right">
                                    <h5><strong>Billed To</strong></h5>
                                    <p>{{ $invoice->customer->first_name . ' ' . $invoice->customer->last_name }}<br>
                                        Phone: {{ $invoice->customer->phone ?? '' }}<br>
                                        Email: {{ $invoice->customer->email ?? '' }}</p>
                                </div>
                            </div>

                            <hr>
                            @php
                                use Carbon\Carbon;
                            @endphp
                            <!-- Invoice Information -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5><strong>Invoice Number:</strong> {{ $invoice->reference_no }}</h5>
                                    <h5><strong>Invoice Date:</strong>
                                        {{ Carbon::parse($invoice->invoice_date)->format('m-d-Y') }}</h5>
                                    <h5><strong>Due Date:</strong> {{ Carbon::parse($invoice->due_date)->format('m-d-Y') }}
                                    </h5>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h5><strong>Payment Status:</strong> {{ $invoice->payment_status }}</h5>
                                </div>
                            </div>

                            <hr>
                            <div class="row">

                                <div class="col-sm-6">
                                    <h5><strong>Property:</strong> {{ $invoice->property->name ?? '' }}</h5>
                                    <h5><strong>Landlord:</strong>
                                        {{ $invoice->booking->host->first_name . ' ' . $invoice->booking->host->last_name }}
                                    </h5>
                                    <h5><strong>Check In Date:</strong>
                                        {{ Carbon::parse($invoice->booking->start_date)->format('m-d-Y') }}</h5>
                                    <h5><strong>Check Out Date:</strong>
                                        {{ Carbon::parse($invoice->booking->end_date)->format('m-d-Y') }}</h5>
                                    <h5><strong>No of Guests:</strong>
                                        {{ $invoice->booking->guest }}
                                    </h5>

                                </div>
                                <div class="col-sm-6">
                                    <h5><strong>Property Address:</strong></h5>
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
                                    @if (isset($invoice->property->property_address->flat_no))
                                        <p><strong>Flat No:</strong>
                                            {{ $invoice->property->property_address->flat_no ?? '' }}</p>
                                    @endif
                                    <p><strong>City:</strong> {{ $invoice->property->property_address->city ?? '' }}</p>
                                    @if (isset($invoice->property->property_address->state))
                                        <p><strong>State:</strong> {{ $invoice->property->property_address->state ?? '' }}
                                        </p>
                                    @endif
                                    <p><strong>Country:</strong> {{ $invoice->property->property_address->country ?? '' }}
                                    </p>

                                </div>
                            </div>

                            <hr>


                            <!-- Total Amount -->
                            <div class="row">
                                <div class="col-sm-6 offset-sm-6">
                                    <table class="table">
                                        <tr>
                                            <th>Per Night Charges:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->per_night !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Cleaning Charges:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->cleaning_charge ?? 0 !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Guest Charges:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->guest_charge ?? 0 !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Service Charges:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->service_charge ?? 0 !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Security:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->security_money ?? 0 !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>IVA Tax:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->iva_tax ?? 0 !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Accomodation Tax:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->accomodation_tax ?? 0 !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Host Fee:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->booking->host_fee ?? 0 !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td>{!! $invoice->booking->currency->symbol . ' ' . $invoice->sub_total !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td><strong>{!! $invoice->booking->currency->symbol . ' ' . $invoice->grand_total !!}</strong>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer text-center">
                            <a class="btn btn-default f-14" href="{{ url('admin/invoices') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('validate_script')
    <script type="text/javascript" src="{{ asset('js/ninja/ninja-slider.js') }}"></script>
    <script src="{{ asset('backend/js/booking-detail.min.js') }}"></script>
@endsection
