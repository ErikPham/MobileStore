<?php

class File {

    function __construct() {
        
    }

    private static function handle($file, $mode = 'r') {
        $handle = null;
        if (file_exists($file)) {
            $handle = fopen($file, $mode);
        }
        return $handle;
    }

    public static function read($file, $mode = 'r', $singleLine = false) {
        $data = array();
        $handle = self::handle($file, $mode);
        if ($handle) {
            while ($row = fgets($handle)) {
                $data[] = $row;
            }
        }

        if (!empty($data) && $singleLine) {
            return $data[0];
        }
        return $data;
    }

}

?>
