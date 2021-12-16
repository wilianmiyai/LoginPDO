<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of cPessoaJ
 *
 * @author wilian
 */
class cPessoaJ {

    //put your code here
    public function inserir() {
        if (isset($_POST['salvarBD'])) {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $sexo = $_POST['sexo'];
            $endereco = $_POST['end'];
            $cnpj = $_POST['cnpj'];
            $nomeFantasia = $_POST['fantasia'];

            $pdo = require '../pdo/connection.php';
            $sql = "insert into pessoa (nome,telefone,email,sexo,endereco,cnpj,nomeFantasia) values (?,?,?,?,?,?,?)";
            $Statement = $pdo->prepare($sql);
//            $Statement->execute([$nome, $email, $pass]);
            $Statement->bindParam(1, $nome, PDO::PARAM_STR);
            $Statement->bindParam(2, $telefone, PDO::PARAM_STR);
            $Statement->bindParam(3, $email, PDO::PARAM_STR);
            $Statement->bindParam(4, $sexo, PDO::PARAM_STR);
            $Statement->bindParam(5, $endereco, PDO::PARAM_STR);
            $Statement->bindParam(6, $cnpj, PDO::PARAM_STR);
            $Statement->bindParam(7, $nomeFantasia, PDO::PARAM_STR);
            $Statement->execute();
            header("Location: cadPessoaJ.php");
            unset($Statement);
            unset($pdo);
        }
        if (isset($_POST['cancelar'])) {
            header("Location: ../index.php");
        }
    }

    public function getPessoaJ() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idPessoa, nome, email, cnpj from pessoa where cpf is null";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }


   public function getPessoaFById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select * from pessoa where idPessoa  = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }
}
