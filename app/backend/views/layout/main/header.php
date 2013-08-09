<!Doctype html>
<html>
    <head>
        <title><?php echo (isset($this->title)) ? $this->title : 'Admin Control Panel'; ?></title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/bootstrap.min.css">
        <!-- Bootstrap responsive -->
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/bootstrap-responsive.min.css">
        <!-- jQuery UI -->
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/plugins/jquery-ui/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
        <!-- dataTables -->
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/plugins/datatable/TableTools.css">
        <!-- chosen -->
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/plugins/chosen/chosen.css">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/style.css">
        <!-- Color CSS -->
        <link rel="stylesheet" href="<?php echo URL ?>publics/css/themes.css">
        <link href="<?php echo URL ?>publics/ckeditor/contents.css" type="text/css"/>


        <!-- jQuery -->
        <script src="<?php echo URL ?>publics/js/jquery.min.js"></script>
        <!-- jQuery UI -->
        <script src="<?php echo URL ?>publics/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="<?php echo URL ?>publics/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
        <script src="<?php echo URL ?>publics/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
        <script src="<?php echo URL ?>publics/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
        <!-- slimScroll -->
        <script src="<?php echo URL ?>publics/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo URL ?>publics/js/bootstrap.min.js"></script>
        <!-- Bootbox -->
        <script src="<?php echo URL ?>publics/js/plugins/bootbox/jquery.bootbox.js"></script>
        <!-- Bootbox -->
        <script src="<?php echo URL ?>publics/js/plugins/form/jquery.form.min.js"></script>
        <!-- Validation -->
        <script src="<?php echo URL ?>publics/js/plugins/validation/jquery.validate.min.js"></script>
        <script src="<?php echo URL ?>publics/js/plugins/validation/additional-methods.min.js"></script>
        <!-- dataTables -->
        <script src="<?php echo URL ?>publics/js/plugins/datatable/jquery.dataTables.min.js"></script>
        <script src="<?php echo URL ?>publics/js/plugins/datatable/TableTools.min.js"></script>
        <script src="<?php echo URL ?>publics/js/plugins/datatable/ColReorder.min.js"></script>
        <script src="<?php echo URL ?>publics/js/plugins/datatable/ColVis.min.js"></script>
        <!-- Chosen -->
        <script src="<?php echo URL ?>publics/js/plugins/chosen/chosen.jquery.min.js"></script>

        <!-- Theme framework -->
        <script src="<?php echo URL ?>publics/js/eakroko.min.js"></script>
        <script src="<?php echo URL ?>publics/ckeditor/ckeditor.js"></script>
        <!-- Theme scripts -->
        <script src="<?php echo URL ?>publics/js/application.min.js"></script>
        <!-- Just for demonstration -->
        <script src="<?php echo URL ?>publics/js/demonstration.min.js"></script>
        <!-- CheckDelete-->
        <script src="<?php echo URL ?>publics/js/checkDelete.js"></script>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo URL ?>publics/img/favicon.ico" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

    </head>

    <body>
        <div id="navigation">
            <div class="container-fluid">
                <a href="#" id="brand">STORE</a>
                <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
                <ul class='main-nav'>
                    <li <?php Util::liActive('index') ?>>
                        <a href="<?php echo URL ?>backend/">
                            <i class="icon-home"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>
                    <li <?php Util::liActive('product') ?>>
                        <a href="<?php echo URL ?>backend/product" data-toggle="dropdown" class='dropdown-toggle'>
                            <i class="icon-edit"></i>
                            <span>Products</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo URL ?>backend/product/add">Add Product</a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>backend/product/list">Product Lists</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php Util::liActive('category') ?>>
                        <a href="<?php echo URL ?>backend/category" data-toggle="dropdown" class='dropdown-toggle'>
                            <i class="icon-edit"></i>
                            <span>Chuyên mục</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo URL ?>backend/category/add">Thêm chuyên mục</a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>backend/category">Danh sách chuyên mục</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php Util::liActive('news') ?>>
                        <a href="<?php echo URL ?>backend/news" data-toggle="dropdown" class='dropdown-toggle'>
                            <i class="icon-edit"></i>
                            <span>Tin tức</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo URL ?>backend/news/add">Thêm tin tức</a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>backend/news">Danh sách tin tức</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php Util::liActive('groups') ?>>
                        <a href="<?php echo URL ?>backend/groups" data-toggle="dropdown" class='dropdown-toggle'>
                            <i class="icon-edit"></i>
                            <span>Nhóm</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo URL ?>backend/groups/add">Thêm nhóm</a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>backend/groups">Danh sách nhóm</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
                <div class="user">
                    <div class="dropdown">
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo Session::get('username'); ?> <img src="<?php echo URL ?>publics/img/demo/user-avatar.jpg" alt=""></a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="<?php echo URL ?>backend/account/editprofile">Đổi thông tin cá nhân</a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>backend/account/changepassword">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a href="<?php echo URL ?>backend/account/logout">Thoát</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="#" class='toggle-mobile'><i class="icon-reorder"></i></a>
            </div>
        </div>