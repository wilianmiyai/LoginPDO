<?php

if (isset($_POST['updatePF'])) {
    $id = $_POST['idPessoa'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['end'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "update pessoa set nome = ?, telefone = ?, email = ?, endereco = ?, sexo = ?, cpf = ? where idPessoa = ?";

    if ($sth = $pdo->prepare($sql)) {
        $sth->bindParam(1, $nome, PDO::PARAM_STR);
        $sth->bindParam(2, $telefone, PDO::PARAM_STR);
        $sth->bindParam(3, $email, PDO::PARAM_STR);
        $sth->bindParam(4, $endereco, PDO::PARAM_STR);
        $sth->bindParam(5, $sexo, PDO::PARAM_STR);
        $sth->bindParam(6, $cpf, PDO::PARAM_STR);
        $sth->bindParam(7, $id, PDO::PARAM_INT);
        $sth->execute();
        unset($sth);
        unset($pdo);
        header("location: ../view/listarPessoaF.php");
    }
}