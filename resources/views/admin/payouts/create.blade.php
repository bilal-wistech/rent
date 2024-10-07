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
                <!-- Horizontal Form -->
                <form action="{{ route('payouts.asuccess') }}" method="post">
                    @csrf
                    <div class="card border-0 shadow-sm">
                        <div class="card-header mb-2 bg-white d-flex justify-content-between align-items-center">
                            <h6 class="fw-bold mt-2">Payment Details</h6>
                            <p class="text-end text-success border border-1 border-success p-1 mb-2">
                                RECEIPENT NUMBER : @php
                                    $numbers = mt_rand(1, 3000);
                                   @endphp
                                {{ $numbers }}
                            </p>
                        </div>
                        <div class="card-body ps-4 pr-4">
                            <div class="row">
                                <div class="col-3">
                                    <label for="" class="fs-6 fw-bold mb-2">Customers
                                        <span class="text-danger">*</span></label>
                                    <select name="booking_id" class="form-control" required id="SelectBooking">
                                        <option value="" class="form-control"> --Select-- </option>
                                        @foreach ($users as $list)
                                            <option value="{{ $list->id }}">
                                                {{ $list->first_name . ' ' . $list->last_name  }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-3">
                                    <label for="" class="fw-bold fs-6 mb-2">Owner
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <select type="number" class="form-control" name="account_number" id="account_number"
                                        required>
                                        <option value="">--Select--</option>
                                        @foreach($admin as $list)
                                            <option value="<?= $list->id ?>">{{ $list->username  }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-3">
                                    <label for="" class="fw-bold fs-6 mb-2">Date
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="date" class="form-control" name="account_number" id="account_number"
                                        required>
                                </div>

                                <div class="col-3">
                                    <label for="" class="fw-bold fs-6 mb-2">Amount
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="number" class="form-control" name="account_number" id="account_number"
                                        required>
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="fw-bold fs-6 mb-2">Slip No
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <input type="number" class="form-control" name="account_number" id="account_number"
                                        required>
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="fw-bold fs-6 mb-2">Type
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <select name="" id="" class="form-control">
                                        <option value=""> --Select-- </option>
                                        @foreach ($pMethods as $list)
                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-3 mt-3">
                                    <label for="" class="fw-bold fs-6 mb-2">Currency
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <select name="" id="" class="form-control">

                                        @foreach ($currency as $list)
                                            <option value="">{{ $list->name }} {!! $list->symbol !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 mt-3">
                                    <label for="" class="fw-bold fs-6 mb-2">Note
                                        <span class="text-danger">*</span></label>
                                    </label>
                                    <textarea name="" id="" class="form-control">
                                    </textarea>
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
                            <button class="btn btn-sm btn-success float-right" disabled id="payoutbtn">Payout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let csrfToken = "{{ csrf_token() }}";
    let bookingUrl = "{{ url('/admin/bookings/booking') }}";
</script>


<script>

    //checkbox with booking id , inovice number , Property , Amount
    $(document).ready(function () {
        $('#SelectBooking').on('change', function () {
            let bookingId = $(this).val();

            if (!bookingId) {
                $('#pData').empty();
                let row = '<tr>' +
                    '<td colspan="6" class="fw-bold pt-2 pb-2 text-center">Please Select User First!</td>' +
                    '</tr>';
                $('#payoutbtn').attr('disabled', 'false');
                $('#pData').append(row);
            }


            $.post({
                url: bookingUrl + '/' + bookingId,
                data: {
                    _token: csrfToken,
                },
                success: function (response) {
                    $('#pData').empty();

                    // Check if there are bookings in the response
                    if (response.bookings && response.bookings.length > 0) {
                        response.bookings.forEach(function (booking) {
                            // Find the corresponding property for the current booking
                            let property = response.properties.find(function (prop) {
                                return prop.id === booking.property_id;
                            });

                            // Create a table row
                            let row = '<tr>' +
                                '<td><input type="checkbox" value="' + booking.id + '"></td>' +
                                '<td>INV-' + booking.id + '</td>' +
                                '<td>' + (property ? property.name : 'Unknown Property') + '</td>' + 
                                '<td>' + booking.total + '</td>' +
                                '<td>' + booking.currency_code + '</td>' +
                                '</tr>';


                            $('#payoutbtn').attr('disabled', false);
                            $('#pData').append(row);

                        });
                    } else if (response.message) {
                        let row = '<tr>' +
                            '<td colspan="6" class="fw-bold pt-2 pb-2 text-center">' + response.message + '</td>' +
                            '</tr>';
                        $('#pData').append(row);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                },
            });
        });
    });
</script>