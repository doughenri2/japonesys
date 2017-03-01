$("#cnpj").inputmask('99.999.999/9999-99');


$("#form_post_j").submit(function(){
  if($("#social_name").val() == ""){
    event.preventDefault();
    alert("Digite a Razão social corretamente");
    $("#social_name").focus();
  }else if($("#fantasy_name").val() == ""){
    event.preventDefault();
    alert("Digite o nome fantasia corretamente");
    $("#fantasy_name").focus();
  }else if($("#cnpj").val() == ""){
    event.preventDefault();
    alert("Digite o seu CNPJ corretamente");
    $("#cnpj").focus();
  }else if($("#login_j").val() == ""){
    event.preventDefault();
    alert("Digite o seu login corretamente");
    $("#login_j").focus();
  }else if($("#password_j").val() == ""){
    event.preventDefault();
    alert("Digite a sua senha corretamente");
    $("#password_j").focus();
  }else if($("#confirm_pass_j").val() == ""){
    event.preventDefault();
    alert("Digite a confirmação da senha corretamente.");
    $("#confirm_pass_j").focus();
  }else if($("#password_j").val() != $("#confirm_pass_j").val()){
    event.preventDefault();
    alert("Senhas não coincidem.");
    $("#confirm_pass_j").focus();
  }else{
    event.preventDefault();
    $.post( "new_cad.php", {
       user_type: $("#select_people").val(),
       social_name: $("#social_name").val(),
       fantasy_name: $("#fantasy_name").val(),
       cnpj: $("#cnpj").val(),
       login: $("#login_j").val(),
       password: $("#password_j").val(),
       confirm_pass: $("#confirm_pass_j").val()
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
