<?php

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "delete from pessoa where idPessoa = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listarPessoaF.php");
}