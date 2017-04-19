$("#select_people").on('change',function(){
  var people_type = $(this).val();
  switch(people_type) {
      case '1':
      $("#div_f").hide();
      $("#div_j").fadeIn(200);
      $("#div_comprador").hide();
          break;

      case '2':
      $("#div_j").hide();
      $("#div_f").fadeIn(200);
      $("#div_comprador").hide();

          break;

      case '3':
      $("#div_j").hide();
      $("#div_f").hide();
      $("#div_comprador").fadeIn(200);
        break;
  }


  $("#form_comprador").submit(function(){
    if($("#name_user").val() == ""){
      event.preventDefault();
      alert("Digite o seu nome");
      $("#name_user").focus();
    }else if($("#user_email").val() == ""){
      event.preventDefault();
      alert("Digite o seu email");
      $("#user_email").focus();
    }else if($("#user_password").val() == ""){
      event.preventDefault();
      alert("Digite a sua senha");
      $("#user_password").focus();
    }else {
      event.preventDefault();
      $.post( "new_cad.php", {
         user_type: $("#select_people").val(),
         name_user: $("#name_user").val(),
         user_email: $("#user_email").val(),
         user_password: $("#user_password").val()
        })
      .done(function( data ) {
          var obj = jQuery.parseJSON(data);
          console.log(data);
          if(obj.status == true){
            alert("Cadastrado com sucesso.");
            window.location = "../login/";
          }else{
            alert("Erro ao cadastrar.");
          }
      });
    }
  });
});
