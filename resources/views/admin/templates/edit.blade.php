@extends('admin.template')
@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="box box-info">
                        @if (Session::has('error'))
                            <div class="error_email_settings">
                                <div class="alert alert-warning fade in alert-dismissable">
                                    <strong>Warning!</strong> Whoops there was an error. Please verify your below
                                    information. <a class="close" href="#" data-dismiss="alert" aria-label="close"
                                        title="close">×</a>
                                </div>
                            </div>
                        @endif

                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Template Form</h3><span class="email_status">(<span
                                    class="text-green"><i class="fa fa-check" aria-hidden="true"></i>Verified</span>)</span>
                        </div>

                        <form id="add_template" method="post" action="{{ route('templates.store') }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row mt-3 status">
                                    <label for="inputEmail3"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Alert Type
                                        <span class="text-danger">*</span></label>

                                    <div class="col-sm-6">
                                        <select class="form-control f-14" id="alert_type_id" name="alert_type_id"
                                            aria-invalid="false">
                                            <option>Select Alert Type</option>
                                            @foreach ($alertTypes as $alertType)
                                                <option value="{{ $alertType->id }}"
                                                    {{ old('alert_type_id') == $alertType->id ? 'selected' : '' }}>
                                                    {{ $alertType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('alert_type_id') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row mt-3 subject">
                                    <label for="inputEmail3"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Subject
                                        <span class="text-danger">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" name="subject" class="form-control f-14" id="subject"
                                            placeholder="Enter Subject" value="{{ old('subject') }}">
                                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row mt-3 content">
                                    <label for="inputEmail3"
                                        class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Content
                                        <span class="text-danger">*</span></label>

                                    <div class="col-sm-6">
                                        <textarea id="compose-textarea" name="content" class="form-control f-14 editor" style="height: 300px">{{ old('content') }}</textarea>
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info btn-space f-14 text-white me-2">Submit</button>
                                <a class="btn btn-danger f-14" href="{{ route('templates.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
