@extends('admin.template')
@section('main')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Refund Security for Booking # {{ $booking->id }}</h1>
            @include('admin.common.breadcrumb')
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('securities.refund') }}" id="security_refund_form"
                            method="post" name="security_refund_form" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <input type="hidden" name="created_by" value="{{ Auth::guard('admin')->id() }}">
                                <div class="form-group mt-3 row">
                                    <label for="security_amount" class="control-label col-sm-3">Security
                                        Amount<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="security_amount"
                                            id="security_amount" value="{{ $booking->security_money ?? 0 }}" readonly>
                                        <small id="security_amount_error" class="text-danger d-none"></small>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="security_refund_amount" class="control-label col-sm-3">Security
                                        Amount Refunded<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="security_refund_amount"
                                            id="security_refund_amount">
                                        <small id="security_refund_amount_error" class="text-danger d-none"></small>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="security_refund_date" class="control-label col-sm-3">Security Refund
                                        Date<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="security_refund_date"
                                            id="security_refund_date" value="{{ old('security_refund_date') }}">
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="security_refund_paid_through" class="control-label col-sm-3">Paid
                                        Through<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="security_refund_paid_through" class="form-control">
                                            <option value="" disabled selected>Select Paid Through</option>
                                            <option value="bank"
                                                {{ old('security_refund_paid_through') == 'bank' ? 'selected' : '' }}>
                                                Bank</option>
                                            <option value="cash"
                                                {{ old('security_refund_paid_through') == 'cash' ? 'selected' : '' }}>
                                                Cash</option>
                                            <option value="credit card"
                                                {{ old('security_refund_paid_through') == 'credit card' ? 'selected' : '' }}>
                                                Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="description" class="control-label col-sm-3">
                                        Description
                                    </label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                        <small id="description_error" class="text-danger d-none"></small>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="recieved_by" class="control-label col-sm-3">Recieved by<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="recieved_by" id="recieved_by">
                                        <small id="recieved_by_error" class="text-danger d-none"></small>
                                    </div>
                                </div>
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
        document.getElementById('security_refund_form').addEventListener('submit', function(e) {
            const securityAmount = parseFloat(document.getElementById('security_amount').value) || 0;
            const refundAmount = parseFloat(document.getElementById('security_refund_amount').value) || 0;
            const description = document.getElementById('description').value.trim();

            // Clear previous error messages
            document.getElementById('description_error').classList.add('d-none');
            document.getElementById('security_refund_amount_error').classList.add('d-none');

            let isValid = true;

            // Check if refund amount is less than security amount and description is empty
            if (refundAmount < securityAmount && description === '') {
                document.getElementById('description_error').classList.remove('d-none');
                document.getElementById('description_error').innerText =
                    'Description is required when refund amount is less than security amount.';
                isValid = false;
            }

            // Check if refund amount is greater than security amount
            if (refundAmount > securityAmount) {
                document.getElementById('security_refund_amount_error').classList.remove('d-none');
                document.getElementById('security_refund_amount_error').innerText =
                    'Refund amount cannot be greater than the security amount.';
                isValid = false;
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
@endsection
