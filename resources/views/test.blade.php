
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Postlion Monitor</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="I5XKUZc2oiJMEKKxAd6k2R96Myu7kB7DanLrsqa3">
    <script>
        window.laravel_echo_port='6001';
        window.user = {"id":19,"name":"Johnson Andrew","last_name":"Siziba","status":1,"email":"jsiziba@agribank.co.zw","email_verified_at":null,"deleted_at":null,"created_at":"2020-03-03 09:09:47","updated_at":"2020-03-03 09:09:47","role":"default","avatar_name":"JS","last_update":"13 seconds ago","full_name":"Johnson Andrew Siziba","roles":[]} ;
        window.permissions = [];
    </script>

    <!-- vendor css -->
    <link href="http://192.168.0.33:8085/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="http://192.168.0.33:8085/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="http://192.168.0.33:8085/assets/css/dashforge.css">
    <link rel="stylesheet" href="http://192.168.0.33:8085/assets/css/dashforge.auth.css">
    <link rel="stylesheet" href="http://192.168.0.33:8085/assets/css/dashforge.profile.css">

    <link rel="stylesheet" href="http://192.168.0.33:8085/assets/css/dashforge.filemgr.css">

    <link rel="stylesheet" href="http://192.168.0.33:8085/css/app.css">

</head>
<body>
<div id="app">
    <header class="navbar navbar-header navbar-header-fixed">
        <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
        <div class="navbar-brand">
            <a href="http://192.168.0.33:8085/home" class="df-logo">Postilion<span>monitor</span></a>
        </div><!-- navbar-brand -->
        <div id="navbarMenu" class="navbar-menu-wrapper">
            <div class="navbar-menu-header">
                <a href="http://192.168.0.33:8085/home" class="df-logo">dash<span>forge</span></a>
                <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
            </div><!-- navbar-menu-header -->
            <ul class="nav navbar-menu">
                <li class="nav-item"><a href="http://192.168.0.33:8085/apps/postilion" class="nav-link"><i data-feather="archive"></i> Postilion Monitor </a></li>
            </ul>
            <div class="navbar-right">
                <a id="navbarSearch" href="" class="search-link"><i data-feather="search"></i></a>
                <div class="dropdown dropdown-notification">
                    <a href="" class="dropdown-link" data-toggle="dropdown">
                        <i data-feather="bell"></i>
                    </a>
                    <!--notifications-->
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">Notifications</div>
                        <notifications-small></notifications-small>
                        <div class="dropdown-footer"><a href="http://192.168.0.33:8085/apps/profile">View all Notifications</a></div>
                    </div>

                </div><!-- dropdown -->
                <div class="dropdown dropdown-profile">
                    <a href="" class="dropdown-link" data-toggle="dropdown">
                        <div class="avatar avatar-sm">
                            <span class="avatar-initial rounded-circle">JS</span>
                        </div>
                    </a><!-- dropdown-link -->
                    <div class="dropdown-menu dropdown-menu-right tx-13">
                        <div class="avatar avatar-lg mg-b-15">
                            <span class="avatar-initial rounded-circle">JS</span>
                        </div>
                        <h6 class="tx-semibold mg-b-5">Johnson Andrew Siziba</h6>
                        <p class="mg-b-25 tx-12 tx-color-03">default</p>
                        <a href="http://192.168.0.33:8085/apps/profile" class="dropdown-item"><i data-feather="user"></i> View Profile</a>
                        <div class="dropdown-divider"></div>

                        <a @click.prevent="logout" href="" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
                        <form id="logout-form" action="http://192.168.0.33:8085/logout" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="I5XKUZc2oiJMEKKxAd6k2R96Myu7kB7DanLrsqa3">                            </form>

                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
            </div><!-- navbar-right -->
            <div class="navbar-search">
            </div><!-- navbar-search -->
        </div>


    </header><!-- navbar -->
    <div class="filemgr-wrapper">
        <div class="filemgr-sidebar">
            <div class="filemgr-sidebar-body">
                <div class="pd-t-20 pd-b-10 pd-x-10">
                    <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Transactions</label>
                    <nav class="nav nav-sidebar tx-13">
                        <router-link class="nav-link" active-class="active" to="/transactions/dashboard" exact> <bar-chart-2-icon size="24"></bar-chart-2-icon>SAF Monitor  </router-link>
                        <router-link class="nav-link" active-class="active" to="/balances" exact> <settings-icon size="24"></settings-icon> Balances </router-link>
                        <router-link class="nav-link" active-class="active" to="/transactions/saf" exact> <activity-icon size="24"></activity-icon>SAF Aborting </router-link>
                        <router-link class="nav-link" active-class="active" to="/transactions/requests" exact> <zap-icon size="24"></zap-icon> Requests </router-link>
                        <router-link class="nav-link" active-class="active" to="/transactions/reports" exact> <folder-icon size="24"></folder-icon> Reports </router-link>
                        <router-link class="nav-link" active-class="active" to="/transactions/reports/create" exact> <plus-circle-icon size="24"></plus-circle-icon> Create Report  </router-link>
                    </nav>
                </div>
            </div>
        </div>
        <transition name="slide-in-left">
            <router-view></router-view>
        </transition>
    </div>
    <footer class="footer">
        <div>
            <span> 2020 &copy; Postlion Monitor</span>
            <span>Created by <a href=""> Prince Gurajena </a></span>
        </div>
    </footer>

</div>

<script src="http://192.168.0.33:8085/lib/jquery/jquery.min.js"></script>
<script src="http://192.168.0.33:8085/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://192.168.0.33:8085/lib/feather-icons/feather.min.js"></script>
<script src="http://192.168.0.33:8085/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="http://192.168.0.33:8085/assets/js/dashforge.js"></script>
<script>
    const scroll1 = new PerfectScrollbar('.filemgr-sidebar-body', {
        suppressScrollX: true
    });
</script>
<script src="http://192.168.0.33:8085/js/app.js"></script>
</body>
</html>
