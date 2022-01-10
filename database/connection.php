<?php
    function Connect(){
        $server_name = "sql6.freesqldatabase.com";
        $username = "sql6464470";
        $password = "birm6Hqzg6";
        $db_name = "sql6464470";
        try {
            $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
          } catch(PDOException $e) {
            return -1;
          }
    }
