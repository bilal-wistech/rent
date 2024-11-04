@extends('admin.template')

@section('main')

<!--begin::Wrapper-->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

  <!--begin::Main-->
  <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
      <div id="kt_app_content" class="app-content flex-column-fluid">

        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">


          <div class="row mb-5">
            <!-- Total Users -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-white shadow"
                style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%); border-radius: 12px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h3 class="mb-0">{{ $total_users_count }}</h3>
                    <p class="mb-0">Total Users</p>
                  </div>
                  <i class="fa fa-users fa-3x"></i>
                </div>
                <div class="card-footer text-white" style="background-color: rgba(0, 0, 0, 0.1);">
                  <a href="{{ url('admin/customers') }}" class="text-white stretched-link">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Total Properties -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-white shadow"
                style="background: linear-gradient(135deg, #56ccf2 0%, #2f80ed 100%); border-radius: 12px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h3 class="mb-0">{{ $total_property_count }}</h3>
                    <p class="mb-0">Total Properties</p>
                  </div>
                  <i class="fa fa-building fa-3x"></i>
                </div>
                <div class="card-footer text-white" style="background-color: rgba(0, 0, 0, 0.1);">
                  <a href="{{ url('admin/properties') }}" class="text-white stretched-link">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Total Reservations -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-white shadow"
                style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); border-radius: 12px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h3 class="mb-0">{{ $total_reservations_count }}</h3>
                    <p class="mb-0">Total Reservations</p>
                  </div>
                  <i class="fa fa-calendar-alt fa-3x"></i>
                </div>
                <div class="card-footer text-white" style="background-color: rgba(0, 0, 0, 0.1);">
                  <a href="{{ url('admin/bookings') }}" class="text-white stretched-link">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Today Users -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-white shadow"
                style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); border-radius: 12px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h3 class="mb-0">{{ $today_users_count }}</h3>
                    <p class="mb-0">Today Users</p>
                  </div>
                  <i class="fa fa-user-plus fa-3x"></i>
                </div>
                <div class="card-footer text-white" style="background-color: rgba(0, 0, 0, 0.1);">
                  <a href="{{ url('admin/customers') }}" class="text-white stretched-link">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Today Properties -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-white shadow"
                style="background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%); border-radius: 12px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h3 class="mb-0">{{ $today_property_count }}</h3>
                    <p class="mb-0">Today Properties</p>
                  </div>
                  <i class="fa fa-building fa-3x"></i>
                </div>
                <div class="card-footer text-white" style="background-color: rgba(0, 0, 0, 0.1);">
                  <a href="{{ url('admin/properties') }}" class="text-white stretched-link">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Today Reservations -->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card text-white shadow"
                style="background: linear-gradient(135deg, #96fbc4 0%, #f9f586 100%); border-radius: 12px;">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                    <h3 class="mb-0">{{ $today_reservations_count }}</h3>
                    <p class="mb-0">Today Reservations</p>
                  </div>
                  <i class="fa fa-plane fa-3x"></i>
                </div>
                <div class="card-footer text-white" style="background-color: rgba(0, 0, 0, 0.1);">
                  <a href="{{ url('admin/bookings') }}" class="text-white stretched-link">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>



          <!-- Properties and Bookings Cards -->
          <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-xl-12">
              <!-- Vacant Properties -->
              <div class="card card-flush h-md-100">
                <div class="card-header pt-7">
                  <h3>Vacant Properties</h3>
                </div>
                <div class="card-body pt-6">
                  <div class="table-responsive" id="property-content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                          <th>Property</th>
                          <th>Vacant Since</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($vacantProperties as $item)
              <tr>
                <td>{{ $item['propertiesName'] }}</td>
                <td>{{ $item['vacant_since'] }}</td>
              </tr>
            @endforeach
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-4">
                      {{ $vacantProperties->links('vendor.pagination.bootstrap-4') }}
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-12">
              <!-- Latest Properties -->
              <div class="card card-flush h-md-100">
                <div class="card-header pt-7">
                  <h3>Latest Properties</h3>
                </div>
                <div class="card-body pt-6">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Host Name</th>
                          <th>Space Type</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($propertiesList as $property)
              <tr>
                <td>
                <a href="{{ url('admin/listing/' . $property->properties_id . '/basics') }}">
                  {{ $property->property_name }}
                </a>
                </td>
                <td>
                <a href="{{ url('admin/edit-customer/' . $property->host_id) }}">
                  {{ $property->first_name . ' ' . $property->last_name }}
                </a>
                </td>
                <td>{{ $property->space_type }}</td>
                <td>{{ dateFormat($property->property_created_at) }}</td>
                <td>{{ $property->property_status }}</td>
              </tr>
            @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-5 g-xl-10">
            <div class="col-xl-12">
              <!-- Latest Bookings -->
              <div class="card card-flush h-md-100">
                <div class="card-header pt-7">
                  <h3>Latest Bookings</h3>
                </div>
                <div class="card-body pt-6">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Host Name</th>
                          <th>Guest Name</th>
                          <th>Property Name</th>
                          <th>Total Amount</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bookingList as $booking)
              <tr>
                <td>
                <a href="{{ url('admin/bookings/detail/' . $booking->id) }}">{{ $booking->host_name }}</a>
                </td>
                <td>
                <a
                  href="{{ url('admin/edit-customer/' . $booking->user_id) }}">{{ $booking->guest_name }}</a>
                </td>
                <td>{{ $booking->property_name }}</td>
                <td>{{ $booking->total_amount }}</td>
                <td>{{ dateFormat($booking->created_at) }}</td>
                <td>{{ $booking->status }}</td>
              </tr>
            @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--end::Content container-->
      </div>
    </div>
    <!--end::Content wrapper-->

  </div>
  <!--end::Main-->

</div>
<!--end::Wrapper-->

@endsection