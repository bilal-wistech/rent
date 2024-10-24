jQuery.validator.addMethod("laxEmail",(function(e,t){return this.optional(t)||/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(e)}),validEmailText),$("#signup_form").validate({rules:{first_name:{required:!0,maxlength:255},last_name:{required:!0,maxlength:255},email:{required:!0,maxlength:255,laxEmail:!0},password:{required:!0,minlength:6}}}),$(document).on("blur keyup","#email",(function(){$("#customerModalBtn").attr("disabled",!1);var e=$("#email").val(),t=$('input[name="_token"]').val();$(".error-tag").html("").hide(),""!=e?$.ajax({url:checkUserURL,method:"POST",data:{email:e,_token:t},success:function(e){"not_unique"==e?($("#emailError").html('<label class="text-danger">'+emailExistText+"</label>"),$("#email").addClass("has-error"),$("#customerModalBtn").attr("disabled","disabled")):($("#email").removeClass("has-error"),$("#emailError").html(""),$("#customerModalBtn").attr("disabled",!1))}}):$("#emailError").html("")})),$("#phone").intlTelInput({separateDialCode:!0,nationalMode:!0,preferredCountries:["us"],autoPlaceholder:"polite",placeholderNumberType:"MOBILE",utilsScript:"../public/backend/js/intl-tel-input-13.0.0/build/js/utils.js"});var hasPhoneError=!1,hasEmailError=!1;$.validator.setDefaults({highlight:function(e){$(e).parent("div").addClass("has-error")},unhighlight:function(e){$(e).parent("div").removeClass("has-error")},errorPlacement:function(e,t){$("#emailError").html("").hide(),e.insertAfter(t)}});var countryData=$("#phone").intlTelInput("getSelectedCountryData");function formattedPhone(){var e;""!=$("#phone").val&&(e=$("#phone").intlTelInput("getNumber").replace(/-|\s/g,""),$("#formatted_phone").val(e))}function enableDisableButton(){hasPhoneError||hasEmailError?$("form").find("button[type='button']").prop("disabled",!0):$("form").find("button[type='button']").prop("disabled",!1)}function updateControls(e){$("#street_number").val(e.streetNumber),$("#route").val(e.streetName),void 0!==e.city?$("#city").val(e.city):$("#city").val(e.stateOrProvince),$("#state").val(e.stateOrProvince),$("#postal_code").val(e.postalCode),$("#country").val(e.country),void 0!==e.city&&"undefined"!==e.country&&null!==typeof e.city&&null!==e.country&&(e.city,1)&&""!==e.country?$("#map_address").val(e.city+","+e.country_fullname):""!=e.stateOrProvince&&""!=e.country_fullname&&$("#map_address").val(e.stateOrProvince+","+e.country_fullname)}$("#default_country").val(countryData.iso2),$("#carrier_code").val(countryData.dialCode),$("#phone").on("countrychange",(function(e,t){formattedPhone(),$("#default_country").val(t.iso2),$("#carrier_code").val(t.dialCode),""!==$.trim($(this).val())?$(this).intlTelInput("isValidNumber")&&isValidPhoneNumber($.trim($(this).val()))?($("#tel-error").html(""),$.ajax({method:"POST",url:duplicateNumberCheckURL,dataType:"json",cache:!1,data:{phone:$.trim($(this).val()),carrier_code:$.trim(t.dialCode),_token:token}}).done((function(e){1==e.status?($("#tel-error").html(""),$("#phone-error").show(),$("#phone-error").addClass("error").html(e.fail).css("font-weight","bold"),hasPhoneError=!0,enableDisableButton()):0==e.status&&($("#tel-error").show(),$("#phone-error").html(""),hasPhoneError=!1,enableDisableButton())}))):($("#tel-error").addClass("error").html(validInternationalNumber).css("font-weight","bold"),hasPhoneError=!0,enableDisableButton(),$("#phone-error").hide()):($("#tel-error").html(""),$("#phone-error").html(""),hasPhoneError=!1,enableDisableButton())})),$("input[name=phone]").on("blur keyup",(function(e){var t,a;formattedPhone(),""!==$.trim($(this).val())?$(this).intlTelInput("isValidNumber")&&isValidPhoneNumber($.trim($(this).val()))?($(this).val().replace(/-|\s/g,""),t=$(this).val().replace(/^0+/,""),a=$("#phone").intlTelInput("getSelectedCountryData").dialCode,$.ajax({url:duplicateNumberCheckURL,method:"POST",dataType:"json",data:{phone:t,carrier_code:a,_token:token}}).done((function(e){1==e.status?0==t.length?$("#phone-error").html(""):($("#phone-error").addClass("error").html(e.fail).css("font-weight","bold"),hasPhoneError=!0,enableDisableButton()):0==e.status&&($("#phone-error").html(""),hasPhoneError=!1,enableDisableButton())})),$("#tel-error").html(""),$("#phone-error").show(),hasPhoneError=!1,enableDisableButton()):($("#tel-error").addClass("error").html(validInternationalNumber).css("font-weight","bold"),hasPhoneError=!0,enableDisableButton(),$("#phone-error").hide()):($("#tel-error").html(""),$("#phone-error").html(""),hasPhoneError=!1,enableDisableButton())})),$("#add_pr").validate({rules:{map_address:{required:!0},host_id:{required:!0}}}),$("#us3").locationpicker({location:{latitude:0,longitude:0},radius:0,addressFormat:"",inputBinding:{latitudeInput:$("#latitude"),longitudeInput:$("#longitude"),locationNameInput:$("#map_address")},enableAutocomplete:!0,onchanged:function(e,t,a){updateControls($(this).locationpicker("map").location.addressComponents)},oninitialized:function(e){updateControls($(e).locationpicker("map").location.addressComponents)}});var customerBtn=$(window).width();customerBtn<768&&$("#respo").css("margin-bottom","7px"),$("#customerModal").on("hidden.bs.modal",(function(e){$(this).find("form").trigger("reset"),$("#signup_form").validate().resetForm(),$("#signup_form").find(".error").removeClass("error"),$("#signup_form").find("#error_msg").hide()})),$("#signup_form").on("submit",(function(e){e.preventDefault();var t=$("#first_name").val(),a=$("#last_name").val(),r=$("#email").val(),o=$("#phone").val(),n=$("#carrier_code").val(),l=$("#formatted_phone").val(),i=$("#default_country").val(),s=$("#password").val(),d=$("#status").val();e=$('input[name="_token"]').val();t&&a&&r?$.ajax({url:$(this).attr("action"),type:"POST",data:{first_name:t,last_name:a,email:r,password:s,status:d,phone:o,carrier_code:n,formatted_phone:l,default_country:i,_token:e},dataType:"JSON"}).done((function(e){1==e.status&&($("#customerModal").modal("hide"),$("#host_id").append('<option data-icon-class="icon-star-alt" value="'+e.user.id+'" selected = "selected">'+e.user.first_name+" "+e.user.last_name+"</option>"),$("#signup_form")[0].reset())})).fail((function(e){})):$("#signup_form").submit()})),$("#add_city_form").on("submit",(function(e){e.preventDefault();let t=$("#city_name").val(),a=$("#modal_country").val(),r=$('input[name="_token"]').val();t&&a?$.ajax({url:$(this).attr("action"),type:"POST",data:{name:t,country:a,_token:r},dataType:"json",success:function(e){if("success"===e.status){var t=e.city;$("#city").append('<option value="'+t.id+'">'+t.name+"</option>"),$("#city").val(t.id),$("#cityModal").modal("hide")}else alert("Failed to add city. Please try again.")},error:function(e){alert("Error occurred while adding the city.")}}):alert("City name and country are required!")})),$("#add_area_form").on("submit",(function(e){e.preventDefault();let t=$("#area_name").val(),a=$("#modal_city").val(),r=$('input[name="_token"]').val();t&&a?$.ajax({url:$(this).attr("action"),type:"POST",data:{name:t,city:a,_token:r},dataType:"json",success:function(e){if("success"===e.status){var t=e.area;$("#area").append('<option value="'+t.id+'">'+t.name+"</option>"),$("#area").val(t.id),$("#areaModal").modal("hide")}else alert("Failed to add area. Please try again.")},error:function(e){alert("Error occurred while adding the area.")}}):alert("Area name and city are required!")}));