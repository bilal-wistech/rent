@extends('admin.template')

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <h3 class="mb-4 ml-4">Email Templates</h3>
        </div>
        <div class="ml-4 mr-4">
            @include('admin.common.breadcrumb')
        </div>
    </div>

    <!-- Main content -->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.common.mail_menu')
                        </div>
                    </div>
                </div>
                <div class="col-md-9"> <!-- Changed to col-md-9 for better layout -->
                    <div class="card">
                        <div class="card-body">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        @php
                                            $templateTitles = [
                                                1 => "Account Information Default Update Template",
                                                2 => "Account Information Update Template",
                                                3 => "Account Information Delete Template",
                                                4 => "Booking Template",
                                                5 => "Email Confirm Template",
                                                6 => "Forget Password Template",
                                                7 => "Need Payment Account Template",
                                                8 => "Payout Sent Template",
                                                9 => "Booking Cancelled Template",
                                                10 => "Booking Accepted/Declined Template",
                                                11 => "Booking Request Send Template",
                                                12 => "Booking Confirmation Template",
                                                13 => "Property Booking Notify Template",
                                                14 => "Property Booking Payment Notify Template",
                                                15 => "Payout Request Received Template",
                                                16 => "Property Listing Approved Template",
                                                17 => "Payout Request Approved Template",
                                            ];
                                        @endphp
                                        {{ $templateTitles[$tempId] ?? "Unknown Template" }}
                                    </h3>
                                    <button class="float-right btn btn-success" id="available">Available Variables</button>
                                </div>

                                <div class="box-header d-none" id="variable">
                                    @php
                                        $templateVariables = [
                                            1 => ['{site_name}', '{first_name}', '{date_time}'],
                                            2 => ['{site_name}', '{first_name}', '{date_time}'],
                                            3 => ['{site_name}', '{first_name}', '{date_time}'],
                                            4 => ['{start_date}', '{total_guest}', '{messages_message}', '{night/nights}', '{payment_method}', '{property_name}', '{owner_first_name}', '{user_first_name}', '{total_night}'],
                                            5 => ['{first_name}', '{site_name}'],
                                            // Add the rest accordingly...
                                        ];
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach ($templateVariables[$tempId] ?? [] as $variable)
                                                <p>{{ $variable }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ url("admin/email-template/" . $tempId) }}" method="post" id="myform">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="fw-bold mb-2" for="subject">Subject</label>
                                        <input class="form-control f-14" name="en[subject]" type="text"
                                            value="{{ old('en.subject', $temp_Data[0]->subject) }}">
                                    </div>

                                    <div class="form-group">
                                        <textarea id="compose-textarea" name="en[body]" class="form-control f-14 editor"
                                            style="height: 400px; resize: vertical;">{{ old('en.body', $temp_Data[0]->body) }}</textarea>
                                    </div>

                                    <div class="box-group" id="accordion">
                                        @foreach ($languages as $language)
                                            @if ($language->short_name == 'en') @continue @endif
                                            <div class="panel box mt-3">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-bs-toggle="collapse" data-bs-parent="#accordion"
                                                            href="#collapse{{ $language->short_name }}"
                                                            aria-expanded="false" class="collapsed">
                                                            {{ $language->name }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse{{ $language->short_name }}"
                                                    class="panel-collapse collapse" aria-expanded="false"
                                                    style="height: 0px;">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="subject">{{ $language->name }} Subject</label>
                                                            <input class="form-control f-14"
                                                                name="{{ $language->short_name }}[subject]" type="text"
                                                                value="{{ old($language->short_name . '.subject') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="{{ $language->short_name }}[body]"
                                                                class="form-control f-14 editor"
                                                                style="height: 400px; resize: vertical;">{{ old($language->short_name . '.body') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Template</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
