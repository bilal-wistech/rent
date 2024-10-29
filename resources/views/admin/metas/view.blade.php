@extends('admin.template')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
  <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
      <section class="content-header">
        <h3 class="mb-4 ml-4">
          Metas <small>Control panel</small>
        </h3>
        <div class="ml-4 mr-4">
          @include('admin.common.breadcrumb')
        </div>
      </section>

      <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
          <section class="content">
            <div class="d-flex flex-row">
              <div class="col-lg-3 col-12 settings_bar_gap">
                @include('admin.common.settings_bar')
              </div>
              <div class="col-lg-9 col-12 d-flex flex-column">
                <div class="card flex-grow-1">
                  <div class="card-header">
                    <h3 class="card-title">Metas Management</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="card-body flex-grow-1">
                    <div class="parent-table filters-parent f-14">
                      <div class="table-responsive">
                        {!! $dataTable->table(['class' => 'table table-striped dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- End of flex-row -->
          </section>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
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

  {!! $dataTable->scripts() !!}
@endpush