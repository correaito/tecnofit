//Chamar essa função para mascarar os numeros digitados nos campos de valores, através de jquery.mask.min.js 
$(document).ready(function(){
// mascara o campo de preço
$('#preco').mask('#.##0,00', {reverse: true});


});

// metodo para gravar dados dos produtos em 
  function grav_produtos() {

                var familia = $('#familia').val().trim();
                var grupo = $('#grupo').val().trim();
                var tipo = $('#tipo').val().trim();
                var preco = $('#preco').val().trim();
                var descricao = $('#descricao').val();
                var sku = $('#sku').val().trim();
                var codigo_sku = $('#codigo_sku').val();
             
                 $.post('assets/bootstrap/bd/grav_produtos.php', {

                  familia: familia,
                  grupo: grupo,
                  tipo: tipo,
                  preco: preco,
                  descricao: descricao,
                  sku: sku,
                  codigo_sku: codigo_sku

                  }, function(data) {    

                alert(data);      
                location.reload(); // refresca a pagina para sncronizar os códigos do bd


                });              

              }