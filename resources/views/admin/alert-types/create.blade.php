@extends('admin.template')
	@push('css')
	<link href="{{ asset('backend/css/setting.min.css') }}" rel="stylesheet" type="text/css" />
	@endpush
	@section('main')
	<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Alert Type Form
            </h1>
          @include('admin.common.breadcrumb')
        </section>
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
						<form id="add_alert_type" method="post" action="{{ route('alert-types.store') }}" class="form-horizontal" >
							@csrf
							<div class="box-body">
                                <div class="form-group row mt-3 name">
                                    <label for="inputEmail3" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Name
                                        <span class="text-danger">*</span></label>

                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control f-14" id="heading"placeholder="Name">
                                        <span class="text-danger">{{ $errors->first("name") }}</span>
                                    </div>
                                </div>

                                <div class="form-group row mt-3 status">

                                    <label for="inputEmail3" class="control-label col-sm-3 fw-bold text-md-end mb-2 mb-md-0">Status</label>

                                    <div class="col-sm-6">
                                        <select class="form-control f-14" id="status" name="status" aria-invalid="false">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                    </div>
                                </div>

							</div>

							<div class="box-footer">

								<button type="submit" class="btn btn-info btn-space f-14 text-white me-2">Submit</button>


								<a class="btn btn-danger f-14" href="{{ route('alert-types.index') }}">Cancel</a>


							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
	@endsection
