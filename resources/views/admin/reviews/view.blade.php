@extends('admin.template') 
@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
	<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
		<div class="d-flex flex-column flex-column-fluid">
			<class="content-header">
				<h3 class="mb-4 ml-4">
					Reviews
					<small>Control panel</small>
				</h3>
				<div class="ml-4 mr-4">
					@include('admin.common.breadcrumb')
				</div>

				<div id="kt_app_content" class="app-content flex-column-fluid">
					<div id="kt_app_content_container" class="app-container container-fluid">
						<section class="content">
							<!-- Filtering Card Start -->
							<div class="card mb-4">
								<div class="card-header">
									<h5 class="card-title">Filter Reviews</h5>
								</div>
								<div class="card-body">
									<form class="form-horizontal" enctype='multipart/form-data' action="{{ url('admin/reviews') }}" method="GET" accept-charset="UTF-8">
										{{ csrf_field() }}
										<div class="col-md-12 d-none">
											<input class="form-control" type="text" id="startDate" name="from" value="{{ isset($from) ? $from : '' }}" hidden>
											<input class="form-control" type="text" id="endDate" name="to" value="{{ isset($to) ? $to : '' }}" hidden>
										</div>

										<div class="row align-items-center date-parent">
											<div class="col-md-3 col-sm-3 col-xs-12">
												<label>Date Range</label>
												<div class="input-group">
													<input type="text" class="form-control" id="dateRange" name="date_range" placeholder="Select date range" value="{{ isset($date_range) ? $date_range : '' }}">
													<div class="input-group-append">
														<span class="input-group-text"><i class="fa fa-calendar"></i></span>
													</div>
												</div>
												<input class="form-control d-none" type="text" id="startDate" name="from" value="{{ isset($from) ? $from : '' }}">
												<input class="form-control d-none" type="text" id="endDate" name="to" value="{{ isset($to) ? $to : '' }}">
											</div>

											<div class="col-md-4 col-sm-3 col-xs-12">
												<label>Property</label>
												<select class="form-control" name="property" id="property">
													<option value="">All</option>
													@if (!empty($property))
														@foreach ($property as $properties)
															<option value="{{ $properties->id }}" {{ $properties->id == $allproperties ? ' selected' : '' }}>
																{{ $properties->name }}</option>
														@endforeach
													@endif
												</select>
											</div>

											<div class="col-md-3 col-sm-2 col-xs-12">
												<label>Reviewer</label>
												<select class="form-control" name="reviewer" id="reviewer">
													<option value="">All</option>
													<option value="guest" {{ $allreviewer == "guest" ? ' selected' : '' }}>Guest</option>
													<option value="host" {{ $allreviewer == "host" ? ' selected' : '' }}>Host</option>
												</select>
											</div>

											<div class="col-md-1 col-sm-2 col-xs-4 d-flex gap-2 mt-4">
												<button type="submit" name="btn" class="btn btn-primary btn-flat f-14 rounded">Filter</button>
												<button type="button" name="reset_btn" id="reset_btn" class="btn btn-primary btn-flat f-14 rounded">Reset</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- Filtering Card End -->

							<!-- Table Card Start -->
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Reviews Management</h5>
								</div>
								<div class="card-body">
									<div class="table-responsive parent-table f-14">
										{!! $dataTable->table(['class' => 'table table-striped table-hover dt-responsive', 'width' => '100%', 'cellspacing' => '0']) !!}
									</div>
								</div>
							</div>
							<!-- Table Card End -->
						</section>
					</div>
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
			window.location.href = '{{ url("admin/reviews") }}'; // Redirect to reset filters
		});
	});
</script>

{!! $dataTable->scripts() !!}

<script>
	var sessionDate = '{{ strtoupper(Session::get('date_format_type')) }}';
	var user_id = '{{ $user->id ?? '' }}';
	var page = "review";
</script>

<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/js/admin-date-range-picker.min.js') }}"></script>
@endsection
