</div>
</div>
</div>

<!-- Scripts -->
{{--<script  type="text/javascript" src="{{ asset('js/app.js') }}"></script>--}}

<link href="{{ asset('/custom/assets/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
<script src="{{ asset('custom/assets/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('custom/assets/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>

<script src="{{ asset('/custom/assets/image-uploader/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('/custom/assets/image-uploader/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('/custom/assets/image-uploader/js/jquery.fileupload.js') }}"></script>
<script src="{{ asset('/custom/assets/typeahead/typeahead.bundle.js') }}"></script>

</body>
</html>
