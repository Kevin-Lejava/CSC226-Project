<?php

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try{
        if (!defined('DOMAIN')) define('DOMAIN', 'localhost');
        if (!defined('USERNAME')) define('USERNAME', 'lejava');
        if (!defined('PWD')) define('PWD', 'kevin7022');
        if (!defined('DATABASE')) define('DATABASE', 'lejava_');

        $conn = new mysqli(DOMAIN, USERNAME, PWD, DATABASE);

        $conn->set_charset("utf8mb4");
    }   catch(Exception $e){
        error_log($e->getMessage());
        exit('Error connecting to database');
    }

?>