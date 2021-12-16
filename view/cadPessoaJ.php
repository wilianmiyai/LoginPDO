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
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cadastro de Pessoa Juridica</h2>
        <form action="<?php $cadPessoa->inserir(); ?>" method="Post">
            <label>Nome:</label>
            <input placeholder="Nome aqui..." type="text" required name="nome" id="nome"/>
            <br>
            <br>
            <label>Telefone:</label>
            <input placeholder="Seu numero de telefone" type="number" required name="telefone" id="telefone" />
            <br>
            <br>
            <label>Email:</label>
            <input placeholder="Seu email" type="email" required name="email" id="email" />
            <br>
            <br>
            <label>Endereço:</label>
            <input placeholder="Seu endereço" type="text" required name="end" id="end" />
            <br>
            <br>
            <label>Sexo:</label>
            <input type="radio" name="sexo" required value="F"/>Feminino
            <input type="radio" name="sexo" required value="M"/>Masculino
            <br>
            <br>
            <label>CNPJ:</label>
            <input placeholder="Seu CNPJ" type="number" required name="cnpj" id="cnpj" />
            <br>
            <br>
            <label>Nome Fantasia:</label>
            <input placeholder="Nome fantasia" type="text" required name="fantasia" id="fantasia" />
            <br>
            <br>
            <input type="submit" value="Salvar" name="salvarBD" />
            <input type="submit" value="Limpar" name="limpar" />
            <input type="submit" value="Cancelar" onclick="location.href = '../index.php'"/>
            <br><br>
            <input type="submit" value="Listar Pessoas" onclick="location.href = 'listarPessoaJ.php'"/>
        </form>
    </body>
</html>
