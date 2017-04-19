  //cpf mask
  $("#cpf").inputmask('999.999.999-99');
  // onchange select people
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
  });

  //post to page
  $("#form_post_f").submit(function(){

    var name = $("#name").val();
    var res_name = name.split(" ");
    if($("#name").val() == ""){
      event.preventDefault();
      alert("Digite o seu nome corretamente");
      $("#name").focus();
    }else if($("#cpf").val() == ""){
      event.preventDefault();
      alert("Digite o seu cpf corretamente");
      $("#cpf").focus();
    }else if($("#login").val() == ""){
      event.preventDefault();
      alert("Digite o seu login corretamente");
      $("#login").focus();
    }else if($("#password").val() == ""){
      event.preventDefault();
      alert("Digite a sua senha corretamente");
      $("#senha").focus();
    }else if($("#confirm_pass").val() == ""){
      event.preventDefault();
      alert("Digite a confirmação da senha");
      $("#confirm_pass").focus();
    }else if($("#password").val() != $("#confirm_pass").val()){
      event.preventDefault();
      alert("Senhas não coincidem.");
      $("#confirm_pass").focus();
    }else{
      event.preventDefault();
      $.post( "new_cad.php", {
         user_type: $("#select_people").val(),
         name: $("#name").val(),
         cpf: $("#cpf").val(),
         login: $("#login").val(),
         password: $("#password").val(),
         confirm_pass: $("#confirm_pass").val()
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
