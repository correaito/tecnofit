<?php 

include("../../../config.php"); // conexão com o BD 

$familia = $_GET['familia'];
$grupo = $_GET['grupo'];

// consulta tipos de produtos atraleados a familia e grupo selecionados no menu dropdown da tela de cadastro de produto
$consulta=$pdo->query("SELECT * from tipos where familia = '$familia' and grupo='$grupo'"); //
$numero = $consulta->rowCount();

$i=0;

$rows = array();

while ($linha = $consulta->fetch())

{

$rows[] = $linha;

}


$encodejson = json_encode($rows);

/*retorna em formato json*/
print $encodejson;


?>
