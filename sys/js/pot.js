$(document).ready(function(){
  $(".money").maskMoney({prefix:'R$ '});

  $("#add_rice").click(function(){
    $("<br> <input type='text' class='form-control'  name='rice_name[]' placeholder='Digite o tipo de Arroz'>").insertAfter($("#div_rice").find('input:last'));
  });

  $("#add_garrison").click(function(){
    $("<br> <input type='text' class='form-control'  name='garrison_name[]' placeholder='Digite o tipo de Guarnição'>").insertAfter($("#div_garrison").find('input:last'));
  });

  $("#add_bean").click(function(){
    $("<br> <input type='text' class='form-control'  name='bean_name[]' placeholder='Digite o tipo de Feijão'>").insertAfter($("#div_bean").find('input:last'));
  });

  $("#add_mixture").click(function(){
    $("<br> <input type='text' class='form-control'  name='mixture_name[]' placeholder='Digite o tipo de mistura'>").insertAfter($("#div_mixture").find('input:last'));
  });

  $("#add_salad").click(function(){
    $("<br> <input type='text' class='form-control' name='salad_name[]' placeholder='Digite o tipo de salada'>").insertAfter($("#div_salad").find('input:last'));
  });



  $("#form_new_pot").submit(function(){
    if($("#mini_price").val() == "" || $("#normal_price").val() == "" || $("#big_price").val() == ""){
      event.preventDefault();
      alert("Digite o preço das marmitas");
    }else if($("#delivery_time").val() == ""){
      event.preventDefault();
      alert("Digite o tempo estimado de entrega.");
      $("#delivery_time").focus();
    }else if($(".rice_name").val() == ""){
      event.preventDefault();
      alert("Digite o arroz que acompanha a marmita.");
      $(".rice_name").focus();
    }else if($(".bean_name").val() == "" ){
      event.preventDefault();
      alert("Digite o feijão que acompanha a marmita.");
      $(".bean_name").focus();
    }else if($(".mixture_name").val() == "" ){
      event.preventDefault();
      alert("Digite a mistura que acompanha a marmita.");
      $(".mixture_name").focus();
    }else if($(".garrison_name").val() == "" ){
      event.preventDefault();
      alert("Digite a guarnição que acompanha a marmita.");
      $(".garrison_name").focus();
    }else if($(".salad_name").val() == "" ){
      event.preventDefault();
      alert("Digite a salada que acompanha a marmita.");
      $(".garrison_name").focus();
    }
  });

});
