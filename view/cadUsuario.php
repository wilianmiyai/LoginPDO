<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();
if (isset($_SESSION['logadoT']) && $_SESSION['logadoT'] == true) {
    echo $_SESSION['usuarioT'] . " | " . $_SESSION['emailT'];
    echo " | <a href='../controller/cLogout.php'>Sair</a>";
} else {

    header("location: login.php");
}

require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cadastro de Usuário</h2>
        <form action="<?php $cadUser->inserir(); ?>" method="POST">
            <input type="text" name="nome" required placeholder="Nome aqui"/>
            <br>
            <br>
            <input type="email" name="email" required placeholder="Email aqui"/>
            <br>
            <br>
            <input type="password" name="pass" required placeholder="Senha aqui"/>
            <br>
            <br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="submit" value="Limpar" name="limpar" />
            <input type="submit" value="Cancelar" onclick="location.href = '../index.php'"/>
            <br><br>
                <input type="submit" value="Listar Users" onclick="location.href = 'listaUsuarios.php'"/>
        </form>
        <?php ?>
    </body>
</html>
