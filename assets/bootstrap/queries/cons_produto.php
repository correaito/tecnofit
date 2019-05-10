<?php

include('../../../config.php'); // conexão com o bd

$url_part = $_POST['url_part']; // recebe via post do conteudo do link o id do produto a ser consultado na tela de 
//visualização do produto

$consulta = $pdo->query("SELECT * FROM produtos WHERE id='$url_part'")->fetch(PDO::FETCH_OBJ);

$dados = 
$consulta->sku."*". /*0*/
$consulta->codigo."*". /*1*/
$consulta->descricao."*".  /*2*/
$consulta->preco."*"./*3*/
$consulta->familia_ref."*". /*4*/
$consulta->grupo_ref."*". /*5*/
$consulta->tipo_ref; /*6*/

echo $dados;
?>  