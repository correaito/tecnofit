<?php

include("../../../config.php");// conexao com o bd

$id = $_POST['id']; // recebe a id do pedido
// excluir o produto do bd

// antes de ecluir, vamos verificar se este produto não está atrelado a algum pedido
$chekprod = $pdo->query("SELECT * FROM prodt_pedido WHERE id_produto = '$id'"); 
$numero = $chekprod->rowCount();

if ($numero > 0) { // se algum resultado for encontrado, informa a negativa de exclusão

echo "Este produto não pode ser excluído pois está atrelado a um pedido";

} 

else {

$del = $pdo->query("DELETE FROM produtos WHERE id = '$id'"); 
/*retornamos a mensagem de sucesso no callback*/
echo 'Produto excluído com sucesso!';

}

?>