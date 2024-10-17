@extends('admin.template')
@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Alert Type<small>Control panel</small></h1>
            @include('admin.common.breadcrumb')
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-body">
                            <div class="box-header">
                                <div class="pull-right"><a class="btn btn-success f-14"
                                        href="{{ route('alert-types.create') }}">Add Alert Type</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive parent-table f-14">
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
@endsection

@section('validate_script')
    <script src="{{ asset('backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection
