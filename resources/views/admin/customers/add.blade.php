@extends('admin.template')

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <section class="content-header">
            <h3 class="mb-4 ml-4">Customers <small>Add Customer</small></h3>
            <div class="mr-4">
                @include('admin.common.breadcrumb')
            </div>
        </section>


        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Customer Detail Card -->
                            <div class="card mb-4">
                                <div class="card-header text-center align-items-center">
                                    <h4>Customer Detail</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{ url('admin/add-customer') }}"
                                        id="add_customer" method="post" enctype="multipart/form-data"
                                        accept-charset='UTF-8'>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="default_country" id="default_country">
                                        <input type="hidden" name="carrier_code" id="carrier_code">
                                        <input type="hidden" name="formatted_phone" id="formatted_phone">

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">First Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="First Name">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Last Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="Last Name">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Email<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Email">
                                                <div id="emailError"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="tel" class="form-control" id="phone" name="phone">
                                                <span id="phone-error" class="text-danger"></span>
                                                <span id="tel-error" class="text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Password<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="status">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Document Detail Card -->
                            <div class="card mb-4">
                                <div class="card-header text-center align-items-center">
                                    <h4>Document Detail</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label fw-bold">Upload Image<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image" id="document_image"
                                                accept="image/*" required>
                                            <span id="imageError"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label fw-bold">Expiry Date<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="expire" id="expiry_date"
                                                required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label fw-bold">Document Type<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="type" class="form-select">
                                                <option value="" disabled selected>Select Document Type</option>
                                                <option value="passport">Passport</option>
                                                <option value="emirates">Emirates</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Emergency Contact Card -->
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">Emergency Contact</h4>
                                    <button class="btn btn-info text-white" id="addMoreBtn" title="Add More">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="card-body" id="emergencyContactsContainer">
                                    <div class="emergency-contact-group">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="emergency_contact_name[]"
                                                    placeholder="Enter name" required>
                                                <button class="btn btn-danger removeBtn"
                                                    style="position: absolute; right: 1rem;" title="Remove">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Relation<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"
                                                    name="emergency_contact_relation[]" placeholder="Enter relation"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label fw-bold">Contact Number<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="tel" class="form-control" name="emergency_contact_number[]"
                                                    placeholder="Enter contact number" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-info text-white" id="submitBtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('validate_script')
<script src="{{ asset('backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/dist/js/validate.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('backend/css/customer-form.css') }}" rel="stylesheet">
<script src="{{ asset('addCustomer.js') }}"></script>
@endsection