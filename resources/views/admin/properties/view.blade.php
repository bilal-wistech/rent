@extends('admin.template')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
  <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
      <section class="content-header">
        <h3 class="mb-4 ml-4">
          Properties
          <small>Control panel</small>
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
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Filter Properties</h4>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" action="{{ url('admin/properties') }}" method="GET"
                      accept-charset="UTF-8">
                      {{ csrf_field() }}

                      <div class="row align-items-center date-parent">
                        <div class="col-md-3 col-sm-3 col-xs-12">
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
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label>Status</label>
                          <select class="form-control" name="status" id="status">
                            <option value="">All</option>
                            <option value="Listed" {{ $allstatus == "Listed" ? ' selected' : '' }}>Listed</option>
                            <option value="Unlisted" {{ $allstatus == "Unlisted" ? ' selected' : '' }}>Unlisted</option>
                          </select>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <label>Space Type</label>
                          <select class="form-control" name="space_type" id="space_type">
                            <option value="">All</option>
                            @if ($space_type_all)
                @foreach($space_type_all as $data)
          <option value="{{ $data->id }}" {{ $data->id == $allSpaceType ? "selected" : '' }}>
            {{ $data->name }}
          </option>
        @endforeach
              @endif
                          </select>
                        </div>
                        <div class="col-md-1 col-sm-2 col-xs-4 d-flex gap-2 mt-4">
                          <button type="submit" name="btn" class="btn btn-primary btn-flat f-14 rounded">Filter</button>
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

            <div class="row">
              <div class="col-xs-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Properties Management</h3>
                    @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'add_properties'))
            <div>
              <a class="btn btn-sm btn-success" href="{{ url('admin/add-properties') }}">Add Properties</a>
            </div>
          @endif
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
      window.location.href = '{{ url("admin/properties") }}'; // Redirect to reset filters
    });
  });

</script>

{!! $dataTable->scripts() !!}

<script>
  var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
  var user_id = '{{ $user->id ?? '' }}';
  var page = "properties";
</script>

<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection