$("#form_cep").on('submit',function(){
  event.preventDefault();
  var cep = $("#cep").val();
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

$("#btn_save_address").click(function(){
  var cep = $("#cep").val();
  var city = $("#city").val();
  var uf = $("#uf").val();
  var number = $("#number").val();
  var nboor = $("#nboor").val();
  var complement = $("#complement").val();
  var street = $("#street").val();

  if(cep == ""){
      alert("Digite o campo CEP para continuar");
      $("#cep").focus();
  }else if(city == ""){
      alert("Digite o campo Cidade para continuar");
      $("#city").focus();
  }else if(uf == ""){
      alert("Digite o campo UF para continuar");
      $("#uf").focus();
  }else if(street == ""){
      alert("Digite o campo Rua para continuar");
      $("#street").focus();
  }else if(number == ""){
      alert("Digite o campo Número para continuar");
      $("#number").focus();
  }else if(nboor == ""){
      alert("Digite o campo Bairro para continuar");
      $("#nboor").focus();
  }else if(complement == ""){
     complement = "";
  }else{
    $.post( "test.php", {
      cep: cep,
      city: city,
      uf: uf,
      number: number,
      nboor: nboor,
      complement: complement
     })
    .done(function( data ) {



    });
  }
});
