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
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{session('success')  }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                            <div class="box">
                                <h4 class="text-center mt-4">Document Detail</h4>
                                <form class="form-horizontal" action="{{ route('document.store') }}" id="add_customer" method="post"
                                enctype="multipart/form-data"  name="add_customer" accept-charset='UTF-8'>

                                <input type="hidden" name="user_id" value={{ $user->id }} >
                                    {{ csrf_field() }}
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
                                        <label class="control-label col-sm-3 mt-2 fw-bold">Document Type<span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select name="type" class="form-control mt-3">
                                                <option value="" disabled selected>Select Document Type</option>
                                                <option value="passport">Passport</option>
                                                <option value="emirates">Emirates</option>
                                                <option value="others">Others</option>
                                            </select>
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

