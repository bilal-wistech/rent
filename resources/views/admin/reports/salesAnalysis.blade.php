@extends('admin.template')
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
  <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">

      <div class="content-header">
        <h3 class="mb-4 ml-4">Analysis of Data</h3>
        <div class="ml-4 mr-4">
          @include('admin.common.breadcrumb')
        </div>
      </div>

      <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">

          <!-- Filtering Section Start -->
          <div class="card mb-4">
            <div class="card-header">
              <h4 class="card-title">Filter Analysis Data</h4>
            </div>
            <div class="card-body">
              <form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/sales-analysis') }}"
                method="GET" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="row align-items-center">
                  <div class="col-md-3">
                    <label>Pick a Year</label>
                    <select class="form-control" name="year" id="year">
                      <option value="">Last 12 Months</option>
                      @if (!empty($yearLists))
              @foreach ($yearLists as $yearList)
          <option value="{{ $yearList->year }}" {{ $yearList->year == $year ? 'selected' : '' }}>
          {{ $yearList->year }}
          </option>
        @endforeach
            @endif
                    </select>
                  </div>
                  <div class="col-md-4">
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
                  <div class="col-md-2 mt-4 d-flex gap-2">
                    <button type="submit" name="btn" class="btn btn-primary rounded">Filter</button>
                    <button type="button" name="reset_btn" class="btn btn-secondary rounded reset-btn">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Filtering Section End -->

          <!-- Data Analysis Section Start -->
          <div class="card mb-4">
            <div class="card-header">
              <h4 class="card-title">Rates of Reservations & Average Sales</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <caption>
                    Monthly Average Sales and Reservation Rates for <strong>{{ $propertyName }}</strong>
                  </caption>
                  <thead>
                    <tr>
                      <th>Months</th>
                      <th>{{ $propertyName }}</th>
                      <th>Average Sales</th>
                      <th></th>
                      <th>Reservation Rates</th>
                    </tr>
                  </thead>
                  <tbody>
                    @for ($i = 1; $i < count($monthYears); $i++)
                      <tr>
                        <td>{{ $monthYears[$i] }}</td>

                        @php
                $avgStyle = $monthlyAvgDiff[$i] > 0 ? 'bg-success' :
                ($monthlyAvgDiff[$i] == 0 ? 'bg-info' : 'bg-danger');
                $rateStyle = $reservationRateDiff[$i] > 0 ? 'bg-success' :
                ($reservationRateDiff[$i] == 0 ? 'bg-info' : 'bg-danger');
              @endphp

                        <td class="{{ $avgStyle }} text-white">
                        {!! moneyFormat($default_cur_code->org_symbol, $monthlyAvg[$i]) !!}
                        </td>
                        <td class="{{ $avgStyle }} text-white">
                        <i class="fa {{ $monthlyAvgDiff[$i] > 0 ? 'fa-arrow-up' :
              ($monthlyAvgDiff[$i] == 0 ? 'fa-arrow-right' : 'fa-arrow-down') }}"></i>
                        {{ $monthlyAvgDiff[$i] }}%
                        </td>

                        <td class="{{ $rateStyle }} text-white">
                        {{ $reservationRates[$i] }}%
                        </td>
                        <td class="{{ $rateStyle }} text-white">
                        <i class="fa {{ $reservationRateDiff[$i] > 0 ? 'fa-arrow-up' :
              ($reservationRateDiff[$i] == 0 ? 'fa-arrow-right' : 'fa-arrow-down') }}"></i>
                        {{ $reservationRateDiff[$i] }}%
                        </td>
                      </tr>
          @endfor
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Data Analysis Section End -->

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

<script>
  $(document).ready(function () {
    $('.reset-btn').on('click', function (e) {
      e.preventDefault();

      $('#year').val('').trigger('change');
      $('#property').val('').trigger('change');
      window.location.href = '{{ url("admin/sales-analysis") }}';
    });
  });
</script>



@section('validate_script')
<script src="{{ asset('backend/js/report.min.js') }}"></script>
@endsection