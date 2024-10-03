@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Customers <small>Add Customer</small></h1>
            @include('admin.common.breadcrumb')
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{session('success')  }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <h4 class="text-center mt-4">Customer Detail</h4>
                        <form class="form-horizontal" action="{{ url('admin/add-customer') }}" id="add_customer" method="post"
                        enctype="multipart/form-data"  name="add_customer" accept-charset='UTF-8'>
                            {{ csrf_field() }}
                            <div class="box-body">
                                <input type="hidden" name="default_country" id="default_country" class="form-control">
                                <input type="hidden" name="carrier_code" id="carrier_code" class="form-control">
                                <input type="hidden" name="formatted_phone" id="formatted_phone" class="form-control">
                                <div class="form-group mt-1 row">
                                    <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">First
                                        Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="exampleInputPassword1" class="control-label col-sm-3 mt-2 fw-bold">Last
                                        Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 mt-2 fw-bold">Email<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control error" name="email" id="email"
                                            placeholder="">
                                        <div id="emailError"></div>
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 mt-2 fw-bold">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                        <span id="phone-error" class="text-danger text-13"></span>
                                        <span id="tel-error" class="text-danger text-13"></span>
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 mt-2 fw-bold">Password<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label for="exampleInputPassword1"
                                        class="control-label col-sm-3 mt-2 fw-bold">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control f-14" name="status" id="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Document Detail Section -->
                            <div class="box">
                                <h4 class="text-center mt-4">Document Detail</h4>
                                <div class="box-body">
                                    <div class="form-group mt-3 row">
                                        <label class="control-label col-sm-3 mt-2 fw-bold">Upload Image<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" name="image"
                                                id="document_image" accept="image/*" required>
                                            <span id="imageError"></span>
                                        </div>
                                    </div>

                                    <div class="form-group mt-3 row">
                                        <label class="control-label col-sm-3 mt-2 fw-bold">Expiry Date<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="expire"
                                                id="expiry_date" required>
                                        </div>
                                    </div>

                                    <div class="form-group mt-3 row">
                                        <label class="control-label col-sm-3 mt-2 fw-bold">Document Type<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="d-flex align-items-center mt-3"> <!-- Added mt-3 here -->
                                                <label class="me-3"><input type="radio" name="type"
                                                        value="passport"> Passport</label>
                                                <label><input type="radio" name="type" value="emirates">
                                                    Emirates</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>


                                <!-- Emergency Contact Section -->
                                <div class="box">
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <h4 class="mb-0 mx-auto">Emergency Contact</h4>
                                        <div>
                                            <a class="btn btn-info f-14 text-white " style="margin-right: 2rem"
                                                id="addMoreBtn" title="Add More">
                                                <i class="fa fa-plus"></i>
                                            </a>

                                        </div>
                                    </div>

                                    <div class="box-body" id="emergencyContactsContainer">
                                        <div class="emergency-contact-group">
                                            <div class="form-group mt-3 row">

                                                <label class="control-label col-sm-3 mt-2 fw-bold">Name<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8 d-flex">
                                                    <input type="text" class="form-control"
                                                        name="emergency_contact_name[]" placeholder="Enter name" required>
                                                    <a class="btn btn-danger removeBtn"
                                                        style="position:absolute; right:2rem" id="removeBtn"
                                                        title="Remove" style="display: none;">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="form-group mt-3 row">
                                                <label class="control-label col-sm-3 mt-2 fw-bold">Relation<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                        name="emergency_contact_relation[]" placeholder="Enter relation"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="form-group mt-3 row">
                                                <label class="control-label col-sm-3 mt-2 fw-bold">Contact Number<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="tel" class="form-control"
                                                        name="emergency_contact_number[]"
                                                        placeholder="Enter contact number" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="box-footer" style="text-align: right; margin-right:5rem">
                                        <button type="submit" class="btn btn-info f-14 text-white"
                                            id="submitBtn">Submit</button>
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
<script src="{{ asset('backend/js/intl-tel-input-13.0.0/build/js/intlTelInput.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/dist/js/validate.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('backend/css/customer-form.css') }}" rel="stylesheet">
<script src="{{ asset('addCustomer.js') }}" ></script>
@endsection

