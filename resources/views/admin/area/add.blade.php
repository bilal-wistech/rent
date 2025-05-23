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
                        <h3 class="box-title">Add Area</h3>
                    </div>

                    {{-- Success Alert --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative;">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                style="position: absolute; right: 10px; top: 10px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    {{-- Error Alert --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: relative;">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                                style="position: absolute; right: 10px; top: 10px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('area.store') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            {{-- Area Name --}}
                            <div class="row mt-3">
                                <div class="col-md-3 text-md-end">
                                    <label for="name" class="fw-bold">Name <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control f-14" id="name"
                                           placeholder="Area Name" value="{{ old('name') }}">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>

                            {{-- Show on Front --}}
                            <div class="row mt-3">
                                <div class="col-md-3 text-md-end">
                                    <label for="show_on_front" class="fw-bold">Show on Front</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="show_on_front" id="show_on_front" class="form-control f-14">
                                        <option value="1" {{ old('show_on_front') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('show_on_front') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('show_on_front') }}</span>
                                </div>
                            </div>

                            {{-- Image Upload --}}
                            <div class="row mt-3">
                                <div class="col-md-3 text-md-end">
                                    <label for="image" class="fw-bold">Upload Image <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control f-14" id="image" accept="image/*"
                                           onchange="previewImage(event)">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>

                            {{-- Image Preview --}}
                            <div class="row mt-3">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <img id="imagePreview" src="#" alt="Selected Image" class="img-thumbnail"
                                         style="display: none; width: 100%; max-width: 360px; height: auto; margin-top: 10px;">
                                </div>
                            </div>

                            {{-- Hidden city_id --}}
                            <input type="hidden" name="city_id" value="{{ $cityId }}">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info f-14 text-white me-2">Submit</button>
                            <a class="btn btn-danger f-14" href="{{ route('area.show', $cityId) }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Image preview script --}}
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
            output.style.border = '2px solid #ddd';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection

@section('validate_script')
    <script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
