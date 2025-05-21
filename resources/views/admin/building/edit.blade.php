@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Edit Building</h3>
                    </div>

                    <form action="{{ route('building.update', $building->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Building Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $building->name) }}" required>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
