$("#btn_save_dessert").click(function(){
  var dessert_name = $("#dessert_name").val();
  var dessert_price = $("#dessert_price").val();
  var qtd_dessert = $("#qtd_dessert").val();
  if(dessert_name == ""){
      alert("Digite o nome da sobremesa");
      $("#drink_name").focus();
  }else if(dessert_price == ""){
    alert("Digite o preço da sobremesa");
    $("#dessert_price").focus();
  }else if(qtd_dessert == ""){
    alert("Digite a quantidade existente");
    $("#qtd_dessert").focus();
  }else{
    $.post( "new_dessert.php", {
      dessert_name: dessert_name,
      dessert_price: dessert_price,
      qtd_dessert: qtd_dessert
     })
    .done(function( data ) {
      console.log(data);

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



$(".edit_link_dessert").click(function(){
  var c = confirm("Você tem certeza que deseja excluir?");
  if(c){
    $.post( "del_dessert.php", {
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
