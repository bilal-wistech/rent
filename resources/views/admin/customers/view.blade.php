@extends('admin.template')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
                <section class="content-header">
                    <h3 class="mb-4 ml-4">
                        Customers
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
                                    <div class="box">
                                        <div class="box-body">
                                            <form class="form-horizontal" enctype='multipart/form-data'
                                                action="{{ url('admin/customers') }}" method="GET" accept-charset="UTF-8">
                                                {{ csrf_field() }}

                                                <!-- Hidden Inputs for Date Range -->
                                                <div class="d-none">
                                                    <input class="form-control" type="text" id="startDate" name="from"
                                                        value="{{ isset($from) ? $from : '' }}" hidden>
                                                    <input class="form-control" type="text" id="endDate" name="to"
                                                        value="{{ isset($to) ? $to : '' }}" hidden>
                                                </div>

                                                <!-- Filter Form -->
                                                <div class="row align-items-center date-parent">
                                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                                        <label>Date Range</label>
                                                        <div class="input-group col-xs-12">
                                                            <button type="button" class="form-control f-14"
                                                                id="daterange-btn">
                                                                <span class="pull-left">
                                                                    <i class="fa fa-calendar"></i> Pick a date range
                                                                </span>
                                                                <i class="fa fa-caret-down pull-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="">All</option>
                                                            <option value="Active"
                                                                {{ $allstatus == 'Active' ? ' selected="selected"' : '' }}>
                                                                Active</option>
                                                            <option value="Inactive"
                                                                {{ $allstatus == 'Inactive' ? ' selected="selected"' : '' }}>
                                                                Inactive</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                                        <label>Customer</label>
                                                        <select class="form-control select2" name="customer" id="customer">
                                                            <option value="">All</option>
                                                            @if (!empty($customers))
                                                                @foreach ($customers as $customer)
                                                                    <option value="{{ $customer->id }}"
                                                                        {{ $customer->id == $allcustomers ? ' selected="selected"' : '' }}>
                                                                        {{ $customer->first_name . ' ' . $customer->last_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
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

                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                      <h3 class="card-title">Customers Management</h3>
                                      @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'add_customer'))
                              <div>
                                <a class="btn btn-success f-14" href="{{ url('admin/add-customer') }}">Add Customer</a>

                              </div>
                            @endif
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="table-responsive my-custom-datatable">
                                            {!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive example', 'width' => '100%', 'cellspacing' => '0']) !!}
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

<!-- Updated DataTables CSS and JS links -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
{!! $dataTable->scripts() !!}
@endpush

@section('validate_script')
    <script type="text/javascript">
        'use strict';
        var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
        var user_id = '{{ $user->id ?? '' }}';
        var page = "customer";
    </script>
    <script src="{{ asset('backend/js/property_customer_dropdown.min.js') }}"></script>
    <script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
    <script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection
