@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit SEO</h1>
    </section>

    <section class="content">
        <div class="row gap-2">
            <div class="col-md-3 settings_bar_gap">
                @include('admin.common.property_bar')
            </div>

            <div class="col-md-9">
                <div class="box box-info">
                    <div class="box-body">

                        {{-- Show success message --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        {{-- Update form --}}
                        <form method="POST" action="{{ route('seo.update', $result->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="label-large fw-bold">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $seo->title ?? '') }}" required>
                            </div>

                            <div class="form-group">
                                <label class="label-large fw-bold">Description <span class="text-danger">*</span></label>
                                <textarea name="description" rows="4" class="form-control" required>{{ old('description', $seo->description ?? '') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="label-large fw-bold">Image</label>
                                <input type="file" name="image" class="form-control">

                                @if (!empty($seo->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($seo->image) }}" class="img-thumbnail" width="150">
                                    </div>
                                @endif
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-primary btn-md">Update SEO</button>
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
