@extends('admin.template')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h1 class="mb-4 ml-3">
                    Properties
                    <small>Control panel</small>
                </h1>
                @include('admin.common.breadcrumb')
            </section>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <section class="content">
                        <!-- Filtering Box Start -->
                        <div class="row mb-3">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/properties') }}" method="GET" accept-charset="UTF-8">
                                            {{ csrf_field() }}

                                            <div class="d-none">
                                                <input class="form-control" type="text" id="startDate" name="from" value="{{ isset($from) ? $from : '' }}" hidden>
                                                <input class="form-control" type="text" id="endDate" name="to" value="{{ isset($to) ? $to : '' }}" hidden>
                                            </div>

                                            <div class="row align-items-center date-parent">
                                                <div class="col-md-3">
                                                    <label>Date Range</label>
                                                    <div class="input-group">
                                                        <button type="button" class="form-control btn btn-outline-secondary" id="daterange-btn">
                                                            <span class="pull-left">
                                                                <i class="fa fa-calendar"></i> Pick a date range
                                                            </span>
                                                            <i class="fa fa-caret-down pull-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">All</option>
                                                        <option value="Listed" {{ $allstatus == "Listed" ? 'selected' : '' }}>Listed</option>
                                                        <option value="Unlisted" {{ $allstatus == "Unlisted" ? 'selected' : '' }}>Unlisted</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
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
                                                <div class="col-md-3 d-flex gap-2 mt-4">
                                                    <button type="submit" name="btn" class="btn btn-primary btn-flat f-14 rounded">Filter</button>
                                                    <button type="button" name="reset_btn" id="reset_btn" class="btn btn-secondary btn-flat f-14 rounded">Reset</button>
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
                                                <a class="btn btn-success" href="{{ url('admin/add-properties') }}">Add Properties</a>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.card-header -->
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
<link rel="stylesheet" href="{{ asset('backend/plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}">
<script src="{{ asset('backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
{!! $dataTable->scripts() !!}

<script>
    var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
    var user_id = '{{ $user->id ?? '' }}';
    var page = "properties";
</script>




<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection
