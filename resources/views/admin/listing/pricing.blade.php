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
                    <form id="listing_pricing" method="post"
                        action="{{ url('admin/listing/' . $result->id . '/' . $step) }}" class="signup-form login-form"
                        accept-charset="UTF-8">
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
                                        <label class="label-large fw-bold">
                                            Price Type <span class="text-danger">*</span>
                                        </label>

                                        <div id="pricing-fields">
                                            @foreach ($propertyPricing as $list)
                                                <div class="mt-2 mb-2 pricing-item">
                                                    <select name="pricing_type[]" class="form-control">
                                                        @foreach ($pricing_types as $pricingType)
                                                            <option value="{{ $pricingType->id }}"
                                                                {{ $list->property_type_id == $pricingType->id ? 'selected' : '' }}>
                                                                {{ $pricingType->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="prices[]" class="form-control mt-1"
                                                        value="{{ $list->price }}">
                                                </div>
                                            @endforeach
                                        </div>

                                        <button type="button" class="btn btn-primary btn-sm mt-2"
                                            id="add-pricing-button">Add
                                            Price</button>

                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    </div>
                                    <div class="col-md-8 mt-3">
                                        <label class="label-large fw-bold">Currency</label>
                                        <select id="price-select-currency_code" name="currency_code"
                                            class="form-control f-14">
                                            @foreach ($currency as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $result->property_price->currency_code == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="row mt-4">
                                    <div class="col-md-12">
                                        <p class="f-18">Additional Pricing Options</p>
                                    </div>

                                    <!-- Cleaning Fee -->
                                    <div class="col-md-12 mt-2">
                                        <label class="label-large label-inline fw-bold">
                                            <input type="checkbox" class="pricing_checkbox" data-target="#cleaning"
                                                {{ $result->property_price->original_cleaning_fee ? 'checked' : '' }}>
                                            Cleaning fee
                                        </label>
                                    </div>
                                    <div id="cleaning"
                                        class="col-md-4 {{ $result->property_price->original_cleaning_fee ? '' : 'd-none' }}">
                                        <div class="input-addon">
                                            <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                            <input type="text" id="price-cleaning"
                                                value="{{ $result->property_price->original_cleaning_fee }}"
                                                name="cleaning_fee" class="money-input form-control f-14">
                                        </div>
                                    </div>

                                    <!-- Additional Guests -->
                                    <div class="col-md-12 mt-3">
                                        <label class="label-large label-inline fw-bold">
                                            <input type="checkbox" class="pricing_checkbox" data-target="#additional-guests"
                                                {{ $result->property_price->original_guest_fee ? 'checked' : '' }}>
                                            Additional guests
                                        </label>
                                    </div>
                                    <div id="additional-guests"
                                        class="col-md-12 {{ $result->property_price->original_guest_fee ? '' : 'd-none' }}">
                                        <div class="input-addon col-md-4 float-start">
                                            <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                            <input type="text" id="price-extra_person"
                                                value="{{ $result->property_price->original_guest_fee }}" name="guest_fee"
                                                class="money-input form-control f-14">
                                        </div>
                                        <div class="col-md-4 txt-right">
                                            <label class="fw-bold  mt-2">For each guest after</label>
                                        </div>
                                        <div class="col-md-4 float-start">
                                            <select id="price-select-guests_included" name="guest_after"
                                                class="form-control f-14">
                                                @for ($i = 1; $i <= 16; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ $result->property_price->guest_after == $i ? 'selected' : '' }}>
                                                        {{ $i == 16 ? '16+' : $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Security Deposit -->
                                    <div class="col-md-12 mt-3">
                                        <label class="label-large label-inline fw-bold">
                                            <input type="checkbox" class="pricing_checkbox" data-target="#security"
                                                {{ $result->property_price->original_security_fee ? 'checked' : '' }}>
                                            Security deposit
                                        </label>
                                    </div>
                                    <div id="security"
                                        class="col-md-4 {{ $result->property_price->original_security_fee ? '' : 'd-none' }}">
                                        <div class="input-addon">
                                            <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                            <input type="text" id="price-security"
                                                value="{{ $result->property_price->original_security_fee }}"
                                                name="security_fee" class="money-input form-control f-14">
                                        </div>
                                    </div>

                                    <!-- Weekend Pricing -->
                                    <div class="col-md-12 mt-3">
                                        <label class="label-large label-inline fw-bold">
                                            <input type="checkbox" class="pricing_checkbox" data-target="#weekend"
                                                {{ $result->property_price->original_weekend_price ? 'checked' : '' }}>
                                            Weekend pricing
                                        </label>
                                    </div>
                                    <div id="weekend"
                                        class="col-md-4 {{ $result->property_price->original_weekend_price ? '' : 'd-none' }}">
                                        <div class="input-addon">
                                            <span class="input-prefix pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                            <input type="text" id="price-weekend"
                                                value="{{ $result->property_price->original_weekend_price }}"
                                                name="weekend_price" class="money-input form-control f-14">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row mt-5">
                                    <div class="col-6 text-left">
                                        <a href="{{ url('admin/listing/' . $result->id . '/photos') }}"
                                            class="btn btn-large btn-primary f-14">Back</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="submit"
                                            class="btn btn-large btn-primary next-section-button f-14">Next</button>
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
    {{-- <script>
        // Toggle visibility based on checkbox status
        document.querySelectorAll('.pricing_checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const target = document.querySelector(this.dataset.target);
                if (this.checked) {
                    target.classList.remove('d-none');
                } else {
                    target.classList.add('d-none');
                }
            });
        });
    </script> --}}
@endsection



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
const totalPricingTypes = @json($pricing_types->count());
const pricingTypesData = @json($pricing_types->map(function($type) {
    return [
        'id' => $type->id,
        'name' => $type->name,
        'days' => $type->days
    ];
})->toArray());

$(document).ready(function() {
    const pricingFields = $('#pricing-fields');
    const addButton = $('#add-pricing-button');

    // Store initial pricing types for tracking deletions
    const initialPricingTypes = new Set();
    pricingFields.find('select[name="pricing_type[]"]').each(function() {
        if ($(this).val()) {
            initialPricingTypes.add($(this).val());
        }
    });

    // Function to create error message element
    function createErrorMessage(message) {
        return $('<span>', {
            class: 'text-danger mt-1 d-block',
            text: message
        });
    }

    // Function to remove error message
    function removeErrorMessage(selectElement) {
        $(selectElement).next('.text-danger').remove();
    }

    // Function to validate price input
    function validatePrice(input) {
        const value = $(input).val();
        removeErrorMessage(input);

        if (value === '') {
            $(input).after(createErrorMessage('Price is required'));
            return false;
        }

        if (isNaN(value) || parseFloat(value) < 0) {
            $(input).after(createErrorMessage('Please enter a valid price'));
            return false;
        }

        return true;
    }

    // Function to get selected pricing types
    function getSelectedPricingTypes(excludeSelect = null) {
        const selected = new Set();
        pricingFields.find('select[name="pricing_type[]"]').each(function() {
            if (this !== excludeSelect && $(this).val()) {
                selected.add($(this).val());
            }
        });
        return selected;
    }

    // Function to update select options
    function updateSelectOptions(select) {
        const selectedTypes = getSelectedPricingTypes(select);
        const currentValue = $(select).val();

        // Store all original options if not already stored
        if (!select.originalOptions) {
            select.originalOptions = Array.from(select.options).map(opt => ({
                value: opt.value,
                text: opt.text
            }));
        }

        // Clear current options
        $(select).empty();

        // Add placeholder option
        $(select).append($('<option>', {
            value: '',
            text: 'Select a price type',
            disabled: true,
            selected: !currentValue
        }));

        // Add filtered options
        select.originalOptions.forEach(opt => {
            if (!selectedTypes.has(opt.value) || opt.value === currentValue) {
                $(select).append($('<option>', {
                    value: opt.value,
                    text: opt.text,
                    selected: opt.value === currentValue
                }));
            }
        });
    }

    // Function to update all selects
    function updateAllSelects() {
        pricingFields.find('select[name="pricing_type[]"]').each(function() {
            updateSelectOptions(this);
        });
    }

    // Function to create remove button
    function createRemoveButton() {
        return $('<button>', {
            type: 'button',
            class: 'btn btn-danger btn-sm mt-1',
            text: 'Remove'
        }).on('click', function() {
            const pricingItem = $(this).parent();
            const select = pricingItem.find('select[name="pricing_type[]"]');
            const selectedValue = select.val();

            // If this was one of the initial pricing types, add a hidden input
            if (initialPricingTypes.has(selectedValue)) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'removed_pricing_types[]',
                    value: selectedValue
                }).appendTo('#pricing-fields');
            }

            pricingItem.remove();
            updateAddButtonState();
            updateAllSelects();
        });
    }

    // Function to get days for a pricing type ID
    function getDays(typeId) {
        const typeData = pricingTypesData.find(type => type.id == typeId);
        return typeData ? parseFloat(typeData.days) : 1; // Default to 1 if not found
    }

    // Function to calculate price based on previous pricing type
    function calculatePrice(lastPrice, lastTypeId, newTypeId) {
        if (!lastPrice || isNaN(lastPrice) || parseFloat(lastPrice) < 0) {
            return '';
        }

        const price = parseFloat(lastPrice);
        const lastDays = getDays(lastTypeId);
        const newDays = getDays(newTypeId);

        // Convert last price to Daily (base unit), then to new type
        const priceInDaily = price / lastDays;
        const newPrice = priceInDaily * newDays;
        return newPrice.toFixed(2);
    }

    // Function to get the last valid pricing field
    function getLastValidPricingField() {
        const pricingItems = pricingFields.find('.pricing-item');
        for (let i = pricingItems.length - 1; i >= 0; i--) {
            const item = pricingItems.eq(i);
            const select = item.find('select[name="pricing_type[]"]');
            const priceInput = item.find('input[name="prices[]"]');
            if (select.val() && priceInput.val() && !isNaN(priceInput.val()) && parseFloat(priceInput.val()) >= 0) {
                return {
                    type: select.val(),
                    price: priceInput.val()
                };
            }
        }
        return null;
    }

    // Function to create new pricing fields
    function createPricingFields() {
        const pricingItem = $('<div>', {
            class: 'mt-2 mb-2 pricing-item'
        });

        const select = pricingFields.find('select[name="pricing_type[]"]').first().clone();
        select.val('');
        updateSelectOptions(select[0]);

        // Add change event to select
        select.on('change', function() {
            removeErrorMessage(this);
            const priceInput = $(this).parent().find('input[name="prices[]"]');
            if (!$(this).val()) {
                $(this).after(createErrorMessage('Please select a price type'));
                priceInput.val(''); // Clear price if no type selected
            } else {
                // Update price based on selected type
                const lastValidField = getLastValidPricingField();
                if (lastValidField) {
                    const calculatedPrice = calculatePrice(lastValidField.price, lastValidField.type, $(this).val());
                    priceInput.val(calculatedPrice);
                } else {
                    priceInput.val(''); // Clear price if no valid previous field
                }
            }
            updateAllSelects();
        });

        // Create price input (empty by default)
        const input = $('<input>', {
            type: 'text',
            name: 'prices[]',
            class: 'form-control mt-1',
            placeholder: 'Enter price'
        });

        // Add blur event for price validation
        input.on('blur', function() {
            validatePrice(this);
        });

        // Add keypress event to allow only numbers and decimal point
        input.on('keypress', function(e) {
            if (e.which !== 46 && e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        pricingItem.append(select, input, createRemoveButton());
        return pricingItem;
    }

    // Function to update the add button state
    function updateAddButtonState() {
        const currentCount = pricingFields.find('.pricing-item').length;
        const maxReached = currentCount >= totalPricingTypes;

        addButton.prop('disabled', maxReached);

        if (maxReached) {
            if (!$('#max-types-error').length) {
                addButton.after(createErrorMessage('Maximum number of pricing types reached').attr('id', 'max-types-error'));
                setTimeout(() => {
                    $('#max-types-error').fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 3000);
            }
        }
    }

    // Add click event to add button
    addButton.on('click', function() {
        const currentCount = pricingFields.find('.pricing-item').length;

        if (currentCount < totalPricingTypes) {
            const newFields = createPricingFields();
            pricingFields.append(newFields);
            updateAddButtonState();
        }
    });

    // Add remove buttons to existing fields if more than one
    if (pricingFields.find('.pricing-item').length > 1) {
        pricingFields.find('.pricing-item').each(function(index) {
            if (index > 0) {
                $(this).append(createRemoveButton());
            }
        });
    }

    // Initialize existing selects
    pricingFields.find('select[name="pricing_type[]"]').each(function() {
        // Store original options
        this.originalOptions = Array.from(this.options).map(opt => ({
            value: opt.value,
            text: opt.text
        }));

        // Add change event
        $(this).on('change', function() {
            removeErrorMessage(this);
            if (!$(this).val()) {
                $(this).after(createErrorMessage('Please select a price type'));
            }
            updateAllSelects();
        });
    });

    // Initialize existing price inputs
    pricingFields.find('input[name="prices[]"]').each(function() {
        $(this).on('blur', function() {
            validatePrice(this);
        });

        $(this).on('keypress', function(e) {
            if (e.which !== 46 && e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
    });

    // Form submission validation
    $('form').on('submit', function(e) {
        let isValid = true;
        let firstError = null;

        // Validate all selects
        pricingFields.find('select[name="pricing_type[]"]').each(function() {
            if (!$(this).val()) {
                $(this).after(createErrorMessage('Please select a price type'));
                isValid = false;
                firstError = firstError || $(this);
            }
        });

        // Validate all price inputs
        pricingFields.find('input[name="prices[]"]').each(function() {
            if (!validatePrice(this)) {
                isValid = false;
                firstError = firstError || $(this);
            }
        });

        if (!isValid) {
            e.preventDefault();
            if (firstError) {
                firstError.focus();
            }
        }
    });

    // Initial updates
    updateAllSelects();
    updateAddButtonState();
});
</script>