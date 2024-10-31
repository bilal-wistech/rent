<div class="card card-info box_info mb-3">
    <div class="card-body">
        <h4 class="all_settings f-18 mt-1 text-center">Property Settings</h4>
        <?php
        $requestUri = request()->segment(4);
        ?>
        <ul class="nav nav-tabs flex-column" role="tablist" style="font-size: 0.85rem;">
            <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'basics') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/basics") }}' data-group="profile">Basics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'description' || $requestUri == 'details') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/description") }}' data-group="profile">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'location') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/location") }}' data-group="profile">Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'amenities') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/amenities") }}' data-group="profile">Amenities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'photos') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/photos") }}' data-group="profile">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'pricing') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/pricing") }}' data-group="profile">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'booking') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/booking") }}' data-group="profile">Booking</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link {{ ($requestUri == 'calender') ? 'active' : '' }}" href='{{ url("admin/listing/$result->id/calender") }}' data-group="profile">Calendar</a>
            </li> -->
        </ul>
    </div>
</div>
