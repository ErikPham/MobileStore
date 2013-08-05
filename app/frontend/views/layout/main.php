<!DOCTYPE html>
<html>
<head>
    <title><?php echo $this->title; ?></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-git.js"></script>
<meta charset=utf-8 />
<style type="text/css">
    body{
        background: gray;
    }
</style>
</head>
<body>
    <?php
        $this->loadView();
    ?>
</body>
</html>