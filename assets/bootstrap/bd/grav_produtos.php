<?php
include("../../../config.php"); // conexao com o bd


// recebe os dados do produto
$sku = $_POST['sku'];
$codigo_sku = $_POST['codigo_sku'];
$familia = $_POST['familia'];
$grupo = $_POST['grupo'];
$tipo = $_POST['tipo'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

$sql_fam = $pdo->query("SELECT * from familias where sigla = '$familia'");
$linha_fam = $sql_fam->fetch();

$familia_ref = $linha_fam['familia']; // grava na tabela produtos o nome da fam por extenso para futuras referencias

$sql_grp = $pdo->query("SELECT * from grupos where sigla = '$grupo'");
$linha_grp = $sql_grp->fetch();

$grupo_ref = $linha_grp['grupo'];// grava na tabela produtos o nome do grupo por extenso para futuras referencias

$sql_tipo = $pdo->query("SELECT * from tipos where sigla = '$tipo'");
$linha_tip = $sql_tipo->fetch();

$tipo_ref = $linha_tip['tipo'];// grava na tabela produtos o nome da tipo por extenso para futuras referencias


// grava na tabela produtos
$exe_inclu = $pdo->query("INSERT INTO produtos (

familia,
grupo,
tipo,
descricao,
preco,
sku,
codigo,
familia_ref,
grupo_ref,
tipo_ref

) VALUES (


'$familia',
'$grupo',
'$tipo',
'$descricao',
'$preco',
'$sku',
'$codigo_sku',
'$familia_ref',
'$grupo_ref',
'$tipo_ref'

)");

// msg do callback
echo "Produto cadastrado com sucesso!";

?>
