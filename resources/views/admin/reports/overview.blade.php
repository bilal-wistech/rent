@extends('admin.template')

@section('main')
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
	<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
		<div class="d-flex flex-column flex-column-fluid">
			<div class="content-header">
				<h3 class="mb-4 ml-4">Overview & Statistics</h3>
				<div class="ml-4 mr-4">
					@include('admin.common.breadcrumb')
				</div>

				<div id="kt_app_content" class="app-content flex-column-fluid">
					<div id="kt_app_content_container" class="app-container container-fluid">
						<section class="content">
							<!-- Filtering Form -->
							<div class="col-xs-12">
								<div class="box">
									<div class="box-body">
										<form class="form-horizontal" enctype="multipart/form-data"
											action="{{ url('admin/overview-stats') }}" method="GET">
											{{ csrf_field() }}
											<div class="d-none">
												<input type="text" class="form-control" id="startDate" name="from"
													value="{{ $from ?? '' }}" hidden>
												<input type="text" class="form-control" id="endDate" name="to"
													value="{{ $to ?? '' }}" hidden>
											</div>

											<div class="row align-items-center date-parent">
												<div class="col-md-3 col-sm-12">
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
												</div>

												<div class="col-md-4 col-sm-12">
													<label>Property</label>
													<select class="form-control select2" name="property" id="property">
														<option value="">All</option>
														@foreach ($properties ?? [] as $property)
															<option value="{{ $property->id }}" {{ $property->id == $allproperties ? 'selected' : '' }}>
																{{ $property->name }}
															</option>
														@endforeach
													</select>
												</div>

												<div class="col-md-1 col-sm-2 mt-4 d-flex gap-2">
													<button type="submit" class="btn btn-primary rounded">
														Filter
													</button>
													<button type="button" id="reset_btn"
														class="btn btn-primary rounded">
														Reset
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<!-- Data Display Section -->
							<div class="row">
								<div class="col-md-8">
									<div class="box">
										<div class="box-body">
											<div id="main" class="w-100-p h-100-p"></div>
											<br>
										</div>
									</div>
								</div>

								<input type="hidden" id="collections" name="collections[]" value="{{ $collections }}">

								<div class="col-md-4">
									<div class="card mr-3">
										<div class="card-body">
											<h5>Number of Reservations per Country</h5>
											@if ($countryCodes)
																					<table class="scroll wide f-14">
																						@foreach ($countryCodes as $countryCode)
																																	<tr>
																																		<td>
																																			{{ $countryCode->value }}
																																			@php
																																				$percentage = ($countryCode->value / $totalReservations) * 100;
																																			@endphp
																																			({{ round($percentage) }}%)
																																		</td>
																																	</tr>
																																	<tr>
																																		<td width="25%">
																																			<img src="{{ asset('images/flags/flags-medium/' . strtolower($countryCode->code) . '.png') }}"
																																				width="35" height="20">
																																		</td>
																																		<td>{{ $countryCode->name }}</td>
																																	</tr>
																																	<tr>
																																		<td>&nbsp;</td>
																																	</tr>
																						@endforeach
																					</table>
											@endif
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

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
			dateFormat: "m-d-Y",
			onChange: function (selectedDates) {
				if (selectedDates.length === 2) {
					$('#startDate').val(flatpickr.formatDate(selectedDates[0], "m-d-Y"));
					$('#endDate').val(flatpickr.formatDate(selectedDates[1], "m-d-Y"));
				}
			}
		});

		// Handle reset button
		$('#reset_btn').on('click', function () {
			$('#startDate, #endDate').val('');
			$('#property, #customer').val('');
			$('#dateRange').val('');
			window.location.href = '{{ url("admin/invoices") }}'; // Adjust URL to point to invoices
		});
	});
</script>



<script src="{{ asset('backend/js/reset-btn.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ECharts/echarts.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ECharts/echarts-gl.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ECharts/ecStat.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ECharts/dataTool.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ECharts/china.js') }}"></script>
<script src="{{ asset('backend/plugins/ECharts/world.js') }}"></script>
<script src="{{ asset('backend/plugins/ECharts/simplex.js') }}"></script>
<script src="{{ asset('backend/js/report.min.js') }}"></script>
@endsection