<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('meta_keywords',config('app.name'))">
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="copyright" content="{{ env('APP_NAME') }}">
    <meta name="subject" content="{{ env('APP_NAME') }} {{ env('APP_VERSION') }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ filePath(getSystemSetting('favicon_icon')->value) }}">
    <!-- Start css -->
    <link href="{{ asset('assets/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css">
    <!-- Apex css -->
    <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
    <!-- Summernote css -->
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{ asset('assets/plugins/switchery/switchery.css') }}" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/pnotify/css/pnotify.custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/dropify.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset_rumbok/css/icofont.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    @yield('css-link')

    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/flag-icon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/video-js.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <!-- End css -->
    @notifyCss
    @yield('page-style')



</head>





<body class="vertical-layout">

    <!-- Start Containerbar -->
    <div id="containerbar">

        <!-- Start Leftbar -->
        @include('layouts.leftsidebar')
        <!-- End Leftbar -->

        <!-- Start Rightbar -->
        <div class="rightbar">

            <!-- Start Topbar -->
            @include('layouts.topbar')
            <!-- End Topbar -->

            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
            </div>

            @include('layouts.error')
            <!-- End Breadcrumbbar -->

            <!-- Start Contentbar -->
            <div class="contentbar" id="contentbar">

                @yield('content')

            </div>
            <!-- End Contentbar -->

            <!-- Start Footerbar -->
            @include('layouts.footer')
            <!-- End Footerbar -->

            <!--Modal or Delete Modal-->
            @include('layouts.modal')
            @include('layouts.delete')


            <div id="mySidenav" class="sidenav shadow rounded">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div id="master_media_section"></div>
            </div>

            <input type="hidden" value="{{ env('APP_URL') }}" id="domain_name">

        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/vertical-menu.js') }}"></script>
    <!-- Switchery js -->
    <script src="{{ asset('assets/plugins/switchery/switchery.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-switchery.js') }}"></script>
    <!-- Apex js -->
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Chart js -->
    <script src="{{ asset('assets/plugins/chart.js/chart.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/chart-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-chart-chartjs.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('assets/plugins/slick/slick.js') }}"></script>
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.js') }}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>

    <!-- Pnotify js -->
    <script src="{{ asset('assets/plugins/pnotify/js/pnotify.custom.js') }}"></script>
    <script src="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-pnotify.js') }}"></script>


    @yield('js-link')

    <!-- Custom Dashboard js -->
    <script src="{{ asset('assets/js/custom/custom-dashboard.js') }}"></script>
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="{{ asset('assets/js/videojs-ie8.min.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('js/dropify.js') }}"></script>
    <!-- Core js -->
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    {{-- Vue --}}
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        const api = axios.create({
            baseURL: "{{ url('') }}",
            // timeout: 1000,
            // headers: {}
        });
    </script>

    <!-- End js -->

    @include('sweetalert::alert')
    @include('notify::messages')

    @notifyJs
    @yield('page-script')

    <script>
        $(document).ready(function() {

            "use strict"

            try {
                $.post('{{ route('media.slide') }}', {
                    _token: '{{ csrf_token() }}'
                }, function(data) {
                    $('#master_media_section').html(data);
                });
            } catch (error) {
                location.reload();
            }


        });

        $('.dropify').dropify();

        // $('#datetimepicker1').datetimepicker();
    </script>

</body>

</html>
