<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="/assets/global/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />


    <link href="/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="favicon.ico" /> </head>

<style>
    .form-group-custom{
        width: 80%;
    }
    .custom-select{
        width: 200px;
    }
    .custom-icons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 40px;
        border-bottom: none!important;
        border-left: none!important;
    }
    .custom-icons span{
        font-size: 25px;
        cursor: pointer;
    }
    .custom-icons a{
        display: block;
        margin-top: 10px;
    }
    .custom-icons .fa-edit:hover{
        color: #0b94ea;
    }
    .custom-icons .fa-times:hover{
        color: #ea0b0b;
    }
</style>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

<div class="page-header navbar navbar-fixed-top">
    
    <div class="page-header-inner ">
        
        <div class="page-logo">
            <a href="index.html">
                <img src="/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>
        
        
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        
        
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                
                
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> 7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">12 pending</span> notifications</h3>
                            <a href="page_user_profile_1.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">just now</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 mins</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">10 mins</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Server #2 not responding. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">14 hrs</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> Application error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">2 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Database overloaded 68%. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> A user IP blocked. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">4 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">5 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> System Error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">9 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>



                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="/assets/layouts/layout/img/avatar3_small.jpg" />
                        <span class="username username-hide-on-mobile"> {{ \Illuminate\Support\Facades\Auth::user()->name }} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="page_user_profile_1.html">
                                <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li>
                            <a href="app_calendar.html">
                                <i class="icon-calendar"></i> My Calendar </a>
                        </li>
                        <li>
                            <a href="app_inbox.html">
                                <i class="icon-envelope-open"></i> My Inbox
                                <span class="badge badge-danger"> 3 </span>
                            </a>
                        </li>
                        <li>
                            <a href="app_todo.html">
                                <i class="icon-rocket"></i> My Tasks
                                <span class="badge badge-success"> 7 </span>
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="page_user_lock_1.html">
                                <i class="icon-lock"></i> Lock Screen </a>
                        </li>
                        <li>
                            <a href="page_user_login_1.html">
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
                <li class="nav-item {{ request()->routeIs('dashboard.users') ? 'active' : ''  }}">
                    <a href="{{ request()->routeIs('dashboard.users') ? 'javascript:void(0)' : route('dashboard.users')  }}" class="nav-link">
                        <i class="icon-user"></i>
                        <span class="title">Пользователи</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('dashboard.machine') ? 'active' : ''  }}">
                    <a href="{{ request()->routeIs('dashboard.machine') ? 'javascript:void(0)' : route('dashboard.machine')  }}" class="nav-link">
                        <i class="fa fa-cog"></i>
                        <span class="title">Автоматы</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('dashboard.statistic') ? 'active' : ''  }}">
                    <a href="{{ request()->routeIs('dashboard.statistic') ? 'javascript:void(0)' : route('dashboard.statistic')  }}" class="nav-link">
                        <i class="fa fa-bar-chart"></i>
                        <span class="title">Статистика</span>
                    </a>
                </li>

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

</body>

</html>
