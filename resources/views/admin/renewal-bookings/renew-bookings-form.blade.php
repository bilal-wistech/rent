@extends('admin.template')
@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Renewal Booking for Booking # {{ $booking->id }}</h1>
            @include('admin.common.breadcrumb')
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="box box-info">
                        @if (Session::has('error'))
                            <div class="error_email_settings">
                                <div class="alert alert-warning fade in alert-dismissable">
                                    <strong>Warning!</strong> Whoops there was an error. Please verify your below
                                    information. <a class="close" href="#" data-dismiss="alert" aria-label="close"
                                        title="close">×</a>
                                </div>
                            </div>
                        @endif
                        <form id="edit_booking" method="post" action="{{ route('renewal-bookings.renew') }}"
                            class="form-horizontal">
                            @csrf
                            <input type="hidden" name="booking_id" id="booking_id" value="{{ $booking->id }}">
                            <div class="box-body">
                                <div class="form-group row mt-3 start_date">
                                    <label for="start_date"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Check In <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="start_date" name="start_date" type="date"
                                            value="{{ old('start_date') }}" required>
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 end_date">
                                    <label for="end_date"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Check Out <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" id="end_date" name="end_date" type="date"
                                            value="{{ old('end_date') }}" required>
                                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit"
                                        class="btn btn-info btn-space f-14 text-white me-2">Renew</button>
                                    <a class="btn btn-danger f-14" href="{{ route('admin.bookings.index') }}">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
