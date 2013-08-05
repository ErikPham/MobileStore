<!Doctype html>
<html>
<head>
    <title><?php echo $this->title ?></title>
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
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo URL ?>publics/css/style.css">
    <!-- Color CSS -->
    <link rel="stylesheet" href="<?php echo URL ?>publics/css/themes.css">


    <!-- jQuery -->
    <script src="<?php echo URL ?>publics/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo URL ?>publics/js/bootstrap.min.js"></script>
    <script src="<?php echo URL ?>publics/js/eakroko.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" />
    <!-- Apple devices Homescreen icon -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo URL ?>publics/img/apple-touch-icon-precomposed.png" />

</head>

<body class='login'>
    <?php
        $this->loadView();
    ?>
</body>
</html>
