@extends('admin.template')

@section('main')
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">

                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        <section class="content">
                            @include('admin.customerdetails.customer_menu')
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-body mt-5">
                                            <form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/customer/payouts/' . $user->id) }}" method="GET" accept-charset="UTF-8">
                                                <input class="form-control" id="startfrom" type="hidden" name="from" value="{{ isset($from) ? $from : '' }}">
                                                {{ csrf_field() }}
                                                <input class="form-control" id="endto" type="hidden" name="to" value="{{ isset($to) ? $to : '' }}">
                                                <div class="row align-items-center date-parent">
                                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                                        <label>Date Range</label>
                                                        <div class="input-group  col-xs-12">
                                                            <button type="button" class="form-control" id="daterange-btn">
                                                                <span class="pull-left">
                                                                    <i class="fa fa-calendar"></i>  Pick a date range
                                                                </span>
                                                                <i class="fa fa-caret-down pull-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                    
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="" >All</option>
                                                            <option value="Success" {{ $allstatus == "Success" ? ' selected = "selected"' : '' }}>Success</option>
                                                            <option value="Pending"  {{ $allstatus == "Pending"  ? ' selected = "selected"' : '' }}>Pending</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-7 col-sm-2 col-xs-4 d-flex gap-2 mt-4 justify-content-end ">
                                                        <button type="submit" name="btn" class="btn btn-primary btn-flat f-14 rounded">Filter</button>
                                                        <button type="button" name="reset_btn" id="reset_btn" class="btn btn-primary btn-flat f-14 rounded">Reset</button>
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
                                       
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                {!! $dataTable->table([
                                                    'class' => 'table table-striped table-hover dt-responsive',
                                                    'width' => '100%',
                                                    'cellspacing' => '0',
                                                ]) !!}
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
@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
{!! $dataTable->scripts() !!}
@endpush


@section('validate_script')
	<script type="text/javascript">
		'use strict'

		var sessionDate  = '{{ strtoupper(Session::get('date_format_type')) }}';
		var user_id      = '{{ $user?->id }}';
		var page      	 = 'customer_payout';

	</script>
	<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection
