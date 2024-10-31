@extends('admin.template')
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3>Amenities <small>Amenities</small></h3>
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
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Select Amenities</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}"
                                            class='signup-form login-form' accept-charset='UTF-8'>
                                            {{ csrf_field() }}
                                            @foreach ($amenities_type as $row_type)
                                                <div class="mb-3">
                                                    <h5 class="card-subtitle">{{ $row_type->name }}
                                                        @if ($row_type->name == 'Common Amenities')
                                                            <span class="text-danger">*</span>
                                                        @endif
                                                    </h5>
                                                    @if ($row_type->description)
                                                        <p class="text-muted">{{ $row_type->description }}</p>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <ul class="list-unstyled fw-bold">
                                                                @foreach ($amenities as $amenity)
                                                                    @if ($amenity->type_id == $row_type->id)
                                                                        <li>
                                                                            <label class="amenity-label">
                                                                                <input type="checkbox" value="{{ $amenity->id }}" 
                                                                                       name="amenities[]" 
                                                                                       data-saving="{{ $row_type->id }}"
                                                                                       {{ in_array($amenity->id, $property_amenities) ? 'checked' : '' }}> 
                                                                                {{ $amenity->title }}
                                                                            </label>
                                                                            @if ($amenity->description)
                                                                                <span data-bs-toggle="tooltip" title="{{ $amenity->description }}">
                                                                                    <i class="fa fa-info-circle"></i>
                                                                                </span>
                                                                            @endif
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <p id='error'></p>
                                            <div class="d-flex justify-content-between mt-4">
                                                <a href="{{ url('admin/listing/' . $result->id . '/location') }}" 
                                                   class="btn btn-primary f-14">Back</a>
                                                <button type="submit" class="btn btn-primary next-section-button f-14">
                                                    Next
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
