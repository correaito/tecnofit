<?php
include("../../../config.php"); // conexão com o BD 


$sku = $_GET['sku'];

// vamos consultar o último codigo registrado para o SKU selecionado na mascara de cadasro do prduto
$consulta=$pdo->query("SELECT * from produtos where sku = '$sku' order by codigo desc LIMIT 1");
$rows = $consulta->rowCount(); 

// se não houver nenhum cadastro para o sku selecionado, ira iniciar como 0001
if ($rows < 1)

{
echo "0001";
}

else {

// do contrario, irá retornar o último codigo registrado e somar +1
while ($linha = $consulta->fetch()) {

$cod_ant = $linha['codigo'];

$cod_som = $cod_ant + 0001;

echo $autcompl_som = str_pad($cod_som, 4, '0', STR_PAD_LEFT);

}
}


?>