<?php

include('../../../config.php'); // conexao com o bd

$url_part = $_POST['url_part']; // recebe via post do conteudo do link o numero do pedido a ser consultado

$consulta = $pdo->query("SELECT * FROM pedidos WHERE numero='$url_part'")->fetch(PDO::FETCH_OBJ);

$dados = 
$consulta->data."*". /*0*/
$consulta->numero."*". /*1*/
$consulta->vtotal; /*2*/

echo $dados;
?>  