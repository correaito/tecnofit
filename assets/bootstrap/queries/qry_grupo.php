<?php // esse arquivo retorna uma lista em json da tabela 'grupos' que alimentam o menu dropdown do cadastro do produto

include("../../../config.php"); // conexão com o BD 

$familia = $_GET['familia'];

$consulta=$pdo->query("SELECT * from grupos where familia = '$familia'"); //

$numero = $consulta->rowCount();

$i=0;
$rows = array();


while ($linha = $consulta->fetch()) 
{


$rows[] = $linha;

}

$encodejson = json_encode($rows);

print $encodejson;

?>
