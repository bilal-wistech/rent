@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            SEO
            <small>SEO</small>
        </h1>
    </section>

    <section class="content">
        <div class="box box-info">
            <div class="box-body">
                <form action="{{ route('property.seo.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $seo->title ?? '') }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $seo->description ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if(!empty($seo->image))
                            <div class="mt-2">
                                <img src="{{ asset('seo/property/' . $seo->image) }}" width="120" alt="SEO Image">
                            </div>
                        @endif
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ url('admin/properties') }}" class="btn btn-default">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
