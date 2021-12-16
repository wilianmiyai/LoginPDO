<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "delete from usuario where idUser = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaUsuarios.php");
}