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
        <base href="<?php echo URL; ?>"/>
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
                                            <?php if (Session::get('auth') == 1): ?>
                                                Xin chào <?php echo Session::get('username') ?>, <a href="<?php echo URL . 'account/logout/' . Util::toSlug('dang xuat tai khoan'); ?>">đăng xuất</a>.
                                            <?php else: ?>
                                                Xin chào, bạn có thể <a href="<?php echo URL . 'account/register/' . Util::toSlug('dang ky tai khoan'); ?>">đăng ký</a> hoặc <a href="<?php echo URL . 'account/login/' . Util::toSlug('dang nhap tai khoan'); ?>">đăng nhập</a>.
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="span6" id="links">
                                        <div class="pav-links pull-right">
                                            <!-- <a href="" class="first"></a> -->
                                            <?php
                                            if (Session::get('auth') == 1):
                                                ?>
                                                <a id="wishlist-total" href="<?php echo URL . 'account/wishlist/' . Util::toSlug('san pham yeu thich ' . Session::get('username')); ?>">Sản phẩm yêu thích</a>
                                                <a href="<?php echo URL . 'account/myaccount/' . Util::toSlug('tai khoan ca nhan ' . Session::get('username')); ?>">Quản lý tài khoản</a>
                                            <?php endif; ?>
                                            <a href="<?php echo URL . 'checkout/viewcart/' . Util::toSlug('gio hang cua ban'); ?>">Giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix pull-right" id="cart">
                                    <div class="heading">
                                        <span class="pav-icon"></span>
                                        <span class="pav-label">Giỏ hàng</span>
                                        <a><span id="cart-total"></span></a>
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
                                                <span class="hidden-tablet hidden-desktop">Menu</span>
                                                <div class="nav-collapse collapse">
                                                    <ul class="nav megamenu">
                                                        <li class="home first">
                                                            <a href="<?php echo URL; ?>"><span class="menu-title">Home</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><span class="menu-title">Sản phẩm</span></a>
                                                        </li>

                                                        <li class="parent dropdown pav-parrent">
                                                            <a href="<?php echo URL . 'news/view/tin-tuc.html' ?>" data-toggle="dropdown" class="dropdown-toggle"><span class="menu-title">Tin tức</span><b class="caret"></b></a>
                                                            <?php
                                                            $fileNew = CACHE . 'category_news.txt';
                                                            $menuNews = File::read($fileNew, 'r', true);
                                                            $menuNews = json_decode($menuNews, true);
                                                            if(!empty($menuNews)):
                                                            ?>
                                                            <div class="dropdown-menu level1">
                                                                <div class="dropdown-menu-inner">
                                                                    <ul>
                                                                        <?php foreach($menuNews as $menuNew): ?>
                                                                        <li><a href="<?php echo URL . 'news/category/'.$menuNew['id'].'/'.Util::toSlug($menuNew['name']); ?>"><span class="menu-title"><?php echo $menuNew['name']; ?></span></a></li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <?php endif;?>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo URL . 'contacts/send/' . Util::toSlug('lien he voi chung toi') ?>"><span class="menu-title">Liên hệ</span></a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo URL . 'classified/view/' . Util::toSlug('thong tin rao vat') ?>"><span class="menu-title">Rao vặt</span></a>
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