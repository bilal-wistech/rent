@extends('admin.template')

@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 mt-3">
                        <div class="col-sm-6 ml-5">
                            <h3>Edit Admin User Form</h3>
                        </div>
                        <div class="col-sm-5 text-right">
                            @include('admin.common.breadcrumb')
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="card card-info shadow-sm">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h3 class="card-title mb-0">Admin Edit Form</h3>
                                        <span class="email_status">
                                            <span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Verified</span>
                                        </span>
                                    </div>

                                    @if (Session::has('error'))
                                        <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
                                            <strong>Warning!</strong> There was an error. Please verify your information below.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                        </div>
                                    @endif

                                    <form id="edit_admin" method="post" action="{{ url('admin/edit-admin/' . $result->id) }}" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="form-group row mb-4">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Username <span class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="username" class="form-control f-14" placeholder="Username" value="{{ $result->username }}">
                                                    <span class="text-danger">{{ $errors->first("username") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Email <span class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="email" name="email" class="form-control f-14" placeholder="Email" value="{{ $result->email }}">
                                                    <span class="text-danger">{{ $errors->first("email") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Password</label>
                                                <div class="col-sm-6">
                                                    <input type="password" name="password" class="form-control f-14" placeholder="Password">
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                </div>
                                                <div class="col-sm-3 text-muted small">
                                                    <small>Leave blank to keep the current password.</small>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Role</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control f-14" name="role">
                                                        @foreach ($roles as $key => $item)
                                                            <option value="{{ $key }}" {{ $result->role_id == $key ? 'selected' : '' }}>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-sm-3 col-form-label fw-bold text-md-end">Status</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control f-14" name="status">
                                                        <option value="Active" {{ $result->status == "Active" ? 'selected' : '' }}>Active</option>
                                                        <option value="Inactive" {{ $result->status == "Inactive" ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-info f-14 text-white">Submit</button>
                                            <a class="btn btn-danger f-14" href="{{ url('admin/admin-users') }}">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('validate_script')
<script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
@endsection
