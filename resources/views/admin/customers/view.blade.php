@extends('admin.template')
@section('main')

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
	<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
		<section class="content-header">
			<h3 class="mb-4 ml-4">Customers<small>Control panel</small></h3>
			@include('admin.common.breadcrumb')
		</section>

		<div id="kt_app_content" class="app-content flex-column-fluid">
			<div id="kt_app_content_container" class="app-container container-fluid">
				<section class="content">
					<div class="row">
						<div class="col-12">
							@if (session('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									{{ session('success') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert"
										aria-label="Close"></button>
								</div>
							@endif
						</div>

						<div class="col-12">
							<div class="card mb-4">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5>Filter Customers</h5>
								</div>
								<div class="card-body">
									<form class="form-horizontal" enctype='multipart/form-data'
										action="{{ url('admin/customers') }}" method="GET" accept-charset="UTF-8">
										{{ csrf_field() }}


										<div class="row align-items-center date-parent">
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label>Date Range</label>
												<div class="input-group">
													<input type="text" class="form-control" id="dateRange"
														name="date_range" placeholder="Select date range"
														value="{{ isset($date_range) ? $date_range : '' }}">
													<div class="input-group-append">
														<span class="input-group-text"><i
																class="fa fa-calendar"></i></span>
													</div>
												</div>
												<input class="form-control d-none" type="text" id="startDate"
													name="from" value="{{ isset($from) ? $from : '' }}">
												<input class="form-control d-none" type="text" id="endDate" name="to"
													value="{{ isset($to) ? $to : '' }}">
											</div>
											<div class="col-md-3 col-sm-6">
												<label>Status</label>
												<select class="form-control" name="status" id="status">
													<option value="">All</option>
													<option value="Active" {{ $allstatus == "Active" ? 'selected' : '' }}>
														Active</option>
													<option value="Inactive" {{ $allstatus == "Inactive" ? 'selected' : '' }}>Inactive</option>
												</select>
											</div>
											<div class="col-md-3 col-sm-6">
												<label>Customer</label>
												<select class="form-control select2" name="customer" id="customer">
													<option value="">All</option>
													@foreach ($customers ?? [] as $customer)
														<option value="{{ $customer->id }}" {{ $customer->id == $allcustomers ? 'selected' : '' }}>
															{{ $customer->first_name }} {{ $customer->last_name }}
														</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-3 col-sm-6 d-flex gap-2 mt-4">
												<button type="submit" class="btn btn-primary">Filter</button>
												<button type="button" id="reset_btn"
													class="btn btn-secondary">Reset</button>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h5>Customers Management</h5>
									@if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'add_customer'))
										<a class="btn btn-success" href="{{ url('admin/add-customer') }}">Add Customer</a>
									@endif
								</div>
								<div class="card-body">
									<div class="table-responsive">
										{!! $dataTable->table(['class' => 'table table-striped table-hover', 'width' => '100%']) !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>

@endsection



@section('validate_script')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>

	$(document).ready(function () {
		// Initialize Flatpickr for date range
		flatpickr("#dateRange", {
			mode: "range",
			dateFormat: "m-d-Y", // Change to m-d-Y to match your database format
			onChange: function (selectedDates) {
				if (selectedDates.length === 2) {
					// Format the dates to m-d-Y
					$('#startDate').val(flatpickr.formatDate(selectedDates[0], "m-d-Y"));
					$('#endDate').val(flatpickr.formatDate(selectedDates[1], "m-d-Y"));
				}
			}
		});

		// Handle reset button
		$('#reset_btn').on('click', function () {
			$('#startDate, #endDate').val(''); // Clear date fields
			$('#status, #space_type').val(''); // Reset other fields
			$('#dateRange').val(''); // Reset date range field
			window.location.href = '{{ url("admin/customers") }}'; // Redirect to reset filters
		});
	});

</script>

{!! $dataTable->scripts() !!}

<script>
	var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
	var user_id = '{{ $user->id ?? '' }}';
	var page = "customer";
</script>

<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection

<!-- @push('scripts') -->

<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

<!-- DataTables CSS and JS -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
	<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script> -->


<!-- <script src="{{ asset('backend/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
								<script src="{{ asset('backend/plugins/Responsive-2.2.2/js/dataTables.responsive.min.js') }}"></script> -->
<!-- {!! $dataTable->scripts() !!} -->
<!-- @endpush -->

<!-- @push('scripts') -->

<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

<!-- DataTables CSS and JS -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
	<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script> -->

<!-- {!! $dataTable->scripts() !!} -->
<!-- @endpush -->
<!-- 
<script>
	$(document).ready(function () {
		// Initialize Flatpickr with date range mode
		flatpickr("#dateRange", {
			mode: "range",
			dateFormat: "m-d-Y", // Modify this as per your preferred format
			onChange: function (selectedDates) {
				if (selectedDates.length === 2) {
					// Update hidden startDate and endDate inputs
					$('#startDate').val(flatpickr.formatDate(selectedDates[0], "Y-m-d"));
					$('#endDate').val(flatpickr.formatDate(selectedDates[1], "Y-m-d"));
				}
			}
		});

		// Reset button functionality
		$('#reset_btn').on('click', function () {
			// Clear input fields and reset form
			$('#startDate, #endDate').val('');
			$('#status, #customer').val('').change();
			$('#dateRange').val('');
			window.location.href = '{{ url("admin/customers") }}'; // Reload page to reset filters
		});
	});
</script> -->
<!-- 
@section('validate_script')
<script type="text/javascript">
	'use strict';
	var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
	var user_id = '{{ $user->id ?? '' }}';
	var page = "customer";
</script>
<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection -->