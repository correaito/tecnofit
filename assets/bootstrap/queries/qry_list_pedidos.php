<?php 
include("../../../config.php"); // conexão com o BD
// consulta no BD sem limite
$consulta = $pdo->query("SELECT * FROM prodt_pedido INNER JOIN pedidos ON prodt_pedido.pedido=pedidos.numero order by pedido desc");

// Captura o número do total de registros da consulta
$numero = $consulta->rowCount();
// aqui inicia a execucao do arquivo em formato json a ser lido pelo script DataTables para exibir a listagem de pedidos
$i = 0;
$row = '{';
$row .= '"data": [';

while ($linha = $consulta->fetch()) {


                $id = $linha['id_produto'];
                // faremos uma consulta na tabela produtos para retornar os nomes fam/grp/tipo por extenso
                $consulta_prod = $pdo->query("SELECT * FROM produtos where id='$id'");

                $data2 = implode('/', array_reverse(explode( '-', $linha['data'] ))); 
		
				$row .= '[';

				$row .= '"'.$linha['numero'].'",'; 
				$row .=	'"'.$data2.'",'; 
 
				while ($linha_prod = $consulta_prod->fetch()) {
				$row .=	'"'.$linha_prod['sku'].'",'; 
				$row .=	'"'.$linha_prod['codigo'].'",'; 
				$row .=	'"'.$linha_prod['descricao'].'",'; 
			    }

	     		$row .=	'"'.$linha['quantidade'].'",'; 
				$row .=	'"'.$linha['vunitario'].'",'; 
				$row .=	'"'.$linha['vtotal'].'",'; 
		
		     	$row .= '"<a href=\'edit_pedido.html?id='.$linha['numero'].'\'><i class=\'fas fa-eye\' title=\'Visualizar\' aria-hidden=\'true\'></i></a>",';
		     	$row .= '"<a href=\'javascript:void(0)\'><i class=\'fas fa-trash-alt\' onclick=\'excl_pedido('.$linha['numero'].');\' title=\'Excluir\' aria-hidden=\'true\'></i></a>"';
				$row .= ']';
				$i++;
				if ($i == $numero) { $row .= "";} else {$row .= ",";}
			}
			$row .= ']';
			$row .= "}";

			echo $row;

			?>