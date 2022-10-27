<?php
    function dbConnection() {
        $dsn = 'mysql:host=localhost;dbname=school_management';
        $user = 'root';
        $pass = '';
        $option = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        try{
            $con = new PDO($dsn , $user , $pass , $option); 
            $con->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
            return $con;
        }
        catch(PDOException $e){
            echo "connection field".$e.getMessage();  
        }
    }

    function genericReportCount(string $table_name) {
        $stmt = dbConnection()->prepare("SELECT * FROM $table_name");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $count = $stmt->rowCount();

        return [
            'count' => $count,
            'rows'  => $rows
        ];
    }


?>