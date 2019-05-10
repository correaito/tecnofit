<?php
include("../../../config.php"); // conexão com o BD

$numero = $_GET['url_part'];

// consulta no BD sem limite
$consulta = $pdo->query("SELECT * FROM prodt_pedido where pedido = '$numero'");

// a partir daqui, cria as linhas que retornam os produtos atrelados ao pedido, em sua consulta (visualização)
$row = "

<table class=\"table table-hover\">
          <thead style=\"background-color: grey; color: white;\">
            <tr> 
              <td class=\"text-center\">
                SKU
              </td>
              <td class=\"text-center\">
                Código
              </td>
              <td class=\"text-center\">
                Descrição
              </td>
              <td class=\"text-center\">
                Quant.
              </td>
              <td class=\"text-center\">
                Valor Unit.
              </td>
              <td class=\"text-center\">
                Sub Total
               </td>
              </tr>
          </thead>";


while ($linha = $consulta->fetch()) {

$row .= "<tr class=\"text-center\">";


$iddoprod = $linha['id_produto'];

// consulta a tabela produtos, para retornar sku, codigo e descrição dos produtos
$consultaprod = $pdo->query("SELECT * FROM produtos where id = '$iddoprod'");

$linhaprod = $consultaprod->fetch();


$row .= "<td class=\"text-center sku\">".$linhaprod['sku']."</td>
<td class=\"text-center sku\">".$linhaprod['codigo']."</td>
<td class=\"text-center sku\">".$linhaprod['descricao']."</td>";


$row .= "<td class=\"text-center sku\">".$linha['quantidade']."</td>
<td class=\"text-center sku\">".$linha['vunitario']."</td>
<td class=\"text-center sku\">".$linha['vtotal']."</td>
</tr>";

}

$row .= "</table>";




echo $row;

?>