@extends('admin.template')

@section('main')

<div class="content-wrapper">

  @if(Session::has('ledgersuccess'))
    <div class="alert alert-success">Ledger has been deleted!</div>
  @endif

  @if(Session::has('ledgererror'))
    <div class="alert alert-danger">Ledger not found!</div>
  @endif

  <section class="content-header">
    <h1>
      Ledgers
    </h1>
    @include('admin.common.breadcrumb')
  </section>

  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-md-2">
                <div class="panel panel-primary rounded">
                  <div class="panel-body text-center">
                    <span class="text-20">3232</span><br>
                    <span>Total Ledgers</span>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="panel panel-primary rounded">
                  <div class="panel-body text-center">
                    <span class="text-20">123</span><br>
                    Total Amount
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="table-responsive">
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
  'use strict';

  var page = "ledger";

  function confirmDelete(ledgerId) {
    var deleteUrl = '/admin/ledger/delete/' + ledgerId;

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this ledger entry!",
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
@endsection
