<?php
include("../../../config.php"); // conexao com o bd

// recebe os dados dos produtos do pedido
$id_produto = $_POST['id_produto'];
$quantprod = $_POST['quantprod'];
$valorunit = $_POST['valorunit'];
$vtotal = $_POST['vtotal'];
$num_pedido = $_POST['num_pedido'];


// grava os dados dos produtos na tabela prodt_pedido atrelado ao número do pedido
$exe_inclu = $pdo->query("INSERT INTO prodt_pedido (

quantidade,
vunitario,
vtotal,
pedido,
id_produto

) VALUES (


'$quantprod',
'$valorunit',
'$vtotal',
'$num_pedido',
'$id_produto'


)");




?>
