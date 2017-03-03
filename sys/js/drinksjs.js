$("#btn_save_drink").click(function(){
  var drink_name = $("#drink_name").val();
  var drink_price = $("#drink_price").val();
  var qtd_drink = $("#qtd_drink").val();
  if(drink_name == ""){
      alert("Digite o nome da bebida");
      $("#drink_name").focus();
  }else if(drink_price == ""){
    alert("Digite o preço da bebida");
    $("#drink_price").focus();
  }else if(drink_price == ""){
    alert("Digite a quantidade existente");
    $("#qtd_drink").focus();
  }else{
    $.post( "new_drink.php", {
      drink_name: drink_name,
      drink_price: drink_price,
      qtd_drink: qtd_drink
     })
    .done(function( data ) {
      var obj = jQuery.parseJSON(data);
      if(obj.status){
        alert(obj.message);
        location.reload();
      }else{
        alert(obj.message);
      }
    });
  }
});



$(".edit_link").click(function(){
  var c = confirm("Você tem certeza que deseja excluir?");
  if(c){
    $.post( "del_drink.php", {
      id: $(this).attr('id')
     })
    .done(function( data ) {
      var obj = jQuery.parseJSON(data);
      if(obj.status){
        alert(obj.message);
        location.reload();
      }else{
        alert(obj.message);
      }
    });
  }
});

$("#delete_address").click(function(){
  var c = confirm("Você tem certeza que deseja excluir?");
  if(c){
    $.post( "del_addr.php", {
      id: $("#id_addr").val()
     })
    .done(function( data ) {
      var obj = jQuery.parseJSON(data);
      if(obj.status){
        alert(obj.message);
        location.reload();
      }else{
        alert(obj.message);
      }
    });
  }
});
