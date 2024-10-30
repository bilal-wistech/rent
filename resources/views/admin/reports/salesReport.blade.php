@extends('admin.template')
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
  <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
      <!-- Main Content -->
      <section class="content ml-3 mr-3">
        <div class="row">
          <!-- Total Income Card -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-warning shadow">
              <div class="card-body">
                <h3 class="card-title">{!! moneyFormat($default_cur_code->org_symbol, $totalIncome ?? '') !!}</h3>
                <p class="card-text">Total Income</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <span>Income from Past 12 Months</span>
                <i class="fa fa-money fa-2x"></i>
              </div>
            </div>
          </div>

          <!-- Total Nights Card -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-success shadow">
              <div class="card-body">
                <h3 class="card-title">{{ $totalNights ?? '' }}</h3>
                <p class="card-text">Total Nights</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <span>Reserved Nights from Past 12 Months</span>
                <i class="fa fa-building fa-2x"></i>
              </div>
            </div>
          </div>

          <!-- Total Reservations Card -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card text-white bg-info shadow">
              <div class="card-body">
                <h3 class="card-title">{{ $totalReservations ?? '' }}</h3>
                <p class="card-text">Total Reservations</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <span>Reservations from Past 12 Months</span>
                <i class="fa fa-plane fa-2x"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Chart Section -->
        <div id="kt_app_content" class="app-content flex-column-fluid">
          <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card shadow">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Sales Report</h5>
                  </div>
                  <div class="card-body">
                    <div id="container" class="sale-container"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
@endsection

@section('validate_script')
<script src="{{ asset('backend/plugins/highcharts/highcharts.js') }}"></script>
<script src="{{ asset('backend/plugins/highcharts/exporting.js') }}"></script>
<script type="text/javascript">
  'use strict';
  let currencyCode = "{{ $default_cur_code->code }}";
  let totalIncome = "{{ $totalIncome }}";
  let totalNight = "{{ $totalNights }}";
  let months = '{!! $months !!}';
  let monthlyNights = '{!! $monthlyNights !!}';
</script>
<script src="{{ asset('backend/js/sales-report.min.js') }}"></script>
@endsection
