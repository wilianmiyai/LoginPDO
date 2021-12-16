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
$listUsers = $cadUser->getUsuarios();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>id</th><th>Usuário</th><th>e-mail</th><th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUsers as $user): ?>
                    <tr>
                        <td><?php echo $user['idUser']; ?></td>
                        <td><?php echo $user ['nome']; ?></td>
                        <td><?php echo $user ['email']; ?></td>                    
                        <td>
                            <form action="editarUsuario.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user["idUser"]; ?>"/>
                                <input type="submit" name="update" value="Editar"/>
                            </form>
                            <form action="../controller/deletarUser.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $user["idUser"]; ?>"/>
                                <input type="submit" name="delete" value="Deletar"/>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" onclick="location.href = 'cadUsuario.php'">Voltar</button>
    </body>
</html>
