<?php

include('../../../config.php');

$id = $_POST['id'];

// retorna os dados do pedido consultado na tela de visualizaçao de pedido
$consulta = $pdo->query("SELECT * FROM produtos WHERE id='$id'")->fetch(PDO::FETCH_OBJ);

$dados = 
$consulta->familia."*". /*0*/
$consulta->grupo."*". /*1*/
$consulta->tipo."*". /*2*/
$consulta->sku."*". /*3*/
$consulta->descricao."*". /*4*/
$consulta->codigo."*". /*5*/
$consulta->preco."*". /*6*/
$consulta->id; /*7*/

echo $dados;
?> 