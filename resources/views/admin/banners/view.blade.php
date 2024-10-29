@extends('admin.template')

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid col-lg-12 col-12"> <!-- Adjusted to take full width -->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-3 col-12 settings_bar_gap"> <!-- Settings bar -->
                                @include('admin.common.settings_bar')
                            </div>
                            <div class="col-lg-9 col-12"> <!-- Adjusted this column -->
                                <div class="card"> <!-- The card for the banners management -->
                                    <div class="col-lg-12 col-12">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Banners Management</h3>
                                            <a class="btn btn-success btn-sm f-14" href="{{ url('admin/settings/add-banners') }}">Add Banners</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="parent-table filters-parent f-14">
                                                {!! $dataTable->table(['class' => 'table table-striped dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of banners management column -->
                        </div> <!-- End of row -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    {!! $dataTable->scripts() !!}
@endpush
