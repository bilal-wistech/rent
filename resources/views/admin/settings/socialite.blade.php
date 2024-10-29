@extends('admin.template')

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-3 col-12 settings_bar_gap">
                                @include('admin.common.settings_bar')
                            </div>
                            <!-- right column -->
                            <div class="col-lg-9 col-12">
                                <!-- Horizontal Form -->
                                <div class="card box-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Social Logins</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form id="socialiteform" method="post"
                                        action="{{ url('admin/settings/social-logins') }}" class="form-horizontal"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="form-group row mt-3">
                                                <label for="google_login"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Google</label>
                                                <div class="col-sm-6">
                                                    <select name="google_login" id="google_login" class="form-control f-14">
                                                        <option value="0" {{ isset($social['google_login']) && $social['google_login'] == '0' ? 'selected' : "" }}>Inactive</option>
                                                        <option value="1" {{ isset($social['google_login']) && $social['google_login'] == '1' ? 'selected' : "" }}>Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-3">
                                                <label for="facebook_login"
                                                    class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Facebook</label>
                                                <div class="col-sm-6">
                                                    <select name="facebook_login" id="facebook_login" class="form-control f-14">
                                                        <option value="0" {{ isset($social['facebook_login']) && $social['facebook_login'] == '0' ? 'selected' : "" }}>Inactive</option>
                                                        <option value="1" {{ isset($social['facebook_login']) && $social['facebook_login'] == '1' ? 'selected' : "" }}>Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-info f-14 text-white me-2">Submit</button>
                                            <a class="btn btn-danger f-14" href="{{ url('admin/settings/social-logins') }}">Cancel</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                            </div>
                            <!--/.col (right) -->
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
