@extends('admin.template')

@section('main')

<div class="content-wrapper">
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
            <div class="table-responsive" >
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



<script>
  $(document).ready(function () {
    // Initialize your DataTable
    var table = $('#your-data-table-id').DataTable({
      // Your DataTable options
      // ...
    });

    // Calculate total on each draw
    table.on('draw', function () {
      let totalIncomingBalance = 0;

      // Iterate through each row in the DataTable
      table.rows().every(function () {
        var data = this.data(); // Get the data for the row
        // Assuming incoming balance is in the second column (index 1)
        totalIncomingBalance += parseFloat(data[1]) || 0; // Change index according to your column structure
      });

      // Update the total in the designated area
      $('#total-amount-due').text(moneyFormat(totalIncomingBalance));
    });

    // Trigger the draw event to calculate the total when the DataTable is initialized
    table.draw();
  });

  // Function to format money (adjust according to your needs)
  function moneyFormat(value) {
    return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value); // Change currency as needed
  }
</script>