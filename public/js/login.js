$(document).ready(function(){
    //Poner el foco en el campo usuario
    $("#usuario").focus();
    $("#formAjax").bind("keypress", function(e){
		if(e.keyCode==13) return false;
	});
	$("#btnLogin").click(function(){
	    //Obtenemos variables
		var usuario = $("#usuario").val();
		var clave = $("#clave").val();
		var dataString = "usuario="+usuario+"&clave="+clave;
		if(usuario =='' || clave==''){
			$("#msjLogin").html("<label>Llenar ambos campos</label>");
			return;
		}
		//Mandamos valores con AJAX
		$.ajax({
			async: true,
			dataType: "html",
			type: "POST",
			contentType: "application/x-www-form-urlencoded",
			url: url+"/autentifica/login-data",
			data: dataString,
			beforeSend: function(data){
				$("#msjLogin").html("<label>Cargando...</label>");
			},
			success: function(requestData){
				if(requestData == 1)
					location.reload();
				else	
					$("#msjLogin").html("<label>"+requestData+"</label>");
			},
			error: function(requestData, strError, strTipoError){
				alert("Error "+strTipoError + ":" + strError);
			},
			complete: function (requestData, exito){}
		});
			return false;
	});
});
