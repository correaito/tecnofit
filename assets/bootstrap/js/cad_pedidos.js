
/*metodo para inclusão dos produtos no pedido*/
function AddProduto(id) {  

  $.post("assets/bootstrap/queries/qry_produto.php", {id: id}, function(retorno) {

   dados = retorno.trim().split("*");

   sku = dados[3];
   codigo = dados[5];
   id_produto = dados[7];
   descricao = dados[4];
   quantidade = 1;
   valor = dados[6];
/*   converte o separador de nr racional do preço do cadastro do produto de virgula (,) para (.) */
   valorconvt = dados[6].replace(',','.');
   vtotal = (quantidade * parseFloat(valorconvt));

   // retorna o calculo ao campo sub total invisivel ao usuario com centavos separados por ponto (.)
   vtotalvirg = vtotal.toFixed(2);

   // retorna o calculo ao campo sub total visivel ao usuario com centavos separados por virgula (,)
   vtotalvisual = vtotal.toFixed(2).replace('.',',');


var cols = "";

cols += '<tr class=\"tablet\">';
cols += '<td style=\"display:none;\" class=\"text-center\"><input name=\"id_produto\" value="'+id_produto+'"></td>';
cols += '<td class=\"text-center\">'+sku+'</td>';
cols += '<td class=\"text-center\">'+codigo+'</td>';
cols += '<td class=\"text-center\">'+descricao+'</td>';
cols += '<td class=\"text-center quant_total\"><input name=\"quantidade\" value="'+quantidade+'"></td>';
cols += '<td class=\"text-center\"><input name=\"valorunnt\" value="'+valor+'"></td>';
cols += '<td style=\"display:none\" class=\"text-center\"><input name=\"valorttal\" value="'+vtotalvirg+'"></td>';
cols += '<td class=\"text-center\"><input name=\"vttvisual\" value="'+vtotalvisual+'"></td>';
cols += '<td class=\"text-center\"><a href="#"><i title="Excluir" onclick="RemoveProduto(this)" class=\"fas fa-trash-alt remover\"></i></a></td>';
cols += '</tr>';
                     
$("#products-table").append(cols);  



  // Soma total dos itens no ato do carregamento do produto no pedido
      var total = 0;

      $('input[name=valorttal]').each(function(){

        total += parseFloat($(this).val());

      }); 
      
      $('#qtdtotal').val(total.toFixed(2).replace('.',','));


});

/*fechamos a modal com a consulta dos produtos*/
$('#option_produts').modal('hide');


  }




function RemoveProduto(linha) {
var tr = $(linha).closest('tr');

tr.fadeOut(400, function(){ 
tr.remove(); 


  var total = 0;

      $('input[name=valorttal]').each(function(){

        total += parseFloat($(this).val());

      }); 
      
      $('#qtdtotal').val(total.toFixed(2).replace('.',','));




});


  // Soma total dos itens no ato do carregamento do produto no pedido



}



// metodo ao alterar as quantidades do pedido
  $(document).on('keyup', '.quant_total', function(e) {
        
        var quantidade = $(this).closest('tr').find('input[name=quantidade]').val();
        var valor = $(this).closest('tr').find('input[name=valorunnt]').val();

        var valorconv = valor.replace(',','.');

        var intvalor = parseFloat(valorconv).toFixed(2) * quantidade;
         
        // calcula no campo invisível ao usuário para calculo com numeros racionais separados por ponto (.)
        $(this).closest('tr').find('input[name=valorttal]').val(intvalor.toFixed(2));
         
        // calcula no campo  visível ao usuário com numeros racionais separados por ponto (,)
        $(this).closest('tr').find('input[name=vttvisual]').val(intvalor.toFixed(2).replace('.',','));


//apos a inserção a alteração da quantidade, vamos recalcular os campos de subtotal do pedido e retonar o valor total 
     var total = 0;

      $('input[name=valorttal]').each(function(){

      total += parseFloat($(this).val());

      });
      
      $('#qtdtotal').val(total.toFixed(2).replace('.',','));

     });
      


//remove dinamicamente a linha criada quando 
    // clicado no botão remover //
    $("#tab_logic").on("click", ".remover", function(e){ 
     
      $(this).closest('tr').remove(); 

      var total = 0;
// recalculamos o valor total do pedido
      $('input[name=valorttal]').each(function(){

        total += parseFloat($(this).val());

      }); 
      
      $('#qtdtotal').val(total.toFixed(2).replace('.',','));


  });


// retorna a última posição numerica dos pedidos através do arquivo qry_pedido.php
$(document).ready(function() { 

$.post("assets/bootstrap/queries/qry_pedido.php", function(retorno) {

var numero_lmp = retorno.trim();

$('#num_pedido').val(numero_lmp);

});

});


// preenche a data atual no campo data do pedido de compra
$(document).ready(function() {

 var data = new Date(),
        dia  = data.getDate().toString(),
        diaF = (dia.length == 1) ? '0' + dia : dia,
        mes  = (data.getMonth()+1).toString(), 
        mesF = (mes.length == 1) ? '0' + mes : mes,
        ano = data.getFullYear();

  $('#data_ped').val(diaF+"/"+mesF+"/"+ano);

});


  /* lsitagem dos produtos cadastrados na janela de pesquisa quando clicado em Incluir Pedido */
$(document).ready(function(){

  $('#panelproduts').DataTable({

"search": {
    "smart": true
      },


    "order": [], // segue o ordenamento da consulta sql

    "ajax":'assets/bootstrap/queries/dtables_qry_produtos.php', //o arquivo dtables_qry_produtos.php gera um arquivo json 
    //a ser lido pelo Datatables

    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]], // paginacao de resultados

    colReorder: true, // colunas podem ser reordenadas

    // posição dos elementos da tabela
    dom: "ft<'row'<'col-md-8'l><'col-md-4'p>>",

    buttons: [

    {

      columns: ':visible',
// botoes para copiar e salvar em diversos formatos
      extend: 'copy', text: 'Copiar'},
      {extend: 'csv', text: 'CSV'},
      {extend: 'excel', text: 'Excel',
      messageTop: 'Lista de Tomadores de Serviço.'},
      {extend: 'pdf', text: 'PDF',



    },
    {extend: 'print', text: 'Imprimir'}

    ],

    "language": {    
 // tradução dos elementos do DataTables para portugues
      "lengthMenu": "Mostrando _MENU_ resultados por página",
      "zeroRecords": "Nada encontrado - desculpe",
      "info": "Mostrando página _PAGE_ de _PAGES_",
      "infoEmpty": "Sem resultados avaliados",
      "infoFiltered": "(filtrado de _MAX_ total registros)",
      "paginate": {
        "first":      "Primeiro",
        "last":       "Anterior",
        "next":       "Próximo",
        "previous":   "Anterior"
      },
      "search":         "Buscar:",
    },

  });
});



// envio dos dados para emissao do pedido
function emitepedido() {  

  var num_pedido = $('#num_pedido').val();
  var data_ped = $('#data_ped').val();

  var datapedalt = data_ped.split('/');

  var dataalt = datapedalt[2]+'/'+datapedalt[1]+'/'+datapedalt[0];

  var qtdtotal = $('#qtdtotal').val();

  $.post("assets/bootstrap/bd/grav_pedido.php", {

    num_pedido: num_pedido,
    data_ped: dataalt,
    qtdtotal: qtdtotal

  }, function(retorno) {

    alert(retorno);
    location.reload(); // refresca a pagina para sncronizar os códigos do bd

  });

// varre as linhas da tabela de produtos gravados e envia os dados para a tabela 'prodt_pedido' atralados 
//ao nr do pedido
$('.tablet').each(function(){

  var id_produto = $(this).find('input[name=id_produto]').val();
  var quantprod = $(this).find('input[name=quantidade]').val();
  var valorunit = $(this).find('input[name=valorunnt]').val();
  var vtotal = $(this).find('input[name=valorttal]').val();

  $.post("assets/bootstrap/bd/grav_prodpedido.php", {

  id_produto: id_produto,
  quantprod: quantprod,
  valorunit: valorunit,
  vtotal: vtotal,
  num_pedido: num_pedido

  }, function(retorno) {
  

  });
}); 


} // fechamento da function emitepedido
