@extends('admin.template')

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="content-wrapper">
                <section class="content">
                    @include('admin.customerdetails.customer_menu')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box ml-3">
                                {{-- <div class="box-header with-border">
                                    <h3 class="box-title">{{ $form_name ?? '' }}</h3>
                                </div> --}}
                                <form class="form-horizontal" action="{{ url('admin/edit-customer', $user->id) }}"
                                    id="edit_customer" method="post" name="signup_form" accept-charset="UTF-8">
                                    <p class="text-black text-center mb-0 f-18 mt-5">Update Customer Information</p>
                                    @csrf
                                    <input type="hidden" name="customer_id" id="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="default_country" id="default_country" value="{{ $user->default_country }}">
                                    <input type="hidden" name="carrier_code" id="carrier_code" value="{{ $user->carrier_code }}">
                                    <input type="hidden" name="formatted_phone" id="formatted_phone" value="{{ $user->formatted_phone }}">

                                    <div class="box-body">
                                        <!-- First Name Field -->
                                        <div class="form-group row mt-2">
                                            <label for="first_name" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">First Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="">
                                                <span id="first_name-error" class="text-danger"></span>
                                            </div>
                                        </div>

                                        <!-- Last Name Field -->
                                        <div class="form-group row mt-3">
                                            <label for="last_name" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Last Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}" placeholder="">
                                                <span id="last_name-error" class="text-danger"></span>
                                            </div>
                                        </div>

                                        <!-- Email Field -->
                                        <div class="form-group row mt-3">
                                            <label for="email" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Email <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="">
                                                <span id="email-error" class="text-danger"></span>
                                                <div id="emailError"></div>
                                                @error('email')
                                                    <p class="error-tag">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Password Field -->
                                        <div class="form-group row mt-3">
                                            <label for="password" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Password</label>
                                            <div class="col-sm-5">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="">
                                                <span id="password-error" class="text-danger"></span>
                                            </div>
                                            <div class="col-sm-3">
                                                <small class="f-12">Enter new password only. Leave blank to use existing password.</small>
                                            </div>
                                        </div>

                                        <!-- Phone Field -->
                                        <div class="form-group row mt-3">
                                            <label for="phone" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Phone</label>
                                            <div class="col-sm-5">
                                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $user->formatted_phone }}">
                                                <span id="phone-error" class="text-danger"></span>
                                            </div>
                                        </div>

                                        <!-- Status Field -->
                                        <div class="form-group row mt-3">
                                            <label for="status" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Status</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="Active" {{ $user->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                    <option value="Inactive" {{ $user->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-footer box-footer d-flex justify-content-end gap-2 mr-3">
                                        <button type="submit" class="btn btn-info f-14 text-white editCus-sub" id="submitBtn">Submit</button>
                                        <button type="reset" class="btn btn-danger f-14">Reset</button>
                                    </div>
                                </form>
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
    <script src="{{ asset('backend/js/isValidPhoneNumber.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/dist/js/validate.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        'use strict'
        var hasPhoneError = false;
        var hasEmailError = false;
        let requiredFieldText = "This field is required.";
        let minLengthText = "Please enter at least 6 characters.";
        let maxLengthText = "Please enter no more than 255 characters.";
        let emailExistText = "Email address is already Existed.";
        let checkUserURL = "{{ route('checkUser.check') }}";
        var url = '{{ asset('js/intl-tel-input-13.0.0/build/js/utils.js') }}';
        var duplicate_check_url = "{{ url('duplicate-phone-number-check-for-existing-customer') }}";
        var tel_error = '{{ __('Please enter a valid International Phone Number.') }}'
        var token = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('backend/js/customer_edit.min.js') }}"></script>
@endsection
