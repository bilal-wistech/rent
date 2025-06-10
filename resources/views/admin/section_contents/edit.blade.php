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
                                    <textarea name="desc" id="desc" class="form-control">{{ old('desc', $sectionContent->description) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="icon">Icon (Lucid Icon class)</label>
                                    <input type="text" name="icon" id="icon" class="form-control"
                                        value="{{ old('icon', $sectionContent->icon) }}"
                                        placeholder="e.g., lucide lucide-award">

                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
                                            {{ old('type', $sectionContent->type) == 'additional-services' ? 'selected' : '' }}>
                                            Additional Services</option>
                                            <option value="concierge-services"
                                            {{ old('type', $sectionContent->type) == 'concierge-services' ? 'selected' : '' }}>
                                            Concierge Services</option>
                                            <option value="value-proposition"
                                            {{ old('type', $sectionContent->type) == 'value-proposition' ? 'selected' : '' }}>
                                            Value Proposition</option>
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
                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" name="sort_order" id="sort_order" class="form-control"
                                        value="{{ old('sort_order', $sectionContent->sort_order) }}">

                                    @error('sort_order')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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

@section('validate_script')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('desc', {
            toolbar: [{
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'styles',
                    items: ['Format']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                }
            ],
            removePlugins: 'elementspath',
            resize_enabled: true
        });
    </script>
@endsection
