<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../logo.png">

    <title>Procurement</title>

    <!-- vendor css -->
    <link href="../../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../../lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="../../assets/css/dashforge.css">
    <link rel="stylesheet" href="../../assets/css/dashforge.dashboard.css">

    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="css/modal.css">

    <!-- JQuery -->
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <style>
        .bg-img {
            background: url("/img/combo.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            min-height: 100vh;
        }

        .water-mark {
            background: rgba(255, 255, 255, 0.95);
            min-height: 100vh;
        }

        .nav-item :hover {
            background: #0168f8;
            color: #000000;
        }

        .nav-item :hover {
            background: #cecece;
        }

        .modal {
            display:none;
            position: fixed;
            z-index: 10;
            right: 0;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            overflow: auto;
            background-color: rgba(6, 14, 7, 0.77);
            border-radius: 0px;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }
        .avatar {
            width: 200px;
            height:200px;
            border-radius: 50%;
        }

        .modal-content {
            background-color: #fff;
            /*margin: 4% auto 15% auto;
            border: 1px solid #888;
            width: 40%;*/
            margin-top: 10%;
            padding-bottom: 30px;
            background: #FFF url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207'),
            linear-gradient(to bottom, #ffffff 0%, #e5e5e5 100%) no-repeat, repeat right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;

        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        .close:hover,.close:focus {
            color: red;
            cursor: pointer;
        }


        /* Add Zoom Animation */
        .animate {
            animation: zoom 0.6s;
        }

        @keyframes zoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

    </style>

    @yield('styling')

    <link rel="stylesheet" href="/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/masterstyle.css">

</head>
<body style="background: #FAFAFA">

<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="/home"
           style="color: #0168f8"
           class="aside-logo">Procurement</a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">

        <div class="aside-loggedin bg-light p-2 shadow-sm" style="border-radius: 2px">
            <div class="d-flex align-items-center justify-content-start">
                <a href="/1/profile/view" class="avatar">
                    <img src="/profile/darth.jpg" class="rounded-circle" alt="">
                </a>
            </div>
            <div class="aside-loggedin-user">
                <a style="text-decoration: none" href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse" aria-expanded="false" aria-controls="loggedinMenu">
                    <h6 class="tx-semibold mg-b-0" style="color: #0168f8">{{Auth::user()->name}}</h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
            </div>
            <div class="collapse " id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item "><a href="/profile/{{ auth()->user()->id }}/view" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
                    <li class="nav-item"><a href="/account/settings" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
                    <li class="nav-item">
                        <a  href="{{ route('logout') }}" class="nav-link"

                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>

                          <span> {{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- aside-loggedin -->

        <ul class="nav nav-aside">
            <li class="nav-item"><a href="/home" class="nav-link"><i data-feather="home" style="color: #0168f8"></i> <span>Home</span></a></li>

            @if(session('isSupervisor'))
                <li class="nav-item"><a href="/profile/1/admin" class="nav-link"><i data-feather="activity" style="color: #0168f8"></i> <span>Admin.</span></a></li>
                <li class="nav-item"><a href="/profile/1/stats" class="nav-link"><i data-feather="bar-chart-2" style="color: #0168f8"></i> <span>Stats.</span></a></li>
            @endif

            <li class="nav-item"><a href="/links" class="nav-link"><i data-feather="link" style="color: #0168f8"></i> <span>Quick Links</span></a></li>
            <li class="nav-item"><a href="/assets/home" class="nav-link"><i data-feather="link" style="color: #0168f8"></i> <span>Admin</span></a></li>
            <li class="nav-item"><a href="/home" class="nav-link"><i data-feather="bell" style="color: #0168f8"></i> <span>Notifications</span></a></li>
            <li class="nav-item"><a href="/settings" class="nav-link"><i data-feather="settings" style="color: #0168f8"></i> <span>Settings</span></a></li>
            <li class="nav-item"><a href="/mail" class="nav-link"><i data-feather="mail" style="color: #0168f8"></i> <span>Messages</span></a></li>
            <li class="nav-item"><a href="/help" class="nav-link"><i data-feather="help-circle" style="color: #0168f8"></i> <span>Help Center</span></a></li>
            <li class="nav-item" title="Exit App"><a href="/help" class="nav-link"
                onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
                ><i data-feather="log-out" style="color: #0168f8"></i> <span>Log Out</span></a></li>
        </ul>
    </div>
</aside>

<div class="content ht-100v pd-0">

    <div class="bg-img">
        <div class="water-mark">
            <div class="content-body">
                <div class="container pd-x-0">
                    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                        <div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                                    <li class="breadcrumb-item mt-2"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active mt-2" aria-current="page">Sales Monitoring</li>
                                    <li class="mt-1 ml-4">
                                        <a href="#" title="Refresh">
                                            <i data-feather="refresh-ccw" class="text-secondary" style="float: right; width: 18px"></i>
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>

                    <div class="container-fluid">

                        @yield('content')

                    </div><!-- row -->
                </div><!-- container -->
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery-1.12.4.js"></script>

<script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../lib/feather-icons/feather.min.js"></script>
<script src="../../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../../lib/jquery.flot/jquery.flot.js"></script>
<script src="../../lib/jquery.flot/jquery.flot.stack.js"></script>
<script src="../../lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="../../lib/chart.js/Chart.bundle.min.js"></script>
<script src="../../lib/jqvmap/jquery.vmap.min.js"></script>
<script src="../../lib/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../../assets/js/dashforge.js"></script>
<script src="../../assets/js/dashforge.aside.js"></script>
<script src="../../assets/js/dashforge.sampledata.js"></script>
<!-- append theme customizer -->
<script src="../../lib/js-cookie/js.cookie.js"></script>
<script src="js/home.js"></script>
<script src="js/modal.js"></script>


<script src="/js/masterscript.js"></script>

@yield('scripts')
</body>
</html>
