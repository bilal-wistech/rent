@extends('admin.template')

@section('main')

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">
                    Testimonial
                    <small>Add Testimonial</small>
                </h3>
                @include('admin.common.breadcrumb')
            </section>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header p-4 text-white">
                                        <h4 class="mb-0">Add New Testimonial</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('admin/add-testimonials') }}" id="add_testimonials" method="post" name="add_testimonials" accept-charset='UTF-8' enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            
                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Name <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Reviewer Name..">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Designation <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="designation" id="designation" value="{{ old('designation') }}" placeholder="Reviewer Designation..">
                                                    @if ($errors->has('designation'))
                                                        <span class="text-danger">{{ $errors->first('designation') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Description <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <textarea name="description" id="description" class="form-control" placeholder="Description..">{{ old('description') }}</textarea>
                                                    @if ($errors->has('description'))
                                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Image <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="file" class="form-control" name="image" id="image">
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Rating <span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" name="rating_1" id="rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i id="rating-{{ $i }}" class="fa fa-star icon-click {{ $i >= 0 ? 'icon-light-gray' : 'fa-star-beach' }}"></i>
                                                    @endfor
                                                    @if ($errors->has('rating_1'))
                                                        <span class="text-danger">{{ $errors->first('rating_1') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ url('admin/testimonials') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('validate_script')
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
@endsection
