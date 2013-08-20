<?php

include './library/Captcha.php';
include './library/Session.php';
define('SESSION_KEY', 'PhucPM');
/*
  include './library/Connection.php';
  include './library/Model.php';

  $model = new Model();
  //
  $data = array(
  'columns' => array('id', 'name'),
  'st1' => array(1, 2),
  'st2' => array(1, 3)
  );

  $insert = $model->formatInsertMultiple($data, 'user');
  echo $insert;/*
 * 
 * 

  echo strtotime('-1days') . '<br/>';
  echo strtotime('-1weeks'). '<br/>';
  echo strtotime('-1months'). '<br/>';
  echo strtotime('-3months'). '<br/>';
 */
//$data = array(array('id' => 1, 'name' => 'Máy tính bảng Nokia màu hồng lộ ảnh mặt sau', 'thumb' => ''), array('id' => 2, 'name' => 'Văn hóa alo ở các nước trên thế giới như thế nào?', 'thumb' => ''));
//$data = array(array('id' => 1, 'name' => 'Apple', 'logo' => ''),array('id' => 2, 'name' => 'Samsung', 'logo' => ''));
$data = array(array('title' => 'Khuyến mại lớn khi mua smart phone HTC', 'summary' => 'Nhân dịp khai trương chúng tôi có chương trình khuyến mại giảm 20% khi quý khách mua bất cứ smart phone nào của HTC', 'link' => '','image' => 'http://localhost/mobilestore/publics/frontend/images/4-940x457.png'), array('title' => 'Nokia có thể tung ra Lumia 1080 5,5 inch cạnh tranh với Note III', 'summary' => 'Những tin tức trên mạng cho rằng, Nokia chuẩn bị giới thiệu mẫu smartphone lai máy tính bảng đầu tiên của hãng vào mùa thu này với tên mã Lumia 1080. ', 'link' => '','image' => 'http://localhost/mobilestore/publics/frontend/images/1-940x457.png'));

?>

<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-git.js"></script>
<meta charset=utf-8 />
<title>JS Bin</title>
</head>
<body>
  <?php echo json_encode($data); ?>
</body>
</html>
