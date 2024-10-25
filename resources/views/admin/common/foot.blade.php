<!-- Add the sidebar's background -->
<div class="control-sidebar-bg"></div>
</div> <!-- ./wrapper -->

<script type="text/javascript">
  var APP_URL = "{{ url('/') }}";
</script>

<!-- jQuery 3.6.3 -->
<script src="{{ asset('backend/plugins/jQuery/jquery-3.6.3.min.js') }}"></script>

<!-- Popper -->
<script src="{{ asset('backend/bootstrap/js/popper.min.js') }}"></script>

<!-- Slim -->
<script src="{{ asset('backend/bootstrap/js/slim.min.js') }}"></script>

<!-- jQuery Validation -->
<script src="{{ asset('backend/plugins/jQuery/jquery.validate.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('backend/plugins/jQueryUI/jquery-ui.min.js') }}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
  var sessionDate = '{!! Session::get('date_format_type') !!}';
</script>

<!-- Bootstrap Bundle -->
<script src="{{ asset('backend/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Google Maps -->
<script src="https://maps.google.com/maps/api/js?key={{ config('vrent.google_map_key') }}&libraries=places"></script>

<!-- Location Picker -->
<script src="{{ asset('backend/js/locationpicker.jquery.min.js') }}"></script>

<!-- Bootbox -->
<script src="{{ asset('backend/js/bootbox.min.js') }}"></script>

<!-- Admin JS -->
<script src="{{ asset('backend/dist/js/admin.min.js') }}"></script>

<!-- Backend JS -->
<script src="{{ asset('backend/js/backend.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('backend/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- jVectorMap -->
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- jQuery Knob -->
<script src="{{ asset('backend/plugins/knob/jquery.knob.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('backend/js/moment.min.js') }}"></script>

<!-- Date Range Picker -->
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Datepicker -->
<script src="{{ asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<!-- WYSIWYG Editor -->
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('backend/dist/js/app.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('backend/plugins/select2/select2.full.min.js') }}"></script>

<!-- AdminLTE Demo -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('backend/dist/js/custom.js') }}"></script>
<script src="{{ asset('backend/js/daterangecustom.js') }}"></script>

<script>
  var separator = '{{ settings("date_separator") }}';
  var dateFormat = '{{ strtoupper(settings("date_format_type")) }}';
  var splitDate = dateFormat.split(separator);

  if (splitDate[1] === 'M') {
    dateFormat = dateFormat.replace('M', 'MMM');
  }
</script>

@stack('scripts')

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
</body>
</html>
