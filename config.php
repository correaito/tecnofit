<?php

$host = "localhost"; //Servidor do mysql
$user = "root"; //Usuario do banco de dados
$senha = "ae7os2it"; //senha do banco de dados
$db = ""; //banco de dados
$nome_site = "Tecnofit"; //Nome do site
$site = "http://jrodriguescorretora.com.br"; // Dominio website

$pdo = new PDO('mysql:host=localhost;dbname=tecnofit', $user, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>



      