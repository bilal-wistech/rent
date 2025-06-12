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
                        <h3 class="box-title">SEO ({{ $area->name }})</h3>
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

                    <form method="POST" action="{{ route('area.seo.update', $area->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            {{-- Title --}}
                            <div class="row mt-3">
                                <div class="col-md-3 text-md-end">
                                    <label for="title" class="fw-bold">Title <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control f-14" id="title"
                                           placeholder="Title" value="{{ old('title', $seo->title ?? '') }}">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="row mt-3">
                                <div class="col-md-3 text-md-end">
                                    <label for="description" class="fw-bold">Description</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control f-14" id="description" rows="4"
                                              placeholder="Description">{{ old('description', $seo->description ?? '') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                            </div>

                            {{-- Image Upload --}}
                            <div class="row mt-3">
                                <div class="col-md-3 text-md-end">
                                    <label for="image" class="fw-bold">Upload Image</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control f-14" id="image" accept="image/*" onchange="previewImage(event)">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>

                            {{-- Image Preview --}}
                            <div class="row mt-3">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    @if (!empty($seo->image))
                                        <img src="{{ asset('seo/area/' . $seo->image) }}" id="imagePreview" class="img-thumbnail"
                                             style="width: 100%; max-width: 360px; height: auto; margin-top: 10px; border: 2px solid #ddd;">
                                    @else
                                        <img id="imagePreview" src="#" alt="Selected Image" class="img-thumbnail"
                                             style="display: none; width: 100%; max-width: 360px; height: auto; margin-top: 10px;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info f-14 text-white me-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Image Preview Script --}}
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
