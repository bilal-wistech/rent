<div class="card card-info box_info mb-3">
    <div class="card-body bg-white">
        <h5 class="all_settings f-18 mt-1 mb-3 text-dark">Property Settings</h5>
        <?php
        $requestUri = request()->segment(4);
        ?>
        <ul class="nav nav-tabs flex-column enhanced-nav" role="tablist">
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
        </ul>
    </div>
</div>

<style>
/* Enhancing the appearance of the sidebar navigation */
.card-body {
    padding: 1.5rem;
    background-color: #f8f9fa;
    border-radius: 8px;
}

.all_settings {
    font-weight: bold;
    color: #007bff;
}

.enhanced-nav {
    font-size: 0.95rem;
    list-style-type: none;
    padding: 0;
}

.enhanced-nav .nav-item {
    margin-bottom: 8px;
}

.enhanced-nav .nav-link {
    display: block;
    padding: 10px 15px;
    border-radius: 4px;
    color: #495057;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    transition: all 0.3s ease;
}

.enhanced-nav .nav-link.active {
    background-color: #007bff;
    color: #ffffff;
    border-color: #007bff;
}

.enhanced-nav .nav-link:hover {
    background-color: #e9ecef;
    color: #007bff;
    text-decoration: none;
}

.enhanced-nav .nav-link:active {
    box-shadow: inset 0px 2px 5px rgba(0, 0, 0, 0.1);
}
</style>
