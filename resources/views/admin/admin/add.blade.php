@extends('admin.template')

@push('css')
    <link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <section class="content-header">
                <h3 class="mb-4 ml-4">
                    Add Admin User Form
                    <small class="text-muted">Add Admin</small>
                </h3>
                <div class="ml-4 mr-4">
                    @include('admin.common.breadcrumb')
                </div>
            </section>
            <section class="content">
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="card shadow-sm">
                                    @if (Session::has('error'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Warning!</strong> There was an error. Please verify your information.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="card-header bg-light">
                                        <h5 class="card-title">Admin Add Form</h5>
                                        <span class="email_status ms-3">
                                            <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i>
                                                Verified</span>
                                        </span>
                                    </div>

                                    <form id="add_admin" method="post" action="{{ url('admin/add-admin') }}"
                                        class="form-horizontal p-4" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="form-group row mt-3">
                                                <label for="username"
                                                    class="col-sm-3 col-form-label fw-bold text-end">Username <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="username" class="form-control f-14"
                                                        id="username" placeholder="Username">
                                                    <span class="text-danger">{{ $errors->first("username") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="email"
                                                    class="col-sm-3 col-form-label fw-bold text-end">Email <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="email" name="email" class="form-control f-14"
                                                        id="email" placeholder="Email">
                                                    <span class="text-danger">{{ $errors->first("email") }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="password"
                                                    class="col-sm-3 col-form-label fw-bold text-end">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-6">
                                                    <input type="password" name="password" class="form-control f-14"
                                                        id="password" placeholder="Password">
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="role"
                                                    class="col-sm-3 col-form-label fw-bold text-end">Role</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control f-14" id="role" name="role">
                                                        @foreach ($roles as $key => $item)
                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <label for="status"
                                                    class="col-sm-3 col-form-label fw-bold text-end">Status</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control f-14" id="status" name="status">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer text-end">
                                            <button type="submit" class="btn btn-primary f-14 me-2">Submit</button>
                                            <a class="btn btn-secondary f-14"
                                                href="{{ url('admin/admin-users') }}">Cancel</a>
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

@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/dist/js/validate.min.js') }}"></script>
@endpush