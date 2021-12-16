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
$pessoaF = null;
require_once '../controller/cPessoaF.php';
$cadPessoa = new cPessoaF();
if (isset($_POST['update'])) {
    $pessoaF = $cadPessoa->getPessoaFById($_POST['id']);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar Pessoa Física</h1>
        <form action="../controller/updatePessoaF.php" method="Post">
            <input type="hidden" name="idPessoa" value="<?php echo $pessoaF[0]['idPessoa']; ?>"
                   <label>Nome:</label>
            <input value="<?php echo $pessoaF[0]['nome']; ?>" type="text" required name="nome" id="nome"/>
            <br>
            <br>
            <label>Telefone:</label>
            <input value="<?php echo $pessoaF[0]['telefone']; ?>" type="number" required name="telefone" id="telefone" />
            <br>
            <br>
            <label>Email:</label>
            <input value="<?php echo $pessoaF[0]['email']; ?>" type="email" required name="email" id="email" />
            <br>
            <br>
            <label>Endereço:</label>
            <input value="<?php echo $pessoaF[0]['endereco']; ?>" type="text" required name="end" id="end" />
            <br>
            <br>
            <label>CPF:</label>
            <input value="<?php echo $pessoaF[0]['cpf']; ?>" type="number" required name="cpf" id="cpf" />
            <br>
            <br>
            <input type="radio" <?php if($pessoaF[0]['sexo']=="F"){echo "checked";} ?> name="sexo" value="F"/>Feminino
            <input type="radio" <?php if($pessoaF[0]['sexo']=="M"){echo "checked";} ?> name="sexo" value="M"/>Masculino
            <br>
            <br>
            <input type="submit" value="Salvar" name="updatePF" />
            <input type="submit" value="Cancelar" name="cancelarUP" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
