@extends('admin.template')
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">
                    Photos
                    <small>Photos</small>
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
                            <div class="col-lg-3 col-12 settings_bar_gap">
                                @include('admin.common.property_bar')
                            </div>

                            <div class="col-md-9">
                                <div class="card box-info">
                                    <div class="card-body">
                                        <form id="img_form" enctype="multipart/form-data" method="post"
                                            action="{{ url('admin/listing/' . $result->id . '/' . $step) }}"
                                            class="signup-form login-form" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        @if(session('success'))
                                                            <span
                                                                class="text-center text-success">{{ session('success') }}</span>
                                                        @endif
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input class="form-control f-14 text-16" name="file"
                                                                    id="image_file" type="file">
                                                                <input type="hidden" id="photo" name="photos">
                                                                <input type="hidden" name="img_name" id="img_name">
                                                                <input type="hidden" name="crop" id="type" value="crop">
                                                                <p class="text-13">(Width 640px and Height 360px)</p>
                                                                <div id="result" class="hide">
                                                                    <img src="#" alt="" required>
                                                                </div>
                                                                @error('file')
                                                                    <span
                                                                        class="text-center text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit"
                                                                    class="btn btn-large btn-primary next-section-button f-14"
                                                                    id="submit">
                                                                    Upload
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                        </form>

                                        <div class="row">
                                            <div id="photo-list-div" class="ps-4 min-height-div row">
                                                @foreach($photos as $index => $photo)
                                                    <div class="col-md-4 margin-top10" id="photo-div-{{ $photo->id }}">
                                                        <div class="room-image-container200">
                                                            <img src="{{ url('/images/property/' . $photo->property_id . '/' . $photo->photo) }}"
                                                                alt="">
                                                            @if($photo->cover_photo == 0)
                                                                <a class="photo-delete" href="javascript:void(0)"
                                                                    data-rel="{{ $photo->id }}">
                                                                    <p class="photo-delete-icon"><i class="fa fa-trash-o"></i>
                                                                    </p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="margin-top5">
                                                            <textarea data-rel="{{ $photo->id }}"
                                                                class="form-control f-14 photo-highlights"
                                                                placeholder="What are the highlights of this photo?">{{ $photo->message }}</textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="fw-bold mb-1">Serial</label>
                                                                <input type="text" image_id="{{ $photo->id }}"
                                                                    property_id="{{ $result->id }}"
                                                                    id="serial-{{ $photo->id }}"
                                                                    class="form-control f-14 serial" name="serial"
                                                                    value="{{ $photo->serial }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                @if($photo->cover_photo == 0)
                                                                    <label class="fw-bold mb-1">Cover Photo</label>
                                                                    <select class="form-control f-14 photoId" id="photoId">
                                                                        <option value="Yes" {{ $photo->cover_photo == 1 ? 'selected' : '' }} image_id="{{ $photo->id }}"
                                                                            property_id="{{ $result->id }}">Yes</option>
                                                                        <option value="No" {{ $photo->cover_photo == 0 ? 'selected' : '' }} image_id="{{ $photo->id }}"
                                                                            property_id="{{ $result->id }}">No</option>
                                                                    </select>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        @if(($index + 1) % 3 == 0)
                                                            <div class="clearfix">&nbsp;</div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-md-12">
                                                <span class="text-danger" id="photo-error" style="display:none;">
                                                    This field is required.
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <br>
                                            <div class="col-md-12 px-4 mt-3">
                                                <div class="col-md-10 col-sm-6 col-xs-6 l-pad-none float-start">
                                                    <a href="{{ url('admin/listing/' . $result->id . '/amenities') }}"
                                                        class="btn btn-large btn-primary f-14">Back</a>
                                                </div>
                                                <div class="col-md-2 col-sm-6 col-xs-6 float-end text-end">
                                                    <a href="javascript:void(0)" id="next-section-button"
                                                        class="btn btn-large btn-primary next-section-button f-14">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade dis-none z-index-high" id="crop-modal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title f-18">Edit Image</h4>
                <a type="button" class="close cls-reload f-18" data-bs-dismiss="modal">×</a>
            </div>
            <div>
                <canvas id="canvas">
                    <img id="cropper-image" src="" alt="Image to crop" style="display: none;" style="width : 100%;">
                    Your browser does not support HTML5 canvas element.
                </canvas>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info text-white f-14" id="crop" type="submit" name="submit">Crop</button>
                <button type="button" id="restore" class="btn btn-default pull-right f-14">Skip</button>
            </div>
        </div>
    </div>
</div>
@endsection



<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script>
    $('#image_file').on('change', function () {
        alert('Hello');
    });
</script>






@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/validate/1.19.3/validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.6.10/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        let photoUploadURL = '{{ url("add_photos/$result->id") }}';
        var photoRoomURl = '{{ url("images/rooms/" . $result->id) }}';
        var photoMessageURL = '{{ url("admin/listing/$result->id/photo_message") }}';
        let photoDeleteURL = '{{ url("admin/listing/$result->id/photo_delete") }}';
        let makeDefaultPhotoURL = '{{ url("admin/listing/photo/make_default_photo") }}';
        var makePhotoSerialURL = '{{ url("admin/listing/photo/make_photo_serial") }}';
        let highlightsPhotoText = "{{ __('What are the highlights of this photo?') }}";
        let SelectedText = "{{ __('No file selected! Please select a file to upload.') }}";
    </script>
@endpush