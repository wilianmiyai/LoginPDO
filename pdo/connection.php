<?php

require_once 'config.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of connection
 *
 * @author wilian
 */
class connection {

    public static function getConnection($host, $dbName, $user, $pass) {
        $dsn = "mysql:host=$host;dbname=$dbName;charset=UTF8";

        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            return new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
return connection::getConnection($host, $dbName, $user, $pass);
