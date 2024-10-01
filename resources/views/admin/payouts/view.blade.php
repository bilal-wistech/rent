@extends('admin.template') 

@section('main')

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  @if(Session::has('paydelsuccess'))
    <div class="alert alert-success">Payout has been deleted !</div>
  @endif

  @if(Session::has('paydelerror'))
    <div class="alert alert-danger">Payout not found !</div>
  @endif

  <section class="content-header">
    <h1>
      Payouts <a href="{{ route('payouts.create')  }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
    </h1>
    @include('admin.common.breadcrumb')
  </section>


  <!-- Main content -->
  <section class="content">

    <!--Filtering Box Start -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/payouts') }}" method="GET"
              accept-charset="UTF-8">
              {{ csrf_field() }}
              <div class="col-md-12  d-none">
                <input class="form-control" type="text" id="startDate" name="from"
                  value="{{ isset($from) ? $from : '' }}" hidden>
                <input class="form-control" type="text" id="endDate" name="to" value="{{ isset($to) ? $to : '' }}"
                  hidden>
              </div>
              <div class="row row align-items-center date-parent">
                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label>Date Range</label>
                  <div class="input-group  col-xs-12">
                    <button type="button" class="form-control" id="daterange-btn">
                      <span class="pull-left">
                        <i class="fa fa-calendar"></i> Pick a date range
                      </span>
                      <i class="fa fa-caret-down pull-right"></i>
                    </button>
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  <label>Status</label>
                  <select class="form-control" name="status" id="status">
                    <option value="">All</option>
                    <option value="Success" {{ $allstatus == "Success" ? ' selected = "selected"' : '' }}>Success</option>
                    <option value="Pending" {{ $allstatus == "Pending" ? ' selected = "selected"' : '' }}>Pending</option>
                  </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-4 d-flex gap-2 mt-4">
                  <button type="submit" name="btn" class="btn btn-primary btn-flat f-14 rounded">Filter</button>
                  <button type="button" name="reset_btn" ID="reset_btn"
                    class="btn btn-primary btn-flat f-14 rounded">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Filtering Box End -->
    <!-- Booking summary start-->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-2 py-2 py-md-0">
                <div class="panel panel-primary rounded">
                  <div class="panel-body text-center">
                    <span class="text-20">{{ $totalPayouts }}</span><br>
                    <span class="total-payouts">Total Payouts</span>
                  </div>
                </div>
              </div>
              <div class="col-md-2 py-2 py-md-0">
                <div class="panel panel-primary rounded">
                  <div class="panel-body text-center">
                    <span class="text-20">{{$totalPayoutsAmount}}</span><br>
                    Total<span class="total-amount font-weight-bold"> </span> amount
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Booking summary ending-->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive parent-table f-14">
              {!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection

@push('scripts')
  <script src="{{ asset('backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
  {!! $dataTable->scripts() !!}
@endpush

@section('validate_script')
<script type="text/javascript">
  'use strict'


  var sessionDate = '{{strtoupper(Session::get('date_format_type'))}}';
  var user_id = '{{ $user->id ?? ''}}';
  var page = "payout";
</script>
<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>

@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
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