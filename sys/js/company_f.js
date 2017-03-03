//mask cpf
$("#cpf").inputmask('999.999.999-99');


$("#form_profile").submit(function(){
  var name = $("#name").val();
  var start_hour = $("#start_hour").val();
  var finish_hour = $("#finish_hour").val();
  var select_delivery = $("#select_delivery").val();

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
  }


});
