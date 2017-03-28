//mask cpf
$("#cpf").inputmask('999.999.999-99');
$("#cep").inputmask('99999-999');



$("#form_profile_f").submit(function(){
  var name = $("#name").val();
  var start_hour = $("#start_hour").val();
  var finish_hour = $("#finish_hour").val();
  var select_delivery = $("#select_delivery").val();
  var cep = $("#cep").val();
  var uf = $("#uf").val();
  var street = $("#street").val();
  var nboor = $("#nboor").val();

  if(name == ""){
    event.prevenDefault();
    alert("Campo nome vazio.");
    $("#name").focus();
  }else if(start_hour == ""){
    event.prevenDefault();
    alert("Campo início de funcionamento vazio.");
    $("#start_hour").focus();
  }else if(finish_hour == ""){
    event.prevenDefault();
    alert("Campo término de funcionamento vazio.");
    $("#finish_hour").focus();
  }else if(select_delivery == "0"){
    event.prevenDefault();
    alert("Selecione uma opção de delivery.");
    $("#select_delivery").focus();
  }else if(cep == ""){
    event.prevenDefault();
    alert("Campo cep vazio.");
    $("#cep").focus();
  }else if(city == ""){
    event.prevenDefault();
    alert("Campo cidade vazio.");
    $("#city").focus();
  }else if(uf == ""){
    event.prevenDefault();
    alert("Campo UF vazio.");
    $("#uf").focus();
  }else if(street == ""){
    event.prevenDefault();
    alert("Campo Rua vazio.");
    $("#street").focus();
  }else if(nboor == ""){
    event.prevenDefault();
    alert("Campo Bairro vazio.");
    $("#nboor").focus();
  }
});


$("#btn_search").on('click',function(){
  event.preventDefault();
  var vcep = $("#cep").val();
  var cep = vcep.replace("-","");
  $.getJSON("https://viacep.com.br/ws/"+cep+"/json/", function(jd) {
    $("#city").val(jd.localidade);
    $("#uf").val(jd.uf);
    $("#street").val(jd.logradouro);
    $("#nboor").val(jd.bairro);
    $("#div_addresses").fadeIn(200);
  })
  .fail(function() {
    alert("Nenhum endereço encontrado.");
    $("#div_addresses").fadeIn(200);
  });
});
