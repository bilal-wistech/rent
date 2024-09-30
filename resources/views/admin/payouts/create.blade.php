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
                <div class="box">
                    <form action="{{ route('payouts.asuccess') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="fs-6 fw-bold mb-2">Select User
                                            <span class="text-danger">*</span></label>
                                        <select name="booking_id" class="form-control" required id="SelectBooking">
                                            <option value="" class="form-control"> --Select-- </option>
                                            @foreach ($bookings as $list)
                                                <option value="{{ $list->id }}">
                                                    {{ $list->users->first_name . ' ' . $list->users->last_name  }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3" id="data-section">
                                    <div class="col-6">
                                        <label for="" class="fw-bold fs-6 mb-2">Account Number
                                            <span class="text-danger">*</span></label>
                                        </label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="" class="fw-bold fs-6 mb-2">Currency
                                            <span class="text-danger">*</span></label>
                                        </label>
                                        <select name="currency_id" id="" class="form-control" required>
                                            <option value="">
                                                --Select--
                                            </option>
                                            @foreach($currency as $list)
                                                <option value="{{ $list->id }}"> {{ $list->name }} {!! $list->symbol !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6 mt-2">
                                        <label for="" class="fw-bold fs-6 mb-2">Property</label>
                                        <input type="text" class="form-control" id="property" disabled>
                                    </div>

                                    <div class="col-6 mt-2">
                                        <label for="" class="fw-bold fs-6 mb-2">Payment Method
                                            <span class="text-danger">*</span></label>
                                        </label>
                                        <select name="payment_method_id" class="form-control" required>
                                            <option value="" class="form-control"> --Select-- </option>
                                            @foreach ($pMethods as $list)
                                                <option value="{{ $list->id }}">
                                                    {{  $list->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="" class="fw-bold fs-6 mb-2 mt-3">Email</label>
                                        <input type="text" class="form-control" id="UserEmail" disabled>
                                    </div>

                                    <div class="col-6">
                                        <label for="" class="fw-bold fs-6 mb-2 mt-3">Amount Recieved
                                            <span class="text-danger">*</span></label>
                                        </label>
                                        <input type="text" class="form-control" id="amount" name="amount" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer border-0">
                                <button type="submit" id="submitbtn" class="btn btn-sm btn-success float-right"
                                    disabled>Payout</button>
                            </div>
                        </div>
                    </form>
                </div>
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


    $(document).ready(function () {
        $('#SelectBooking').on('change', function () {
            let bookingId = $(this).val();

            if (!$(this).val()) {
                $('#username').val('');
                $('#currency').val('');
                $('#UserEmail').val('');
                $('#paymentMethod').val('');
                $('#amount').val('');
                $('#submitbtn').attr('disabled', true);

                // data for send
                $('#user_id').val('');
                $('#currency_id').val('');
                $('#payment_method_id').val('');
                $('#amountP').val('');

            }

            $.post({
                url: bookingUrl + '/' + bookingId,
                data: {
                    _token: csrfToken,
                },
                success: function (response) {
                    if (response.booking && response.user) {
                        $('#username').val(response.user.first_name + ' ' + response.user.last_name);
                        $('#currency').val(response.booking.currency_code);
                        $('#UserEmail').val(response.user.email);
                        $('#amount').val(response.booking.total);
                        $('#paymentMethod').val('DirectBankTransfer');
                        $('#property').val(response.properties[0].name);
                        $('#submitbtn').attr('disabled', false);

                        // data for send
                        $('#booking_id').val(response.booking.id);
                        $('#user_id').val(response.user.id);
                        $('#currency_id').val(response.currency[0].id);
                        $('#payment_method_id').val(response.booking.payment_method_id);
                        $('#amountP').val(response.booking.total);

                    } else {
                        alert('Booking or user data not found in response.');
                    }
                },

                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        });
    });

</script>