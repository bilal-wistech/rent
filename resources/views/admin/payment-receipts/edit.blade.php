@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Payment Receipt <small>Edit</small></h1>
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
                        <form class="form-horizontal" action="{{ route('payment-receipts.update', $payment_receipt) }}"
                            id="edit_payment_receipt" method="post" name="edit_payment_receipt" accept-charset='UTF-8'>
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="box-body">
                                <input type="hidden" name="booking_id" id="booking_id"
                                    value="{{ $payment_receipt->booking_id }}" class="form-control">
                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3 mt-2 fw-bold">Paid Through<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="paid_through" class="form-control mt-3">
                                            <option value="" disabled selected>Select Paid Through</option>
                                            <option value="bank"
                                                {{ old('paid_through', $payment_receipt->paid_through) == 'bank' ? 'selected' : '' }}>
                                                Bank</option>
                                            <option value="cash"
                                                {{ old('paid_through', $payment_receipt->paid_through) == 'cash' ? 'selected' : '' }}>
                                                Cash</option>
                                            <option value="credit card"
                                                {{ old('paid_through', $payment_receipt->paid_through) == 'credit card' ? 'selected' : '' }}>
                                                Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-1 row">
                                    <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Payment
                                        Date<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="payment_date" id="payment_date"
                                            value="{{ $payment_receipt->payment_date }}">
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Payment
                                        Amount<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            value="{{ $payment_receipt->amount }}"  max="{{ $payment_receipt->booking->total }}">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer" style="text-align: right; margin-right:5rem">
                                <button type="submit" class="btn btn-info f-14 text-white" id="submitBtn">Submit</button>
                            </div>
                    </div>

                </div>


            </div>


            </form>
    </div>
    </div>
    </div>
    </section>
    </div>
@endsection
@section('validate_script')
    <script src="{{ asset('backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/dist/js/validate.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('backend/css/customer-form.css') }}" rel="stylesheet">
    <script src="{{ asset('addCustomer.js') }}"></script>
@endsection
