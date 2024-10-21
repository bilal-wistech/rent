@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content-header">

            @include('admin.common.breadcrumb')
        </section>

        <section class="content">
            @include('admin.customerdetails.customer_menu')
            <div class="row">
                <div class="col-md-12">
                            <div class="box">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                   {{session('success')  }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                <div class="box-body">

                                <h4 class="text-center mt-4">Update Document</h4>
                                <form class="form-horizontal" action="{{ route('document.update',$document->id) }}" id="add_customer" method="post"
                                enctype="multipart/form-data"  name="add_customer" accept-charset='UTF-8'>


                                    @csrf
                                    @method('PUT')
                                    @if($document)
                                    <input type="hidden" name="id" value={{ $document->id }} >
                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3 mt-2 fw-bold">Uploaded Image</label>
                                    <div class="col-sm-8 d-flex align-items-center">
                                        <div class="border border-light rounded p-1 me-3">
                                            <img src="{{ Storage::url($document->image) }}" class="document-image" style="height: 60px; width: 60px;">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3 mt-2 fw-bold">New Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="image" id="document_image" accept="image/*">
                                        <span id="imageError" class="text-danger"></span>
                                    </div>
                                </div>


                                    <div class="form-group mt-3 row">
                                        <label class="control-label col-sm-3 mt-2 fw-bold">Expiry Date<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="expire" value="{{ $document ? $document->expire : '' }}"
                                                id="expiry_date" required>
                                        </div>
                                    </div>

                                    <div class="form-group mt-3 row">
                                        <label class="control-label col-sm-3 mt-2 fw-bold">Document Type<span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select name="type" class="form-control mt-3">
                                                <option value="" disabled>Select Document Type</option>
                                                <option value="passport" <?= $document->type == 'passport' ? 'selected' : '' ?>>Passport</option>
                                                <option value="emirates" <?= $document->type == 'emirates' ? 'selected' : '' ?>>Emirates</option>
                                                <option value="others" <?= $document->type == 'others' ? 'selected' : '' ?>>Others</option>
                                            </select>

                                        </div>
                                    </div>

                                </div>




                                    <div class="box-footer" style="text-align: right; margin-right:5rem">
                                        <button type="submit" class="btn btn-info f-14 text-white"
                                            id="submitBtn">Update</button>
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

