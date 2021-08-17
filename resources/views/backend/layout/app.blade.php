<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Zdorovenka | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="/assets/global/bootstrap/css/plugins.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto:300,400,500,600,700" media="all">    <link href="/assets/global/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />


    <link href="/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

    <link href="/assets/global/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="/assets/global/bootstrap/css/bootstrap-multiselect.min.css" type="text/css">
    <link href="/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="/favicon.ico" /> </head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

<div class="page-header navbar navbar-fixed-top">

    <div class="page-header-inner ">

        <div class="page-logo">
            <a href="{{ route('dashboard') }}">
                <img src="/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>


        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>


        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    @if (\App\src\helpers\ErrorHelper::checkErrors($machines) || session('unknown_errors'))
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>

                            <span class="badge badge-danger badge-danger-custom"> <i class="fa fa-bolt"></i> </span>
                    </a>
                    <ul class="dropdown-menu">
{{--                        <li class="external">--}}
{{--                            <h3>--}}
{{--                                <span class="bold">12 pending</span> notifications</h3>--}}
{{--                            <a href="page_user_profile_1.html">view all</a>--}}
{{--                        </li>--}}
                        <li>
                            <ul class="dropdown-menu-list" data-handle-color="#637283">
                                @if (\App\src\helpers\ErrorHelper::checkErrors($machines))
                                    <li>
                                        <a href="{{ request()->routeIs('dashboard.table') ? 'javascript:void(0)' : route('dashboard.table') }}">
                                    <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </span> Есть проблемы с автоматами </span>
                                        </a>
                                    </li>
                                @endif
                                @if (session('unknown_errors'))
                                        <li>
                                            <a href="{{ request()->routeIs('dashboard.unknownErrors') ? 'javascript:void(0)' : route('dashboard.unknownErrors') }}">
                                    <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Получен запрос в котором нет номера автомата
{{--                                                    @foreach(session('unknown_errors') as $error)--}}
{{--                                                        <b class="text-danger">{{ $error }}</b> </span>--}}
{{--                                                    @endforeach--}}
                                            </a>
                                        </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    @endif
                </li>



                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="/assets/layouts/layout/img/avatar.png" />
                        <span class="username username-hide-on-mobile"> {{ \Illuminate\Support\Facades\Auth::user()->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('dashboard.user.edit', ['user' => \Illuminate\Support\Facades\Auth::id()]) }}">
                                <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li>
                            <a href="#" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="icon-logout"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="page-container">

    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler"> </div>
                </li>
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : ''  }}">
                    <a href="{{ request()->routeIs('dashboard') ? 'javascript:void(0)' : route('dashboard')  }}" class="nav-link">
                        <i class="fa fa-home"></i>
                        <span class="title">Главная</span>
                    </a>
                </li>
                @if (isAdmin())
                    <li class="nav-item {{ request()->routeIs('dashboard.users') ? 'active' : ''  }}">
                        <a href="{{ request()->routeIs('dashboard.users') ? 'javascript:void(0)' : route('dashboard.users')  }}" class="nav-link">
                            <i class="icon-user"></i>
                            <span class="title">Пользователи</span>
                        </a>
                    </li>
                @endif
                <li class="nav-item {{ request()->routeIs('dashboard.machine') ? 'active' : ''  }}">
                    <a href="{{ request()->routeIs('dashboard.machine') ? 'javascript:void(0)' : route('dashboard.machine')  }}" class="nav-link">
                        <i class="fa fa-cog"></i>
                        <span class="title">Автоматы</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs(['dashboard.table', 'dashboard.statistic']) ? 'active' : ''  }}">
                    <a href="" class="nav-link nav-toggle">
                        <i class="fa fa-line-chart"></i>
                        <span class="title">Статистика</span>
                        <span class="arrow {{ request()->routeIs(['dashboard.table', 'dashboard.statistic']) ? 'open' : ''  }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item desktop-none {{ request()->routeIs(['dashboard.mobile-table']) ? 'selected' : ''  }}">
                            <a href="{{ request()->routeIs('dashboard.mobile-table') ? 'javascript:void(0)' : route('dashboard.mobile-table')  }}" class="nav-link ">
                                <i class="fa fa-mobile-phone"></i>
                                <span class="title">Таблицы (мобильная версия)</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ request()->routeIs(['dashboard.table']) ? 'selected' : ''  }}">
                            <a href="{{ request()->routeIs('dashboard.table') ? 'javascript:void(0)' : route('dashboard.table')  }}" class="nav-link ">
                                <i class="fa fa-table"></i>
                                <span class="title">Таблицы</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs(['dashboard.statistic']) ? 'selected' : ''  }} ">

                            <a href="{{ request()->routeIs('dashboard.statistic') ? 'javascript:void(0)' : route('dashboard.statistic')  }}" class="nav-link ">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title">Графики</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (isAdmin())
                    <li class="nav-item {{ request()->routeIs('dashboard.collection') ? 'active' : ''  }}">
                        <a href="{{ request()->routeIs('dashboard.collection') ? 'javascript:void(0)' : route('dashboard.collection')  }}" class="nav-link">
                            <i class="fa fa-money"></i>
                            <span class="title">Инкассация</span>
                        </a>
                    </li>
                @endif
            </ul>


        </div>

    </div>


    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>


<div class="page-footer">
    <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<script src="/assets/global/jquery.min.js" type="text/javascript"></script>
<script src="/assets/global/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/global/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/global/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/assets/global/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/assets/global/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/app.min.js" type="text/javascript"></script>

<script src="/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>

<script src="/assets/global/datatables.min.js" type="text/javascript"></script>
<script src="/assets/global/datatables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="/assets/global/bootstrap/js/bootstrap-multiselect.min.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/themes/high-contrast-light.js"></script>
<script>
    $('.dropdown-menu').bind('mousewheel DOMMouseScroll', function(e) {
        var scrollTo = null;
        if (e.type == 'mousewheel') {
            scrollTo = (e.originalEvent.wheelDelta * -1);
        }
        else if (e.type == 'DOMMouseScroll') {
            scrollTo = 40 * e.originalEvent.detail;
        }
        if (scrollTo) {
            e.preventDefault();
            $(this).scrollTop(scrollTo + $(this).scrollTop());
        }
    });
</script>
@stack('scripts')
</body>

</html>
