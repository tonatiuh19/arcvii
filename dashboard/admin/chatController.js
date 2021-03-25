$(document).on("ready", function(){
	registrarMensajes();
  $.ajaxSetup({"cache":false});
	setInterval("cargaMensajes()",500);
});

var registrarMensajes = function(){
	$("#send").on("click",function(e){
		e.preventDefault();
		var frm = $("#formChat").serialize();
		//console.log(frm);
		$.ajax({
			type: "POST",
			url: "register.php",
			data: frm
		}).done(function(info){
      $("#message").val("");
  		var altura = $("#conversation").prop("scrollHeight");
  		$("#conversation").scrollTop(altura);
  		console.log(info);
	 })
	});
}

var cargaMensajes = function(){
  var frm = $("#formChat").serialize();
  $.ajax({
    type: "POST",
    url: "conversation.php",
    data: frm
  }).done(function(info){
    $("#conversation").html(info);
    $("#conversation p:last-child").css({"background-color":"lightgreen",
                        "padding-botton": "20px"});
    var altura = $("#conversation").prop("scrollHeight");
    $("#conversation").scrollTop(altura);
  });
}
