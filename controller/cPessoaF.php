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
class cPessoaF {

    //put your code here
    public function inserir() {
        if (isset($_POST['salvarF'])) {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $endereco = $_POST['end'];           
            $sexo = $_POST['sexo'];           
            $cpf = $_POST['cpf'];

            $pdo = require '../pdo/connection.php';
            $sql = "insert into pessoa (nome,telefone,email,endereco,sexo,cpf) values (?,?,?,?,?,?)";
            $Statement = $pdo->prepare($sql);
//            $Statement->execute([$nome, $email, $pass]);
            $Statement->bindParam(1, $nome, PDO::PARAM_STR);
            $Statement->bindParam(2, $telefone, PDO::PARAM_STR);
            $Statement->bindParam(3, $email, PDO::PARAM_STR);
            $Statement->bindParam(4, $endereco, PDO::PARAM_STR);
            $Statement->bindParam(5, $sexo, PDO::PARAM_STR);
            $Statement->bindParam(6, $cpf, PDO::PARAM_STR);
            $Statement->execute();
            header("Location: cadPessoaF.php");
            unset($Statement);
            unset($pdo);
        }
        if (isset($_POST['cancelar'])) {
            header("Location: ../index.php");
        }
    }

    public function getPessoaF() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idPessoa, nome, email, cpf from pessoa where cnpj is null";
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
