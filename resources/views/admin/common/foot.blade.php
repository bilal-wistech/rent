<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script type="text/javascript">
  var APP_URL = "{{ url('/') }}";
</script>

<!-- jQuery 2.2.4 -->
<script type="text/javascript" src="{{ asset('backend/plugins/jQuery/jquery-3.6.3.min.js') }}"></script>

<!-- popper -->
<script type="text/javascript" src="{{ asset('backend/bootstrap/js/popper.min.js') }}"></script>

<!-- slim -->
<script type="text/javascript" src="{{ asset('backend/bootstrap/js/slim.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<!-- jQuery validation -->
<script type="text/javascript" src="{{ asset('backend/plugins/jQuery/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/jQueryUI/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
  $.widget.bridge('uibutton', $.ui.button);
  var sessionDate = '{!! Session::get('date_format_type') !!}';
</script>

<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="{{ asset('backend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Google Maps -->
<script type="text/javascript"
  src='https://maps.google.com/maps/api/js?key={{ config("vrent.google_map_key") }}&libraries=places'></script>

<!-- Custom scripts -->
<script type="text/javascript" src="{{ asset('backend/js/locationpicker.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/bootbox.min.js') }}"></script>

<!-- Admin JS -->
<script type="text/javascript" src="{{ asset('backend/dist/js/admin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/backend.min.js') }}"></script>

<!-- Morris.js charts -->
@if (Route::current()->uri() == 'admin/dashboard')
@endif

<!-- Sparkline -->
<script type="text/javascript" src="{{ asset('backend/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- jVectorMap -->
<script type="text/javascript" src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script type="text/javascript"
  src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- jQuery Knob Chart -->
<script type="text/javascript" src="{{ asset('backend/plugins/knob/jquery.knob.js') }}"></script>

<!-- Daterangepicker -->
<script type="text/javascript" src="{{ asset('backend/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->
<script type="text/javascript"
  src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- Slimscroll -->
<script type="text/javascript" src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script type="text/javascript" src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('backend/dist/js/app.min.js') }}"></script>

<!-- Select2 -->
<script type="text/javascript" src="{{ asset('backend/plugins/select2/select2.full.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
@if (Route::current()->uri() == 'admin/dashboard')
@endif

<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{ asset('backend/dist/js/demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/dist/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/daterangecustom.js') }}"></script>

@stack('scripts')

<!-- End of modal and modals -->
<!-- Begin of Javascript -->
<script>var hostUrl = "assets/";</script>

<!-- Begin Global Javascript Bundle (mandatory for all pages) -->
<script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>

<!-- End Global Javascript Bundle -->
<!-- Begin Vendors Javascript (used for this page only) -->
<script src="{{ asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{ asset('backend/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!-- End Vendors Javascript -->
<!-- Begin Custom Javascript (used for this page only) -->
<script src="{{ asset('backend/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/utilities/modals/new-target.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!-- End Custom Javascript -->
<!-- End of Javascript -->
</body>

</html>

<!-- Include jQuery from CDN (only one instance is needed) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    fetchProperties(page);
  });

  function fetchProperties(page) {
    $.ajax({
      url: "?page=" + page,
      type: "GET",
      beforeSend: function () {
        $('#property-content').html(`
          <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
            <div class="spinner-border text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        `);
      },
      success: function (data) {
        let newContent = $(data).find('#property-content').html();
        $('#property-content').html(newContent);
      },
      error: function (xhr) {
        console.error('Error fetching properties:', xhr);
      }
    });
  }
</script>