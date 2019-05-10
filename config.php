<?php

$host = "localhost"; //Servidor do mysql
$user = ""; //Usuario do banco de dados
$senha = ""; //senha do banco de dados
$db = ""; //banco de dados
$nome_site = "Tecnofit"; //Nome do site
$site = "http://tecnofit.com"; // Dominio website

$pdo = new PDO('mysql:host=localhost;dbname=', $user, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>



      
