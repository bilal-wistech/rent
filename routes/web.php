<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\EmergencyContactController;
use App\Http\Controllers\Admin\PricingTypeController;
use App\Http\Controllers\Admin\SectionContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EnquiryMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('enable-debugger', 'HomeController@activateDebugger');

Route::match(array('GET', 'POST'), 'create-users-wallet', 'HomeController@walletUser');



//cron job
Route::get('cron', 'CronController@index');
Route::get('import', 'CronController@importDump');
Route::get('cron/ical-synchronization', 'CronController@iCalendarSynchronization');

//user can view it anytime with or without logged in
Route::group(['middleware' => ['locale']], function () {
    Route::get('/', 'HomeController@index');
    Route::post('search/result', 'SearchController@searchResult')->name('suggestions');
    Route::match(array('GET', 'POST'), 'search', 'SearchController@index')->name('search.result');
    Route::match(array('GET', 'POST'), 'properties/{slug}', 'PropertyController@single')->name('property.single');
    Route::match(array('GET', 'POST'), 'property/get-price', 'PropertyController@getPrice');
    Route::get('set-slug/', 'PropertyController@set_slug');
    Route::get('signup', 'LoginController@signup');
    Route::get('unauthentication-favourite/{id}', 'PropertyController@unauthenticationFavourite');
    Route::post('/checkUser/check', 'LoginController@check')->name('checkUser.check');
});


Route::post('set_session', 'HomeController@setSession');

//only can view if admin is logged in
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['guest:admin']], function () {
    Route::get('/', function () {
        return Redirect::to('admin/dashboard');
    });

    // routes/api.php or web.php

    Route::resource('section-contents', SectionContentController::class);

    Route::get('cache-clear', 'AdminController@cacheClear');
    Route::get('addons', [AddonController::class, 'index'])->name('addon.index');
    Route::match(['GET', 'POST'], 'settings/sms', 'SettingsController@smsSettings');

    Route::match(array('GET', 'POST'), 'profile', 'AdminController@profile');
    Route::get('logout', 'AdminController@logout');
    Route::get('dashboard', 'DashboardController@index');
    Route::get('customers', 'CustomerController@index')->middleware(['permission:customers']);

    Route::resource('document', DocumentController::class);
    Route::get('/document/{id}', [DocumentController::class, 'show'])->name('admin.document.show');

    Route::resource('emergencycontacts', EmergencyContactController::class);
    Route::resource('city', CityController::class);
    Route::resource('area', AreaController::class);
    Route::post('admin/area/toggle-show-on-front/{id}', [AreaController::class, 'toggleShowOnFront'])
        ->name('area.toggleShowOnFront');

    Route::get('city/add/{countryId}', [CityController::class, 'add'])->name('city.add');
    Route::get('area/add/{cityId}', [AreaController::class, 'add'])->name('area.add');
    Route::post('admin/add-ajax-city', [CityController::class, 'addAjax'])->name('city.addAjax');
    Route::post('admin/add-ajax-area', [AreaController::class, 'addAjax'])->name('area.addAjax');
    Route::post('admin/add-ajax-building', [BuildingController::class, 'addAjax'])->name('building.addAjax');
    Route::get('admin/building/view/{area}', [BuildingController::class, 'view'])->name('building.view');
    Route::get('admin/building/edit/{id}', [BuildingController::class, 'edit'])->name('building.edit');
    Route::put('admin/building/update/{id}', [BuildingController::class, 'update'])->name('building.update');
    Route::delete('admin/building/delete/{id}', [BuildingController::class, 'destroy'])->name('building.destroy');
    Route::get('admin/building/add/{areaId}', [BuildingController::class, 'add'])->name('building.add');
    Route::post('admin/building/store', [BuildingController::class, 'store'])->name('building.store');
    // PricingType routes
    Route::get('pricing-type', [PricingTypeController::class, 'index'])->name('pricing-type.index');
    Route::get('pricing-type/add', [PricingTypeController::class, 'add'])->name('pricing-type.add');
    Route::post('pricing-type/store', [PricingTypeController::class, 'store'])->name('pricing-type.store');
    Route::get('pricing-type/edit/{id}', [PricingTypeController::class, 'edit'])->name('pricing-type.edit');
    Route::put('pricing-type/update/{id}', [PricingTypeController::class, 'update'])->name('pricing-type.update');
    Route::delete('pricing-type/delete/{id}', [PricingTypeController::class, 'destroy'])->name('pricing-type.destroy');

    //Enquiry
    Route::get('enquiries', [EnquiryMessageController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/{id}', [EnquiryMessageController::class, 'show'])->name('enquiries.view');

    Route::get('customers/customer_search', 'CustomerController@searchCustomer')->middleware(['permission:customers']);
    Route::post('add-ajax-customer', 'CustomerController@ajaxCustomerAdd')->middleware(['permission:add_customer']);
    Route::match(array('GET', 'POST'), 'add-customer', 'CustomerController@add')->middleware(['permission:add_customer']);
    Route::get('delete-customer/{id}', 'CustomerController@delete')->middleware(['permission:delete_customer']);

    //service
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/{id}', [ServiceController::class, 'show'])->name('services.show');
    Route::group(['middleware' => 'permission:edit_customer'], function () {
        Route::match(array('GET', 'POST'), 'edit-customer/{id}', 'CustomerController@update');
        Route::get('customer/properties/{id}', 'CustomerController@customerProperties');
        Route::get('customer/bookings/{id}', 'CustomerController@customerBookings');
        Route::post('customer/bookings/property_search', 'BookingsController@searchProperty');
        Route::get('customer/payouts/{id}', 'CustomerController@customerPayouts');
        Route::get('customer/payment-methods/{id}', 'CustomerController@paymentMethods');
        Route::get('customer/wallet/{id}', 'CustomerController@customerWallet');

        Route::post('currency-symbol', 'PropertiesController@currencySymbol');
        Route::get('customer/properties/{id}/property_list_csv', 'PropertiesController@propertyCsv');
        Route::get('customer/properties/{id}/property_list_pdf', 'PropertiesController@propertyPdf');

        Route::get('customer/bookings/{id}/booking_list_csv', 'BookingsController@bookingCsv');
        Route::get('customer/bookings/{id}/booking_list_pdf', 'BookingsController@bookingPdf');

        Route::get('customer/payouts/{id}/payouts_list_pdf', 'PayoutsController@payoutsPdf');
        Route::get('customer/payouts/{id}/payouts_list_csv', 'PayoutsController@payoutsCsv');

        Route::get('customer/customer_list_csv', 'CustomerController@customerCsv');
        Route::get('customer/customer_list_pdf', 'CustomerController@customerPdf');
    });

    Route::group(['middleware' => 'permission:manage_messages'], function () {
        Route::get('messages', 'AdminController@customerMessage');
        Route::match(array('GET', 'POST'), 'delete-message/{id}', 'AdminController@deleteMessage');
        Route::match(array('GET', 'POST'), 'send-message-email/{id}', 'AdminController@sendEmail');
        Route::match(['get', 'post'], 'upload_image', 'AdminController@uploadImage')->name('upload');
        Route::get('messaging/host/{id}', 'AdminController@hostMessage');
        Route::post('reply/{id}', 'AdminController@reply');
    });

    Route::get('properties', 'PropertiesController@index')->middleware(['permission:properties']);
    Route::match(array('GET', 'POST'), 'add-properties', 'PropertiesController@add')->middleware(['permission:add_properties']);
    Route::get('properties/cities-by-country/{country}', 'PropertiesController@getCitiesByCountry')->name('cities-by-country');
    Route::get('properties/get-areas/{country}/{city}', 'PropertiesController@getAreas')->name('get-areas');
    Route::get('properties/get-buildings/{country}/{city}/{area}', 'PropertiesController@getbuildings')->name('get-buildings');
    Route::get('properties/property_list_csv', 'PropertiesController@propertyCsv');
    Route::get('properties/property_list_pdf', 'PropertiesController@propertyPdf');

    Route::group(['middleware' => 'permission:edit_properties'], function () {
        Route::match(array('GET', 'POST'), 'listing/{id}/photo_message', 'PropertiesController@photoMessage');
        Route::match(array('GET', 'POST'), 'listing/{id}/photo_delete', 'PropertiesController@photoDelete');
        Route::match(array('GET', 'POST'), 'listing/{id}/update_status', 'PropertiesController@update_status');
        Route::match(array('POST'), 'listing/photo/make_default_photo', 'PropertiesController@makeDefaultPhoto');
        Route::match(array('POST'), 'listing/photo/make_photo_serial', 'PropertiesController@makePhotoSerial');
        Route::match(array('GET', 'POST'), 'listing/{id}/{step}', 'PropertiesController@listing')->where(['id' => '[0-9]+', 'page' => 'basics|description|location|amenities|photos|pricing|calendar|details|booking']);
    });

    Route::post('ajax-calender/{id}', [CalendarController::class, 'calenderJson']);
    Route::post('ajax-calender-price/{id}', [CalendarController::class, 'calenderPriceSet']);
    //iCalender routes for admin
    Route::post('ajax-icalender-import/{id}', 'CalendarController@icalendarImport');
    Route::get('icalendar/synchronization/{id}', 'CalendarController@icalendarSynchronization');
    //iCalender routes end
    Route::match(array('GET', 'POST'), 'edit_property/{id}', 'PropertiesController@update')->middleware(['permission:edit_properties']);
    Route::get('delete-property/{id}', 'PropertiesController@delete')->middleware(['permission:delete_property']);
    Route::get('show-pricing/{id}', 'PropertiesController@showPricing');
    Route::match(['get', 'post'], 'update-list-status/{id}', 'PropertiesController@changeListStatus')->name('admin.update-list-status');
    Route::get('bookings', 'BookingsController@index')->middleware(['permission:manage_bookings']);
    Route::get('bookings/property_search', 'BookingsController@searchProperty')->middleware(['permission:manage_bookings']);
    Route::get('bookings/customer_search', 'BookingsController@searchCustomer')->middleware(['permission:manage_bookings']);
    //booking details
    Route::get('bookings/detail/{id}', 'BookingsController@details')->middleware(['permission:manage_bookings']);
    Route::get('bookings/edit/{req}/{id}', 'BookingsController@updateBookingStatus')->middleware(['permission:manage_bookings']);
    Route::post('bookings/pay', 'BookingsController@pay')->middleware(['permission:manage_bookings']);
    Route::get('booking/need_pay_account/{id}/{type}', 'BookingsController@needPayAccount');
    Route::get('booking/booking_list_csv', 'BookingsController@bookingCsv');
    Route::get('booking/booking_list_pdf', 'BookingsController@bookingPdf');
    Route::get('invoices', 'InvoiceController@index')->middleware(['permission:manage_invoices'])->name('admin.invoices.index');
    Route::get('invoices/show/{id}', 'InvoiceController@show')->middleware(['permission:manage_invoices'])->name('admin.invoices.show');
    Route::get('payouts', 'PayoutsController@index')->middleware(['permission:view_payouts'])->name('admin.payouts');
    Route::post('invoices/invoice/{id}', 'InvoiceController@getInvoiceByUserId');

    //Admin Payout routes
    Route::get('payouts/create', 'PayoutsController@create')->name('payouts.create');
    Route::post('payouts/create/success', 'PayoutsController@asuccess')->name('payouts.asuccess');
    Route::post('payouts/update/{id}', 'PayoutsController@updatePayout')->name('payouts.update');
    Route::match(array('GET', 'POST'), 'payouts/edit/{id}', 'PayoutsController@edit');
    Route::match(array('GET', 'POST'), 'payouts/delete/{id}', 'PayoutsController@delete');
    Route::get('payouts/details/{id}', 'PayoutsController@details');
    Route::get('payouts/payouts_list_pdf', 'PayoutsController@payoutsPdf');
    Route::get('payouts/payouts_list_csv', 'PayoutsController@payoutsCsv');
    Route::group(['middleware' => 'permission:manage_reviews'], function () {
        Route::get('reviews', 'ReviewsController@index');
        Route::match(array('GET', 'POST'), 'edit_review/{id}', 'ReviewsController@edit');
        Route::get('reviews/review_search', 'ReviewsController@searchReview');
        Route::get('reviews/review_list_csv', 'ReviewsController@reviewCsv');
        Route::get('reviews/review_list_pdf', 'ReviewsController@reviewPdf');
    });

    // Route::get('reports', 'ReportsController@index')->middleware(['permission:manage_reports']);

    // For Reporting
    Route::group(['middleware' => 'permission:view_reports'], function () {
        Route::get('sales-report', 'ReportsController@salesReports');
        Route::get('sales-analysis', 'ReportsController@salesAnalysis');
        Route::get('reports/property-search', 'ReportsController@searchProperty');
        Route::get('overview-stats', 'ReportsController@overviewStats');
    });

    Route::group(['middleware' => 'permission:manage_amenities'], function () {
        Route::get('amenities', 'AmenitiesController@index');
        Route::match(array('GET', 'POST'), 'add-amenities', 'AmenitiesController@add');
        Route::match(array('GET', 'POST'), 'edit-amenities/{id}', 'AmenitiesController@update');
        Route::get('delete-amenities/{id}', 'AmenitiesController@delete');
    });

    Route::group(['middleware' => 'permission:manage_pages'], function () {
        Route::get('pages', 'PagesController@index');
        Route::match(array('GET', 'POST'), 'add-page', 'PagesController@add');
        Route::match(array('GET', 'POST'), 'edit-page/{id}', 'PagesController@update');
        Route::get('delete-page/{id}', 'PagesController@delete');
    });


    Route::group(['middleware' => 'permission:manage_admin'], function () {
        Route::get('admin-users', 'AdminController@index');
        Route::match(array('GET', 'POST'), 'add-admin', 'AdminController@add');
        Route::match(array('GET', 'POST'), 'edit-admin/{id}', 'AdminController@update');
        Route::match(array('GET', 'POST'), 'delete-admin/{id}', 'AdminController@delete');
    });

    Route::group(['middleware' => 'permission:general_setting'], function () {
        Route::match(array('GET', 'POST'), 'settings', 'SettingsController@general')->middleware(['permission:general_setting']);
        Route::match(array('GET', 'POST'), 'settings/preferences', 'SettingsController@preferences')->middleware(['permission:preference']);
        Route::get('getreCaptchaCredential', 'SettingsController@getreCaptchaCredential');
        Route::post('settings/delete_logo', 'SettingsController@deleteLogo');
        Route::post('settings/delete_favicon', 'SettingsController@deleteFavIcon');
        Route::match(array('GET', 'POST'), 'settings/fees', 'SettingsController@fees')->middleware(['permission:manage_fees']);
        Route::group(['middleware' => 'permission:manage_banners'], function () {
            Route::get('settings/banners', 'BannersController@index');
            Route::match(array('GET', 'POST'), 'settings/add-banners', 'BannersController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-banners/{id}', 'BannersController@update');
            Route::get('settings/delete-banners/{id}', 'BannersController@delete');
        });

        Route::group(['middleware' => 'permission:starting_cities_settings'], function () {
            Route::get('settings/starting-cities', 'StartingCitiesController@index');
            Route::match(array('GET', 'POST'), 'settings/add-starting-cities', 'StartingCitiesController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-starting-cities/{id}', 'StartingCitiesController@update');
            Route::get('settings/delete-starting-cities/{id}', 'StartingCitiesController@delete');
        });

        Route::group(['middleware' => 'permission:manage_property_type'], function () {
            Route::get('settings/property-type', 'PropertyTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-property-type', 'PropertyTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-property-type/{id}', 'PropertyTypeController@update');
            Route::get('settings/delete-property-type/{id}', 'PropertyTypeController@delete');
        });

        Route::group(['middleware' => 'permission:space_type_setting'], function () {
            Route::get('settings/space-type', 'SpaceTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-space-type', 'SpaceTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-space-type/{id}', 'SpaceTypeController@update');
            Route::get('settings/delete-space-type/{id}', 'SpaceTypeController@delete');
        });

        Route::group(['middleware' => 'permission:manage_bed_type'], function () {
            Route::get('settings/bed-type', 'BedTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-bed-type', 'BedTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-bed-type/{id}', 'BedTypeController@update');
            Route::get('settings/delete-bed-type/{id}', 'BedTypeController@delete');
        });

        Route::group(['middleware' => 'permission:manage_currency'], function () {
            Route::get('settings/currency', 'CurrencyController@index');
            Route::match(array('GET', 'POST'), 'settings/add-currency', 'CurrencyController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-currency/{id}', 'CurrencyController@update');
            Route::get('settings/delete-currency/{id}', 'CurrencyController@delete');
        });

        Route::group(['middleware' => 'permission:manage_country'], function () {
            Route::get('settings/country', 'CountryController@index');
            Route::match(array('GET', 'POST'), 'settings/add-country', 'CountryController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-country/{id}', 'CountryController@update');
            Route::get('settings/delete-country/{id}', 'CountryController@delete');
        });

        Route::group(['middleware' => 'permission:manage_amenities_type'], function () {
            Route::get('settings/amenities-type', 'AmenitiesTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-amenities-type', 'AmenitiesTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-amenities-type/{id}', 'AmenitiesTypeController@update');
            Route::get('settings/delete-amenities-type/{id}', 'AmenitiesTypeController@delete');
        });

        Route::match(array('GET', 'POST'), 'settings/email', 'SettingsController@email')->middleware(['permission:email_settings']);



        Route::group(['middleware' => 'permission:manage_language'], function () {
            Route::get('settings/language', 'LanguageController@index');
            Route::match(array('GET', 'POST'), 'settings/add-language', 'LanguageController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-language/{id}', 'LanguageController@update');
            Route::get('settings/delete-language/{id}', 'LanguageController@delete');
        });

        Route::match(array('GET', 'POST'), 'settings/fees', 'SettingsController@fees')->middleware(['permission:manage_fees']);

        Route::group(['middleware' => 'permission:manage_metas'], function () {
            Route::get('settings/metas', 'MetasController@index');
            Route::match(array('GET', 'POST'), 'settings/edit_meta/{id}', 'MetasController@update');
        });

        Route::match(array('GET', 'POST'), 'settings/api-informations', 'SettingsController@apiInformations')->middleware(['permission:api_informations']);
        Route::match(array('GET', 'POST'), 'settings/google-recaptcha-api-information', 'SettingsController@googleRecaptchaInformation')->middleware(['permission:google_recaptcha']);
        Route::match(array('GET', 'POST'), 'settings/payment-methods', 'SettingsController@paymentMethods')->middleware(['permission:payment_settings']);
        Route::match(array('GET', 'POST'), 'settings/bank/add', 'BankController@addBank')->middleware(['permission:payment_settings']);
        Route::match(array('GET', 'POST'), 'settings/bank/edit/{bank}', 'BankController@editBank')->middleware(['permission:payment_settings']);
        Route::get('settings/bank/{bank}', 'BankController@show')->middleware(['permission:payment_settings']);
        Route::get('settings/bank/delete/{bank}', 'BankController@deleteBank')->middleware(['permission:payment_settings']);
        Route::match(array('GET', 'POST'), 'settings/social-links', 'SettingsController@socialLinks')->middleware(['permission:social_links']);

        Route::match(array('GET', 'POST'), 'settings/social-logins', 'SettingsController@socialLogin')->middleware(['permission:social_logins']);
        ;

        Route::group(['middleware' => 'permission:manage_roles'], function () {
            Route::get('settings/roles', 'RolesController@index');
            Route::match(array('GET', 'POST'), 'settings/add-role', 'RolesController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-role/{id}', 'RolesController@update');
            Route::get('settings/delete-role/{id}', 'RolesController@delete');
        });

        Route::group(['middleware' => 'permission:database_backup'], function () {
            Route::get('settings/backup', 'BackupController@index');
            Route::get('backup/save', 'BackupController@add');
            Route::get('backup/download/{id}', 'BackupController@download');
        });

        Route::group(['middleware' => 'permission:manage_email_template'], function () {
            Route::get('email-template/{id}', 'EmailTemplateController@index');
            Route::post('email-template/{id}', 'EmailTemplateController@update');
        });

        Route::group(['middleware' => 'permission:manage_testimonial'], function () {
            Route::get('testimonials', 'TestimonialController@index');
            Route::match(array('GET', 'POST'), 'add-testimonials', 'TestimonialController@add');
            Route::match(array('GET', 'POST'), 'edit-testimonials/{id}', 'TestimonialController@update');
            Route::get('delete-testimonials/{id}', 'TestimonialController@delete');
        });
    });
    Route::match(array('GET', 'POST'), 'edit_property/{id}', 'PropertiesController@update')->middleware(['permission:edit_properties']);
    Route::get('delete-property/{id}', 'PropertiesController@delete')->middleware(['permission:delete_property']);
    Route::get('bookings', 'BookingsController@index')->middleware(['permission:manage_bookings'])->name('admin.bookings.index');
    Route::get('bookings/create', 'BookingsController@create')->middleware(['permission:manage_bookings'])->name('admin.bookings.create');
    Route::get('bookings/calander', 'BookingsController@calander')->middleware(['permission:manage_bookings'])->name('admin.bookings.calander');
    Route::get('bookings/get-number-of-guests/{property_id}', 'BookingsController@getNumberofGuests')->middleware(['permission:manage_bookings'])->name('admin.bookings.get-number-of-guests');
    Route::post('bookings/check-booking-exists', 'BookingsController@checkExistingPropertyBooking')->middleware(['permission:manage_bookings'])->name('admin.bookings.check-booking-exists');
    Route::get('bookings/get-property-dates/{property_id}', 'BookingsController@getPropertyDates')->middleware(['permission:manage_bookings'])->name('admin.bookings.get-property-dates');

    Route::get('calculate-booking-price', 'BookingsController@calculateBookingPrice')->middleware(['permission:manage_bookings'])->name('calculate-booking-price');
    Route::get('payment-receipts', 'PaymentReceiptController@index')->middleware(['permission:manage_payment_receipts'])->name('payment-receipts.index');
    Route::get('payment-receipts/create', 'PaymentReceiptController@create')->middleware(['permission:manage_payment_receipts'])->name('payment-receipts.create');
    Route::post('payment-receipts/store', 'PaymentReceiptController@store')->middleware(['permission:manage_payment_receipts'])->name('payment-receipts.store');
    Route::get('payment-receipts/edit/{payment_receipt}', 'PaymentReceiptController@edit')->middleware(['permission:manage_payment_receipts'])->name('payment-receipts.edit');
    Route::put('payment-receipts/update/{payment_receipt}', 'PaymentReceiptController@update')->middleware(['permission:manage_payment_receipts'])->name('payment-receipts.update');
    Route::get('payment-receipts/get-booking-details/{booking_id}', 'PaymentReceiptController@getBookingDetails')->middleware(['permission:manage_payment_receipts'])->name('payment-receipts.get-booking-details');

    Route::match(['post', 'put'], 'bookings/store', 'BookingsController@store')->middleware(['permission:manage_bookings'])->name('admin.bookings.store');
    Route::get('bookings/edit/{id}', 'BookingsController@edit')->middleware(['permission:manage_bookings'])->name('admin.bookings.edit');

    Route::put('bookings/update/{id}', 'BookingsController@update')->middleware(['permission:manage_bookings'])->name('admin.bookings.update');

    Route::get('bookings/property_search', 'BookingsController@searchProperty')->middleware(['permission:manage_bookings']);
    Route::get('bookings/form_property_search', 'BookingsController@searchFormProperty')->middleware(['permission:manage_bookings'])->name('admin.bookings.form_property_search');
    Route::get('bookings/customer_search', 'BookingsController@searchCustomer')->middleware(['permission:manage_bookings'])->name('admin.bookings.customer_search');
    Route::get('bookings/form_customer_search', 'BookingsController@searchFormCustomer')->middleware(['permission:manage_bookings'])->name('admin.bookings.form_customer_search');
    //booking details
    Route::get('bookings/detail/{id}', 'BookingsController@details')->middleware(['permission:manage_bookings']);
    Route::get('bookings/edit/{req}/{id}', 'BookingsController@updateBookingStatus')->middleware(['permission:manage_bookings']);
    Route::post('bookings/pay', 'BookingsController@pay')->middleware(['permission:manage_bookings']);
    Route::get('booking/need_pay_account/{id}/{type}', 'BookingsController@needPayAccount');
    Route::get('booking/booking_list_csv', 'BookingsController@bookingCsv');
    Route::get('booking/booking_list_pdf', 'BookingsController@bookingPdf');
    Route::get('renewal-bookings', 'RenewalBookingController@index')->middleware(['permission:manage_renewal_bookings'])->name('renewal-bookings.index');
    Route::get('renewal-bookings/renewal/{id}', 'RenewalBookingController@renewal')->middleware(['permission:manage_renewal_bookings'])->name('renewal-bookings.renewal');

    Route::post('renewal-bookings/renewal/check-booking-exists', 'RenewalBookingController@checkExistingPropertyBookingInRenewal')->middleware(['permission:manage_bookings'])->name('renewal-bookings.renewal.check-booking-exists');

    Route::post('renewal-bookings/store-renewal-booking', 'RenewalBookingController@storeRenewalBooking')->middleware(['permission:manage_renewal_bookings'])->name('renewal-bookings.store-renewal-booking');
    Route::post('renewal-bookings/cancel-renewal-booking', 'RenewalBookingController@cancelRenewalBooking')->middleware(['permission:manage_renewal_bookings'])->name('renewal-bookings.cancel-renewal-booking');
    Route::get('payouts', 'PayoutsController@index')->middleware(['permission:view_payouts']);
    Route::match(array('GET', 'POST'), 'payouts/edit/{id}', 'PayoutsController@edit');
    Route::get('payouts/details/{id}', 'PayoutsController@details');
    Route::get('payouts/payouts_list_pdf', 'PayoutsController@payoutsPdf');
    Route::get('payouts/payouts_list_csv', 'PayoutsController@payoutsCsv');
    Route::group(['middleware' => 'permission:manage_reviews'], function () {
        Route::get('reviews', 'ReviewsController@index');
        Route::match(array('GET', 'POST'), 'edit_review/{id}', 'ReviewsController@edit');
        Route::get('reviews/review_search', 'ReviewsController@searchReview');
        Route::get('reviews/review_list_csv', 'ReviewsController@reviewCsv');
        Route::get('reviews/review_list_pdf', 'ReviewsController@reviewPdf');
    });
    Route::get('securities', 'SecurityController@index')->middleware(['permission:manage_securities'])->name('securities.index');
    Route::get('securities/refund-form/{booking_id}', 'SecurityController@refundForm')->middleware(['permission:manage_securities'])->name('securities.refund-form');
    Route::post('securities/refund', 'SecurityController@refund')->middleware(['permission:manage_securities'])->name('securities.refund');
    // Route::get('reports', 'ReportsController@index')->middleware(['permission:manage_reports']);

    // For Reporting
    Route::group(['middleware' => 'permission:view_reports'], function () {
        Route::get('sales-report', 'ReportsController@salesReports');
        Route::get('sales-analysis', 'ReportsController@salesAnalysis');
        Route::get('reports/property-search', 'ReportsController@searchProperty');
        Route::get('overview-stats', 'ReportsController@overviewStats');
    });

    Route::group(['middleware' => 'permission:manage_amenities'], function () {
        Route::get('amenities', 'AmenitiesController@index');
        Route::match(array('GET', 'POST'), 'add-amenities', 'AmenitiesController@add');
        Route::match(array('GET', 'POST'), 'edit-amenities/{id}', 'AmenitiesController@update');
        Route::get('delete-amenities/{id}', 'AmenitiesController@delete');
    });

    Route::group(['middleware' => 'permission:manage_pages'], function () {
        Route::get('pages', 'PagesController@index');
        Route::match(array('GET', 'POST'), 'add-page', 'PagesController@add');
        Route::match(array('GET', 'POST'), 'edit-page/{id}', 'PagesController@update');
        Route::get('delete-page/{id}', 'PagesController@delete');
    });


    Route::group(['middleware' => 'permission:manage_admin'], function () {
        Route::get('admin-users', 'AdminController@index');
        Route::match(array('GET', 'POST'), 'add-admin', 'AdminController@add');
        Route::match(array('GET', 'POST'), 'edit-admin/{id}', 'AdminController@update');
        Route::match(array('GET', 'POST'), 'delete-admin/{id}', 'AdminController@delete');
    });

    Route::group(['middleware' => 'permission:general_setting'], function () {
        Route::match(array('GET', 'POST'), 'settings', 'SettingsController@general')->middleware(['permission:general_setting']);
        Route::match(array('GET', 'POST'), 'settings/preferences', 'SettingsController@preferences')->middleware(['permission:preference']);
        Route::get('getreCaptchaCredential', 'SettingsController@getreCaptchaCredential');
        Route::post('settings/delete_logo', 'SettingsController@deleteLogo');
        Route::post('settings/delete_favicon', 'SettingsController@deleteFavIcon');
        Route::match(array('GET', 'POST'), 'settings/fees', 'SettingsController@fees')->middleware(['permission:manage_fees']);
        Route::group(['middleware' => 'permission:manage_banners'], function () {
            Route::get('settings/banners', 'BannersController@index');
            Route::match(array('GET', 'POST'), 'settings/add-banners', 'BannersController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-banners/{id}', 'BannersController@update');
            Route::get('settings/delete-banners/{id}', 'BannersController@delete');
        });

        Route::group(['middleware' => 'permission:starting_cities_settings'], function () {
            Route::get('settings/starting-cities', 'StartingCitiesController@index');
            Route::match(array('GET', 'POST'), 'settings/add-starting-cities', 'StartingCitiesController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-starting-cities/{id}', 'StartingCitiesController@update');
            Route::get('settings/delete-starting-cities/{id}', 'StartingCitiesController@delete');
        });

        Route::group(['middleware' => 'permission:manage_property_type'], function () {
            Route::get('settings/property-type', 'PropertyTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-property-type', 'PropertyTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-property-type/{id}', 'PropertyTypeController@update');
            Route::get('settings/delete-property-type/{id}', 'PropertyTypeController@delete');
        });

        Route::group(['middleware' => 'permission:space_type_setting'], function () {
            Route::get('settings/space-type', 'SpaceTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-space-type', 'SpaceTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-space-type/{id}', 'SpaceTypeController@update');
            Route::get('settings/delete-space-type/{id}', 'SpaceTypeController@delete');
        });

        Route::group(['middleware' => 'permission:manage_bed_type'], function () {
            Route::get('settings/bed-type', 'BedTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-bed-type', 'BedTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-bed-type/{id}', 'BedTypeController@update');
            Route::get('settings/delete-bed-type/{id}', 'BedTypeController@delete');
        });

        Route::group(['middleware' => 'permission:manage_currency'], function () {
            Route::get('settings/currency', 'CurrencyController@index');
            Route::match(array('GET', 'POST'), 'settings/add-currency', 'CurrencyController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-currency/{id}', 'CurrencyController@update');
            Route::get('settings/delete-currency/{id}', 'CurrencyController@delete');
        });

        Route::group(['middleware' => 'permission:manage_country'], function () {
            Route::get('settings/country', 'CountryController@index');
            Route::match(array('GET', 'POST'), 'settings/add-country', 'CountryController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-country/{id}', 'CountryController@update');
            Route::get('settings/delete-country/{id}', 'CountryController@delete');
        });

        Route::group(['middleware' => 'permission:manage_amenities_type'], function () {
            Route::get('settings/amenities-type', 'AmenitiesTypeController@index');
            Route::match(array('GET', 'POST'), 'settings/add-amenities-type', 'AmenitiesTypeController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-amenities-type/{id}', 'AmenitiesTypeController@update');
            Route::get('settings/delete-amenities-type/{id}', 'AmenitiesTypeController@delete');
        });

        Route::match(array('GET', 'POST'), 'settings/email', 'SettingsController@email')->middleware(['permission:email_settings']);



        Route::group(['middleware' => 'permission:manage_language'], function () {
            Route::get('settings/language', 'LanguageController@index');
            Route::match(array('GET', 'POST'), 'settings/add-language', 'LanguageController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-language/{id}', 'LanguageController@update');
            Route::get('settings/delete-language/{id}', 'LanguageController@delete');
        });

        Route::match(array('GET', 'POST'), 'settings/fees', 'SettingsController@fees')->middleware(['permission:manage_fees']);

        Route::group(['middleware' => 'permission:manage_metas'], function () {
            Route::get('settings/metas', 'MetasController@index');
            Route::match(array('GET', 'POST'), 'settings/edit_meta/{id}', 'MetasController@update');
        });

        Route::match(array('GET', 'POST'), 'settings/api-informations', 'SettingsController@apiInformations')->middleware(['permission:api_informations']);
        Route::match(array('GET', 'POST'), 'settings/google-recaptcha-api-information', 'SettingsController@googleRecaptchaInformation')->middleware(['permission:google_recaptcha']);
        Route::match(array('GET', 'POST'), 'settings/payment-methods', 'SettingsController@paymentMethods')->middleware(['permission:payment_settings']);
        Route::match(array('GET', 'POST'), 'settings/bank/add', 'BankController@addBank')->middleware(['permission:payment_settings']);
        Route::match(array('GET', 'POST'), 'settings/bank/edit/{bank}', 'BankController@editBank')->middleware(['permission:payment_settings']);
        Route::get('settings/bank/{bank}', 'BankController@show')->middleware(['permission:payment_settings']);
        Route::get('settings/bank/delete/{bank}', 'BankController@deleteBank')->middleware(['permission:payment_settings']);
        Route::match(array('GET', 'POST'), 'settings/social-links', 'SettingsController@socialLinks')->middleware(['permission:social_links']);

        Route::match(array('GET', 'POST'), 'settings/social-logins', 'SettingsController@socialLogin')->middleware(['permission:social_logins']);
        ;

        Route::group(['middleware' => 'permission:manage_roles'], function () {
            Route::get('settings/roles', 'RolesController@index');
            Route::match(array('GET', 'POST'), 'settings/add-role', 'RolesController@add');
            Route::match(array('GET', 'POST'), 'settings/edit-role/{id}', 'RolesController@update');
            Route::get('settings/delete-role/{id}', 'RolesController@delete');
        });

        Route::group(['middleware' => 'permission:database_backup'], function () {
            Route::get('settings/backup', 'BackupController@index');
            Route::get('backup/save', 'BackupController@add');
            Route::get('backup/download/{id}', 'BackupController@download');
        });

        Route::group(['middleware' => 'permission:manage_email_template'], function () {
            Route::get('email-template/{id}', 'EmailTemplateController@index');
            Route::post('email-template/{id}', 'EmailTemplateController@update');
        });

        Route::group(['middleware' => 'permission:manage_testimonial'], function () {
            Route::get('testimonials', 'TestimonialController@index');
            Route::match(array('GET', 'POST'), 'add-testimonials', 'TestimonialController@add');
            Route::match(array('GET', 'POST'), 'edit-testimonials/{id}', 'TestimonialController@update');
            Route::get('delete-testimonials/{id}', 'TestimonialController@delete');
        });
    });
});

//only can view if admin is not logged in if they are logged in then they will be redirect to dashboard
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'no_auth:admin'], function () {
    Route::get('login', 'AdminController@login');
    Route::post('authenticate', 'AdminController@authenticate');
    Route::match(array('GET', 'POST'), 'forgot-password', 'AdminController@forgotPassword');
    Route::get('reset-password/{secret?}', 'AdminController@resetPassword');
    Route::post('reset-password', 'AdminController@resetPassword');
});

//only can view if user is not logged in if they are logged in then they will be redirect to dashboard
Route::group(['middleware' => ['no_auth:users', 'locale']], function () {
    Route::get('login', 'LoginController@index');
    Route::get('auth/login', function () {
        return Redirect::to('login');
    });

    Route::get('googleLogin', 'LoginController@googleLogin')->middleware('social_login:google_login');
    Route::get('facebookLogin', 'LoginController@facebookLogin')->middleware('social_login:facebook_login');
    Route::get('register', 'HomeController@register');
    Route::match(array('GET', 'POST'), 'forgot_password', 'LoginController@forgotPassword');
    Route::post('create', 'UserController@create');
    Route::post('authenticate', 'LoginController@authenticate');
    Route::get('users/reset_password/{secret?}', 'LoginController@resetPassword');
    Route::post('users/reset_password', 'LoginController@resetPassword');
});

Route::get('googleAuthenticate', 'LoginController@googleAuthenticate');
Route::get('facebookAuthenticate', 'LoginController@facebookAuthenticate');

//only can view if user is logged in
Route::group(['middleware' => ['guest:users', 'locale']], function () {
    Route::get('dashboard', 'UserController@dashboard');
    Route::match(array('GET', 'POST'), 'users/profile', 'UserController@profile');
    Route::match(array('GET', 'POST'), 'users/profile/media', 'UserController@media');

    // User verification
    Route::get('users/edit-verification', 'UserController@verification');
    Route::get('users/confirm_email/{code?}', 'UserController@confirmEmail');
    Route::get('users/new_email_confirm', 'UserController@newConfirmEmail');

    Route::get('facebookLoginVerification', 'UserController@facebookLoginVerification');
    Route::get('facebookConnect/{id}', 'UserController@facebookConnect');
    Route::get('facebookDisconnect', 'UserController@facebookDisconnectVerification');

    Route::get('googleLoginVerification', 'UserController@googleLoginVerification');
    Route::get('googleConnect/{id}', 'UserController@googleConnect');
    Route::get('googleDisconnect', 'UserController@googleDisconnect');
    // Route::get('googleAuthenticate', 'LoginController@googleAuthenticate');

    Route::get('users/show/{id}', 'UserController@show');
    Route::match(array('GET', 'POST'), 'users/reviews', 'UserController@reviews');
    Route::match(array('GET', 'POST'), 'users/reviews_by_you', 'UserController@reviewsByYou');
    Route::match(['get', 'post'], 'reviews/edit/{id}', 'UserController@editReviews');
    Route::match(['get', 'post'], 'reviews/details', 'UserController@reviewDetails');

    Route::match(array('GET', 'POST'), 'properties', 'PropertyController@userProperties')->name('properties');
    Route::match(array('GET', 'POST'), 'property/create', 'PropertyController@create');
    Route::match(array('GET', 'POST'), 'listing/{id}/photo_message', 'PropertyController@photoMessage')->middleware(['checkUserRoutesPermissions']);
    Route::match(array('GET', 'POST'), 'listing/{id}/photo_delete', 'PropertyController@photoDelete')->middleware(['checkUserRoutesPermissions']);

    Route::match(array('POST'), 'listing/photo/make_default_photo', 'PropertyController@makeDefaultPhoto');

    Route::match(array('POST'), 'listing/photo/make_photo_serial', 'PropertyController@makePhotoSerial');

    Route::match(array('GET', 'POST'), 'listing/update_status', 'PropertyController@updateStatus');
    Route::match(array('GET', 'POST'), 'listing/{id}/{step}', 'PropertyController@listing')->where(['id' => '[0-9]+', 'page' => 'basics|description|location|amenities|photos|pricing|calendar|details|booking']);
    Route::get('cities-by-country/{country}', 'PropertyController@getCitiesByCountry');
    Route::get('get-areas/{country}/{city}', 'PropertyController@getAreas');
    // Favourites routes
    Route::get('user/favourite', 'PropertyController@userBookmark');
    Route::post('add-edit-book-mark', 'PropertyController@addEditBookMark');

    Route::post('ajax-calender/{id}', 'CalendarController@calenderJson');
    Route::post('ajax-calender-price/{id}', 'CalendarController@calenderPriceSet');
    //iCalendar routes start
    Route::post('ajax-icalender-import/{id}', 'CalendarController@icalendarImport');
    Route::get('icalendar/synchronization/{id}', 'CalendarController@icalendarSynchronization');
    //iCalendar routes end
    Route::post('currency-symbol', 'PropertyController@currencySymbol');
    Route::match(['get', 'post'], 'payments/book/{id?}', 'PaymentController@index');
    Route::post('payments/create_booking', 'PaymentController@createBooking');
    Route::post('payments/create-booked-unpaid', 'PaymentController@store')->name('payments.create-booked-unpaid');
    Route::get('payments/success', 'PaymentController@success');
    Route::get('payments/cancel', 'PaymentController@cancel');
    Route::get('payments/stripe', 'PaymentController@stripePayment');
    Route::post('payments/stripe-request', 'PaymentController@stripeRequest');
    Route::match(['get', 'post'], 'payments/bank-payment', 'PaymentController@bankPayment');
    Route::get('booking/{id}', 'BookingController@index')->where('id', '[0-9]+');
    Route::get('booking_payment/{id}', 'BookingController@requestPayment')->where('id', '[0-9]+');
    Route::get('booking/requested', 'BookingController@requested');
    Route::get('booking/itinerary_friends', 'BookingController@requested');
    Route::post('booking/accept/{id}', 'BookingController@accept');
    Route::post('booking/decline/{id}', 'BookingController@decline');
    Route::get('booking/expire/{id}', 'BookingController@expire');
    Route::match(['get', 'post'], 'my-bookings', 'BookingController@myBookings');
    Route::post('booking/host_cancel', 'BookingController@hostCancel');
    Route::match(['get', 'post'], 'trips/active', 'TripsController@myTrips')->name('my-trips');
    Route::get('booking/receipt', 'TripsController@receipt');
    Route::post('trips/guest_cancel', 'TripsController@guestCancel');

    // Messaging
    Route::match(['get', 'post'], 'inbox', 'InboxController@index');
    Route::post('messaging/booking/', 'InboxController@message');
    Route::post('messaging/reply/', 'InboxController@messageReply');

    Route::match(['get', 'post'], 'users/account-preferences', 'UserController@accountPreferences');
    Route::get('users/account_delete/{id}', 'UserController@accountDelete');
    Route::get('users/account_default/{id}', 'UserController@accountDefault');
    Route::get('users/transaction-history', 'UserController@transactionHistory');
    Route::post('users/account_transaction_history', 'UserController@getCompletedTransaction');
    // for customer payout settings
    Route::match(['GET', 'POST'], 'users/payout', 'PayoutController@index');
    Route::match(['GET', 'POST'], 'users/payout/setting', 'PayoutController@setting');
    Route::match(['GET', 'POST'], 'users/payout/edit-payout/', 'PayoutController@edit');
    Route::match(['GET', 'POST'], 'users/payout/delete-payout/{id}', 'PayoutController@delete');

    // for payout request
    Route::match(['GET', 'POST'], 'users/payout-list', 'PayoutController@payoutList');
    Route::match(['GET', 'POST'], 'users/payout/success', 'PayoutController@success');

    Route::match(['get', 'post'], 'users/security', 'UserController@security');
    Route::get('logout', function () {
        Auth::logout();
        Session::flush();
        return Redirect::to('login');
    });
});

//for exporting iCalendar
Route::get('icalender/export/{id}', 'CalendarController@icalendarExport');
Route::get('{name}', 'HomeController@staticPages')->middleware('locale');
Route::post('duplicate-phone-number-check', 'UserController@duplicatePhoneNumberCheck');
Route::post('duplicate-phone-number-check-for-existing-customer', 'UserController@duplicatePhoneNumberCheckForExistingCustomer');
Route::match(['get', 'post'], 'upload_image', 'Admin\PagesController@uploadImage')->name('upload');
