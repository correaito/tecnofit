<?php

include("../../../config.php"); // conexão com o BD 

// recupera o último número de pedido da tabela pedidos
$consulta=$pdo->query("SELECT * from pedidos order by numero desc limit 1"); //
$rows = $consulta->rowCount(); 

// se não encontrar nenhum registro, estabelece o numero 0000001
if ($rows == 0) { echo '0000001';}

else {

// se encontrar, soma a esse número + 0000001
while ($linha = $consulta->fetch())

{

$numero = $linha['numero'];

$soma = $numero + 0000001;

// complementa com numero de zeros a esquerda
echo str_pad($soma, 7, '0', STR_PAD_LEFT);


}
}


?>



