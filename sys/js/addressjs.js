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
    $.post( "new_addr.php", {
      cep: cep,
      city: city,
      uf: uf,
      number: number,
      nboor: nboor,
      complement: complement,
      street: street
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
  var id = $(this).attr('id');
  $.post( "get_addr.php", {
    id: id
   })
  .done(function( data ) {
    var obj = jQuery.parseJSON(data);
      $("#id_addr").val(id);
      $("#cep_e").val(obj.cep);
      $("#city_e").val(obj.city);
      $("#uf_e").val(obj.uf);
      $("#number_e").val(obj.number);
      $("#nboor_e").val(obj.neighborhood);
      $("#complement_e").val(obj.complement);
      $("#street_e").val(obj.street);
  });
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
