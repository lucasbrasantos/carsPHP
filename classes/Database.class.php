<?php

require "../includes/connection.php";

class Database {
    protected $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
}

?>
