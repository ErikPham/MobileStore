<?php

class Breadcrumb {
    
    public static function view($list, $pointer = '&raquo;') {
        if (!empty($list)) {
            $link = "<a href='" . URL . "'> Trang chủ</a> ";
            $end = end($list);
            array_pop($list);
            foreach ($list as $item) {
                $link .= $pointer . ' <a href="' . URL  . $item['url'] . '">' . $item['name'] . '</a> ';
            }
            $link .= $pointer . ' ' .$end['name'];
        }

        return $link;
    }

}

?>
