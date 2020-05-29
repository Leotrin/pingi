<!doctype html>
<html lang="en">

<head>
    <title>:: Pingi.io :: </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Pingi.io uses a smart algorithm to watch over your website and notify you through various channels in case of problems. It checks for response from your website every x minutes and if we receive status which is suspicious our algorithm will do a deeper analysis based on different variables and decide if there is something wrong.">
    <meta name="author" content="www.mangosoft.mk">

    <link rel="icon" href="/assets/images/logo-white.png" type="image/png">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/assets/vendor/toastr/toastr.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/frontend_assets/css/main.css">
    <link rel="stylesheet" href="/frontend_assets/css/color_skins.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="/assets/images/logo-white.png" width="48" height="48" alt="Pingi"> <span style="color:#fff;">pingi.io</span></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">

    @include("layouts.nav")
    @include("layouts.menu")
    @yield("content")
</div>

<!-- Javascript -->
<script src="/frontend_assets/bundles/libscripts.bundle.js"></script>
<script src="/frontend_assets/bundles/vendorscripts.bundle.js"></script>

<script src="/assets/vendor/toastr/toastr.js"></script>
<script src="/frontend_assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->

<script src="/frontend_assets/bundles/mainscripts.bundle.js"></script>

@yield("footer")

@if(session('success')!=null)
    <script>
        toastr.success('<?= session('success'); ?>');
    </script>
@endif
@if(session('error')!=null)
    <script>
        toastr.error('<?= session('error'); ?>');
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{$error}}');
        </script>
    @endforeach
@endif
</body>
</html>
