 @extends('template')

 @section('main')
     <div class="margin-top-85">
         <div class="row m-0">
             <!-- sidebar start-->
             @include('users.sidebar')
             <!--sidebar end-->
             <div class="col-md-10">
                 <div class="main-panel min-height mt-4">
                     <div class="row justify-content-center">
                         <div class="col-md-3 pl-4 pr-4">
                             @include('listing.sidebar')
                         </div>

                         <div class="col-md-9 mt-4 mt-sm-0 pl-4 pr-4">
                             <form id="lis_pricing" method="post" action="{{ url('listing/' . $result->id . '/' . $step) }}"
                                 accept-charset='UTF-8'>
                                 {{ csrf_field() }}
                                 <div class="form-row mt-4 border rounded pb-4 m-0">
                                     <div class="form-group col-md-12 main-panelbg pb-3 pt-3 pl-4">
                                         <h4 class="text-16 font-weight-700">{{ __('Base price') }}</h4>
                                     </div>

                                     {{-- <div class="form-group col-lg-6 pl-5 pr-5">
                                         <label for="listing_price_native">
                                             {{ __('Nightly Price') }}
                                             <span class="text-danger">*</span>
                                         </label>
                                         <div class="form-groupw-100">
                                             <div class="input-group-prepend ">
                                                 <span
                                                     class="input-group-text line-height-2-4 text-16 pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>

                                                 <input type="text" id="price-night"
                                                     value="{{ $result->property_price->original_price == 0 ? '' : $result->property_price->original_price }}"
                                                     name="price" class="money-input w-100 text-16">
                                             </div>
                                             <span class="text-danger" id="price-error">{{ $errors->first('price') }}</span>
                                         </div>
                                     </div> --}}
                                     <div class="form-group col-lg-6 pl-5 pr-5">
                                         <label for="listing_price_native">
                                             {{ __('Nightly Price') }}
                                             <span class="text-danger">*</span>
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
                                         {{-- <div class="form-groupw-100">
                                             <div class="input-group-prepend ">
                                                 <span
                                                     class="input-group-text line-height-2-4 text-16 pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>

                                                 <input type="text" id="price-night"
                                                     value="{{ $result->property_price->original_price == 0 ? '' : $result->property_price->original_price }}"
                                                     name="price" class="money-input w-100 text-16">
                                             </div>
                                             <span class="text-danger" id="price-error">{{ $errors->first('price') }}</span>
                                         </div> --}}
                                     </div>

                                     <div class="form-group col-lg-6 pl-5 pr-5">
                                         <label for="inputPassword4">{{ __('Currency') }}</label>
                                         <select id='price-select-currency_code' name="currency_code"
                                             class='form-control text-16 mt-2'>
                                             @foreach ($currency as $key => $value)
                                                 <option value="{{ $key }}"
                                                     {{ $result->property_price->currency_code == $key ? 'selected' : '' }}>
                                                     {{ $value }}</option>
                                             @endforeach
                                         </select>
                                         <span class="text-danger" id="price-error">
                                             <label id="price-night-error" class="error"
                                                 for="price-night">{{ $errors->first('currency') }}</label>
                                         </span>
                                     </div>

                                     {{-- <div class="form-group col-md-12">
										@if ($result->property_price->weekly_discount == 0 && $result->property_price->monthly_discount == 0)
											<p id="js-set-long-term-prices" class="text-center text-muted set-long-term-prices">
												{{ __('You can offer discounts for longer stays by setting') }}
												<a  href="#" id="show_long_term" class="secondary-text-color">
													{{ __('weekly and monthly') }}
												</a> {{ __('prices') }}.
											</p>
										@endif
									</div> --}}
                                 </div>

                                 {{-- <div class="form-row mt-4 border rounded pb-4 m-0  {{ $result->property_price->weekly_discount == 0 && $result->property_price->monthly_discount == 0 ? 'display-off' : '' }}"
                                     id="long-term-div">
                                     <div class="form-group col-md-12 main-panelbg pb-3 pt-3 pl-4">
                                         <h4 class="text-16 font-weight-700">{{ __('Long-term prices') }}</h4>
                                     </div>

                                     <div class="col-md-12 pl-5 pr-5">
                                         <label for="listing_price_native">
                                             {{ __('Weekly Discount Percent (%)') }}
                                         </label>

                                         <div class="input-addon">
                                             <input type="text" data-suggested="" id="price-week" class="text-16"
                                                 value="{{ $result->property_price->weekly_discount }}"
                                                 name="weekly_discount" data-saving="long_price">
                                             <span class="text-danger">{{ $errors->first('weekly_discount') }}</span>
                                         </div>
                                     </div>

                                     <div class="col-md-12 mt-3 pl-5 pr-5">
                                         <label for="listing_price_native">
                                             {{ __('Monthly Discount Percent (%)') }}
                                         </label>

                                         <div class="input-addon">
                                             <input type="text" data-suggested="₹16905" id="price-month"
                                                 class="money-input text-16 mt-2"
                                                 value="{{ $result->property_price->monthly_discount }}"
                                                 name="monthly_discount" data-saving="long_price">
                                             <span class="text-danger">
                                                 {{ $errors->first('monthly_discount') }}
                                             </span>
                                         </div>
                                     </div>
                                 </div> --}}


                                 {{-- <div class="mt-4 border rounded pb-4 m-0">
                                     <div class="form-group col-md-12 main-panelbg pb-3 pt-3 pl-4">
                                         <h4 class="text-16 font-weight-700">{{ __('Additional Pricing Options') }}</h4>
                                     </div>

                                     <div class="col-md-12 col-xs-12 pl-3 pr-3 pl-sm-5 pr-sm-5">
                                         <label for="listing_cleaning_fee_native_checkbox" class="label-large label-inline">
                                             <input type="checkbox" data-extras="true" class="pricing_checkbox"
                                                 data-rel="cleaning"
                                                 {{ $result->property_price->original_cleaning_fee == 0 ? '' : 'checked = "checked" ' }}>
                                             {{ __('Cleaning fee') }}
                                         </label>
                                     </div>

                                     <div id="cleaning"
                                         class="{{ $result?->property_price?->original_cleaning_fee == 0 ? 'display-off' : '' }}">
                                         <div class="col-md-12 pl-3 pr-3 pl-sm-5 pr-sm-5 mt-3">
                                             <div class="input-group">
                                                 <div class="input-group mb-3">
                                                     <div class="input-group-prepend">
                                                         <span
                                                             class="input-group-text text-16 pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                                     </div>
                                                     <input type="text" data-extras="true" id="price-cleaning"
                                                         aria-label="Amount"
                                                         value="{{ $result->property_price->original_cleaning_fee }}"
                                                         name="cleaning_fee" class="money-input text-16"
                                                         data-saving="additional-saving">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-12 col-xs-12 mt-4 pl-3 pr-3 pl-sm-5 pr-sm-5">
                                         <label for="listing_cleaning_fee_native_checkbox" class="label-large label-inline">
                                             <input type="checkbox" class="pricing_checkbox" data-rel="additional-guests"
                                                 {{ $result->property_price->original_guest_fee == 0 ? '' : 'checked="checked"' }}>
                                             {{ __('Additional guests') }}
                                         </label>
                                     </div>

                                     <div id="additional-guests"
                                         class="{{ $result->property_price->original_guest_fee == 0 ? 'display-off' : '' }}">
                                         <div class="col-md-12 pl-3 pr-3 pl-sm-5 pr-sm-5 mt-3">
                                             <div class="input-group">
                                                 <div class="input-group mb-3">
                                                     <div class="input-group-prepend">
                                                         <span
                                                             class="input-group-text text-16 pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                                     </div>
                                                     <input type="text" data-extras="true"
                                                         value="{{ $result->property_price->original_guest_fee }}"
                                                         id="price-extra_person" name="guest_fee"
                                                         class="money-input text-16" data-saving="additional-saving">
                                                 </div>
                                             </div>

                                             <div class="input-group mt-3">
                                                 <label class="label-large">{{ __('For each guest after') }}</label>
                                             </div>

                                             <div class="input-group mt-3">
                                                 <select id="price-select-guests_included" name="guest_after"
                                                     data-saving="additional-saving" class="text-16">
                                                     @for ($i = 1; $i <= 16; $i++)
                                                         <option value="{{ $i }}"
                                                             {{ $result?->property_price?->guest_after == $i ? 'selected' : '' }}>
                                                             {{ $i == '16' ? $i . '+' : $i }}
                                                         </option>
                                                     @endfor
                                                 </select>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-12 pl-3 pr-3 pl-sm-5 pr-sm-5 mt-4">
                                         <label for="listing_cleaning_fee_native_checkbox" class="label-large label-inline">
                                             <input type="checkbox" class="pricing_checkbox" data-rel="security"
                                                 {{ $result?->property_price?->original_security_fee == 0 ? '' : 'checked = "checked"' }}>
                                             {{ __('Security deposit') }}
                                         </label>
                                     </div>

                                     <div id="security"
                                         class="{{ $result->property_price->original_security_fee == 0 ? 'display-off' : '' }}">
                                         <div class="col-md-12 pl-3 pr-3 pl-sm-5 pr-sm-5 mt-4">
                                             <div class="input-group">
                                                 <div class="input-group mb-3">
                                                     <div class="input-group-prepend">
                                                         <span
                                                             class="input-group-text text-16 pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                                     </div>
                                                     <input type="text" class="money-input text-16" data-extras="true"
                                                         value="{{ $result->property_price->original_security_fee }}"
                                                         id="price-security" name="security_fee"
                                                         data-saving="additional-saving">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-12 pl-3 pr-3 pl-sm-5 pr-sm-5 mt-4">
                                         <label for="listing_cleaning_fee_native_checkbox"
                                             class="label-large label-inline">
                                             <input type="checkbox" class="pricing_checkbox" data-rel="weekend"
                                                 {{ $result->property_price->original_weekend_price == 0 ? '' : 'checked = "checked"' }}>
                                             {{ __('Weekend pricing') }}
                                         </label>
                                     </div>

                                     <div id="weekend"
                                         class="{{ $result->property_price->original_weekend_price == 0 ? 'display-off' : '' }}">
                                         <div class="col-md-12 pl-3 pr-3 pl-sm-5 pr-sm-5 mt-3">
                                             <div class="input-group">
                                                 <div class="input-group mb-3">
                                                     <div class="input-group-prepend">
                                                         <span
                                                             class="input-group-text text-16 pay-currency">{!! $result->property_price->currency->org_symbol !!}</span>
                                                     </div>
                                                     <input type="text" data-extras="true"
                                                         value="{{ $result->property_price->original_weekend_price }}"
                                                         id="price-weekend" name="weekend_price" class="text-16"
                                                         data-saving="additional-saving">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div> --}}

                                 <div class="row justify-content-between mt-4 mb-5">
                                     <div class="mt-4">
                                         <a data-prevent-default="" href="{{ url('listing/' . $result->id . '/photos') }}"
                                             class="btn btn-outline-danger secondary-text-color-hover text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 pl-5 pr-5">
                                             {{ __('Back') }}
                                         </a>
                                     </div>

                                     <div class="mt-4">
                                         <button type="submit"
                                             class="btn vbtn-outline-success text-16 font-weight-700 pl-5 pr-5 pt-3 pb-3 pl-5 pr-5"
                                             id="btn_next"> <i class="spinner fa fa-spinner fa-spin d-none"></i> <span
                                                 id="btn_next-text">{{ __('Next') }}</span>

                                         </button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection

 @section('validation_script')
     <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

     <script type="text/javascript">
         'use strict'
         let currencySymbolURL = '{{ url('currency-symbol') }}';
         let nextText = "{{ __('Next') }}..";
         var token = "{{ csrf_token() }}";
         let fieldRequiredText = "{{ __('This field is required.') }}";
         let validNumberText = "{{ __('Please enter a valid number.') }}";
         let priceMinValue = "{{ __('Please enter a value greater than or equal to 5.') }}";
         let discountsMinValue = "{{ __('Please enter a value greater than or equal to 0.') }}";
         let discountsMaxValue = "{{ __('Please enter a value less than or equal to 99.') }}";
         let page = 'pricing';
     </script>
     <script type="text/javascript" src="{{ asset('js/listings.min.js') }}"></script>
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
 @endsection
