<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php 
require_once '../controller/cLogin.php';
$login = new cLogin();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="<?php $login->login(); ?>" method="POST">
            <input type="email" name="email" required placeholder="Email aqui"/>
            <br>
            <br>
            <input type="password" name="pass" required placeholder="Senha aqui"/>
            <br>
            <br>
            <input type="submit" name="logar" value="Logar"/>
            <input type="submit" value="Limpar" name="limpar" />
        </form>
        <?php
        ?>
    </body>
</html>
