<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

//Inicializar a sessão
session_start();

//Renovar todas as variáveis da sessão
$_SESSION = array();

//Destrói a sessão
session_destroy();

//Redirecionar para o login
header("Location: ../view/login.php");
exit;
