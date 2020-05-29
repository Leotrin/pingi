<!doctype html>
<html lang="en">

<head>
    <title>:: Pingi ::</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Pingi.io uses a smart algorithm to watch over your website and notify you through various channels in case of problems. It checks for response from your website every x minutes and if we receive status which is suspicious our algorithm will do a deeper analysis based on different variables and decide if there is something wrong.">
    <meta name="author" content="www.mangosoft.mk">

    <link rel="icon" href="/assets/images/logo-white.png" type="image/png">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/frontend_assets/css/main.css">
    <link rel="stylesheet" href="/frontend_assets/css/color_skins.css">
</head>

<body class="theme-blue">
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle auth-main">
            <div class="auth-box">
                <div class="top">
                    <a href="{{url('/')}}">
                        <img src="/assets/images/logo-white.png" alt="Pingi"> <span style="color:#fff;">pingi.io</span>
                    </a>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>
</html>

