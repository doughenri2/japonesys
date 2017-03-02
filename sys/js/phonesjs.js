$("#btn_save_phone").click(function(){
  var name_phone = $("#name_phone").val();
  var phone_number = $("#phone_number").val();
  if(name_phone == ""){
      alert("Digite o nome do telefone");
      $("#name_phone").focus();
  }else if(phone_number == ""){
    alert("Digite o número do telefone");
    $("#phone_number").focus();
  }else{
    $.post( "new_phone.php", {
      name_phone: name_phone,
      phone_number: phone_number
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
    $.post( "del_phone.php", {
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
