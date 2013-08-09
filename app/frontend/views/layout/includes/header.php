<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie8"<![endif]-->
<!--[if IE 9 ]><html class="ie9"<![endif]-->
<html dir="ltr" lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width">
        <meta charset="UTF-8" />
        <title><?php echo $this->title; ?></title>
        <meta name="description" content="Pavo Metro - Responsive Opencart theme" />
        <link href="http://www.pavothemes.com/demo/pav_metro_store/image/data/cart.png" rel="icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/style.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/pavproductcarousel.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/pavcontentslider.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/pavblog.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/pavgallery.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/colorbox.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/pavmegamenu.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Publics; ?>frontend/css/theme-responsive.css" />
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/jquery/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/base.js"></script>
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/common.js"></script>
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/jquery/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/jquery/colorbox/jquery.colorbox.js"></script>
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/jquery/colorbox/jquery.colorbox-min.js"></script>
        <script type="text/javascript" src="<?php echo Publics; ?>frontend/js/jquery/tabs.js"></script>
        <!--[if lt IE 9]>
        <script src="catalog/view/javascript/html5.js"></script>
        <![endif]-->
    </head>
    <body class="fs12 page-common-home pattern5 active">
        <div id="page-container">
            <header id="header">
                <div class="pav-topbar">
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span3 rowleft">
                                <div class="pav-lancur">
                                    <div id="language">
                                        <img title="English" alt="English" src="<?php echo Publics; ?>frontend/images/flags/gb.png">
                                        <img title="German" alt="German" src="<?php echo Publics; ?>frontend/images/flags/de.png">
                                        <img title="France" alt="France" src="<?php echo Publics; ?>frontend/images/flags/fr.png">
                                    </div>
                                    <div id="currency">
                                        <a title="Euro">€</a>
                                        <a title="Pound Sterling">£</a>
                                        <a title="US Dollar"><b>$</b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="span9">
                                <div class="row-fluid">
                                    <div class="span6 hidden-phone" id="welcome">
                                        <div class="pav-welcome pull-right">
                                            Xin chào, bạn có thể <a href="<?php echo URL .'account/register/dang-ky-tai-khoan.html' ?>">đăng ký</a> hoặc <a href="<?php echo URL .'account/login/dang-nhap-tai-khoan.html' ?>">đăng nhập</a>.
                                        </div>
                                    </div>
                                    <div class="span6" id="links">
                                        <div class="pav-links pull-right">
                                            <!-- <a href="" class="first"></a> -->
                                            <a id="wishlist-total" href="#">Wish List (1)</a>
                                            <a href="#">My Account</a>
                                            <a href="#">Shopping Cart</a>
                                            <a class="last" href="#">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix pull-right" id="cart">
                                    <div class="heading">
                                        <span class="pav-icon"></span>
                                        <span class="pav-label">Shopping Cart</span>
                                        <a><span id="cart-total">0 item(s) - $0.00</span></a>
                                    </div>
                                    <div class="content">
                                        <div class="empty">Your shopping cart is empty!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="span3" id="logo">
                                <a href="<?php echo URL; ?>">
                                    <img alt="" src="<?php echo Publics; ?>frontend/images/logo.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pav-wrapper" id="mainnav">
                    <div class="container">
                        <div class="mainnav-inner">
                            <div class="row-fluid">
                                <nav class="span8 offset3" id="mainmenu">
                                    <div class="navbar">
                                        <div class="navbar">
                                            <div class="navbar-inner">
                                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </a>
                                                <span class="hidden-tablet hidden-desktop">Navigation</span>
                                                <div class="nav-collapse collapse">
                                                    <ul class="nav megamenu">
                                                        <li class="home first">
                                                            <a href="#"><span class="menu-title">Home</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span class="menu-title">Watches</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span class="menu-title">Tablets</span></a>
                                                        </li>
                                                        <li class="parent dropdown pav-parrent">
                                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="menu-title">Digital</span><b class="caret"></b></a>
                                                            <div class="dropdown-menu level1">
                                                                <div class="dropdown-menu-inner">
                                                                    <ul>
                                                                        <li class=" "><a href="#"><span class="menu-title">Macs</span></a></li>
                                                                        <li class=" "><a href="#"><span class="menu-title">Books</span></a></li>
                                                                        <li class=" "><a href="#"><span class="menu-title">Printer</span></a></li>
                                                                        <li class=" "><a href="#"><span class="menu-title">Monitors</span></a></li>
                                                                        <li class=" "><a href="#"><span class="menu-title">Web Cameras</span></a></li>
                                                                        <li class=" "><a href="#"><span class="menu-title">Scanners</span></a></li>
                                                                        <li class=" "><a href="#"><span class="menu-title">Computer</span></a></li>
                                                                        <li class=" "><a href="#"><span class="menu-title">Macs</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="pav-blog-menu">
                                                            <a href="#"><span class="menu-title">Blog</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                                <div class="span1" id="search">
                                    <div class="pav-search pull-right">
                                        <div class="button-search hidden-phone hidden-tablet"></div>
                                        <div class="pav-search-arrow hidden-phone hidden-tablet"></div>
                                        <div class="pav-search-panel">
                                            <input type="text" value="" placeholder="Search" name="search">
                                            <div class="button-search hidden-tablet hidden-desktop"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--end #header-->
            <section id="sys-notification">
                <div class="container">
                    <div id="notification"></div>
                </div>
            </section>