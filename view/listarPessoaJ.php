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
require_once '../controller/cPessoaJ.php';
$cadPessoa = new cPessoaJ();
$listaPessoaJ = $cadPessoa->getPessoaJ();
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
                    <th>id</th><th>Nome</th><th>E-mail</th><th>CNPJ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPessoaJ as $pessoa): ?>
                    <tr>
                        <td><?php echo $pessoa['idPessoa']; ?></td>
                        <td><?php echo $pessoa ['nome']; ?></td>
                        <td><?php echo $pessoa ['email']; ?></td>
                        <td><?php echo $pessoa ['cnpj']; ?></td>
                        <td>
                            <form action="editarPessoaJ.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pessoa["idPessoa"]; ?>"/>
                                <input type="submit" name="update" value="Editar"/>
                            </form>
                            <form action="../controller/deletarPessoaJ.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $pessoa["idPessoa"];  ?>"/>
                                <input type="submit" name="delete" value="deletar"/>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="button" onclick="location.href = 'cadPessoaJ.php'">Voltar</button>
    </body>
</html>
