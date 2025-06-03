@extends('admin.template')

@section('main')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-12 settings_bar_gap">
                    @include('admin.common.settings_bar')
                </div>
                <div class="col-lg-9 col-12">
                    <div class="box box_info">
                        <div class="box-header">
                            <h3 class="box-title">Edit Section Content</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('section-contents.update', $sectionContent->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required
                                        value="{{ old('name', $sectionContent->name) }}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" class="form-control">{{ old('desc', $sectionContent->decsription) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="icon">Icon (Only .ico, .png, .svg files allowed)</label>
                                    <input type="file" name="icon" id="icon" class="form-control"
                                        accept=".ico,.png,.svg">

                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    @if (!empty($sectionContent->icon))
                                        <div class="mt-2">
                                            <p>Current Icon:</p>
                                            {{-- Show the icon image preview --}}
                                            <img src="{{ asset('storage/' . $sectionContent->icon) }}" alt="Current Icon"
                                                style="width: 32px; height: 32px;">
                                            <p><small>{{ $sectionContent->icon }}</small></p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="features"
                                            {{ old('type', $sectionContent->type) == 'features' ? 'selected' : '' }}>
                                            Features</option>
                                        <option value="services"
                                            {{ old('type', $sectionContent->type) == 'services' ? 'selected' : '' }}>
                                            Services</option>
                                        <option value="additionalServices"
                                            {{ old('type', $sectionContent->type) == 'additionalServices' ? 'selected' : '' }}>
                                            Additional Services</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Parent</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0"
                                            {{ old('parent_id', $sectionContent->parent_id) == 0 ? 'selected' : '' }}>-- No
                                            Parent --</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}"
                                                {{ old('parent_id', $sectionContent->parent_id) == $parent->id ? 'selected' : '' }}>
                                                {{ $parent->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1"
                                            {{ old('status', $sectionContent->status) == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0"
                                            {{ old('status', $sectionContent->status) == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('section-contents.index') }}" class="btn btn-default">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
