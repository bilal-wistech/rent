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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('payment-receipts.update', $payment_receipt) }}"
                            id="edit_payment_receipt" method="post" name="edit_payment_receipt" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="box-body">
                                <input type="hidden" name="booking_id" id="booking_id"
                                    value="{{ $payment_receipt->booking_id }}" class="form-control">

                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3">Booking ID:</label>
                                    <div class="col-sm-4">
                                        <p class="form-control-static">{{ $payment_receipt->booking_id }}</p>
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3">Property:</label>
                                    <div class="col-sm-4">
                                        <p class="form-control-static">
                                            {{ $payment_receipt->booking->properties->name ?? '' }}</p>
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3">Tenant/Customer:</label>
                                    <div class="col-sm-4">
                                        <p class="form-control-static">
                                            {{ $payment_receipt->booking->users->getFullNameAttribute() ?? '' }}</p>
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3">Total Booking Amount:</label>
                                    <div class="col-sm-4">
                                        <p class="form-control-static">{{ $payment_receipt->booking->total ?? 0 }}</p>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3">Status:</label>
                                    <div class="col-sm-4">
                                        <p class="form-control-static">{{ $property_status->status }}</p>
                                    </div>
                                </div>
                                <div class="form-group mt-3 row">
                                    <label for="paid_through" class="control-label col-sm-3">Paid Through<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="paid_through" class="form-control">
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
                                <div class="form-group mt-3 row">
                                    <label for="payment_date" class="control-label col-sm-3">Payment Date<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="payment_date" id="payment_date"
                                            value="{{ $payment_receipt->payment_date }}">
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="amount" class="control-label col-sm-3">Payment Amount<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            value="{{ $payment_receipt->amount }}"
                                            max="{{ $payment_receipt->booking->total }}">
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
