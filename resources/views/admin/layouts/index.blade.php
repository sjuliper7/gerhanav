<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Batakzone</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{!! asset('admin/css/bootstrap.min.css') !!}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{!! asset('admin/css/animate.min.css') !!}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{!! asset('admin/css/paper-dashboard.css') !!}" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('admin/css/demo.css')}}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{!! asset('admin/css/themify-icons.css') !!}" rel="stylesheet">

    <!--   Core JS Files   -->
    <script src="{!! asset('admin/js/jquery.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('admin/js/bootstrap.min.js') !!}" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{!! asset('admin/js/bootstrap-checkbox-radio.js') !!}"></script>

    <!--  Charts Plugin -->
    <script src="{!! asset('admin/js/chartist.min.js') !!}"></script>

    <!--  Notifications Plugin    -->
    <script src="{!! asset('admin/js/bootstrap-notify.js') !!}"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{asset('admin/js/paper-dashboard.js')}}"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('assets/js/demo.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // demo.initChartist();

            $('a.tree-toggler').click(function () {
                $(this).parent().children('ul.tree').toggle(300);
            });

            $('a.tree-toggler').parent().children('ul.tree').toggle()
        });
    </script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    BATAKZONE
                </a>
            </div>

            <ul class="nav">
                <li id="dashboard" class="">
                    <a href="/home">
                        <i class="ti-panel"></i>
                        <p class="nav"><b>Dashboard</b></p>
                    </a>
                </li>
                <li id="product" class="">
                    <a href="#" class="tree-toggler">
                        <i class="ti-bag"></i>
                        <p>Product</p>
                    </a>
                    <ul class="nav tree" style="margin-top: -25px;margin-left: 10px" >
                        <li style="margin-top: -5px;">
                            <a href="/products">
                                <i class="ti-link" style="font-size: 17px"></i>
                                <p>Manage Product</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/category-products">
                                <i class="ti-link" style="font-size: 17px"></i>
                                <p>Category Product</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/status-products">
                                <i class="ti-link" style="font-size: 17px"></i>
                                <p>Status Product</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/catalog-products">
                                <i class="ti-link" style="font-size: 17px"></i>
                                <p>Catalog Product</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/refund-admin">
                                <i class="ti-link" style="font-size: 17px"></i>
                                <p>Manage Refund</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/status-refund">
                                <i class="ti-link" style="font-size: 17px"></i>
                                <p>Status Refund</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/reviews">
                                <i class="ti-link" style="font-size: 17px"></i>
                                <p>Reviews</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="rbac" class="">
                    <a href="#" class="tree-toggler">
                        <i class="ti-pulse"></i>
                        <p>Manage RBAC</p>
                    </a>
                    <ul class="nav tree" style="margin-top: -25px;margin-left: 10px"  >
                        <li style="margin-top: -5px;">
                            <a href="/permissions">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/roles">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/users">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/user-status-">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>User Status</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/user-types">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>User Type</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="transactions" class="">
                    <a href="#" class="tree-toggler">
                        <i class="ti-wallet"></i>
                        <p>Transactions</p>
                    </a>
                    <ul class="nav tree" style="margin-top: -25px;margin-left: 10px"  >
                        <li style="margin-top: -5px;">
                            <a href="/transactions-admin">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Transactions</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/status-transactions">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Status Transactions</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="store" class="">
                    <a href="#" class="tree-toggler">
                        <i class="ti-package"></i>
                        <p>Store</p>
                    </a>
                    <ul class="nav tree" style="margin-top: -25px;margin-left: 10px"  >
                        <li style="margin-top: -5px;">
                            <a href="/stores">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Store</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/request-stores">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Store Requests</p>
                            </a>
                        </li>
                        <li style="margin-top: -25px;">
                            <a href="/status-stores">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Status Store</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="bank" class="">
                    <a href="#" class="tree-toggler">
                        <i class="ti-money"></i>
                        <p>Bank</p>
                    </a>
                    <ul class="nav tree" style="margin-top: -25px;margin-left: 10px"  >
                        <li style="margin-top: -5px;">
                            <a href="/ref-banks">
                                <i class="ti-link" style="font-size: 20px"></i>
                                <p>Referensi Banks</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" id="brand-title">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown user user-menu" id="user_menu" style="max-width: 280px;white-space: nowrap;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="max-width: 280px;white-space: nowrap;overflow: hidden;overflow-text: ellipsis">
                                <!-- The user image in the navbar-->
                                <img src="{{ Gravatar::get(Auth::user()->email) }}" class="user-image" style="max-width: 20px" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu" style="width: 150px">
                                <!-- The user image in the menu -->
                                <li style="height: 120px; padding: 10px; text-align: center;">
                                    <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle" alt="User Image" />
                                    <p>
                                        <span data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</span>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="row">
                                        <div class="pull-left" style="margin-left: 17px">
                                            <a href="{{ url('/user/profile') }}" class="small btn btn-default btn-flat btn-sm">Profile</a>
                                        </div>
                                        <div class="pull-right" style="margin-right: 17px">
                                            <a href="{{ url('/logout') }}" class="btn btn-default btn-flat btn-sm" id="logout"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                Signout
                                            </a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="submit" value="logout" style="display: none;">
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

</html>
