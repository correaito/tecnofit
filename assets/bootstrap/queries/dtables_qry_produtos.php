<?php
include("../../../config.php"); // conexão com o BD
// consulta no BD sem limite
$consulta = $pdo->query("SELECT * FROM produtos ORDER BY id desc");
// Captura o número do total de registros no nosso banco a partir da nossa consulta ilimitada
$numero = $consulta->rowCount();
// aqui inicia a execucao do arquivo em formato json a ser lido pelo plugin DataTables
$i = 0;
$row = '{';
$row .= '"data": [';

while ($linha = $consulta->fetch()) {


                $id = $linha['id'];
		
				$row .= '[';

				$row .= '"'.$linha['sku'].'",'; 
				$row .=	'"'.$linha['codigo'].'",'; 
				$row .=	'"'.$linha['descricao'].'",'; 
		
				$row .= '"<a href=\'javascript:void(0);\'><span  ></span><i class=\'fas fa-arrow-alt-circle-down\' onclick=\'incluirprod('.$id.');\' title=\'Incluir\'></i></a>"';
				$row .= ']';
				$i++;
				if ($i == $numero) { $row .= "";} else {$row .= ",";}
			}
			$row .= ']';
			$row .= "}";

			echo $row;

			?>