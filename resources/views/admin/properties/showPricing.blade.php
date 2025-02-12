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


                <div class="col-md-9">
                    <form id="listing_pricing" method="post"
                        action="{{ url('admin/listing/' . $result->id . '/' . 'pricing') }}" class="signup-form login-form"
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
<input type="hidden" name='price' value='price'/>
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
                                <div class="row mt-5">
                                    <div class="col-6 text-left">
                                        <a href="{{ url('admin/listing/' . $result->id . '/photos') }}"
                                            class="btn btn-large btn-primary f-14">Back</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="submit"
                                            class="btn btn-large btn-primary next-section-button f-14">Update</button>
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
    // Get the total number of pricing types for validation
    const totalPricingTypes = @json($pricing_types->count());

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
                if (!$(this).val()) {
                    $(this).after(createErrorMessage('Please select a price type'));
                }
                updateAllSelects();
            });

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
                if (e.which !== 46 && e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which >
                        57)) {
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
                    addButton.after(createErrorMessage('Maximum number of pricing types reached').attr('id',
                        'max-types-error'));
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
                if (e.which !== 46 && e.which !== 8 && e.which !== 0 && (e.which < 48 || e
                        .which > 57)) {
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
    // $(document).ready(function() {
    //     // Maximum number of pricing fields allowed
    //     const maxPricingFields = {{ count($pricing_types) }};
    //     const pricingFieldsContainer = $('#pricing-fields');
    //     const addPricingButton = $('#add-pricing-button');

    //     // Function to update the state of the add button
    //     function updateAddButtonState() {
    //         const currentCount = pricingFieldsContainer.find('.pricing-item').length;
    //         addPricingButton.prop('disabled', currentCount >= maxPricingFields);
    //     }

    //     // Initial check to set the add button state
    //     updateAddButtonState();

    //     // Add pricing fields
    //     addPricingButton.on('click', function() {
    //         // Create a new div for the pricing item
    //         const newPricingItem = $('<div class="mt-2 mb-2 pricing-item"></div>');

    //         // Create the select element
    //         const select = $('<select name="pricing_type[]" class="form-control"></select>');

    //         // Populate select options with existing pricing types
    //         @foreach ($pricing_types as $pricingType)
    //             select.append(
    //                 '<option value="{{ $pricingType->id }}">{{ $pricingType->name }}</option>');
    //         @endforeach

    //         // Create the input element with placeholder
    //         const input = $(
    //             '<input type="text" name="prices[]" class="form-control mt-1" placeholder="Enter price">'
    //         );

    //         // Create a remove button
    //         const removeButton = $(
    //             '<button type="button" class="btn btn-danger btn-sm mt-1 remove-pricing-button">Remove</button>'
    //         );

    //         // Append select, input, and remove button to the new pricing item
    //         newPricingItem.append(select).append(input).append(removeButton);

    //         // Append the new pricing item to the container
    //         pricingFieldsContainer.append(newPricingItem);

    //         // Update the add button state
    //         updateAddButtonState();
    //     });

    //     // Remove pricing fields
    //     $(document).on('click', '.remove-pricing-button', function() {
    //         // Confirm removal of pricing item
    //         if (confirm('Are you sure you want to remove this pricing item?')) {
    //             // Remove the pricing item only if it's not the last one
    //             if (pricingFieldsContainer.find('.pricing-item').length > 1) {
    //                 $(this).closest('.pricing-item').remove();
    //                 // Update the add button state
    //                 updateAddButtonState();
    //             } else {
    //                 alert('At least one pricing field must remain.');
    //             }
    //         }
    //     });

    //     // Validate price input on keyup
    //     $(document).on('keyup', 'input[name="prices[]"]', function() {
    //         const priceInput = $(this);
    //         const priceValue = parseFloat(priceInput.val());

    //         // Validate that the price is a positive number
    //         if (priceValue < 0) {
    //             priceInput.addClass('is-invalid'); // Add invalid class for feedback
    //         } else {
    //             priceInput.removeClass('is-invalid'); // Remove invalid class
    //         }
    //     });
    // });
</script>
