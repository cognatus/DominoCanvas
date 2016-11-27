$(document).ready(function(){
	$(".actualizar").click(function(){
		var boleta = $(this).attr('id');
		var nombres = $("#nombres" + boleta).html();
		var apellidoP = $("#apellidoP" + boleta).html();
		var apellidoM = $("#apellidoM" + boleta).html();
		var mail = $("#mail" + boleta).html();
		var contrasenia = $("#contrasenia" + boleta).val();

		$("#nuevoBoleta").attr("value",boleta);
		$("#nuevoNombres").attr("value",nombres);
		$("#nuevoApp").attr("value",apellidoP);
		$("#nuevoApm").attr("value",apellidoM);
		$("#nuevoMail").attr("value",mail);
		$("#nuevoContra").attr("value",contrasenia);

	});
	$(".eliminar").click(function(){
		var boleta = $(this).attr('id');

		$("#boletaBye").attr("value",boleta);

	});
});