@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content">
        <div class="row justify-content-center"> {{-- Center the column --}}
            <div class="col-md-8"> {{-- Use responsive class --}}
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Add Building (Area: {{ $area->name }})</h3>
                    </div>

                    <form action="{{ route('building.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="area_id" value="{{ $area->id }}">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Building Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add Building</button>
                            <a href="{{ route('building.view', $area->id) }}" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
