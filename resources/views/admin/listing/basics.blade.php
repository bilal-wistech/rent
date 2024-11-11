@extends('admin.template')

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">
                    List Your Space 
                    <small>List Your Space</small>
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
                        <div class="row">
                            <div class="col-md-3 settings_bar_gap">
                                @include('admin.common.property_bar')
                            </div>
                            <div class="col-md-9">
                                <form method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}"
                                    class='signup-form login-form' accept-charset='UTF-8'>
                                    {{ csrf_field() }}
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Rooms and Beds</h4>
                                        </div>
                                        <div class="card-body bg-white">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Bedrooms</label>
                                                    <select name="bedrooms" id="basics-select-bedrooms"
                                                        class="form-control f-14">
                                                        @for ($i = 1; $i <= 10; $i++)
                                                            <option value="{{ $i }}" {{ ($i == $result->bedrooms) ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Beds</label>
                                                    <select name="beds" id="basics-select-beds" class="form-control f-14">
                                                        @for ($i = 1; $i <= 16; $i++)
                                                            <option value="{{ $i }}" {{ ($i == $result->beds) ? 'selected' : '' }}>
                                                                {{ ($i == '16') ? $i . '+' : $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Bathrooms</label>
                                                    <select name="bathrooms" id="basics-select-bathrooms"
                                                        class="form-control f-14">
                                                        @for ($i = 1; $i <= 8; $i++)
                                                            <option class="bathrooms" value="{{ $i }}" {{ ($i == $result->bathrooms) ? 'selected' : '' }}>
                                                                {{ ($i == '8') ? $i . '+' : $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Bed Type</label>
                                                    <select id="basics-select-bed_type" name="bed_type"
                                                        class="form-control f-14">
                                                        @foreach ($bed_type as $key => $value)
                                                            <option value="{{ $key }}" {{ ($key == $result->bed_type) ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <h4 class="card-title">Listings</h4>
                                        </div>
                                        <div class="card-body bg-white">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Property Type</label>
                                                    <select name="property_type" class="form-control f-14">
                                                        @foreach ($property_type as $key => $value)
                                                            <option value="{{ $key }}" {{ ($key == $result->property_type) ? 'selected' : '' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Room Type</label>
                                                    <select name="space_type" class="form-control f-14">
                                                        @foreach ($space_type as $key => $value)
                                                            <option value="{{ $key }}" {{ ($key == $result->space_type) ? 'selected' : '' }}>
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Accommodates</label>
                                                    <select name="accommodates" id="basics-select-accommodates"
                                                        class="form-control f-14">
                                                        @for ($i = 1; $i <= 16; $i++)
                                                            <option class="accommodates" value="{{ $i }}" {{ ($i == $result->accommodates) ? 'selected' : '' }}>
                                                                {{ ($i == '16') ? $i . '+' : $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Recommended</label>
                                                    <select name="recomended" id="basics-select-recomended"
                                                        class="form-control f-14">
                                                        <option value="1" {{ ($result->recomended == 1) ? 'selected' : '' }}>Yes</option>
                                                        <option value="0" {{ ($result->recomended == 0) ? 'selected' : '' }}>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="label-large fw-bold">Verified</label>
                                                    <select name="verified" class="form-control f-14">
                                                        <option value="Pending" {{ ($result->is_verified == 'Pending') ? 'selected' : '' }}>Pending</option>
                                                        <option value="Approved" {{ ($result->is_verified == 'Approved' || $result->is_verified == '') ? 'selected' : '' }}>Approved</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-12 text-right">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm next-section-button f-14">
                                                        Next
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
