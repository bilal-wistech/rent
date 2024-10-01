@extends('admin.template')

@section('main')
<div class="content-wrapper">
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

                    <h4 class="text-center mt-4">Document Detail</h4>

                    <div class="box-body">
                        <form action="{{ route('document.update', $document) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mt-3 row">
                                <label class="control-label col-sm-3 mt-2 fw-bold">Uploaded Image</label>
                                <div class="col-sm-8 d-flex align-items-center">
                                    @if ($document->image)
                                    <div class="border border-light rounded p-1 me-3">
                                        <img src="{{ Storage::url($document->image) }}" class="document-image" style="height: 60px; width: 60px;">
                                    </div>
                                    @else
                                    <span>No image uploaded</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-3 row">
                                <label class="control-label col-sm-3 mt-2 fw-bold">New Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image" id="document_image" accept="image/*">
                                    <span id="imageError" class="text-danger"></span>
                                </div>
                            </div>

                            <div class="form-group mt-3 row">
                                <label class="control-label col-sm-3 mt-2 fw-bold">Expiry Date<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="expire" id="expiry_date" value="{{ $document->expire }}" required>
                                </div>
                            </div>

                            <div class="form-group mt-3 row">
                                <label class="control-label col-sm-3 mt-2 fw-bold">Document Type<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <div class="d-flex align-items-center mt-3">
                                        <label class="me-3">
                                            <input type="radio" name="type" value="passport" {{ $document->type == 'passport' ? 'checked' : '' }}> Passport
                                        </label>
                                        <label>
                                            <input type="radio" name="type" value="emirates" {{ $document->type == 'emirates' ? 'checked' : '' }}> Emirates
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3 row">
                                <div class="col-sm-8 offset-sm-3 text-end">
                                    <button type="submit" class="btn btn-info me-3">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
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
@endsection
