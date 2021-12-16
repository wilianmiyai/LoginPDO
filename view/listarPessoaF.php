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

require_once '../controller/cPessoaF.php';
$cadPessoa = new cPessoaF();
$listaPessoaF = $cadPessoa->getPessoaF();
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
                    <th>id</th><th>Nome</th><th>E-mail</th><th>CPF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPessoaF as $pessoa): ?>
                    <tr>
                        <td><?php echo $pessoa['idPessoa']; ?></td>
                        <td><?php echo $pessoa ['nome']; ?></td>
                        <td><?php echo $pessoa ['email']; ?></td>
                        <td><?php echo $pessoa ['cpf']; ?></td>
                        <td>
                            <form action="editarPessoaF.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pessoa["idPessoa"]; ?>"/>
                                <input type="submit" name="update" value="Editar"/>
                            </form>
                            <form action="../controller/deletarPessoaF.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pessoa["idPessoa"];  ?>"/>
                                <input type="submit" name="delete" value="deletar"/>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        // put your code here
        ?>
    </body>
</html>
