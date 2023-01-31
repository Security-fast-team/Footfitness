@php
    $site_info = App\Models\CompanyInfo::first();
    $site_contact_info = App\Models\CompanyContact::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> @yield('title', $site_info->title) </title>

    <!-- Favicon-->
    <link rel="icon" href="{{ asset($site_info->logo) }}" type="image/png">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @stack('third_party_stylesheets')
    <style>
        img.secreen-logo {
            max-width: 90px !important;
            max-height: 90px !important;
        }

        table tr th,
        table tr td {
            vertical-align: middle !important;
        }
    </style>
    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        @include('backend.partial.nav')
        <!-- Left side column. contains the logo and sidebar -->
        @include('backend.partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper  py-md-5 px-md-5">
            @yield('content')
        </div>

        <!-- Main Footer -->
        @include('backend.partial.footer')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('third_party_scripts')

    @stack('page_scripts')
</body>

</html>
