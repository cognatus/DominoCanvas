<?php
  
  session_start();

  if (!isset($_SESSION["privilegio"])) {
    header("Location: /DominoCanvas/");
  }

?>

<!-- Dibujo de un rectángulo en un canvas. -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dibujar un rect&aacute;ngulo</title>
		<style type="text/css">
			.canvasLocas{
				display: block;margin: auto;
			}
			div{
				position: absolute;z-index: 99;margin: 0;padding: 0;
			}
			span{
				display: inline-block;width: 50%;margin: 0;padding: 0;
				position: relative;
			}
			input{
				width: 48px;height: 48px;border: none;
				background-color: #e0e0e0;border-radius: 2px;
				text-align: center;position: absolute;
			}

			/* PRIMER CANVAS */
			span.div_0_span_0, span.div_0_span_1 {
				height: 330px;
			}
			span.div_0_span_2, span.div_0_span_3 {
				height: 465px;
			}
			span.div_0_span_4, span.div_0_span_5 {
				height: 327px;
			}

			/* SEGUNDO CANVAS */
			span.div_1_span_0, span.div_1_span_1 {
				height: 330px;
			}
			span.div_1_span_2, span.div_1_span_3, span.div_1_span_4, span.div_1_span_5 {
				height: 465px;
			}

			/* TERCER CANVAS */
			span.div_2_span_0, span.div_2_span_1 {
				height: 330px;
			}
			span.div_2_span_2, span.div_2_span_3, span.div_2_span_4, span.div_2_span_5 {
				height: 465px;
			}

			/* CUARTO CANVAS */
			span.div_3_span_0, span.div_3_span_1 {
				height: 470px;
			}
			span.div_3_span_2, span.div_3_span_3 {
				height: 465px;
			}
			span.div_3_span_4, span.div_3_span_5 {
				height: 468px;
			}

			/* QUINTO CANVAS */
			span.div_4_span_0, span.div_4_span_1, span.div_4_span_2, span.div_4_span_3, span.div_4_span_4, span.div_4_span_5 {
				height: 370px;
			}

			/* SEXTO CANVAS */
			span.div_5_span_0, span.div_5_span_1, span.div_5_span_2, span.div_5_span_3 {
				height: 328px;
			}
			span.div_5_span_4, span.div_5_span_5 {
				height: 458px;
			}

			/* SEPTIMO CANVAS */
			span.div_6_span_0, span.div_6_span_1, span.div_6_span_2, span.div_6_span_3 {
				height: 328px;
			}
			span.div_6_span_4, span.div_6_span_5 {
				height: 457px;
			}

			/* OCTAVO CANVAS (ULTIMO) */
			span.div_7_span_0, span.div_7_span_1 {
				height: 330px;
			}
			span.div_7_span_2, span.div_7_span_3, span.div_7_span_4, span.div_7_span_5 {
				height: 466px;
			}

			input#input_0_0_0, input#input_0_1_0, input#input_0_2_0, input#input_0_3_0, 
			input#input_0_4_0, input#input_0_5_0, input#input_1_2_0, input#input_1_3_0, 
			input#input_1_4_0, input#input_1_5_0, input#input_2_2_0, input#input_2_3_0,
			input#input_2_4_0, input#input_2_5_0, input#input_3_0_0, input#input_3_1_0, 
			input#input_3_2_0, input#input_3_3_0, input#input_3_4_0, input#input_3_5_0,
			input#input_7_3_0, input#input_7_4_0, input#input_7_5_0 {
				bottom: 84px;
				right: 96px;
			}
			input#input_0_0_1, input#input_0_1_1, input#input_0_2_1, input#input_0_3_1,
			input#input_0_4_1, input#input_0_5_1, input#input_1_2_1, input#input_1_3_1, 
			input#input_1_4_1, input#input_1_5_1, input#input_2_2_1, input#input_2_3_1,
			input#input_2_4_1, input#input_2_5_1, input#input_3_0_1, input#input_3_1_1, 
			input#input_3_2_1, input#input_3_3_1, input#input_3_4_1, input#input_3_5_1,
			input#input_7_3_1, input#input_7_4_1, input#input_7_5_1 {
				bottom: 24px;
				right: 96px;
			}

			input#input_1_0_0, input#input_1_1_0, input#input_2_0_0, input#input_2_1_0,
			input#input_7_0_0, input#input_7_1_0 {
				bottom: 84px;
				right: 36px;
			}
			input#input_1_0_1, input#input_1_1_1, input#input_2_0_1, input#input_2_1_1,
			input#input_7_0_1, input#input_7_1_1 {
				bottom: 24px;
				right: 36px;
			}

			input#input_4_0_0, input#input_4_5_0 {
				bottom: 98px;
				right: 128px; 
				transform: rotate(-35deg);
			}
			input#input_4_0_1, input#input_4_5_1{
				bottom: 48px;
				right: 94px; 
				transform: rotate(-35deg);
			}

			input#input_4_1_0{
				bottom: 124px;
				right: 94px; 
				transform: rotate(20deg);
			}
			input#input_4_1_1{
				bottom: 104px;
				right: 38px; 
				transform: rotate(20deg);
			}
			input#input_4_2_0{
				bottom: 73px;
				right: 181px; 
			}
			input#input_4_2_1{
				bottom: 13px;
				right: 181px; 
			}
			input#input_4_3_0{
				bottom: 75px;
				left: 155px;
				transform: rotate(10deg);
			}
			input#input_4_3_1{
				bottom: 16px;
				left: 145px;
				transform: rotate(10deg);
			}
			input#input_4_4_0{
				bottom: 67px;
				right: 171px; 
			}
			input#input_4_4_1{
				bottom: 7px;
				right: 171px; 
			}
			input#input_5_0_0, input#input_5_1_0, input#input_5_2_0, input#input_5_3_0,
			input#input_6_0_0, input#input_6_1_0, input#input_6_2_0, input#input_6_3_0 {
				bottom: 82px;
				right: 36px; 
			}
			input#input_5_0_1, input#input_5_1_1, input#input_5_2_1, input#input_5_3_1,
			input#input_6_0_1, input#input_6_1_1, input#input_6_2_1, input#input_6_3_1 {
				bottom: 22px;
				right: 36px; 
			}

			input#input_5_4_0{
				bottom: 216px;
				right: 36px;
			}
			input#input_5_4_1{
				bottom: 156px;
				right: 36px;
			}

			input#input_5_5_0, input#input_6_4_0, input#input_6_5_0 {
				bottom: 77px;
				right: 96px;
			}
			input#input_5_5_1, input#input_6_4_1, input#input_6_5_1 {
				bottom: 17px;
				right: 96px;
			}

			input#input_7_2_0{
				bottom: 223px;
				right: 36px;
			}

			input#input_7_2_1{
				bottom: 163px;
				right: 36px;
			}

		</style>
	</head>
	<body onresize="resizeDiv()">
		<h1>Bienvenido <?=$_SESSION["nombre"]?></h1>
		<br>
		<h2>Instrucciones:</h2>
		<p>Pon la ficha que consideres sea la que siga correspondiendo a la secuencia que existe</p>
		<br>
		<form action="calificar.php" method="POST" onsubmit="return calificar()">
			<canvas id = "dibujarRectangulo" class="canvasLocas" width = "800" height = "1130"
			style = "border: 1px solid black;">
			Su navegador no soporta el elemento canvas.
			</canvas>
			<br>
			<canvas id = "dibujarRectangulo2" class="canvasLocas" width = "800" height = "1270"
			style = "border: 1px solid black;">
			Su navegador no soporta el elemento canvas.
			</canvas>
			<br>
			<canvas id = "dibujarRectangulo3" class="canvasLocas" width = "800" height = "1270"
			style = "border: 1px solid black;">
			</canvas>	
			<br>
			<canvas id = "dibujarRectangulo4" class="canvasLocas" width = "800" height = "1410"
			style = "border: 1px solid black;">
			Su navegador no soporta el elemento canvas.
			</canvas>
			<br>
			<!-- este es de los que giran -->
			<canvas id = "dibujarRectangulo5" class="canvasLocas" width = "800" height = "1120"
			style = "border: 1px solid black;">
			Su navegador no soporta el elemento canvas.
			</canvas>
			<br>
			<!-- este es de los que cambian de tamaño -->
			<canvas id = "dibujarRectangulo6" class="canvasLocas" width = "800" height = "1120"
			style = "border: 1px solid black;">
			Su navegador no soporta el elemento canvas.
			</canvas>
			<br>
			<!-- este es de los que cambian de tamaño(el regreso) -->
			<canvas id = "dibujarRectangulo7" class="canvasLocas" width = "800" height = "1120"
			style = "border: 1px solid black;">
			Su navegador no soporta el elemento canvas.
			</canvas>
			<br>
			<canvas id = "dibujarRectangulo8" class="canvasLocas" width = "800" height = "1270"
			style = "border: 1px solid black;">
			Su navegador no soporta el elemento canvas.
			</canvas>
			<!-- Script para poder poner los inputs -->
			<script type="text/javascript">
				var canvasArray = document.getElementsByTagName('canvas');
				for(var i = 0; i < canvasArray.length; i++){
					document.body.appendChild(document.createElement('div'));
				}
				for(var i = 0; i < canvasArray.length; i++){
					var canvasParent = document.getElementsByTagName('canvas')[i];
					var div = document.getElementsByTagName('div')[i];

					div.style.top = canvasParent.offsetTop + 'px';
					div.style.left = canvasParent.offsetLeft + 'px';
					div.style.width = canvasParent.offsetWidth + 'px';
					div.style.height = canvasParent.offsetHeight + 'px';

					for(var j = 0; j < 6; j++){
						var span = document.createElement('span');
						var att2 = document.createAttribute('class');
						att2.value = 'div_' + i + '_span_' + j;
						span.setAttributeNode(att2);

						div.appendChild(span);

						for(var n = 0; n < 2; n++){
							var input = document.createElement('input');
							var att3 = [document.createAttribute('type'), document.createAttribute('maxlength'), document.createAttribute('class'), document.createAttribute('id'), document.createAttribute('name') ];
							att3[0].value = 'text';
							att3[1].value = '1';
							att3[2].value = 'input_' + n;
							att3[3].value = 'input_' + i + '_' + j + '_' + n;
							att3[4].value = 'input_' + i + '_' + j + '_' + n;
							input.setAttributeNode(att3[0]);
							input.setAttributeNode(att3[1]);
							input.setAttributeNode(att3[2]);
							input.setAttributeNode(att3[3]);
							input.setAttributeNode(att3[4]);

							span.appendChild(input);
						}
					}
				}

				function resizeDiv(){
					var div = document.getElementsByTagName('div');
					for(var i = 0; i < div.length; i++){
						var canvasParent = document.getElementsByTagName('canvas')[i];
						document.getElementsByTagName('div')[i]
							.style.top = canvasParent.offsetTop + 'px';
						document.getElementsByTagName('div')[i]
							.style.left = canvasParent.offsetLeft + 'px';
					}
				}
			</script>
			<!--Script para primer canvas-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("1",20,40);
					
					//fichas
					//primer linea		
					contexto.strokeRect(90, 50, 60, 120);
					contexto.strokeRect(170, 50, 60, 120);
					contexto.strokeRect(250, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(90, 190, 60, 120);
					contexto.strokeRect(170, 190, 60, 120);
					contexto.strokeRect(250, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(90, 50);
					dos(170, 50);
					dos(250, 50);
					cuatro(90, 50+60);
					cuatro(170, 50+60);
					cuatro(250, 50+60);
					uno(90, 190);
					uno(170, 190);
					cuatro(90, 190+60);
					cuatro(170, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110);
					contexto.lineTo(150, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110);
					contexto.lineTo(230, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110);
					contexto.lineTo(310, 110);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250);
					contexto.lineTo(150, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250);
					contexto.lineTo(230, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250);
					contexto.lineTo(310, 250);
					contexto.stroke();
				/*
				/UNO
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("2",420,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50, 60, 120);
					contexto.strokeRect(570, 50, 60, 120);
					contexto.strokeRect(650, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190, 60, 120);
					contexto.strokeRect(570, 190, 60, 120);
					contexto.strokeRect(650, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					tres(490, 50);
					tres(570, 50);
					tres(650, 50);
					cuatro(490, 50+60);
					cuatro(570, 50+60);
					cuatro(650, 50+60);
					seis(490, 190);
					seis(570, 190);
					uno(490, 190+60);
					uno(570, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110);
					contexto.lineTo(550, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110);
					contexto.lineTo(630, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110);
					contexto.lineTo(710, 110);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250);
					contexto.lineTo(550, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250);
					contexto.lineTo(630, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250);
					contexto.lineTo(710, 250);
					contexto.stroke();
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 330);
				contexto.lineTo(800, 330);
				contexto.stroke();
				/*
				TRES
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("3",20,330+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(90, 330+50, 60, 120);
					contexto.strokeRect(170, 330+50, 60, 120);
					contexto.strokeRect(250, 330+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(90, 330+190, 60, 120);
					contexto.strokeRect(170, 330+190, 60, 120);
					contexto.strokeRect(250, 330+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+330, 60, 120);
					contexto.strokeRect(170, 330+330, 60, 120);
					contexto.strokeRect(250, 330+330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					seis(90, 330+50);
					//blanca
					tres(250, 330+50);
					seis(90, 330+50+60);
					dos(170, 330+50+60);
					cinco(250, 330+50+60);
					seis(90, 330+190);
					//blanca
					tres(250, 330+190);
					seis(90, 330+190+60);
					dos(170, 330+190+60);
					cinco(250, 330+190+60);
					seis(90, 330+330);
					//blanca
					seis(90, 330+330+60);
					dos(170, 330+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+330);
					contexto.lineTo(150, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+330);
					contexto.lineTo(230, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+330);
					contexto.lineTo(310, 110+330);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250+330);
					contexto.lineTo(150, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+330);
					contexto.lineTo(230, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+330);
					contexto.lineTo(310, 250+330);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(90, 390+330);
					contexto.lineTo(150, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+330);
					contexto.lineTo(230, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+330);
					contexto.lineTo(310, 390+330);
					contexto.stroke();
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("4",420,330+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(490, 330+50, 60, 120);
					contexto.strokeRect(570, 330+50, 60, 120);
					contexto.strokeRect(650, 330+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(490, 330+190, 60, 120);
					contexto.strokeRect(570, 330+190, 60, 120);
					contexto.strokeRect(650, 330+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+330, 60, 120);
					contexto.strokeRect(570, 330+330, 60, 120);
					contexto.strokeRect(650, 330+330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(490, 330+50);
					dos(570, 330+50);
					dos(650, 330+50);
					uno(490, 330+190);
					uno(570, 330+190);
					uno(650, 330+190);
					uno(490, 330+190+60);
					uno(570, 330+190+60);
					uno(650, 330+190+60);
					dos(490, 330+330+60);
					dos(570, 330+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+330);
					contexto.lineTo(550, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+330);
					contexto.lineTo(630, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+330);
					contexto.lineTo(710, 110+330);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+330);
					contexto.lineTo(550, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+330);
					contexto.lineTo(630, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+330);
					contexto.lineTo(710, 250+330);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390+330);
					contexto.lineTo(550, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+330);
					contexto.lineTo(630, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+330);
					contexto.lineTo(710, 390+330);
					contexto.stroke();
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 800);
				contexto.lineTo(800, 800);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("5",20,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(90, 50+800, 60, 120);
					contexto.strokeRect(170, 50+800, 60, 120);
					contexto.strokeRect(250, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(90, 190+800, 60, 120);
					contexto.strokeRect(170, 190+800, 60, 120);
					contexto.strokeRect(250, 190+800, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cinco(90, 800+50);
					dos(170, 800+50);
					cuatro(250, 800+50);
					tres(90, 800+50+60);
					seis(170, 800+50+60);
					uno(250, 800+50+60);
					cinco(90, 800+190);
					tres(90, 800+190+60);
					dos(170, 800+190);
					seis(170, 800+190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+800);
					contexto.lineTo(150, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+800);
					contexto.lineTo(230, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+800);
					contexto.lineTo(310, 110+800);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250+800);
					contexto.lineTo(150, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+800);
					contexto.lineTo(230, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+800);
					contexto.lineTo(310, 250+800);
					contexto.stroke();
				/*
				/CINCO
				*/
				/*
				SEIS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("6",420,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50+800, 60, 120);
					contexto.strokeRect(570, 50+800, 60, 120);
					contexto.strokeRect(650, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190+800, 60, 120);
					contexto.strokeRect(570, 190+800, 60, 120);
					contexto.strokeRect(650, 190+800, 60, 120);
					cinco(490, 800+50);
					dos(570, 800+50);
					seis(650, 800+50);
					cuatro(570, 800+50+60);
					tres(650, 800+50+60);
					cuatro(570, 800+190);
					cinco(490, 800+190+60);
					dos(570, 800+190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+800);
					contexto.lineTo(550, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+800);
					contexto.lineTo(630, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+800);
					contexto.lineTo(710, 110+800);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+800);
					contexto.lineTo(550, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+800);
					contexto.lineTo(630, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+800);
					contexto.lineTo(710, 250+800);
					contexto.stroke();
				/*
				/SEIS
				*/
				function uno(x,y) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(30+x, 30+y, 5, 0, Math.PI*2);
					contexto.fill();
				}
				function dos(x,y) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(45+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(15+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
				}
				function tres(x,y) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(30+x, 30+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(15+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
				}
				function cuatro(x,y) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(15+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(15+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
				}
				function cinco(x,y) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(30+x, 30+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(15+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(15+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
				}
				function seis(x,y) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(15+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 15+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(15+x, 30+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 30+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(45+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(15+x, 45+y, 5, 0, Math.PI*2);
					contexto.fill();
				}
			</script>
			<!--Script para segundo canvas-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo2");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("7",20,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(70, 50, 60, 120);
					contexto.strokeRect(150, 50, 60, 120);
					contexto.strokeRect(230, 50, 60, 120);
					contexto.strokeRect(310, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(70, 190, 60, 120);
					contexto.strokeRect(150, 190, 60, 120);
					contexto.strokeRect(230, 190, 60, 120);
					contexto.strokeRect(310, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(70, 50);
					cinco(150, 50);
					dos(230, 50);
					cinco(310, 50);
					cinco(70, 50+60);
					dos(150, 50+60);
					cinco(230, 50+60);
					dos(310, 50+60);
					dos(70, 190);
					cinco(150, 190);
					dos(230, 190);
					cinco(70, 190+60);
					dos(150, 190+60);
					cinco(230, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(70, 110);
					contexto.lineTo(130, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 110);
					contexto.lineTo(210, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 110);
					contexto.lineTo(290, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 110);
					contexto.lineTo(370, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(70, 250);
					contexto.lineTo(130, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 250);
					contexto.lineTo(210, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 250);
					contexto.lineTo(290, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 250);
					contexto.lineTo(370, 250);
					contexto.stroke();
				/*
				/UNO		
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("8",420,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(470, 50, 60, 120);
					contexto.strokeRect(550, 50, 60, 120);
					contexto.strokeRect(630, 50, 60, 120);
					contexto.strokeRect(710, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(470, 190, 60, 120);
					contexto.strokeRect(550, 190, 60, 120);
					contexto.strokeRect(630, 190, 60, 120);
					contexto.strokeRect(710, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					tres(470, 50);
					tres(710, 50);
					dos(470, 50+60);
					cuatro(550, 50+60);
					cuatro(630, 50+60);
					dos(710, 50+60);
					tres(550, 190);
					tres(630, 190);
					cuatro(470, 190+60);
					dos(550, 190+60);
					dos(630, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(470, 110);
					contexto.lineTo(530, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(550, 110);
					contexto.lineTo(610, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(630, 110);
					contexto.lineTo(690, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(710, 110);
					contexto.lineTo(770, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(470, 250);
					contexto.lineTo(530, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(550, 250);
					contexto.lineTo(610, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(630, 250);
					contexto.lineTo(690, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(710, 250);
					contexto.lineTo(770, 250);
					contexto.stroke();
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 330);
				contexto.lineTo(800, 330);
				contexto.stroke();
				/*
				TRES
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("9",20,330+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(90, 330+50, 60, 120);
					contexto.strokeRect(170, 330+50, 60, 120);
					contexto.strokeRect(250, 330+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(90, 330+190, 60, 120);
					contexto.strokeRect(170, 330+190, 60, 120);
					contexto.strokeRect(250, 330+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+330, 60, 120);
					contexto.strokeRect(170, 330+330, 60, 120);
					contexto.strokeRect(250, 330+330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(90, 330+50);
					cinco(170, 330+50);
					dos(250, 330+50);
					seis(90, 330+50+60);
					cuatro(170, 330+50+60);
					seis(250, 330+50+60);
					cinco(90, 330+190);
					dos(170, 330+190);
					cinco(250, 330+190);
					cuatro(90, 330+190+60);
					seis(170, 330+190+60);
					cuatro(250, 330+190+60);
					dos(90, 330+330);
					cinco(170, 330+330);
					seis(90, 330+330+60);
					cuatro(170, 330+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+330);
					contexto.lineTo(150, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+330);
					contexto.lineTo(230, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+330);
					contexto.lineTo(310, 110+330);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250+330);
					contexto.lineTo(150, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+330);
					contexto.lineTo(230, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+330);
					contexto.lineTo(310, 250+330);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(90, 390+330);
					contexto.lineTo(150, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+330);
					contexto.lineTo(230, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+330);
					contexto.lineTo(310, 390+330);
					contexto.stroke();
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("10",420,330+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(490, 330+50, 60, 120);
					contexto.strokeRect(570, 330+50, 60, 120);
					contexto.strokeRect(650, 330+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(490, 330+190, 60, 120);
					contexto.strokeRect(570, 330+190, 60, 120);
					contexto.strokeRect(650, 330+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+330, 60, 120);
					contexto.strokeRect(570, 330+330, 60, 120);
					contexto.strokeRect(650, 330+330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					tres(490, 330+50);
					cuatro(570, 330+50);
					cinco(650, 330+50);
					tres(490, 330+50+60);
					cuatro(570, 330+50+60);
					cinco(650, 330+50+60);
					dos(490, 330+190);
					tres(570, 330+190);
					cuatro(650, 330+190);
					dos(490, 330+190+60);
					tres(570, 330+190+60);
					cuatro(650, 330+190+60);
					uno(490, 330+330);
					dos(570, 330+330);
					uno(490, 330+330+60);
					dos(570, 330+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+330);
					contexto.lineTo(550, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+330);
					contexto.lineTo(630, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+330);
					contexto.lineTo(710, 110+330);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+330);
					contexto.lineTo(550, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+330);
					contexto.lineTo(630, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+330);
					contexto.lineTo(710, 250+330);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390+330);
					contexto.lineTo(550, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+330);
					contexto.lineTo(630, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+330);
					contexto.lineTo(710, 390+330);
					contexto.stroke();
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 800);
				contexto.lineTo(800, 800);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("11",20,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(90, 50+800, 60, 120);
					contexto.strokeRect(170, 50+800, 60, 120);
					contexto.strokeRect(250, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(90, 190+800, 60, 120);
					contexto.strokeRect(170, 190+800, 60, 120);
					contexto.strokeRect(250, 190+800, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+800, 60, 120);
					contexto.strokeRect(170, 330+800, 60, 120);
					contexto.strokeRect(250, 330+800, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					seis(90, 800+50);
					seis(170, 800+50);
					seis(250, 800+50);
					dos(90, 800+50+60);
					uno(170, 800+50+60);
					cinco(90, 800+190);
					cinco(170, 800+190);
					cinco(250, 800+190);
					dos(90, 800+190+60);
					uno(170, 800+190+60);
					cuatro(90, 800+330);
					cuatro(170, 800+330);
					dos(90, 800+330+60);
					uno(170, 800+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+800);
					contexto.lineTo(150, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+800);
					contexto.lineTo(230, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+800);
					contexto.lineTo(310, 110+800);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(90, 250+800);
					contexto.lineTo(150, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+800);
					contexto.lineTo(230, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+800);
					contexto.lineTo(310, 250+800);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(90, 390+800);
					contexto.lineTo(150, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+800);
					contexto.lineTo(230, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+800);
					contexto.lineTo(310, 390+800);
					contexto.stroke();
				/*
				/CINCO
				*/
				/*
				SEIS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("12",420,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50+800, 60, 120);
					contexto.strokeRect(570, 50+800, 60, 120);
					contexto.strokeRect(650, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190+800, 60, 120);
					contexto.strokeRect(570, 190+800, 60, 120);
					contexto.strokeRect(650, 190+800, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+800, 60, 120);
					contexto.strokeRect(570, 330+800, 60, 120);
					contexto.strokeRect(650, 330+800, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(490, 800+50);
					dos(570, 800+50);
					tres(650, 800+50);
					tres(490, 800+50+60);
					dos(570, 800+50+60);
					uno(650, 800+50+60);
					dos(490, 800+190);
					tres(570, 800+190);
					cuatro(650, 800+190);
					tres(490, 800+190+60);
					dos(570, 800+190+60);
					uno(650, 800+190+60);
					tres(490, 800+330);
					cuatro(570, 800+330);
					tres(490, 800+330+60);
					dos(570, 800+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+800);
					contexto.lineTo(550, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+800);
					contexto.lineTo(630, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+800);
					contexto.lineTo(710, 110+800);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+800);
					contexto.lineTo(550, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+800);
					contexto.lineTo(630, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+800);
					contexto.lineTo(710, 250+800);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(490, 390+800);
					contexto.lineTo(550, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+800);
					contexto.lineTo(630, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+800);
					contexto.lineTo(710, 390+800);
					contexto.stroke();
				/*
				/SEIS
				*/
			</script>
			<!--Script para tercer canvas-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo3");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("13",20,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(70, 50, 60, 120);
					contexto.strokeRect(150, 50, 60, 120);
					contexto.strokeRect(230, 50, 60, 120);
					contexto.strokeRect(310, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(70, 190, 60, 120);
					contexto.strokeRect(150, 190, 60, 120);
					contexto.strokeRect(230, 190, 60, 120);
					contexto.strokeRect(310, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					tres(70, 50);
					cinco(150, 50);
					tres(230, 50);
					cinco(310, 50);
					dos(70, 50+60);
					cuatro(150, 50+60);
					dos(230, 50+60);
					cuatro(310, 50+60);
					cuatro(70, 190);
					dos(150, 190);
					cuatro(230, 190);
					cinco(70, 190+60);
					tres(150, 190+60);
					cinco(230, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(70, 110);
					contexto.lineTo(130, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 110);
					contexto.lineTo(210, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 110);
					contexto.lineTo(290, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 110);
					contexto.lineTo(370, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(70, 250);
					contexto.lineTo(130, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 250);
					contexto.lineTo(210, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 250);
					contexto.lineTo(290, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 250);
					contexto.lineTo(370, 250);
					contexto.stroke();
				/*
				/UNO		
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("14",420,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(470, 50, 60, 120);
					contexto.strokeRect(550, 50, 60, 120);
					contexto.strokeRect(630, 50, 60, 120);
					contexto.strokeRect(710, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(470, 190, 60, 120);
					contexto.strokeRect(550, 190, 60, 120);
					contexto.strokeRect(630, 190, 60, 120);
					contexto.strokeRect(710, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(550, 50);
					dos(630, 50);
					tres(710, 50);
					uno(470, 50+60);
					dos(550, 50+60);
					tres(630, 50+60);
					cuatro(710, 50+60);
					dos(470, 190);
					tres(550, 190);
					cuatro(630, 190);
					tres(470, 190+60);
					cuatro(550, 190+60);
					cinco(630, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(470, 110);
					contexto.lineTo(530, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(550, 110);
					contexto.lineTo(610, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(630, 110);
					contexto.lineTo(690, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(710, 110);
					contexto.lineTo(770, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(470, 250);
					contexto.lineTo(530, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(550, 250);
					contexto.lineTo(610, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(630, 250);
					contexto.lineTo(690, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(710, 250);
					contexto.lineTo(770, 250);
					contexto.stroke();
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 330);
				contexto.lineTo(800, 330);
				contexto.stroke();
				/*
				TRES
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("15",20,330+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(90, 330+50, 60, 120);
					contexto.strokeRect(170, 330+50, 60, 120);
					contexto.strokeRect(250, 330+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(90, 330+190, 60, 120);
					contexto.strokeRect(170, 330+190, 60, 120);
					contexto.strokeRect(250, 330+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+330, 60, 120);
					contexto.strokeRect(170, 330+330, 60, 120);
					contexto.strokeRect(250, 330+330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(90, 330+50);
					dos(170, 330+50);
					dos(250, 330+50);
					tres(90, 330+50+60);
					cuatro(250, 330+50+60);
					seis(90, 330+190);
					seis(170, 330+190);
					seis(250, 330+190);
					tres(90, 330+190+60);
					cuatro(250, 330+190+60);
					uno(90, 330+330);
					uno(170, 330+330);
					tres(90, 330+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+330);
					contexto.lineTo(150, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+330);
					contexto.lineTo(230, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+330);
					contexto.lineTo(310, 110+330);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250+330);
					contexto.lineTo(150, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+330);
					contexto.lineTo(230, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+330);
					contexto.lineTo(310, 250+330);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(90, 390+330);
					contexto.lineTo(150, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+330);
					contexto.lineTo(230, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+330);
					contexto.lineTo(310, 390+330);
					contexto.stroke();
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("16",420,330+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(490, 330+50, 60, 120);
					contexto.strokeRect(570, 330+50, 60, 120);
					contexto.strokeRect(650, 330+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(490, 330+190, 60, 120);
					contexto.strokeRect(570, 330+190, 60, 120);
					contexto.strokeRect(650, 330+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+330, 60, 120);
					contexto.strokeRect(570, 330+330, 60, 120);
					contexto.strokeRect(650, 330+330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(490, 330+50);
					seis(570, 330+50);
					dos(650, 330+50);
					cuatro(490, 330+50+60);
					cuatro(570, 330+50+60);
					cuatro(650, 330+50+60);
					uno(490, 330+190);
					seis(570, 330+190);
					dos(650, 330+190);
					uno(490, 330+190+60);
					uno(570, 330+190+60);
					uno(650, 330+190+60);
					uno(490, 330+330);
					seis(570, 330+330);
					cinco(490, 330+330+60);
					cinco(570, 330+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+330);
					contexto.lineTo(550, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+330);
					contexto.lineTo(630, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+330);
					contexto.lineTo(710, 110+330);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+330);
					contexto.lineTo(550, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+330);
					contexto.lineTo(630, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+330);
					contexto.lineTo(710, 250+330);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390+330);
					contexto.lineTo(550, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+330);
					contexto.lineTo(630, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+330);
					contexto.lineTo(710, 390+330);
					contexto.stroke();
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 800);
				contexto.lineTo(800, 800);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("17",20,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(90, 50+800, 60, 120);
					contexto.strokeRect(170, 50+800, 60, 120);
					contexto.strokeRect(250, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(90, 190+800, 60, 120);
					contexto.strokeRect(170, 190+800, 60, 120);
					contexto.strokeRect(250, 190+800, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+800, 60, 120);
					contexto.strokeRect(170, 330+800, 60, 120);
					contexto.strokeRect(250, 330+800, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					tres(90, 800+50);
					cuatro(170, 800+50);
					cinco(250, 800+50);
					dos(90, 800+50+60);
					dos(170, 800+50+60);
					dos(250, 800+50+60);
					dos(90, 800+190);
					tres(170, 800+190);
					cuatro(250, 800+190);
					uno(90, 800+190+60);
					uno(170, 800+190+60);
					uno(250, 800+190+60);
					cuatro(90, 800+330);
					cinco(170, 800+330);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+800);
					contexto.lineTo(150, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+800);
					contexto.lineTo(230, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+800);
					contexto.lineTo(310, 110+800);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(90, 250+800);
					contexto.lineTo(150, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+800);
					contexto.lineTo(230, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+800);
					contexto.lineTo(310, 250+800);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(90, 390+800);
					contexto.lineTo(150, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+800);
					contexto.lineTo(230, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+800);
					contexto.lineTo(310, 390+800);
					contexto.stroke();
				/*
				/CINCO
				*/
				/*
				SEIS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("18",420,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50+800, 60, 120);
					contexto.strokeRect(570, 50+800, 60, 120);
					contexto.strokeRect(650, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190+800, 60, 120);
					contexto.strokeRect(570, 190+800, 60, 120);
					contexto.strokeRect(650, 190+800, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+800, 60, 120);
					contexto.strokeRect(570, 330+800, 60, 120);
					contexto.strokeRect(650, 330+800, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cinco(490, 800+50);
					cuatro(570, 800+50);
					tres(650, 800+50);
					tres(570, 800+50+60);
					dos(650, 800+50+60);
					seis(490, 800+190);
					cinco(570, 800+190);
					cuatro(650, 800+190);
					uno(490, 800+190+60);
					cuatro(570, 800+190+60);
					tres(650, 800+190+60);
					tres(490, 800+330);
					dos(570, 800+330);
					dos(490, 800+330+60);
					cinco(570, 800+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+800);
					contexto.lineTo(550, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+800);
					contexto.lineTo(630, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+800);
					contexto.lineTo(710, 110+800);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+800);
					contexto.lineTo(550, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+800);
					contexto.lineTo(630, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+800);
					contexto.lineTo(710, 250+800);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(490, 390+800);
					contexto.lineTo(550, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+800);
					contexto.lineTo(630, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+800);
					contexto.lineTo(710, 390+800);
					contexto.stroke();
				/*
				/SEIS
				*/
				//loop para la sdos columnas
				/*for (var k = 0; k < 2; k++) {
					//loop para dibujar por columnas
					for (var j =	0; j < 6; j++) {
						for (var i = 0; i < 3; i++) {
							for (var h = 1; h < 4; h++) {
								for (var n = 1; n < 3; n++) {
									// parte de arriba de la ficha
									// dibujar un circulos primera linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 50+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
									// dibujar un circulos segunda linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 140+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
									// parte de abajo de la ficha
									// dibujar un circulos primera linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 50+40+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
									// dibujar un circulos segunda linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 140+40+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
								}
							}
							// circulos de en medio parte de arriba de la ficha
							// dibujar un circulo medio primer linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 50+20+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							// dibujar un circulo medio segunda linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 140+20+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							// circulos de en medio parte de abajo de la ficha
							// dibujar un circulo medio primer linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 50+20+40+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							// dibujar un circulo medio segunda linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 140+20+40+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							//fichas de domino primer linea
							//ficha
							contexto.strokeRect((70+(300*k))+(70*i), 50+(250*j), 50, 80);
							//linea media
							contexto.beginPath();
							contexto.moveTo((70+(300*k))+(70*i), 50+(250*j)+40);
							contexto.lineTo((70+(300*k))+(70*i)+50, 50+(250*j)+40);
							contexto.stroke();
							//fichas de domino segunda linea
							//ficha
							contexto.strokeRect((70+(300*k))+(70*i), 140+(250*j), 50, 80);
							//linea media
							contexto.beginPath();
							contexto.moveTo((70+(300*k))+(70*i), 140+(250*j)+40);
							contexto.lineTo((70+(300*k))+(70*i)+50, 140+(250*j)+40);
							contexto.stroke();
						}
					}
				}*/
			</script>
			<!--Script para cuarto canvas-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo4");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("19",20,40);
									
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(90, 50, 60, 120);
					contexto.strokeRect(170, 50, 60, 120);
					contexto.strokeRect(250, 50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(90, 190, 60, 120);
					contexto.strokeRect(170, 190, 60, 120);
					contexto.strokeRect(250, 190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330, 60, 120);
					contexto.strokeRect(170, 330, 60, 120);
					contexto.strokeRect(250, 330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(90,50);
					seis(170,50);
					tres(250,50);
					dos(90,50+60);
					seis(170,50+60);
					tres(250,50+60);
					tres(90,190);
					dos(170,190);
					seis(250,190);
					tres(90,190+60);
					dos(170,190+60);
					seis(250,190+60);
					seis(90,330);
					tres(170,330);
					seis(90,330+60);
					tres(170,330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110);
					contexto.lineTo(150, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110);
					contexto.lineTo(230, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110);
					contexto.lineTo(310, 110);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250);
					contexto.lineTo(150, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250);
					contexto.lineTo(230, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250);
					contexto.lineTo(310, 250);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(90, 390);
					contexto.lineTo(150, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390);
					contexto.lineTo(230, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390);
					contexto.lineTo(310, 390);
					contexto.stroke();
				/*
				/UNO		
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("20",420,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50, 60, 120);
					contexto.strokeRect(570, 50, 60, 120);
					contexto.strokeRect(650, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190, 60, 120);
					contexto.strokeRect(570, 190, 60, 120);
					contexto.strokeRect(650, 190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330, 60, 120);
					contexto.strokeRect(570, 330, 60, 120);
					contexto.strokeRect(650, 330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(490, 50);
					uno(570, 50);
					seis(650, 50);
					tres(490, 50+60);
					cinco(570, 50+60);
					cuatro(650, 50+60);
					uno(490, 190);
					seis(570, 190);
					dos(650, 190);
					cinco(490, 190+60);
					cuatro(570, 190+60);
					tres(650, 190+60);
					seis(490, 330);
					dos(570, 330);
					cuatro(490, 330+60);
					tres(570, 330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110);
					contexto.lineTo(550, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110);
					contexto.lineTo(630, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110);
					contexto.lineTo(710, 110);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250);
					contexto.lineTo(550, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250);
					contexto.lineTo(630, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250);
					contexto.lineTo(710, 250);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390);
					contexto.lineTo(550, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390);
					contexto.lineTo(630, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390);
					contexto.lineTo(710, 390);
					contexto.stroke();
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 140+330);
				contexto.lineTo(800, 140+330);
				contexto.stroke();
				/*
				TRES
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("21",20,330+40+140);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(90, 330+50+140, 60, 120);
					contexto.strokeRect(170, 330+50+140, 60, 120);
					contexto.strokeRect(250, 330+50+140, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(90, 330+190+140, 60, 120);
					contexto.strokeRect(170, 330+190+140, 60, 120);
					contexto.strokeRect(250, 330+190+140, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+330+140, 60, 120);
					contexto.strokeRect(170, 330+330+140, 60, 120);
					contexto.strokeRect(250, 330+330+140, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(170, 330+50+140);
					tres(250, 330+50+140);
					seis(90, 330+50+60+140);
					seis(170, 330+50+60+140);
					seis(250, 330+50+60+140);
					tres(90, 330+190+140);
					uno(250, 330+190+140);
					cinco(90, 330+190+60+140);
					cinco(170, 330+190+60+140);
					cinco(250, 330+190+60+140);
					uno(90, 330+330+140);
					tres(170, 330+330+140);
					cuatro(90, 330+330+60+140);
					cuatro(170, 330+330+60+140);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+330+140);
					contexto.lineTo(150, 110+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+330+140);
					contexto.lineTo(230, 110+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+330+140);
					contexto.lineTo(310, 110+330+140);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250+330+140);
					contexto.lineTo(150, 250+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+330+140);
					contexto.lineTo(230, 250+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+330+140);
					contexto.lineTo(310, 250+330+140);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(90, 390+330+140);
					contexto.lineTo(150, 390+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+330+140);
					contexto.lineTo(230, 390+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+330+140);
					contexto.lineTo(310, 390+330+140);
					contexto.stroke();
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("22",420,330+140+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(490, 330+140+50, 60, 120);
					contexto.strokeRect(570, 330+140+50, 60, 120);
					contexto.strokeRect(650, 330+140+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(490, 330+140+190, 60, 120);
					contexto.strokeRect(570, 330+140+190, 60, 120);
					contexto.strokeRect(650, 330+140+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+140+330, 60, 120);
					contexto.strokeRect(570, 330+140+330, 60, 120);
					contexto.strokeRect(650, 330+330+140, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cuatro(490, 330+50+140);
					dos(570, 330+50+140);
					seis(650, 330+50+140);
					cinco(490, 330+50+60+140);
					tres(570, 330+50+60+140);
					uno(650, 330+50+60+140);
					cuatro(490, 330+190+140);
					dos(570, 330+190+140);
					seis(650, 330+190+140);
					tres(490, 330+190+60+140);
					uno(570, 330+190+60+140);
					cinco(650, 330+190+60+140);
					cuatro(490, 330+330+140);
					dos(570, 330+330+140);
					uno(490, 330+330+60+140);
					cinco(570, 330+330+60+140);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+330+140);
					contexto.lineTo(550, 110+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+330+140);
					contexto.lineTo(630, 110+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+330+140);
					contexto.lineTo(710, 110+330+140);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+330+140);
					contexto.lineTo(550, 250+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+330+140);
					contexto.lineTo(630, 250+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+330+140);
					contexto.lineTo(710, 250+330+140);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390+330+140);
					contexto.lineTo(550, 390+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+330+140);
					contexto.lineTo(630, 390+330+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+330+140);
					contexto.lineTo(710, 390+330+140);
					contexto.stroke();
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 800+140);
				contexto.lineTo(800, 800+140);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("23",20,800+40+140);
					
					//fichas
					//primer linea				
					contexto.strokeRect(90, 50+800+140, 60, 120);
					contexto.strokeRect(170, 50+800+140, 60, 120);
					contexto.strokeRect(250, 50+800+140, 60, 120);
					//segunda linea
					contexto.strokeRect(90, 190+800+140, 60, 120);
					contexto.strokeRect(170, 190+800+140, 60, 120);
					contexto.strokeRect(250, 190+800+140, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+800+140, 60, 120);
					contexto.strokeRect(170, 330+800+140, 60, 120);
					contexto.strokeRect(250, 330+800+140, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(90, 800+50+140);
					cuatro(170, 800+50+140);
					cinco(250, 800+50+140);
					seis(90, 800+50+60+140);
					uno(170, 800+50+60+140);
					cinco(90, 800+190+140);
					dos(170, 800+190+140);
					cuatro(250, 800+190+140);
					uno(90, 800+190+60+140);
					seis(250, 800+190+60+140);
					cuatro(90, 800+330+140);
					cinco(170, 800+330+140);
					seis(170, 800+330+60+140);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+800+140);
					contexto.lineTo(150, 110+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+800+140);
					contexto.lineTo(230, 110+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+800+140);
					contexto.lineTo(310, 110+800+140);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(90, 250+800+140);
					contexto.lineTo(150, 250+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+800+140);
					contexto.lineTo(230, 250+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+800+140);
					contexto.lineTo(310, 250+800+140);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(90, 390+800+140);
					contexto.lineTo(150, 390+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+800+140);
					contexto.lineTo(230, 390+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+800+140);
					contexto.lineTo(310, 390+800+140);
					contexto.stroke();
				/*
				/CINCO
				*/
				/*
				SEIS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("24",420,800+40+140);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50+800+140, 60, 120);
					contexto.strokeRect(570, 50+800+140, 60, 120);
					contexto.strokeRect(650, 50+800+140, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190+800+140, 60, 120);
					contexto.strokeRect(570, 190+800+140, 60, 120);
					contexto.strokeRect(650, 190+800+140, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+800+140, 60, 120);
					contexto.strokeRect(570, 330+800+140, 60, 120);
					contexto.strokeRect(650, 330+800+140, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cuatro(490, 800+50+140);
					tres(570, 800+50+140);
					dos(650, 800+50+140);
					cinco(490, 800+50+60+140);
					seis(570, 800+50+60+140);
					uno(650, 800+50+60+140);
					tres(490, 800+190+140);
					dos(570, 800+190+140);
					cuatro(650, 800+190+140);
					uno(490, 800+190+60+140);
					cinco(570, 800+190+60+140);
					seis(650, 800+190+60+140);
					dos(490, 800+330+140);
					cuatro(570, 800+330+140);
					seis(490, 800+330+60+140);
					uno(570, 800+330+60+140);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+800+140);
					contexto.lineTo(550, 110+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+800+140);
					contexto.lineTo(630, 110+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+800+140);
					contexto.lineTo(710, 110+800+140);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+800+140);
					contexto.lineTo(550, 250+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+800+140);
					contexto.lineTo(630, 250+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+800+140);
					contexto.lineTo(710, 250+800+140);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(490, 390+800+140);
					contexto.lineTo(550, 390+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+800+140);
					contexto.lineTo(630, 390+800+140);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+800+140);
					contexto.lineTo(710, 390+800+140);
					contexto.stroke();
				/*
				/SEIS
				*/
				//loop para la sdos columnas
				/*for (var k = 0; k < 2; k++) {
					//loop para dibujar por columnas
					for (var j =	0; j < 6; j++) {
						for (var i = 0; i < 3; i++) {
							for (var h = 1; h < 4; h++) {
								for (var n = 1; n < 3; n++) {
									// parte de arriba de la ficha
									// dibujar un circulos primera linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 50+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
									// dibujar un circulos segunda linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 140+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
									// parte de abajo de la ficha
									// dibujar un circulos primera linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 50+40+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
									// dibujar un circulos segunda linea
									contexto.beginPath();
									contexto.arc(70+(17*n)+(300*k)+(70*i), 140+40+(10*h)+(250*j), 4, 0, Math.PI*2);
									contexto.fill();
								}
							}
							// circulos de en medio parte de arriba de la ficha
							// dibujar un circulo medio primer linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 50+20+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							// dibujar un circulo medio segunda linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 140+20+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							// circulos de en medio parte de abajo de la ficha
							// dibujar un circulo medio primer linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 50+20+40+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							// dibujar un circulo medio segunda linea
							contexto.beginPath();
							contexto.arc(70+25.5+(300*k)+(70*i), 140+20+40+(250*j), 4, 0, Math.PI*2);
							contexto.fill();
							//fichas de domino primer linea
							//ficha
							contexto.strokeRect((70+(300*k))+(70*i), 50+(250*j), 50, 80);
							//linea media
							contexto.beginPath();
							contexto.moveTo((70+(300*k))+(70*i), 50+(250*j)+40);
							contexto.lineTo((70+(300*k))+(70*i)+50, 50+(250*j)+40);
							contexto.stroke();
							//fichas de domino segunda linea
							//ficha
							contexto.strokeRect((70+(300*k))+(70*i), 140+(250*j), 50, 80);
							//linea media
							contexto.beginPath();
							contexto.moveTo((70+(300*k))+(70*i), 140+(250*j)+40);
							contexto.lineTo((70+(300*k))+(70*i)+50, 140+(250*j)+40);
							contexto.stroke();
						}
					}
				}*/
			</script>
			<!--Script para quintas canvas, las que giran-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo5");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("25",20,40);
					
					//fichas	
					contexto.translate(200, 170);
					//contexto.rotate(35*Math.PI / 180);
					contexto.rotate(35*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-25, 60);
					//puntos de abajo
					cinco(-25, 60+60)
					contexto.rotate(325*Math.PI / 180);
					contexto.rotate(90*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					seis(-30, 60);
					//puntos de abajo
					cuatro(-30, 60+60)
					contexto.rotate(270*Math.PI / 180);
					contexto.rotate(145*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-35, 60);
					//puntos de abajo
					cinco(-35, 60+60)
					contexto.rotate(215*Math.PI / 180);
					contexto.rotate(215*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					seis(-25, 60);
					//puntos de abajo
					cuatro(-25, 60+60)
					contexto.rotate(145*Math.PI / 180);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-30, 60);
					//puntos de abajo
					cinco(-30, 60+60)
					contexto.rotate(90*Math.PI / 180);
					contexto.rotate(325*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					contexto.rotate(35*Math.PI / 180);
					//contexto.rotate(325*Math.PI / 180);
					contexto.translate(-200, -165);
				/*
				/UNO
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("26",420,40);
					
					//fichas	
					contexto.translate(600, 180);
					contexto.rotate(325*Math.PI / 180);
					contexto.rotate(35*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-25, 60);
					contexto.rotate(325*Math.PI / 180);
					contexto.rotate(90*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					uno(-30, 60);
					contexto.rotate(270*Math.PI / 180);
					contexto.rotate(145*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					//puntos de arriba
					seis(-35, 60);
					contexto.rotate(215*Math.PI / 180);
					contexto.rotate(215*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					cinco(-25, 60);
					contexto.rotate(145*Math.PI / 180);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					cuatro(-30, 60);
					contexto.rotate(90*Math.PI / 180);
					contexto.rotate(325*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					contexto.rotate(35*Math.PI / 180);
					contexto.rotate(35*Math.PI / 180);
					contexto.translate(-600, -165);
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 350);
				contexto.lineTo(800, 350);
				contexto.stroke();
				/*
				TRES
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("27",20,390);
					
					//fichas	
					contexto.translate(200, 535);
					contexto.rotate(35*Math.PI / 180);
					contexto.rotate(35*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					uno(-25, 60);
					//puntos de abajo
					cuatro(-25, 60+60);
					contexto.rotate(325*Math.PI / 180);
					contexto.rotate(90*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-30, 60);
					//puntos de abajo
					cuatro(-30, 60+60);
					contexto.rotate(270*Math.PI / 180);
					contexto.rotate(145*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-35, 60);
					//puntos de abajo
					seis(-35, 60+60);
					contexto.rotate(215*Math.PI / 180);
					contexto.rotate(215*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					tres(-25, 60);
					//puntos de abajo
					seis(-25, 60+60);
					contexto.rotate(145*Math.PI / 180);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					tres(-30, 60);
					//puntos de abajo
					cinco(-30, 60+60);
					contexto.rotate(90*Math.PI / 180);
					contexto.rotate(325*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					contexto.rotate(35*Math.PI / 180);
					contexto.rotate(325*Math.PI / 180);
					contexto.translate(-200, -535);
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("28",420,390);
					
					//fichas	
					contexto.translate(600, 535);
					contexto.rotate(35*Math.PI / 180);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					uno(-25, 60);
					//puntos de abajo
					cuatro(-25, 60+60);
					contexto.rotate(315*Math.PI / 180);
					contexto.rotate(120*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-30, 60);
					//puntos de abajo
					cuatro(-30, 60+60);
					contexto.rotate(240*Math.PI / 180);
					contexto.rotate(200*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					tres(-25, 60);
					//puntos de abajo
					seis(-25, 60+60);
					contexto.rotate(160*Math.PI / 180);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					tres(-30, 60);
					//puntos de abajo
					cinco(-30, 60+60);
					contexto.rotate(90*Math.PI / 180);
					contexto.rotate(335*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					contexto.rotate(25*Math.PI / 180);
					contexto.rotate(325*Math.PI / 180);
					contexto.translate(-600, -535);
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 720);
				contexto.lineTo(800, 720);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("29",20,760);
					
					//fichas	
					contexto.translate(200, 900);
					//contexto.rotate(35*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 75, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 135);
					contexto.lineTo(35, 135);
					contexto.stroke();
					contexto.rotate(50*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					dos(-25, 60);
					//puntos de abajo
					tres(-25, 60+60)
					contexto.rotate(310*Math.PI / 180);
					contexto.rotate(100*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					tres(-30, 60);
					contexto.rotate(260*Math.PI / 180);
					contexto.rotate(150*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					//puntos de arriba
					cuatro(-35, 60);
					//puntos de abajo
					uno(-35, 60+60)
					contexto.rotate(210*Math.PI / 180);
					contexto.rotate(210*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de abajo
					cuatro(-25, 60+60)
					contexto.rotate(150*Math.PI / 180);
					contexto.rotate(260*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					seis(-30, 60);
					//puntos de abajo
					dos(-30, 60+60)
					contexto.rotate(100*Math.PI / 180);
					contexto.rotate(310*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					//puntos de arriba
					uno(-35, 60);
					//puntos de abajo
					seis(-35, 60+60)
					contexto.rotate(50*Math.PI / 180);
					//contexto.rotate(325*Math.PI / 180);
					contexto.translate(-200, -900);
				/*
				/CINCO
				*/
				/*
				SEIS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("30",420,760);
					
					//fichas	
					contexto.translate(600, 900);
					//contexto.rotate(35*Math.PI / 180);
					contexto.rotate(35*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de arriba
					seis(-25, 60);
					//puntos de abajo
					dos(-25, 60+60)
					contexto.rotate(325*Math.PI / 180);
					contexto.rotate(90*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					uno(-30, 60);
					//puntos de abajo
					tres(-30, 60+60)
					contexto.rotate(270*Math.PI / 180);
					contexto.rotate(145*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					//puntos de arriba
					tres(-35, 60);
					contexto.rotate(215*Math.PI / 180);
					contexto.rotate(215*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-25, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-25, 120);
					contexto.lineTo(35, 120);
					contexto.stroke();
					//puntos de abajo
					cuatro(-25, 60+60)
					contexto.rotate(145*Math.PI / 180);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-30, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-30, 120);
					contexto.lineTo(30, 120);
					contexto.stroke();
					//puntos de arriba
					cinco(-30, 60);
					//puntos de abajo
					tres(-30, 60+60)
					contexto.rotate(90*Math.PI / 180);
					contexto.rotate(325*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(-35, 60, 60, 120);
					//linea central
					contexto.beginPath();
					contexto.moveTo(-35, 120);
					contexto.lineTo(25, 120);
					contexto.stroke();
					contexto.rotate(35*Math.PI / 180);
					//contexto.rotate(325*Math.PI / 180);
					contexto.translate(-200, -1400);
				/*
				/SEIS
				*/
			</script>
			<!--Script para sextas canvas, las que cambian de tamaño-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo6");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("31",20,40);
					
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					tresEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					cuatroEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					unoEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					dosEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					seisEspecial(0, 0, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					cincoEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					dosEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					tresEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de abajo
					unoEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
				/*
				/UNO
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					
					contexto.translate(400, 0);
					contexto.fillText("32",20,40);
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					unoEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					dosEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 12, 4);
					//puntos de abajo
					tresEspecial(0, 0+48, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					cuatroEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					cincoEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 9, 3);
					//puntos de abajo
					seisEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
					contexto.translate(-400, 0);
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 330);
				contexto.lineTo(800, 330);
				contexto.stroke();
				/*
				TRES
				*/
					//TEXTO
					contexto.font="40px Georgia";
					
					contexto.translate(0, 330);
					contexto.fillText("33",20,40);
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					dosEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					tresEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					unoEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					unoEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					seisEspecial(0, 0, 12, 4);
					//puntos de abajo
					//tresEspecial(0, 0+48, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					cincoEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					cincoEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					tresEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					cuatroEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de arriba
					dosEspecial(0, 0, 9, 3);
					//puntos de abajo
					dosEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
					contexto.translate(0, -330);
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					
					contexto.translate(400, 330);
					contexto.fillText("34",20,40);
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					tresEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					//unoEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					seisEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					tresEspecial(0, 0, 12, 4);
					//puntos de abajo
					dosEspecial(0, 0+48, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					seisEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					cincoEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					dosEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					unoEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de arriba
					cincoEspecial(0, 0, 9, 3);
					//puntos de abajo
					cuatroEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
					contexto.translate(-400, -330);
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 660);
				contexto.lineTo(800, 660);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.translate(0, 660);
					contexto.fillText("35",20,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(70, 50, 60, 120);
					contexto.strokeRect(150, 50, 60, 120);
					contexto.strokeRect(230, 50, 60, 120);
					contexto.strokeRect(310, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(70, 190, 60, 120);
					contexto.strokeRect(150, 190, 60, 120);
					contexto.strokeRect(230, 190, 60, 120);
					contexto.strokeRect(310, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(70, 50);
					uno(150, 50);
					cinco(230, 50);
					cinco(310, 50);
					cinco(70, 50+60);
					cinco(150, 50+60);
					cinco(230, 50+60);
					cinco(310, 50+60);
					cuatro(70, 190);
					cuatro(150, 190);
					cinco(230, 190);
					dos(70, 190+60);
					dos(150, 190+60);
					dos(230, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(70, 110);
					contexto.lineTo(130, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 110);
					contexto.lineTo(210, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 110);
					contexto.lineTo(290, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 110);
					contexto.lineTo(370, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(70, 250);
					contexto.lineTo(130, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 250);
					contexto.lineTo(210, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 250);
					contexto.lineTo(290, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 250);
					contexto.lineTo(370, 250);
					contexto.stroke();
					contexto.translate(0, -660);
				/*
				/CINCO
				*/
				/*
				SEIS
				*/				
					//fichas	
					contexto.translate(0, 660);
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("36",420,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50, 60, 120);
					contexto.strokeRect(570, 50, 60, 120);
					contexto.strokeRect(650, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190, 60, 120);
					contexto.strokeRect(570, 190, 60, 120);
					contexto.strokeRect(650, 190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330, 60, 120);
					contexto.strokeRect(570, 330, 60, 120);
					contexto.strokeRect(650, 330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cinco(490, 50);
					uno(570, 50);
					tres(650, 50);
					tres(490, 50+60);
					dos(570, 50+60);
					uno(650, 50+60);
					cinco(490, 190);
					uno(570, 190);
					tres(650, 190);
					cinco(490, 190+60);
					cuatro(570, 190+60);
					tres(650, 190+60);
					cinco(490, 330);
					uno(570, 330);
					seis(570, 330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110);
					contexto.lineTo(550, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110);
					contexto.lineTo(630, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110);
					contexto.lineTo(710, 110);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250);
					contexto.lineTo(550, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250);
					contexto.lineTo(630, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250);
					contexto.lineTo(710, 250);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390);
					contexto.lineTo(550, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390);
					contexto.lineTo(630, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390);
					contexto.lineTo(710, 390);
					contexto.stroke();
					contexto.translate(0, -660);
				/*
				/SEIS
				*/
				function unoEspecial(x,y,n,z) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc((n*2)+x, (n*2)+y, z, 0, Math.PI*2);
					contexto.fill();
				}
				function dosEspecial(x,y,n,z) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc((n*3)+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(n+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
				}
				function tresEspecial(x,y,n,z) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc((n*2)+x, (n*2)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(n+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
				}
				function cuatroEspecial(x,y,n,z) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(n+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(n+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
				}
				function cincoEspecial(x,y,n,z) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc((n*2)+x, (n*2)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(n+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(n+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
				}
				function seisEspecial(x,y,n,z) {
					//circulos +15 primer linea
					//+30	segunda linea
					//+45 tercer linea
					contexto.beginPath();
					contexto.arc(n+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, n+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(n+x, (n*2)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, (n*2)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc((n*3)+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
					contexto.beginPath();
					contexto.arc(n+x, (n*3)+y, z, 0, Math.PI*2);
					contexto.fill();
				}
			</script>
			<!--Script para septimas canvas, las que cambian de tamaño(el regreso)-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo7");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("37",20,40);
					
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					cincoEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					cincoEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					tresEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					cuatroEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					dosEspecial(0, 0, 12, 4);
					//puntos de arriba
					dosEspecial(0, 0+48, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					//cuatroEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					unoEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					seisEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					seisEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 9, 3);
					//puntos de abajo
					cincoEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
				/*
				/UNO
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					
					contexto.translate(400, 0);
					contexto.fillText("32",20,40);
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					//cuatroEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					dosEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					tresEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					cincoEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					seisEspecial(0, 0, 12, 4);
					//puntos de abajo
					unoEspecial(0, 0+48, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					dosEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					cuatroEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					cincoEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					//cincoEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de arriba
					unoEspecial(0, 0, 9, 3);
					//puntos de abajo
					tresEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
					contexto.translate(-400, 0);
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 330);
				contexto.lineTo(800, 330);
				contexto.stroke();
				/*
				TRES
				*/
					//TEXTO
					contexto.font="40px Georgia";
					
					contexto.translate(0, 330);
					contexto.fillText("39",20,40);
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					unoEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					dosEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					cincoEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					seisEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					dosEspecial(0, 0, 12, 4);
					//puntos de abajo
					cuatroEspecial(0, 0+48, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					//cincoEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					unoEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					cincoEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de arriba
					unoEspecial(0, 0, 9, 3);
					//puntos de abajo
					tresEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
					contexto.translate(0, -330);
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					
					contexto.translate(400, 330);
					contexto.fillText("34",20,40);
					contexto.translate(310, 190);
					//rectangulo
					contexto.strokeRect(0, 0, 60, 120);
					//linea de en medio
					contexto.beginPath();
					contexto.moveTo(0, 60);
					contexto.lineTo(60, 60);
					contexto.stroke();
					contexto.translate(-310, -190);
					contexto.translate(270, 80);
					contexto.rotate(315*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 56, 112);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 56);
					contexto.lineTo(56, 56);
					contexto.stroke();
					//puntos de arriba
					tresEspecial(0, 0, 14, 4.7);
					//puntos de abajo
					dosEspecial(0, 0+56, 14, 4.7)
					contexto.rotate(45*Math.PI / 180);
					contexto.translate(-270, -80);
					contexto.translate(148, 80);
					contexto.rotate(270*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 52, 104);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 52);
					contexto.lineTo(52, 52);
					contexto.stroke();
					//puntos de arriba
					cuatroEspecial(0, 0, 13, 4.3);
					//puntos de arriba
					cuatroEspecial(0, 0+52, 13, 4.3);
					contexto.rotate(90*Math.PI / 180);
					contexto.translate(-148, -80);
					contexto.translate(60, 155);
					contexto.rotate(225*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 48, 96);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 48);
					contexto.lineTo(48, 48);
					contexto.stroke();
					//puntos de arriba
					seisEspecial(0, 0, 12, 4);
					//puntos de abajo
					cincoEspecial(0, 0+48, 12, 4);
					contexto.rotate(135*Math.PI / 180);
					contexto.translate(-60, -155);
					contexto.translate(120, 240);
					contexto.rotate(135*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 44, 88);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 44);
					contexto.lineTo(44, 44);
					contexto.stroke();
					//puntos de arriba
					//seisEspecial(0, 0, 11, 3.7);
					//puntos de abajo
					seisEspecial(0, 0+44, 11, 3.7);
					contexto.rotate(225*Math.PI / 180);
					contexto.translate(-120, -240);
					contexto.translate(180, 220);
					contexto.rotate(45*Math.PI / 180);
					//rectangulo
					contexto.strokeRect(0, 0, 40, 80);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 40);
					contexto.lineTo(40, 40);
					contexto.stroke();
					//puntos de arriba
					unoEspecial(0, 0, 10, 3.3);
					//puntos de abajo
					unoEspecial(0, 0+40, 10, 3.3);
					contexto.rotate(315*Math.PI / 180);
					contexto.translate(-180, -220);
					contexto.translate(180, 140);
					//rectangulo
					contexto.strokeRect(0, 0, 36, 72);
					//linea central
					contexto.beginPath();
					contexto.moveTo(0, 36);
					contexto.lineTo(36, 36);
					contexto.stroke();
					//puntos de arriba
					tresEspecial(0, 0, 9, 3);
					//puntos de abajo
					dosEspecial(0, 0+36, 9, 3);
					contexto.translate(-180, -140);
					contexto.translate(-400, -330);
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 660);
				contexto.lineTo(800, 660);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.translate(0, 660);
					contexto.font="40px Georgia";
					contexto.fillText("41",20,40);
									
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(90, 50, 60, 120);
					contexto.strokeRect(170, 50, 60, 120);
					contexto.strokeRect(250, 50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(90, 190, 60, 120);
					contexto.strokeRect(170, 190, 60, 120);
					contexto.strokeRect(250, 190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330, 60, 120);
					contexto.strokeRect(170, 330, 60, 120);
					contexto.strokeRect(250, 330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					//dos(90,50);
					cinco(170,50);
					dos(250,50);
					seis(90,50+60);
					cinco(170,50+60);
					cinco(250,50+60);
					cinco(90,190);
					dos(170,190);
					//seis(250,190);
					cuatro(90,190+60);
					tres(170,190+60);
					tres(250,190+60);
					dos(90,330);
					//tres(170,330);
					dos(90,330+60);
					uno(170,330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110);
					contexto.lineTo(150, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110);
					contexto.lineTo(230, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110);
					contexto.lineTo(310, 110);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(90, 250);
					contexto.lineTo(150, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250);
					contexto.lineTo(230, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250);
					contexto.lineTo(310, 250);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(90, 390);
					contexto.lineTo(150, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390);
					contexto.lineTo(230, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390);
					contexto.lineTo(310, 390);
					contexto.stroke();
					contexto.translate(0, -660);
				/*
				/CINCO
				*/
				/*
				SEIS
				*/				
					//fichas	
					contexto.translate(0, 660);
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("42",420,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50, 60, 120);
					contexto.strokeRect(570, 50, 60, 120);
					contexto.strokeRect(650, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190, 60, 120);
					contexto.strokeRect(570, 190, 60, 120);
					contexto.strokeRect(650, 190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330, 60, 120);
					contexto.strokeRect(570, 330, 60, 120);
					contexto.strokeRect(650, 330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cinco(490, 50);
					tres(570, 50);
					uno(650, 50);
					uno(490, 50+60);
					dos(570, 50+60);
					dos(650, 50+60);
					cinco(490, 190);
					tres(570, 190);
					uno(650, 190);
					tres(490, 190+60);
					cuatro(570, 190+60);
					cuatro(650, 190+60);
					cuatro(490, 330);
					dos(570, 330);
					cinco(490, 330+60);
					seis(570, 330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110);
					contexto.lineTo(550, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110);
					contexto.lineTo(630, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110);
					contexto.lineTo(710, 110);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250);
					contexto.lineTo(550, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250);
					contexto.lineTo(630, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250);
					contexto.lineTo(710, 250);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390);
					contexto.lineTo(550, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390);
					contexto.lineTo(630, 390);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390);
					contexto.lineTo(710, 390);
					contexto.stroke();
					contexto.translate(0, -660);
				/*
				/SEIS
				*/
			</script>
			<!--Script para octavas canvas-->
			<script>
				var canvas = document.getElementById("dibujarRectangulo8");
				var contexto = canvas.getContext("2d");
				//linea de en medio
				contexto.beginPath();
				contexto.moveTo(400, 0);
				contexto.lineTo(400, 1500);
				contexto.stroke();
				
				/*
				UNO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("43",20,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(70, 50, 60, 120);
					contexto.strokeRect(150, 50, 60, 120);
					contexto.strokeRect(230, 50, 60, 120);
					contexto.strokeRect(310, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(70, 190, 60, 120);
					contexto.strokeRect(150, 190, 60, 120);
					contexto.strokeRect(230, 190, 60, 120);
					contexto.strokeRect(310, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(70, 50);
					tres(150, 50);
					cinco(230, 50);
					//cinco(310, 50);
					tres(70, 50+60);
					cinco(150, 50+60);
					//dos(230, 50+60);
					dos(310, 50+60);
					cinco(70, 190);
					//dos(150, 190);
					dos(230, 190);
					//cinco(70, 190+60);
					dos(150, 190+60);
					cuatro(230, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(70, 110);
					contexto.lineTo(130, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 110);
					contexto.lineTo(210, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 110);
					contexto.lineTo(290, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 110);
					contexto.lineTo(370, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(70, 250);
					contexto.lineTo(130, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 250);
					contexto.lineTo(210, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 250);
					contexto.lineTo(290, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 250);
					contexto.lineTo(370, 250);
					contexto.stroke();
				/*
				/UNO		
				*/
				/*
				DOS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("44",420,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(470, 50, 60, 120);
					contexto.strokeRect(550, 50, 60, 120);
					contexto.strokeRect(630, 50, 60, 120);
					contexto.strokeRect(710, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(470, 190, 60, 120);
					contexto.strokeRect(550, 190, 60, 120);
					contexto.strokeRect(630, 190, 60, 120);
					contexto.strokeRect(710, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(550, 50);
					dos(630, 50);
					seis(710, 50);
					seis(470, 50+60);
					tres(550, 50+60);
					//dos(630, 50+60);
					dos(710, 50+60);
					dos(470, 190);
					//tres(550, 190);
					seis(630, 190);
					tres(470, 190+60);
					seis(550, 190+60);
					dos(630, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(470, 110);
					contexto.lineTo(530, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(550, 110);
					contexto.lineTo(610, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(630, 110);
					contexto.lineTo(690, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(710, 110);
					contexto.lineTo(770, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(470, 250);
					contexto.lineTo(530, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(550, 250);
					contexto.lineTo(610, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(630, 250);
					contexto.lineTo(690, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(710, 250);
					contexto.lineTo(770, 250);
					contexto.stroke();
				/*
				/DOS
				*/
				//PRIMER LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 330);
				contexto.lineTo(800, 330);
				contexto.stroke();
				/*
				TRES
				*/
					
					contexto.translate(0, 330);
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("45",20,40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(70, 50, 60, 120);
					contexto.strokeRect(150, 50, 60, 120);
					contexto.strokeRect(230, 50, 60, 120);
					contexto.strokeRect(310, 50, 60, 120);
					//segunda linea
					contexto.strokeRect(70, 190, 60, 120);
					contexto.strokeRect(150, 190, 60, 120);
					contexto.strokeRect(230, 190, 60, 120);
					contexto.strokeRect(310, 190, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					dos(70, 50);
					cuatro(150, 50);
					uno(230, 50);
					tres(310, 50);
					tres(70, 50+60);
					cinco(150, 50+60);
					dos(230, 50+60);
					cuatro(310, 50+60);
					uno(70, 190);
					tres(150, 190);
					//dos(230, 190);
					cuatro(70, 190+60);
					seis(150, 190+60);
					tres(230, 190+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(70, 110);
					contexto.lineTo(130, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 110);
					contexto.lineTo(210, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 110);
					contexto.lineTo(290, 110);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 110);
					contexto.lineTo(370, 110);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(70, 250);
					contexto.lineTo(130, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(150, 250);
					contexto.lineTo(210, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(230, 250);
					contexto.lineTo(290, 250);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(310, 250);
					contexto.lineTo(370, 250);
					contexto.stroke();
					contexto.translate(0, -330);
				/*
				/TRES
				*/
				/*
				CUATRO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("46",420,330+40);
					
					//fichas
					//primer linea de cuadros 				
					contexto.strokeRect(490, 330+50, 60, 120);
					contexto.strokeRect(570, 330+50, 60, 120);
					contexto.strokeRect(650, 330+50, 60, 120);
					//segunda linea de cuadros
					contexto.strokeRect(490, 330+190, 60, 120);
					contexto.strokeRect(570, 330+190, 60, 120);
					contexto.strokeRect(650, 330+190, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+330, 60, 120);
					contexto.strokeRect(570, 330+330, 60, 120);
					contexto.strokeRect(650, 330+330, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					uno(490, 330+50);
					//seis(570, 330+50);
					uno(650, 330+50);
					dos(490, 330+50+60);
					uno(570, 330+50+60);
					tres(650, 330+50+60);
					uno(490, 330+190);
					tres(570, 330+190);
					cuatro(650, 330+190);
					dos(490, 330+190+60);
					uno(570, 330+190+60);
					tres(650, 330+190+60);
					dos(490, 330+330);
					tres(570, 330+330);
					cuatro(490, 330+330+60);
					dos(570, 330+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+330);
					contexto.lineTo(550, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+330);
					contexto.lineTo(630, 110+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+330);
					contexto.lineTo(710, 110+330);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+330);
					contexto.lineTo(550, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+330);
					contexto.lineTo(630, 250+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+330);
					contexto.lineTo(710, 250+330);
					contexto.stroke();
					//tercer linea
					contexto.moveTo(490, 390+330);
					contexto.lineTo(550, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+330);
					contexto.lineTo(630, 390+330);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+330);
					contexto.lineTo(710, 390+330);
					contexto.stroke();
				/*
				/*
				/CUATRO
				*/
				//segunda LINEA DE DIVISION
				contexto.beginPath();
				contexto.moveTo(0, 800);
				contexto.lineTo(800, 800);
				contexto.stroke();
				/*
				CINCO
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("47",20,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(90, 50+800, 60, 120);
					contexto.strokeRect(170, 50+800, 60, 120);
					contexto.strokeRect(250, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(90, 190+800, 60, 120);
					contexto.strokeRect(170, 190+800, 60, 120);
					contexto.strokeRect(250, 190+800, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(90, 330+800, 60, 120);
					contexto.strokeRect(170, 330+800, 60, 120);
					contexto.strokeRect(250, 330+800, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cinco(90, 800+50);
					uno(170, 800+50);
					tres(250, 800+50);
					cinco(90, 800+50+60);
					uno(170, 800+50+60);
					tres(250, 800+50+60);
					tres(90, 800+190);
					dos(170, 800+190);
					cuatro(250, 800+190);
					tres(90, 800+190+60);
					dos(170, 800+190+60);
					cuatro(250, 800+190+60);
					uno(90, 800+330);
					seis(170, 800+330);
					uno(90, 800+330+60);
					seis(170, 800+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(90, 110+800);
					contexto.lineTo(150, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 110+800);
					contexto.lineTo(230, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 110+800);
					contexto.lineTo(310, 110+800);
					contexto.stroke();
					//segunda linea
					contexto.beginPath();
					contexto.moveTo(90, 250+800);
					contexto.lineTo(150, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 250+800);
					contexto.lineTo(230, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 250+800);
					contexto.lineTo(310, 250+800);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(90, 390+800);
					contexto.lineTo(150, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(170, 390+800);
					contexto.lineTo(230, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(250, 390+800);
					contexto.lineTo(310, 390+800);
					contexto.stroke();
				/*
				/CINCO
				*/
				/*
				SEIS
				*/
					//TEXTO
					contexto.font="40px Georgia";
					contexto.fillText("48",420,800+40);
					
					//fichas
					//primer linea				
					contexto.strokeRect(490, 50+800, 60, 120);
					contexto.strokeRect(570, 50+800, 60, 120);
					contexto.strokeRect(650, 50+800, 60, 120);
					//segunda linea
					contexto.strokeRect(490, 190+800, 60, 120);
					contexto.strokeRect(570, 190+800, 60, 120);
					contexto.strokeRect(650, 190+800, 60, 120);
					//tercer linea de cuadros
					contexto.strokeRect(490, 330+800, 60, 120);
					contexto.strokeRect(570, 330+800, 60, 120);
					contexto.strokeRect(650, 330+800, 60, 120);
					//dibujar circulos
					//parte de abajo de la ficha +60 en y
					cinco(490, 800+50);
					//cuatro(570, 800+50);
					seis(650, 800+50);
					tres(490, 800+50+60);
					uno(570, 800+50+60);
					uno(650, 800+50+60);
					uno(490, 800+190);
					seis(570, 800+190);
					cuatro(650, 800+190);
					dos(490, 800+190+60);
					dos(570, 800+190+60);
					uno(650, 800+190+60);
					cinco(490, 800+330);
					cinco(570, 800+330);
					//dos(490, 800+330+60);
					dos(570, 800+330+60);
					//lineas centrales
					//primer linea
					contexto.beginPath();
					contexto.moveTo(490, 110+800);
					contexto.lineTo(550, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 110+800);
					contexto.lineTo(630, 110+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 110+800);
					contexto.lineTo(710, 110+800);
					contexto.stroke();
					contexto.beginPath();
					//segunda linea
					contexto.moveTo(490, 250+800);
					contexto.lineTo(550, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 250+800);
					contexto.lineTo(630, 250+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 250+800);
					contexto.lineTo(710, 250+800);
					contexto.stroke();
					//tercer linea
					contexto.beginPath();
					contexto.moveTo(490, 390+800);
					contexto.lineTo(550, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(570, 390+800);
					contexto.lineTo(630, 390+800);
					contexto.stroke();
					contexto.beginPath();
					contexto.moveTo(650, 390+800);
					contexto.lineTo(710, 390+800);
					contexto.stroke();
				/*
				/SEIS
				*/
			</script>
			<script type="text/javascript" src="js/calificar.js"></script>
			<br>
			<br>
			<input type="hidden" name="calficacion" id="calficacion">
			<input type="submit" name="Calificaar" value="Calificaar">
		</form>
	</body>
</html>