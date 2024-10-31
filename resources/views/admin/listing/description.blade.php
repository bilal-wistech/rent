@extends('admin.template')
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">
                    Description
                    <small>Description</small>
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
                        <div class="row ">
                            <div class="col-md-3 settings_bar_gap">
                                @include('admin.common.property_bar')
                            </div>

                            <div class="col-md-9">
                                <form id="list_des" method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class="signup-form login-form" accept-charset='UTF-8'>
                                    {{ csrf_field() }}

                                    <div class="card card-info shadow-sm">
                                        <div class="card-header">
                                            <h5 class="card-title">Listing Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12 col-xs-12 mb-4">
                                                    <label class="form-label fw-bold">Listing Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control f-14" value="{{ old('name', $description->properties->name) }}" maxlength="100">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12 col-xs-12 mb-4">
                                                    <label class="form-label fw-bold">Summary <span class="text-danger">*</span></label>
                                                    <textarea class="form-control f-14" name="summary" rows="6">{{ old('summary', $description->summary) }}</textarea>
                                                    <span class="text-danger">{{ $errors->first('summary') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-12 col-xs-12 mb-4">
                                                    <p class="f-14">You can add more <a href="{{ url('admin/listing/' . $result->id . '/details') }}" class="secondary-text-color">details</a> to tell travelers about your space and hosting style.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 text-start">
                                                    <a href="{{ url('admin/listing/' . $result->id . '/basics') }}" class="btn btn-primary f-14">Back</a>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <button type="submit" class="btn btn-primary next-section-button f-14">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('validate_script')
<script src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
@endsection
