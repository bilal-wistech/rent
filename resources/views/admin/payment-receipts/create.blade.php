@extends('admin.template')
@push('css')
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .control-label {
            text-align: left;
        }

        .form-control-static {
            padding: 6px 12px;
            /* background-color: #f7f7f7; */
            border: 1px solid #ddd;
        }
    </style>
@endpush
@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Payment Receipt <small>Create</small></h1>
            @include('admin.common.breadcrumb')
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form class="form-horizontal" action="{{ route('payment-receipts.store') }}" id="add_payment_receipt"
                            method="post" name="add_payment_receipt" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            @method('POST')
                            <div class="box-body">
                                <div class="form-group mt-3 row">
                                    <label for="booking_id" class="control-label col-sm-3">Booked Property<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="booking_id" class="form-control booking_id" id="booking_id"
                                            {{ request('booking_id') ? 'readonly' : '' }}>
                                            <option value="" readonly {{ !request('booking_id') ? 'selected' : '' }}>
                                                Select Booked Property</option>
                                            @foreach ($payment_receipts as $payment_receipt)
                                                <option value="{{ $payment_receipt->id }}" {{-- data-total="{{ $payment_receipt->total }}" --}}
                                                    {{ request('booking_id') == $payment_receipt->id ? 'selected' : '' }}>
                                                    {{ $payment_receipt->id . ' - ' . $payment_receipt->properties->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('booking_id') }}</span>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="paid_through" class="control-label col-sm-3">Paid Through<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="paid_through" class="form-control">
                                            <option value="" disabled selected>Select Paid Through</option>
                                            <option value="bank" {{ old('paid_through') == 'bank' ? 'selected' : '' }}>
                                                Bank</option>
                                            <option value="cash" {{ old('paid_through') == 'cash' ? 'selected' : '' }}>
                                                Cash</option>
                                            <option value="credit card"
                                                {{ old('paid_through') == 'credit card' ? 'selected' : '' }}>
                                                Credit Card</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('paid_through') }}</span>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="payment_date" class="control-label col-sm-3">Payment Date<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="payment_date" id="payment_date"
                                            value="{{ old('payment_date') }}">
                                        <span class="text-danger">{{ $errors->first('payment_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="amount" class="control-label col-sm-3">Payment Amount<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            value="{{ old('amount') }}">
                                        <small id="amount_error" class="text-danger d-none"></small>
                                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                                    </div>
                                </div>
                                <input type="hidden" name="remaining_amount" id="remaining_amount">
                            </div>

                            <div class="box-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-info f-14 text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('validate_script')
    <script>
        $(document).ready(function() {
            $('#booking_id').select2(); // Initialize Select2 for better dropdown styling

            function fetchBookingDetails(bookingId) {
                if (bookingId) {
                    $.ajax({
                        url: "{{ route('payment-receipts.get-booking-details', '') }}/" + bookingId,
                        method: 'GET',
                        success: function(response) {
                            const remainingAmount = response.totalBookingAmount - response.totalAmount;
                            $('#remaining_amount').val(remainingAmount); // Hidden input for form submission
                            $('#amount').data('remaining', remainingAmount); // Store for validation
                            updateRemainingAmountMessage(remainingAmount, $('#amount').val());
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            alert('Error fetching booking details. Please try again.');
                        }
                    });
                } else {
                    $('#amount').val('');
                    $('#amount_error').addClass('d-none');
                }
            }

            // Function to update the remaining amount message
            function updateRemainingAmountMessage(remainingAmount, enteredAmount) {
                const entered = parseFloat(enteredAmount) || 0;
                const updatedRemaining = remainingAmount - entered;
                if (entered > 0 && updatedRemaining >= 0) {
                    $('#amount_error')
                        .text(`Remaining amount after payment: ${updatedRemaining.toFixed(2)}`)
                        .removeClass('d-none');
                } else if (entered > remainingAmount) {
                    $('#amount_error')
                        .text(`Entered amount (${entered}) exceeds remaining amount (${remainingAmount.toFixed(2)}).`)
                        .removeClass('d-none');
                } else {
                    $('#amount_error')
                        .text(`Remaining payment is ${remainingAmount.toFixed(2)}`)
                        .removeClass('d-none');
                }
            }

            // Handle dropdown change
            $('#booking_id').change(function() {
                const bookingId = $(this).val();
                fetchBookingDetails(bookingId);
            });

            // Update remaining amount as user types
            $('#amount').on('input', function() {
                const remainingAmount = parseFloat($(this).data('remaining')) || 0;
                const enteredAmount = $(this).val();
                updateRemainingAmountMessage(remainingAmount, enteredAmount);
            });

            // Fetch details for default selected value on page load
            const defaultBookingId = $('#booking_id').val();
            if (defaultBookingId) {
                fetchBookingDetails(defaultBookingId);
            }

            // Handle form submission
            $('#add_payment_receipt').on('submit', function(e) {
                e.preventDefault();

                const bookingId = $('#booking_id').val();
                const enteredAmount = parseFloat($('#amount').val());
                const remainingAmount = parseFloat($('#amount').data('remaining'));

                $('#amount_error').addClass('d-none').text('');

                if (!enteredAmount || enteredAmount <= 0) {
                    $('#amount_error')
                        .removeClass('d-none')
                        .text('Amount must be greater than zero.');
                    return false;
                }

                if (enteredAmount > remainingAmount) {
                    $('#amount_error')
                        .removeClass('d-none')
                        .text(
                            `Entered amount (${enteredAmount}) cannot exceed the remaining amount (${remainingAmount}).`
                        );
                    return false;
                }

                this.submit();
            });
        });
    </script>
@endsection
