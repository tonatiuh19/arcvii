function validateForm() {

  var x = document.forms["myForm"]["pwdSq"].value;
  var y = document.forms["myForm"]["laLeydelMonte"].value;
  if (md5(x) != y) {
    //alert("La contraseña es incorrecta");
    $("div#idshow").show();
    return false;
  }
}


$("#submit_button").click(function(){
  if ($("#text_field1").val() == "" && $("#text_field2").val() == "") {
    $('#validatePWD').modal('show');
  }else {
    if ($("#text_field1").val() != $("#text_field2").val()){
      $("div#idshowpwd").show();
    }else{
      $('#validatePWD').modal('show');
    }
  }
    return true;
});

/*$("#validatePWD").on("hidden.bs.modal", function () {
  $('#profileEdit').modal('hide');
});*/

$('#validatePWD').on('hidden.bs.modal', function (e) {
    $('#profileEdit').modal('hide');
});
