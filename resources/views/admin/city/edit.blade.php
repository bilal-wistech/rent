@extends('admin.template')

@push('css')
<link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-12 settings_bar_gap">
                @include('admin.common.settings_bar')
            </div>

            <div class="col-lg-9 col-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit City Form</h3>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative;" >
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 10px; top: 10px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Error Alert --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: relative;">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; right: 10px; top: 10px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    <form id="add_country" method="post" action="{{ route('city.update',$city->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                           <div class="box-body">
                            <div class="form-group row mt-3 short_name">
                                <label for="short_name" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0"> Name
                                    <span class="text-danger">*</span></label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control f-14" id="short_name" placeholder="City Name" value="{{ $city->name }}">
                                    <span class="text-danger">{{ $errors->first("name") }}</span>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="image" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">
                                    Upload Image <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-6">
                                    <input type="file" name="image" class="form-control f-14" id="image" accept="image/*">
                                    <span class="text-danger">{{ $errors->first("image") }}</span>
                                    @if(isset($city->image))
                                        <div class="mt-2">
                                            <img src="{{ asset('front/images/front-cities/' . $city->image) }}" alt="City Image" width="100" height="100" style="border-radius: 5px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <input type="hidden" name="country_id" id="country_id" value="{{$city->country_id }}">

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info btn-space f-14 text-white me-2">Submit</button>
                            <a class="btn btn-danger f-14" href="{{ route('city.show', $city->country_id) }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('validate_script')
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
