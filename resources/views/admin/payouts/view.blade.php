@extends('admin.template') 

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  @if(Session::has('paydelsuccess'))
    <div class="alert alert-success">Payout has been deleted!</div>
  @endif

  @if(Session::has('paydelerror'))
    <div class="alert alert-danger">Payout not found!</div>
  @endif

  <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
      <div class="d-flex flex-column flex-column-fluid">
        <section class="content-header">
          <h3 class="mb-4 ml-4">
            Invoices <small>Control panel</small>
          </h3>
          <div class="ml-4 mr-4">
            @include('admin.common.breadcrumb')
          </div>
        </section>

        <div id="kt_app_content" class="app-content flex-column-fluid">
          <div id="kt_app_content_container" class="app-container container-fluid">
            <section class="content">

              <!-- Filtering Box Start -->
              <div class="row">
                <div class="col-xs-12">
                  <div class="card mb-4">
                    <div class="card-header">
                      <h4 class="card-title">Filter Invoices</h4>
                    </div>
                    <div class="card-body">
                      <form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/payouts') }}"
                        method="GET" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <div class="row align-items-center date-parent">
                          <div class="col-md-3 col-sm-4 col-xs-12">
                            <label>Date Range</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="dateRange" name="date_range"
                                placeholder="Select date range" value="{{ isset($date_range) ? $date_range : '' }}">
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                              </div>
                            </div>
                            <input class="form-control d-none" type="text" id="startDate" name="from"
                              value="{{ isset($from) ? $from : '' }}">
                            <input class="form-control d-none" type="text" id="endDate" name="to"
                              value="{{ isset($to) ? $to : '' }}">
                          </div>
                          <div class="col-md-2 col-sm-2 col-xs-12">
                            <label>Status</label>
                            <select class="form-control" name="status" id="status">
                              <option value="">All</option>
                              <option value="Success" {{ $allstatus == "Success" ? 'selected' : '' }}>Success</option>
                              <option value="Pending" {{ $allstatus == "Pending" ? 'selected' : '' }}>Pending</option>
                            </select>
                          </div>
                          <div class="col-md-1 col-sm-2 col-xs-4 d-flex gap-2 mt-4">
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
              </div>
              <!-- Filtering Box End -->

              <!-- Booking Summary Start -->
              <div class="row mb-4">
                <div class="row">
                  <div class="col-3 text-center">
                    <div class="card">
                      <div class="card-body">
                        <div class="panel panel-primary rounded">
                          <div class="panel-body text-center">
                            <span class="text-20">{{ $totalPayouts }}</span><br>
                            <span class="total-payouts">Total Payouts</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-3 text-center">
                    <div class="card">
                      <div class="card-body">
                        <div class="panel panel-primary rounded">
                          <div class="panel-body text-center">
                            <span class="text-20">{{ $totalPayoutsAmount }}</span><br>
                            Total<span class="total-amount font-weight-bold"> Amount</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Booking Summary End -->
  
              <div class="row">
                <div class="col-xs-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h4 class="card-title mb-0">Payouts Table</h4>
                      <a href="{{route('payouts.create')}}" class="btn btn-sm btn-success">Add Payouts</a>
                    </div>

                    <div class="card-body">
                      <div class="table-responsive parent-table f-14">
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

    @endsection

    @push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    {!! $dataTable->scripts() !!}

    <script>
      $(document).ready(function () {
      // Initialize Flatpickr for date range
      flatpickr("#dateRange", {
        mode: "range",
        dateFormat: "m-d-Y",
        onChange: function (selectedDates) {
        if (selectedDates.length === 2) {
          $('#startDate').val(flatpickr.formatDate(selectedDates[0], "m-d-Y"));
          $('#endDate').val(flatpickr.formatDate(selectedDates[1], "m-d-Y"));
        }
        }
      });

      // Handle reset button
      $('#reset_btn').on('click', function () {
        $('#startDate, #endDate').val('');
        $('#property, #customer').val('');
        $('#dateRange').val('');
        window.location.href = '{{ url("admin/payouts") }}'; // Adjust URL to point to invoices
      });
      });

      function confirmDelete(payoutId) {
      var deleteUrl = '/admin/payouts/delete/' + payoutId;

      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this payout!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
        if (willDelete) {
          window.location.href = deleteUrl;
        }
        });
      }
    </script>
  @endpush

    @section('validate_script')
    <script type="text/javascript">
      'use strict';

      var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
      var user_id = '{{ $user->id ?? '' }}';
      var page = "payout";
    </script>
    <script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
    @endsection