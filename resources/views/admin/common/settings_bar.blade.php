<div class="card card-info box_info">
    <div class="card-body">
        <p class="all_settings mb-4 f-20 text-bold">Manage Settings</p>
        <ul class="nav navbar-pills nav-tabs nav-stacked no-margin d-flex flex-column f-14" role="tablist">
            @if (Permission::has_permission(Auth::guard('admin')->user()->id, 'general_setting'))
                <li>
                    <a href="{{ url('admin/settings') }}" class="{{ (Route::current()->uri() == 'admin/settings') ? 'active' : '' }}">
                        General
                    </a>
                </li>
            @endif

            @if (Permission::has_permission(Auth::guard('admin')->user()->id, 'preference'))
                <li>
                    <a href="{{ url('admin/settings/preferences') }}" class="{{ (Route::current()->uri() == 'admin/settings/preferences') ? 'active' : '' }}">
                        Preferences
                    </a>
                </li>
            @endif

            @if (Permission::has_permission(Auth::guard('admin')->user()->id, 'manage_sms'))
                <li>
                    <a href="{{ url('admin/settings/sms') }}" class="{{ (Route::current()->uri() == 'admin/settings/sms') ? 'active' : '' }}">
                        SMS Settings
                    </a>
                </li>
            @endif

            @if (Permission::has_permission(Auth::guard('admin')->user()->id, 'google_recaptcha'))
                <li>
                    <a href="{{ url('admin/settings/google-recaptcha-api-information') }}" class="{{ (Route::current()->uri() == 'admin/settings/google-recaptcha-api-information') ? 'active' : '' }}">
                        Google reCaptcha
                    </a>
                </li>
            @endif

            @if (Permission::has_permission(Auth::guard('admin')->user()->id, 'manage_banners'))
                <li>
                    <a href="{{ url('admin/settings/banners') }}" class="{{ (Route::current()->uri() == 'admin/settings/banners' || Route::current()->uri() == 'admin/settings/add-banners' || Route::current()->uri() == 'admin/settings/edit-banners/{id}') ? 'active' : '' }}">
                        Banners
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'starting_cities_settings'))
                <li>
                    <a href="{{ url('admin/settings/starting-cities') }}" class="{{ (Route::current()->uri() == 'admin/settings/starting-cities' || Route::current()->uri() == 'admin/settings/add-starting-cities' || Route::current()->uri() == 'admin/settings/edit-starting-cities/{id}') ? 'active' : '' }}">
                        Starting Cities
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_property_type'))
                <li>
                    <a href="{{ url('admin/settings/property-type') }}" class="{{ (Route::current()->uri() == 'admin/settings/property-type' || Route::current()->uri() == 'admin/settings/add-property-type' || Route::current()->uri() == 'admin/settings/edit-property-type/{id}') ? 'active' : '' }}">
                        Property Type
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'space_type_setting'))
                <li>
                    <a href="{{ url('admin/settings/space-type') }}" class="{{ (Route::current()->uri() == 'admin/settings/space-type' || Route::current()->uri() == 'admin/settings/add-space-type' || Route::current()->uri() == 'admin/settings/edit-space-type/{id}') ? 'active' : '' }}">
                        Space Type
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_bed_type'))
                <li>
                    <a href="{{ url('admin/settings/bed-type') }}" class="{{ (Route::current()->uri() == 'admin/settings/bed-type' || Route::current()->uri() == 'admin/settings/add-bed-type' || Route::current()->uri() == 'admin/settings/edit-bed-type/{id}') ? 'active' : '' }}">
                        Bed Type
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_currency'))
                <li>
                    <a href="{{ url('admin/settings/currency') }}" class="{{ (Route::current()->uri() == 'admin/settings/currency' || Route::current()->uri() == 'admin/settings/add-currency' || Route::current()->uri() == 'admin/settings/edit-currency/{id}') ? 'active' : '' }}">
                        Currency
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_country'))
                <li>
                    <a href="{{ url('admin/settings/country') }}" class="{{ (Route::current()->uri() == 'admin/settings/country' || Route::current()->uri() == 'admin/settings/add-country' || Route::current()->uri() == 'admin/settings/edit-country/{id}') ? 'active' : '' }}">
                        Country
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_amenities_type'))
                <li>
                    <a href="{{ url('admin/settings/amenities-type') }}" class="{{ (Route::current()->uri() == 'admin/settings/amenities-type' || Route::current()->uri() == 'admin/settings/add-amenities-type' || Route::current()->uri() == 'admin/settings/edit-amenities-type/{id}') ? 'active' : '' }}">
                        Amenities Type
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'email_settings'))
                <li>
                    <a href="{{ url('admin/settings/email') }}" class="{{ (Route::current()->uri() == 'admin/settings/email') ? 'active' : '' }}">
                        Email Settings
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_fees'))
                <li>
                    <a href="{{ url('admin/settings/fees') }}" class="{{ (Route::current()->uri() == 'admin/settings/fees') ? 'active' : '' }}">
                        Fees
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_language'))
                <li>
                    <a href="{{ url('admin/settings/language') }}" class="{{ (Route::current()->uri() == 'admin/settings/language' || Route::current()->uri() == 'admin/settings/add-language' || Route::current()->uri() == 'admin/settings/edit-language/{id}') ? 'active' : '' }}">
                        Language
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_metas'))
                <li>
                    <a href="{{ url('admin/settings/metas') }}" class="{{ (Route::current()->uri() == 'admin/settings/metas' || Route::current()->uri() == 'admin/settings/add-metas' || Route::current()->uri() == 'admin/settings/edit-metas/{id}') ? 'active' : '' }}">
                        Metas
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_privacy_policy'))
                <li>
                    <a href="{{ url('admin/settings/privacy-policy') }}" class="{{ (Route::current()->uri() == 'admin/settings/privacy-policy' || Route::current()->uri() == 'admin/settings/add-privacy-policy' || Route::current()->uri() == 'admin/settings/edit-privacy-policy/{id}') ? 'active' : '' }}">
                        Privacy Policy
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_terms_conditions'))
                <li>
                    <a href="{{ url('admin/settings/terms-conditions') }}" class="{{ (Route::current()->uri() == 'admin/settings/terms-conditions' || Route::current()->uri() == 'admin/settings/add-terms-conditions' || Route::current()->uri() == 'admin/settings/edit-terms-conditions/{id}') ? 'active' : '' }}">
                        Terms & Conditions
                    </a>
                </li>
            @endif

            @if (Helpers::has_permission(Auth::guard('admin')->user()->id, 'manage_others'))
                <li>
                    <a href="{{ url('admin/settings/others') }}" class="{{ (Route::current()->uri() == 'admin/settings/others' || Route::current()->uri() == 'admin/settings/add-others' || Route::current()->uri() == 'admin/settings/edit-others/{id}') ? 'active' : '' }}">
                        Others
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>

<style>
    .nav {
        padding: 0;
        list-style-type: none;
    }

    .nav li {
        margin: 5px 0;
    }

    .nav li a {
        padding: 10px 15px;
        text-decoration: none;
        color: #333; /* Link color */
        position: relative;
        display: inline-block; /* Allows positioning for the underline */
    }

    .nav li a.active {
        color: #007bff; /* Active link color */
    }

    .nav li a.active::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: -5px; /* Position the underline below the text */
        height: 2px; /* Thickness of the underline */
        background-color: #007bff; /* Underline color */
    }

    .nav li a:hover {
        color: #007bff; /* Hover text color */
    }

    .nav li a:hover::after {
        background-color: #0056b3; /* Darker underline on hover */
    }

    .all_settings {
        font-size: 1.5rem; /* Section title size */
        font-weight: bold;
        color: #333; /* Title color */
    }
</style>
