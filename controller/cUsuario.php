<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of cUsuario
 *
 * @author wilian
 */
class cUsuario {

    public function inserir() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pass'];

            $pdo = require '../pdo/connection.php';
            $sql = "insert into usuario (nome,email,pas) values (?,?,?)";
            $Statement = $pdo->prepare($sql);
//            $Statement->execute([$nome, $email, $pass]);
            $Statement->bindParam(1, $nome, PDO::PARAM_STR);
            $Statement->bindParam(2, $email, PDO::PARAM_STR);
            $Statement->bindParam(3, $pass, PDO::PARAM_STR);
            $pass = password_hash($pas, PASSWORD_DEFAULT);
            $Statement->execute();
            header("Location: cadUsuario.php");
            unset($Statement);
            unset($pdo);
        }
        if (isset($_POST['cancelar'])) {
            header("Location: ../index.php");
        }
    }

    public function getUsuarios() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nome, email from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }

    public function getPessoaFById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nome, email from usuario where idUser = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

    public function deletarUser($id) {
        if (isset($_POST['deletar'])) {
            $id = $_POST['idUser'];
            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from usuario where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("location: ../view/listaUsuarios.php");
        }
    }

}
