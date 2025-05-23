@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Pricing Type</h3>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pricing-type.update', $pricingType->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $pricingType->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="days">Days <span class="text-danger">*</span></label>
                                <input type="number" name="days" id="days" class="form-control" value="{{ old('days', $pricingType->days) }}" required min="0">
                            </div>

                            <div class="form-group">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="1" {{ old('status', $pricingType->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $pricingType->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('pricing-type.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
