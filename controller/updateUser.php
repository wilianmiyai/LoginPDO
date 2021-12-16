<?php


if (isset($_POST['Update'])) {
            $id = $_POST['idUser'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pdo = require_once '../pdo/connection.php';
            $sql = "update usuario set nome = ?, email = ? where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            $sth->bindParam(3, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("location: ../view/listaUsuarios.php");
        }
