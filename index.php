<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='controller/cLogout.php'>Sair</a>";
} else {

    header("location: view/login.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Criptos</title>
    </head>
    <body>
        <h2>Login - Teste</h2>
        <p></p>
        <a href="view/cadUsuario.php">Cadastro de Usuário</a>|
        <a href="view/cadPessoaJ.php">Cadastro de Pessoa Juridica</a>|
        <a href="view/cadPessoaF.php">Cadastro de Pessoa Física</a>
    </body>
</html>
