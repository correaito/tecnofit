<?php
include("../../../config.php");// conexao com o bd

/*recebe os dados do pedido*/
$num_pedido = $_POST['num_pedido'];
$data_ped = $_POST['data_ped'];
$qtdtotal = $_POST['qtdtotal'];

/*inclui os dados no bd*/
$exe_inclu = $pdo->query("INSERT INTO pedidos (

data,
numero,
vtotal
) VALUES (


'$data_ped',
'$num_pedido',
'$qtdtotal'

)");

// msg do callback
echo "Pedido cadastrado com sucesso!";

?>
