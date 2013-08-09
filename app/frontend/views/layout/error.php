<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Không tìm thấy trang</title>
    <style type="text/css">
        body { background-color: #efefef; color: #333; font-family: Georgia,Palatino,'Book Antiqua',serif;padding:0;margin:0;text-align:center; }
        p {font-style:italic;}
        div.dialog {
            width: 620px;
            margin: 4em auto 0 auto;
        }
        img { border:none; }
        a{color: red;text-decoration: none;}
    </style>
</head>

<body>
    <div class="dialog">
        <a href="<?php echo URL; ?>"><img src="<?php echo Publics ?>images/404.png" /></a>
        <?php
        $this->loadView();
        ?>
    </div>
</body>
</html>