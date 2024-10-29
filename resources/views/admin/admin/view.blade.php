@extends('admin.template')

@section('main')

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
	<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
		<div class="d-flex flex-column flex-column-fluid">
			<section class="content-header">
				<h3 class="mb-4 ml-4">
					Admin Users 
				</h3>
				<div class="ml-4 mr-4">
					@include('admin.common.breadcrumb')
				</div>
			</section>


			<div id="kt_app_content" class="app-content flex-column-fluid">
				<div id="kt_app_content_container" class="app-container container-fluid">
					<section class="content">
						<div class="row">
							<div class="col-12">
								<div class="card mb-4">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h4 class="card-title mb-0">Admin User Management</h4>
										<a href="{{ url('admin/add-admin') }}" class="btn btn-sm btn-success">Add Admin
											User</a>
									</div>

									<div class="card-body">
										<div class="table-responsive parent-table f-14">
											{!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
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
			<!-- DataTables CSS and JS -->
			<script src="https://code.jquery.com/jquery-3.7.1.js"
				integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

			<!-- DataTables CSS and JS -->
			<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
			<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
			{!! $dataTable->scripts() !!}
		@endpush