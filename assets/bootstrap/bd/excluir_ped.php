<?php

include("../../../config.php"); // conexao com o bd

$numero = $_POST['numero']; // recebe o nr do pedido

$numero_compl = str_pad($numero, 7, '0', STR_PAD_LEFT);
// exclui o pedido da tabela 'pedidos'
$pdo->query("DELETE FROM pedidos WHERE numero = '$numero_compl'"); 
// ..e exclui os produtos atraleados a esse pedido na tabela 'prodt_pedido'
$pdo->query("DELETE FROM prodt_pedido WHERE pedido = '$numero_compl'"); 

/*mensagem do callback*/
echo "Pedido excluído com sucesso!";

?>