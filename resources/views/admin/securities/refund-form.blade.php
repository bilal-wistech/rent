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
                        <form class="form-horizontal" action="{{ route('securities.refund') }}"
                            id="security_refund_form" method="post" name="security_refund_form" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            @method('POST')
                            <div class="box-body">
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <div class="form-group mt-3 row">
                                    <label for="security_refund_date" class="control-label col-sm-3">Security Refund
                                        Date<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="security_refund_date"
                                            id="security_refund_date" value="{{ old('security_refund_date') }}">
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="security_refund_amount" class="control-label col-sm-3">Security Refund
                                        Amount<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="security_refund_amount"
                                            id="security_refund_amount" value="{{ $booking->security_money ?? 0 }}">
                                        <small id="security_refund_amount_error" class="text-danger d-none"></small>
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
    <script></script>
@endsection
