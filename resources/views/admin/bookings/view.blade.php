@extends('admin.template')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">
                    Bookings
                    <small>Control panel</small>
                </h3>
                <div class="ml-4 mr-4">
                    @include('admin.common.breadcrumb')
                </div>
            </section>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <section class="content">
                        <div class="row">
                            <!-- Filter Box Start -->
                            <div class="col-xs-12 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">Filter Bookings</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ url('admin/bookings') }}" method="GET"
                                            accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <div class="row align-items-center date-parent">
                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label>Date Range</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="dateRange"
                                                            name="date_range" placeholder="Select date range"
                                                            value="{{ isset($date_range) ? $date_range : '' }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                    <input class="form-control d-none" type="text" id="startDate"
                                                        name="from" value="{{ isset($from) ? $from : '' }}">
                                                    <input class="form-control d-none" type="text" id="endDate"
                                                        name="to" value="{{ isset($to) ? $to : '' }}">
                                                </div>

                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label>Property</label>
                                                    <select class="form-control select2" name="property" id="property">
                                                        <option value="">All</option>
                                                        @if (!empty($properties))
                                                            @foreach ($properties as $property)
                                                                <option value="{{ $property->id }}" {{ $property->id == $allproperties ? 'selected' : '' }}>
                                                                    {{ $property->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label>Customer</label>
                                                    <select class="form-control select2customer" name="customer"
                                                        id="customer">
                                                        <option value="">All</option>
                                                        @if (!empty($customers))
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}" {{ $customer->id == $allcustomers ? 'selected' : '' }}>
                                                                    {{ $customer->first_name . ' ' . $customer->last_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="col-md-3 col-sm-6 col-12">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">All</option>
                                                        <option value="Accepted" {{ $allstatus == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                                        <option value="Cancelled" {{ $allstatus == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                        <option value="Declined" {{ $allstatus == 'Declined' ? 'selected' : '' }}>Declined</option>
                                                        <option value="Expired" {{ $allstatus == 'Expired' ? 'selected' : '' }}>Expired</option>
                                                        <option value="Pending" {{ $allstatus == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="Processing" {{ $allstatus == 'Processing' ? 'selected' : '' }}>Processing</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-1 col-sm-2 col-4 d-flex gap-2 mt-4">
                                                    <button type="submit" name="btn"
                                                        class="btn btn-primary btn-flat f-14 rounded">Filter</button>
                                                    <button type="button" name="reset_btn" id="reset_btn"
                                                        class="btn btn-primary btn-flat f-14 rounded">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Filter Box End -->

                            <!-- Statistics Box Start -->
                            <div class="row mt-2 mb-4">
                                <div class="col-3 text-center">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                            <span class="text-20">{{ $total_bookings }}</span><br>
                                            <span class="font-weight-bold total-customer">Total Bookings</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                            <span class="text-20">{{ $total_customers }}</span><br>
                                            <span class="font-weight-bold total-customer">Total Customers</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">

                                    @if ($different_total_amounts)
                                        <div class="card bg-white">

                                            @foreach ($different_total_amounts as $total_amount)
                                                <div class="col-xl-2 col-md-4 py-2 py-md-0">
                                                    <div class="panel panel-primary rounded">
                                                        <div class="panel-body text-center">
                                                            <span class="text-20">{!! $total_amount['total'] !!}</span><br>
                                                            Total<span class="font-weight-bold total-amount">
                                                                {{ $total_amount['currency_code'] }}</span> amount
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Statistics Box End -->
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Bookings Management</h3>
                                        <a class="btn btn-success btn-sm" href="{{route('admin.bookings.create') }}">
                                            Add Booking
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            {!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('validate_script')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>


    $(document).ready(function () {
        // Initialize Flatpickr for date range
        flatpickr("#dateRange", {
            mode: "range",
            dateFormat: "m-d-Y", // Change to m-d-Y to match your database format
            onChange: function (selectedDates) {
                if (selectedDates.length === 2) {
                    // Format the dates to m-d-Y
                    $('#startDate').val(flatpickr.formatDate(selectedDates[0], "m-d-Y"));
                    $('#endDate').val(flatpickr.formatDate(selectedDates[1], "m-d-Y"));
                }
            }
        });

        // Handle reset button
        $('#reset_btn').on('click', function () {
            $('#startDate, #endDate').val(''); // Clear date fields
            $('#status, #space_type').val(''); // Reset other fields
            $('#dateRange').val(''); // Reset date range field
            window.location.href = '{{ url("admin/bookings") }}'; // Redirect to reset filters
        });
    });

</script>

{!! $dataTable->scripts() !!}

<script>
    var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
    var user_id = '{{ $user->id ?? '' }}';
    var page = "booking";
</script>

<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection