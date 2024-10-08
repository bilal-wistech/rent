@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content">
        @include('admin.customerdetails.customer_menu')

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h4 class="mb-0 mx-auto">Emergency Contact</h4>
                        {{-- <div>
                            <a class="btn btn-info f-14 text-white" style="margin-right: 2rem"
                               id="addMoreBtn" title="Add More">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div> --}}
                    </div>

                    <form action="{{ route('emergencycontacts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="box-body" id="emergencyContactsContainer">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="emergency-contact-group">


                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3 mt-2 fw-bold">Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-8 d-flex">
                                        <input type="text" class="form-control"
                                               name="emergency_contact_name" placeholder="Enter name" required>
                                        {{-- <a class="btn btn-danger removeBtn"
                                           style="position:absolute; right:2rem; display: none;" title="Remove">
                                            <i class="fa fa-trash-o"></i>
                                        </a> --}}
                                    </div>
                                </div>


                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3 mt-2 fw-bold">Relation<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                               name="emergency_contact_relation" placeholder="Enter relation" required>
                                    </div>
                                </div>

                                <div class="form-group mt-3 row">
                                    <label class="control-label col-sm-3 mt-2 fw-bold">Contact Number<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel" class="form-control"
                                               name="emergency_contact_number"
                                               placeholder="Enter contact number" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer" style="text-align: right; margin-right: 5rem">
                            <button type="submit" class="btn btn-info f-14 text-white" id="submitBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('validate_script')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="{{ asset('backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('backend/js/customer_edit.min.js') }}"></script>
<script src="{{ asset('addCustomer.js') }}"></script>
@endsection
