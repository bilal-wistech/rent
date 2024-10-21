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
                                    <select name="" id="admin_id" class="select2-ajax form-control">
                                        @foreach ($admin as $list)
                                            <option value="{{ $list->id }}">{{ $list->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="" class="mb-1">
                                        <span class="text-danger">*</span>
                                        Date</label>
                                    <input type="date" class="form-control" id="date">
                                </div>
                                <div class="col-3">
                                    <label for="" class="mb-1">
                                        <span class="text-danger">*</span>
                                        Amount</label>
                                    <input type="number" class="form-control" readonly id="amountTotal">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-3 mt-3">
                                    <label for="" class="mb-1">Slip No</label>
                                    <input type="number" class="form-control">
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="mb-1">Type</label>
                                    <select name="" id="pID" class="form-control">
                                        @foreach ($pMethods as $list)
                                            <option value="{{ $list->id }}" {{ $list->name === 'Cash' ? 'Selected' : '' }}>
                                                {{ $list->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="mb-1">Currency</label>
                                    <select name="" id="cID" class="form-control">
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
                                    <th>Amount Due</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody id="pData">
                                <tr>
                                    <td colspan="6" class="fw-bold pt-2 pb-2 text-center">Please Select User First !
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-2 p-4" style="background-color : white-smoke ;">
                            <div class="row d-none" id="py-rows">
                                <div class="col-4" id="grandTotal"></div>
                                <div class="col-4" id="amountToPay"></div>
                                <div class="col-4" id="totalPayments"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <button class="btn btn-sm btn-primary float-end" id="payoutbtn">Payout</button>
                    </div>
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
    let payouts = "{{ url('admin/payouts')}}";
</script>

<script>

    $(document).ready(function () {
        $('#SelectBooking').on('change', function () {
            let user_id = $(this).val();

            if (!user_id) {
                alert('Please select a valid user.');
                return;
            }

            $.post({
                url: invoiceurl + '/' + user_id,
                data: {
                    _token: csrfToken,
                },
                success: function (response) {
                    $('#pData').empty();

                    if (response.invoices && response.invoices.length > 0) {
                        let grandTotal = 0;
                        let totalPayments = 0;
                        let totalDue = 0;

                        response.invoices.forEach(function (invoice) {
                            let createdDate = new Date(invoice.created_at).toISOString().split('T')[0];

                            let property = response.properties.find(function (prop) {
                                return prop.id === invoice.property_id;
                            });

                            let row = '<tr>' +
                                '<td><input type="checkbox" class="invoice-checkbox" value="' + invoice.id + '"></td>' +
                                '<td>' + createdDate + '</td>' +
                                '<td>' + invoice.reference_no + '</td>' +
                                '<td>' + (property ? property.name : 'No property found') + '</td>' +
                                '<td><input type="number" class="form-control grand-total" style="width:60%;" min="1" value="' + invoice.grand_total + '" readonly></td>' +
                                '<td><input type="number" class="form-control amount-to-pay" style="width:60%;" min="1"  value="' + (invoice.due_amount !== null ? invoice.due_amount : invoice.grand_total) + '" readonly></td>' +
                                '<td><input type="number" class="form-control pay-payment" min="1"  style="width:60%;"></td>' +
                                '</tr>';

                            $('#pData').append(row);

                            grandTotal += parseFloat(invoice.grand_total);
                            // Correctly sum the due amount directly from the invoice object
                            totalDue += parseFloat(invoice.due_amount !== null ? invoice.due_amount : invoice.grand_total);
                        });

                        $('#py-rows').removeClass('d-none');

                        $('#grandTotal').empty().append('Total Payable: ' + grandTotal.toFixed(2));
                        $('#amountToPay').empty().append('Total Due: ' + totalDue.toFixed(2)); // Added missing colon for better readability

                        $('.pay-payment').on('input', function () {
                            let payment = parseFloat($(this).val());
                            let amountToPay = parseFloat($(this).closest('tr').find('.amount-to-pay').val());

                            if (payment > amountToPay) {
                                alert('The payment amount cannot exceed the Amount Due.');
                                $(this).val(amountToPay); // Reset to the maximum allowable amount
                                payment = amountToPay; // Adjust payment to the maximum allowable amount
                            }

                            totalPayments = 0; // Reset total payments
                            $('.pay-payment').each(function () {
                                totalPayments += parseFloat($(this).val()) || 0; // Sum the payment values
                            });

                            // Update the total payments display
                            $('#totalPayments').empty().append('Total Payments: ' + totalPayments.toFixed(2));
                            $('#amountTotal').empty().val(totalPayments.toFixed(2));
                        });
                    } else {
                        let row = '<tr>' +
                            '<td colspan="6" class="fw-bold pt-2 pb-2 text-center">No pending invoice found!</td>' +
                            '</tr>';
                        $('#py-rows').addClass('d-none');
                        $('#pData').append(row);
                    }
                },

                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    let row = '<tr>' +
                        '<td colspan="6" class="fw-bold pt-2 pb-2 text-center">No pending invoice found!</td>' +
                        '</tr>';
                    $('#py-rows').addClass('d-none');
                    $('#pData').empty().append(row);
                }
            });
        });


        $('#payoutbtn').on('click', function () {
            let selectedInvoices = $('.invoice-checkbox:checked').map(function () {
                return $(this).val();
            }).get();

            if (selectedInvoices.length === 0) {
                alert('Please select at least one invoice for payout.');
                return;
            }

            // Array to hold invoice details
            let invoiceDetails = [];
            $('.invoice-checkbox:checked').each(function () {
                let invoiceRow = $(this).closest('tr');
                let invoiceId = $(this).val(); // Invoice ID from checkbox
                let grandTotal = parseFloat(invoiceRow.find('.grand-total').val()); // Grand total (Amount)
                let amountToPay = parseFloat(invoiceRow.find('.amount-to-pay').val()); // Amount due
                let payment = parseFloat(invoiceRow.find('.pay-payment').val()) || 0; // Payment entered by the user

                // Push an object with the invoice data
                invoiceDetails.push({
                    invoice_id: invoiceId,
                    grand_total: grandTotal,
                    amount_due: amountToPay,
                    payment: payment
                });
            });

            // Ensure there is at least one valid payment
            if (invoiceDetails.length === 0) {
                alert('Please select at least one invoice with a valid payment.');
                return;
            }

            // Data to be sent in the request
            let user_id = $('#SelectBooking').val();
            let admin_id = $('#admin_id').val();
            let date = $('#date').val();
            let pID = $('#pID').val();
            let cID = $('#cID').val();

            $.post({
                url: payoutUrl,
                data: {
                    _token: csrfToken,
                    invoices: invoiceDetails,  // Send invoice details array
                    user_id: user_id,
                    owner: admin_id,
                    date: date,
                    payment_method_id: pID,
                    currency_id: cID
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
                                window.location.href = payouts;
                            }
                        });
                    }

                    if (response.message === "error") {
                        Swal.fire({
                            title: 'error!',
                            text: 'The min payout value is 1',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });




    });


</script>