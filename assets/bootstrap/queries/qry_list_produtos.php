<?php
include("../../../config.php"); // conexão com o BD
// consulta da tabela produtos
$consulta = $pdo->query("SELECT * FROM produtos order by id desc");

// Captura o número do total de registros no nosso banco
$numero = $consulta->rowCount();
// aqui inicia a execucao do arquivo em formato json a ser lido pelo script DataTables para exibir a listagem de produtos
$i = 0;
$row = '{';
$row .= '"data": [';

while ($linha = $consulta->fetch()) {


                $id = $linha['id']; // string id do produto
           		
				$row .= '[';                
				$row .=	'"'.$linha['sku'].'",'; 
				$row .=	'"'.$linha['familia_ref'].'",'; 
				$row .=	'"'.$linha['grupo_ref'].'",'; 	
				$row .=	'"'.$linha['tipo_ref'].'",'; 
				$row .=	'"'.$linha['codigo'].'",'; 	
	     		$row .=	'"'.$linha['descricao'].'",'; 
	     		$row .=	'"'.$linha['preco'].'",'; 

		     	$row .= '"<a href=\'edit_produto.html?id='.$linha['id'].'\'><i class=\'fas fa-eye\' title=\'Visualizar\' aria-hidden=\'true\'></i></a>",';
		     	$row .= '"<a href=\'javascript:void(0);\'><i class=\'fas fa-trash-alt\' onclick=\'excl_prod('.$linha['id'].');\' title=\'Excluir\' aria-hidden=\'true\'></i></a>"';
				$row .= ']';
				$i++;
				if ($i == $numero) { $row .= "";} else {$row .= ",";}
			}
			$row .= ']';
			$row .= "}";

			echo $row;

			?>
