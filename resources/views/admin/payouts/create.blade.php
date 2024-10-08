@extends('admin.template')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Payouts
            <small>Add Payout</small>
        </h1>
        @include('admin.common.breadcrumb')
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <div class="card border-0 shadow-sm mt-2">
                    <div class="card-header border-0 bg-white">
                        <b> Payment Details </b>
                        <div class="d-flex align-items-center mb-3">
                            <hr style="flex-grow: 1; border-color: #28a745;">
                            <h7 class="border border-1 border-success text-success px-3 mb-0">RECEIPENT NUMBER :
                                {{ $invNumber }}
                            </h7>
                        </div>

                    </div>
                    <div class="card-body pt-0  ps-4 pr-4 pb-0">
                        <form action="">
                            <div class="row">
                                <div class="col-3">
                                    <label for="" class="mb-1">
                                        <span class="text-danger">*</span>
                                        Customer</label>
                                    <select name="user_id" id="SelectBooking" class="form-control">
                                        <option class="form-control">--Select--</option>
                                        @foreach ($users as $list)
                                            <option class="form-control" value="{{ $list->id }}">{{ $list->first_name }}
                                                {{ $list->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="" class="mb-1">
                                        <span class="text-danger">*</span>
                                        Owner</label>
                                    <select name="" id="" class="select2-ajax form-control">
                                        @foreach ($admin as $list)
                                            <option value="{{ $list->id }}">{{ $list->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="" class="mb-1">
                                        <span class="text-danger">*</span>
                                        Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-3">
                                    <label for="" class="mb-1">
                                        <span class="text-danger">*</span>
                                        Amount</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-3 mt-3">
                                    <label for="" class="mb-1">Slip No</label>
                                    <input type="number" class="form-control">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="mb-1">Type</label>
                                    <select name="" id="" class="form-control">
                                        @foreach ($pMethods as $list)
                                            <option value="{{ $list->id }}" {{ $list->name === 'Cash' ? 'Selected' : '' }}>
                                                {{ $list->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="mb-1">Currency</label>
                                    <select name="" id="" class="form-control">
                                        <option value=""> --Select-- </option>
                                        @foreach ($currency as $list)
                                            <option value="{{ $list->id }}" {{ $list->id === 1 ? 'Selected' : '' }}>
                                                {{ $list->name }} {!! $list->symbol  !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="mb-1">Desposit Verified</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">--Select--</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col-4 mt-3">
                                    <label for="" class="mb-1">Note</label>
                                    <textarea name="" id="" class="form-control"></textarea>
                                </div>

                                <div class="col-6 mt-5">
                                    <input type="checkbox">
                                    Adjustment
                                    </input>
                                    <br>
                                    <input type="checkbox">
                                    Out of Book
                                    </input>
                                    <br>
                                    <input type="checkbox">
                                    Bad Debts
                                    </input>
                                    <br>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold mt-2">Receipent Details</h6>
                    </div>

                    <div class="card-body border-0 shadow-sm">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>Date</th>
                                    <th>Invoice Number</th>
                                    <th>Property</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                </tr>
                            </thead>
                            <tbody id="pData">
                                <tr>
                                    <td colspan="6" class="fw-bold pt-2 pb-2 text-center">Please Select User First !
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-sm btn-success float-end" id="payoutbtn">Payout</button>
                    </div>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </section>
</div>
@endsection




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    let csrfToken = "{{ csrf_token() }}";
    let invoiceurl = "{{ url('/admin/invoices/invoice') }}";
    let payoutUrl = "{{ url('admin/payouts/create/success')}}";
</script>

<script>

    $(document).ready(function () {
        $('#SelectBooking').on('change', function () {
            let user_id = $(this).val();

            // Ensure a valid user ID is selected before making the request
            if (!user_id) {
                alert('Please select a valid user.');
                return;
            }

            // Post request to fetch invoices based on user_id
            $.post({
                url: invoiceurl + '/' + user_id, // Ensure the invoice URL is correctly set
                data: {
                    _token: csrfToken, // Pass the CSRF token for security
                },
                success: function (response) {
                    // Clear the table before populating
                    $('#pData').empty();

                    if (response.invoices && response.invoices.length > 0) {
                        // Loop through each invoice and append a new row for each one
                        response.invoices.forEach(function (invoice) {
                            let createdDate = new Date(invoice.created_at).toISOString().split('T')[0];

                            // Find the corresponding property for the invoice
                            let property = response.properties.find(function (prop) {
                                return prop.id === invoice.property_id;
                            });

                            // Construct the row for each invoice
                            let row = '<tr>' +
                                '<td><input type="checkbox" class="invoice-checkbox" value="' + invoice.id + '"></td>' +
                                '<td>' + createdDate + '</td>' + // Date of the invoice
                                '<td>' + invoice.reference_no + '</td>' + // Invoice reference number
                                '<td>' + (property ? property.name : 'No property found') + '</td>' + // Property name or fallback
                                '<td>' + invoice.grand_total + '</td>' + // Grand total of the invoice
                                '<td>' + invoice.currency_code + '</td>' + // Currency code of the invoice
                                '</tr>';

                            // Append the row to the table
                            $('#pData').append(row);
                        });
                    } else {
                        // If no invoices are found, display a message in the table
                        let row = '<tr>' +
                            '<td colspan="6" class="fw-bold pt-2 pb-2 text-center">No pending invoice found!</td>' +
                            '</tr>';
                        $('#pData').append(row);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error); // Log the error for debugging

                    // In case of error, also display the "No pending invoice found" message
                    let row = '<tr>' +
                        '<td colspan="6" class="fw-bold pt-2 pb-2 text-center">No pending invoice found!</td>' +
                        '</tr>';
                    $('#pData').empty().append(row);
                }
            });
        });


        // for payouts

        $('#payoutbtn').on('click', function () {
            // Get all checked checkboxes
            let selectedInvoices = $('.invoice-checkbox:checked').map(function () {
                return $(this).val(); // Get the value (ID) of each checked checkbox
            }).get();

            // Check if any invoices are selected
            if (selectedInvoices.length === 0) {
                alert('Please select at least one invoice for payout.');
                return; // Exit if no invoices are selected
            }

            // Send the selected invoice IDs to the controller
            $.post({
                url: payoutUrl, // Replace with your payout URL
                data: {
                    _token: csrfToken, // Pass the CSRF token for security
                    invoices: selectedInvoices // Send the array of selected invoice IDs
                },

                success: function (response) {
                    if (response.inserted === "success") {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Payouts have been created!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                },

            });
        });
    });

</script>