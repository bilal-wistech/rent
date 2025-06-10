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
                            <h3 class="box-title">Add Section Content</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('section-contents.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" id="desc" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="icon">Icon (Lucid Icon class)</label>
                                    <input type="text" name="icon" id="icon" class="form-control"
                                        placeholder="e.g., lucide lucide-award">

                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="features">Features</option>
                                        <option value="services">Services</option>
                                        <option value="additional-services">Additional Services</option>
                                        <option value="value-proposition">Value Proposition</option>
                                        <option value="concierge-services">Concierge Services</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Parent</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0">-- No Parent --</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" name="sort_order" id="sort_order" class="form-control">
                                    @error('sort_order')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
