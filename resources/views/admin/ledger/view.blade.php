@extends('admin.template')

@section('main')

<div class="content-wrapper">
  <section class="content-header">
    <h1>Ledgers</h1>
    @include('admin.common.breadcrumb')
  </section>

  <section class="content">
    <div class="card border-0">
      <div class="card-body bg-white border-0 p-4">
        <div class="row">
          <div class="col-4">
            <select name="" id="UserID" class="form-control">
              <option value="">Select User</option>
              @foreach ($users as $user)
          <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
        @endforeach
            </select>
          </div>
          <div class="col-4">
            <select name="" id="invoiceStatus" class="form-control">
              <option value="all">All</option>
              <option value="today">Today</option>
              <option value="week">This Week</option>
              <option value="thismonth">This Month</option>
              <option value="lastmonth">Last Month</option>
              <option value="thisyear">This Year</option>
              <option value="lastyear">Last Year</option>
              <option value="period">Period</option>
            </select>
          </div>
        </div>

        <form action="" class="d-none" id="filterForm">
          <div class="row mt-4">
            <div class="col-md-4">
              <label for="startDate" class="mb-2 fw-bold">Start Date</label>
              <input type="date" class="form-control" id="startDate">
            </div>
            <div class="col-md-4">
              <label for="endDate" class="mb-2 fw-bold">End Date</label>
              <input type="date" class="form-control" id="endDate">
            </div>
            <div class="col-md-4 d-flex align-items-end">
              <button class="btn btn-info w-30 text-white">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card mx-auto border-0">
      <div class="card-body p-4">
        <!-- Invoice Table -->
        <table class="table table-striped table-bordered" id="invoiceTable">
          <thead>
            <tr>  
              <th>Date</th>
              <th>Invoice Number</th>
              <th>Description</th>
              <th>Total Amount</th>
              <th>Payments</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

        <!-- Total Amount Due Row -->
        <div id="totalAmountDue" class="mt-3 float-end" style="margin-right : 30px;">
          <strong>Amount Due:</strong> <span id="dueAmount">{{ number_format(0, 2) }}</span>
        </div>
      </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  let url = "{{ url('admin/balance/details') }}";
  let csrfToken = "{{ csrf_token() }}";

  $(document).ready(function () {
    $('#UserID').on('change', function () {
      let userId = $(this).val();

      if (userId) { 
        $.post({
          url: url + '/' + userId,
          data: {
            _token: csrfToken
          },
          success: function (response) {
            console.log(response); 

            $('#invoiceTable tbody').empty();
            let totalAmountDue = 0;

            if (response.error) {
              // Handle no invoices found error
              $('#invoiceTable tbody').append('<tr><td colspan="6" class="text-center">' + response.error + '</td></tr>');
              $('#dueAmount').text('0.00'); // Reset due amount if no invoices
            } else {
              $.each(response.invoices, function (index, invoice) {
                // Format the created_at date to y-m-d
                let formattedDate = formatDate(invoice.created_at);

                // Calculate total payments for this invoice
                let totalPayments = 0;
                if (response.payments[invoice.reference_no]) {
                  totalPayments = response.payments[invoice.reference_no].reduce((sum, payment) => sum + parseFloat(payment.payment), 0);
                }

                // Calculate balance
                let balance = parseFloat(invoice.grand_total) - totalPayments;

                // Construct the row HTML
                let row = '<tr>' +
                  '<td>' + formattedDate + '</td>' + // Use the formatted date here
                  '<td>' + invoice.reference_no + '</td>' +
                  '<td>' + invoice.description + '</td>' +
                  '<td>' + parseFloat(invoice.grand_total).toFixed(2) + '</td>' +
                  '<td>' + totalPayments.toFixed(2) + '</td>' +
                  '<td>' + balance.toFixed(2) + '</td>' +
                  '</tr>';

                // Append the row to the table body
                $('#invoiceTable tbody').append(row);

                // Sum the balance for total amount due
                totalAmountDue += balance; // Add balance to totalAmountDue
              });

              $('#dueAmount').text(totalAmountDue.toFixed(2)); // Update the displayed amount due
            }
          },
          error: function () {
            $('#invoiceTable tbody').append('<tr><td colspan="6" class="text-center">An error occurred while fetching data.</td></tr>');
          }
        });
      } else {
        $('#invoiceTable tbody').empty(); // Clear table if no user selected
        $('#dueAmount').text('0.00'); // Reset due amount
      }
    });

    function formatDate(dateString) {
      const date = new Date(dateString);
      const year = date.getFullYear(); // Get full year
      const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
      const day = String(date.getDate()).padStart(2, '0'); // Pad day with zero if necessary
      return `${year}-${month}-${day}`; // Return formatted date
    }



    $('#invoiceStatus').on('change', function () {
      if ($(this).val() === "period") {
        // $("#startDate").removeClass('d-none');
        // $("#endDate").removeClass('d-none');
        // $("#suBbtn").removeClass('d-none');
         $('#filterForm').removeClass('d-none');
      } else {
        $('#filterForm').addClass('d-none');
        // $("#startDate").addClass('d-none');
        // $("#endDate").addClass('d-none');
        // $("#suBbtn").addClass('d-none');
      }
    });
  });



</script>