@extends('admin.template')

@section('main')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Pricing <small>Pricing</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('admin/dashboard') }}">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="row gap-2">
            <div class="col-lg-3 col-12 settings_bar_gap">
                @include('admin.common.property_bar')
            </div>

            <div class="col-md-9">
                <form id="listing_pricing" method="post" action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class="signup-form login-form" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="f-18">Base price</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <label for="price-night" class="label-large fw-bold">Nightly Price <span class="text-danger">*</span></label>
                                    <div class="input-addon">
                                        <!-- <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span> -->
                                        <input type="number" id="price-night" value="{{ $result->property_price->original_price ?: '' }}" name="price" class="money-input form-control f-14">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                </div>

                                <div class="col-md-8 mt-3">
                                    <label class="label-large fw-bold">Currency</label>
                                    <select id="price-select-currency_code" name="currency_code" class="form-control f-14">
                                        @foreach ($currency as $key => $value)
                                            <option value="{{ $key }}" {{ $result->property_price->currency_code == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                    @if ($result->property_price->weekly_discount == 0 && $result->property_price->monthly_discount == 0)
                                        <p id="js-set-long-term-prices" class="row-space-top-6 text-start mt-4 text-muted set-long-term-prices f-14 mt-1">
                                            You can offer discounts for longer stays by setting  <a data-prevent-default="" href="#" id="show_long_term">weekly and monthly</a> prices.
                                        </p>
                                        <hr class="row-space-top-6 row-space-5 set-long-term-prices">
                                    @endif
                            </div>
                            

                            <div class="row {{ ($result->property_price->weekly_discount == 0 && $result->property_price->monthly_discount == 0) ? 'display-off' : '' }}" id="long-term-div">
                                <div class="col-md-12">
                                    <p class="mb-0 f-18 mt-4">Long-term prices</p>
                                </div>
                              <div class="col-md-8 mt-3">
                                <label for="listing_price_native" class="label-large fw-bold mb-1">Weekly Discount Percent (%)</label>
                                <div class="input-addon">
                                  <!-- <span class="input-prefix pay-currency">{!! $result  ->property_price->currency->org_symbol !!}</span> -->
                                  <input type="text" data-suggested="" id="price-week" value="{{ $result->property_price->weekly_discount }}" name="weekly_discount" data-saving="long_price" class="money-input form-control f-14">
                                </div>
                              </div>
                              <div class="col-md-8">
                                <label for="listing_price_native" class="label-large fw-bold mb-1">Monthly Discount Percent (%)</label>
                                <div class="input-addon">
                                  <!-- <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span> -->
                                  <input type="text" data-suggested="₹16905" id="price-month" class="money-input  form-control f-14" value="{{ $result->property_price->monthly_discount }}" name="monthly_discount" data-saving="long_price">
                                </div>
                              </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <p class="f-18">Additional Pricing Options</p>
                                </div>

                                <!-- Cleaning Fee -->
                                <div class="col-md-12 mt-2">
                                    <label class="label-large label-inline fw-bold">
                                        <input type="checkbox" class="pricing_checkbox" data-target="#cleaning" {{ $result->property_price->original_cleaning_fee ? 'checked' : '' }}>
                                        Cleaning fee
                                    </label>
                                </div>
                                <div id="cleaning" class="col-md-4 {{ $result->property_price->original_cleaning_fee ? '' : 'd-none' }}">
                                    <div class="input-addon">
                                        <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                        <input type="text" id="price-cleaning" value="{{ $result->property_price->original_cleaning_fee }}" name="cleaning_fee" class="money-input form-control f-14">
                                    </div>
                                </div>

                                <!-- Additional Guests -->
                                <div class="col-md-12 mt-3">
                                    <label class="label-large label-inline fw-bold">
                                        <input type="checkbox" class="pricing_checkbox" data-target="#additional-guests" {{ $result->property_price->original_guest_fee ? 'checked' : '' }}>
                                        Additional guests
                                    </label>
                                </div>
                                <div id="additional-guests" class="col-md-12 {{ $result->property_price->original_guest_fee ? '' : 'd-none' }}">
                                    <div class="input-addon col-md-4 float-start">
                                        <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                        <input type="text" id="price-extra_person" value="{{ $result->property_price->original_guest_fee }}" name="guest_fee" class="money-input form-control f-14">
                                    </div>
                                    <div class="col-md-4 txt-right">
                                        <label class="fw-bold  mt-2">For each guest after</label>
                                    </div>
                                    <div class="col-md-4 float-start">
                                        <select id="price-select-guests_included" name="guest_after" class="form-control f-14">
                                            @for ($i = 1; $i <= 16; $i++)
                                                <option value="{{ $i }}" {{ $result->property_price->guest_after == $i ? 'selected' : '' }}>
                                                    {{ $i == 16 ? '16+' : $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <!-- Security Deposit -->
                                <div class="col-md-12 mt-3">
                                    <label class="label-large label-inline fw-bold">
                                        <input type="checkbox" class="pricing_checkbox" data-target="#security" {{ $result->property_price->original_security_fee ? 'checked' : '' }}>
                                        Security deposit
                                    </label>
                                </div>
                                <div id="security" class="col-md-4 {{ $result->property_price->original_security_fee ? '' : 'd-none' }}">
                                    <div class="input-addon">
                                        <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                        <input type="text" id="price-security" value="{{ $result->property_price->original_security_fee }}" name="security_fee" class="money-input form-control f-14">
                                    </div>
                                </div>

                                <!-- Weekend Pricing -->
                                <div class="col-md-12 mt-3">
                                    <label class="label-large label-inline fw-bold">
                                        <input type="checkbox" class="pricing_checkbox" data-target="#weekend" {{ $result->property_price->original_weekend_price ? 'checked' : '' }}>
                                        Weekend pricing
                                    </label>
                                </div>
                                <div id="weekend" class="col-md-4 {{ $result->property_price->original_weekend_price ? '' : 'd-none' }}">
                                    <div class="input-addon">
                                        <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                        <input type="text" id="price-weekend" value="{{ $result->property_price->original_weekend_price }}" name="weekend_price" class="money-input form-control f-14">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-6 text-left">
                                    <a href="{{ url('admin/listing/' . $result->id . '/photos') }}" class="btn btn-large btn-primary f-14">Back</a>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="submit" class="btn btn-large btn-primary next-section-button f-14">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('validate_script')
<script src="{{ asset('backend/js/backend.min.js') }}"></script>
<script>
    // Toggle visibility based on checkbox status
    document.querySelectorAll('.pricing_checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            const target = document.querySelector(this.dataset.target);
            if (this.checked) {
                target.classList.remove('d-none');
            } else {
                target.classList.add('d-none');
            }
        });
    });
</script>
@endsection
