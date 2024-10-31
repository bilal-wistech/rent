@extends('admin.template')
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">
                    Booking
                    <small>Booking</small>
                </h3>

                <ol class="breadcrumb float-end mb-4 mr-5"
                    style="font-size: 1rem; padding: 0.5rem 1rem; border-radius: 0.25rem; margin: 0; background-color: transparent;">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/dashboard') }}" class="text-dark">
                            <i class="fa fa-dashboard pr-1"></i> Home
                        </a>
                    </li>
                </ol>
            </section>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-3 settings_bar_gap">
                                @include('admin.common.property_bar')
                            </div>
                            <div class="col-md-9">
                                <div class="card box-info">
                                    <div class="card-body">
                                        <form method="post"
                                            action="{{ url('admin/bookings) }}"
                                            class='signup-form login-form' accept-charset='UTF-8'>
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Choose how your guests book</h4>
                                                    <p class="text-muted f-14">Get ready for guests by choosing your
                                                        booking
                                                        style.</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8 col-12 min-height-div">
                                                            <label class="label-large fw-bold">Booking Type <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="booking_type" id="select-booking_type"
                                                                class="form-control f-14 mt-1">
                                                                <option value="request" {{ ($result->booking_type == 'request') ? 'selected' : '' }}>Review each request</option>
                                                                <option value="instant" {{ ($result->booking_type == 'instant') ? 'selected' : '' }}>Guests book instantly</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear-both"></div>
                                                <div class="col-12 mt-3">
                                                    <div class="row">
                                                        <div class="col-6 text-left">
                                                            <a data-prevent-default=""
                                                                href="{{ url('admin/listing/' . $result->id . '/pricing') }}"
                                                                class="btn btn-large btn-primary f-14">Back</a>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <button type="submit"
                                                                class="btn btn-large btn-primary next-section-button f-14">Complete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection