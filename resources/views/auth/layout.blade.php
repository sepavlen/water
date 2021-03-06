<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>Zdorovenka | Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="/assets/global/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />


    <link href="/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />



    <link href="/assets/global/login.min.css" rel="stylesheet" type="text/css"/>



    <link rel="shortcut icon" href="favicon.ico"/>
</head>


<body class=" login">
<div class="menu-toggler sidebar-toggler"></div>


<div class="logo">
    <a href="index.html">
        <img src="/assets/global/img/logo-big.png" alt=""/> </a>
</div>


@yield('content')

<div class="copyright"> <?= date('Y') ?> © Metronic. Admin Dashboard Template.</div>




<script src="/assets/global/jquery.min.js" type="text/javascript"></script>
<script src="/assets/global/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/global/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/global/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/assets/global/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/assets/global/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/app.min.js" type="text/javascript"></script>
<script src="/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>



</body>

</html>
