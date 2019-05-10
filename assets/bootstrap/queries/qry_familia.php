<?php // esse arquivo retorna uma lista em json da tabela 'familias' que alimentam o menu dropdown do cadastro do produto

include("../../../config.php"); // conexão com o BD    


$consulta=$pdo->query("SELECT * from familias"); //
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



