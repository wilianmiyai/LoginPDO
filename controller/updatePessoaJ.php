<?php

if (isset($_POST['updatePJ'])) {
    $id = $_POST['idPessoa'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo']; 
    $endereco = $_POST['end'];
    $cnpj = $_POST['cnpj'];
    $nomeFantasia = $_POST['fantasia'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "update pessoa set nome = ?, telefone = ?, email = ?, sexo = ?, endereco = ?, cnpj = ?, nomeFantasia = ? where idPessoa = ?";

    if ($sth = $pdo->prepare($sql)) {
        $sth->bindParam(1, $nome, PDO::PARAM_STR);
        $sth->bindParam(2, $telefone, PDO::PARAM_STR);
        $sth->bindParam(3, $email, PDO::PARAM_STR);
        $sth->bindParam(4, $sexo, PDO::PARAM_STR);
        $sth->bindParam(5, $endereco, PDO::PARAM_STR);
        $sth->bindParam(6, $cnpj, PDO::PARAM_STR);
        $sth->bindParam(7, $nomeFantasia, PDO::PARAM_STR);
        $sth->bindParam(8, $id, PDO::PARAM_INT);
        $sth->execute();
        unset($sth);
        unset($pdo);
        header("location: ../view/listarPessoaJ.php");
    }
}