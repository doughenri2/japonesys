 $("#form_login").submit(function(){
   if($("#login").val() == ""){
     event.preventDefault();
     alert("Preencha o campo login para entrar.");
     $("#login").focus();
   }else if($("#password").val() == ""){
     event.preventDefault();
     alert("Preencha o campo senha.");
     $("#password").focus();
   }
 });
