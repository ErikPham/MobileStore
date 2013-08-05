<?php

class Connection {

    protected $dsn;
    public $type = 'mysqli';

    function __construct() {
        $config = require './config/config.php';
        $database = $config['database'];
        if ($this->dsn == null) {
            $this->connect($database);
        }
    }

    public function connect($database) {
        try {
            if ($this->type == 'pdo') {
                $this->dsn = new PDO("mysql:host={$database['host']};dbname={$database['dbName']}", $database['user'], $database['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                $this->dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } else {
                $this->dsn = mysqli_connect($database['host'], $database['user'], $database['password'], $database['dbName']);
                if ($this->dsn) {
                    mysqli_set_charset($this->dsn, 'utf8');
                }
            }
        } catch (Exception $e) {
            file_put_contents('log.txt', "Date: " . date('M j Y - G:iLS') . '--- Error: ' . $e->getMessage() . PHP_EOL . "\n\r", FILE_APPEND);
        }
    }

}

?>
