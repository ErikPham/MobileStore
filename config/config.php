<?php
return $config = array(
    'database' => array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbName' => 'mobile_store'
    ),
    'import' => array(
        'util.mailer.*',
        'util.*'
    ),
    'timezone' => 'Asia/Ho_Chi_Minh',
    'mail' => array(
        'Host' => 'smtp.gmail.com',
        'SMTPDebug' => 0,
        'SMTPAuth' => true,
        'SMTPSecure' => 'ssl',
        'Port' => 465,
        'Username' => 'phucpm.services@gmail.com',
        'Password' => 'phucpm095',
        'SetFrom' => array('admin@mobilestore.com', 'no-reply')
    )
)
?>
