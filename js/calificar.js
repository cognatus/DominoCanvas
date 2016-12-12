function calificar() {

	var domino = new Array(48);

	for (var i = 0; i < 48; i++) {
		domino[i] = new Array(2);
	}

	domino[0][0] = 1;
	domino[0][1] = 1;
	domino[1][0] = 1;
	domino[1][1] = 1;
	domino[2][0] = 1;
	domino[2][1] = 1;
	domino[3][0] = 1;
	domino[3][1] = 1;
	domino[4][0] = 1;
	domino[4][1] = 1;
	domino[5][0] = 1;
	domino[5][1] = 1;
	domino[6][0] = 1;
	domino[6][1] = 1;
	domino[7][0] = 1;
	domino[7][1] = 1;
	domino[8][0] = 1;
	domino[8][1] = 1;
	domino[9][0] = 1;
	domino[9][1] = 1;
	domino[10][0] = 1;
	domino[10][1] = 1;
	domino[11][0] = 1;
	domino[11][1] = 1;
	domino[12][0] = 1;
	domino[12][1] = 1;
	domino[13][0] = 1;
	domino[13][1] = 1;
	domino[14][0] = 1;
	domino[14][1] = 1;
	domino[15][0] = 1;
	domino[15][1] = 1;
	domino[16][0] = 1;
	domino[16][1] = 1;
	domino[17][0] = 1;
	domino[17][1] = 1;
	domino[18][0] = 1;
	domino[18][1] = 1;
	domino[19][0] = 1;
	domino[19][1] = 1;
	domino[20][0] = 1;
	domino[20][1] = 1;
	domino[21][0] = 1;
	domino[21][1] = 1;
	domino[22][0] = 1;
	domino[22][1] = 1;
	domino[23][0] = 1;
	domino[23][1] = 1;
	domino[24][0] = 1;
	domino[24][1] = 1;
	domino[25][0] = 1;
	domino[25][1] = 1;
	domino[26][0] = 1;
	domino[26][1] = 1;
	domino[27][0] = 1;
	domino[27][1] = 1;
	domino[28][0] = 1;
	domino[28][1] = 1;
	domino[29][0] = 1;
	domino[29][1] = 1;
	domino[30][0] = 1;
	domino[30][1] = 1;
	domino[31][0] = 1;
	domino[31][1] = 1;
	domino[32][0] = 1;
	domino[32][1] = 1;
	domino[33][0] = 1;
	domino[33][1] = 1;
	domino[34][0] = 1;
	domino[34][1] = 1;
	domino[35][0] = 1;
	domino[35][1] = 1;
	domino[36][0] = 1;
	domino[36][1] = 1;
	domino[37][0] = 1;
	domino[37][1] = 1;
	domino[38][0] = 1;
	domino[38][1] = 1;
	domino[39][0] = 1;
	domino[39][1] = 1;
	domino[40][0] = 1;
	domino[40][1] = 1;
	domino[41][0] = 1;
	domino[41][1] = 1;
	domino[42][0] = 1;
	domino[42][1] = 1;
	domino[43][0] = 1;
	domino[43][1] = 1;
	domino[44][0] = 1;
	domino[44][1] = 1;
	domino[45][0] = 1;
	domino[45][1] = 1;
	domino[46][0] = 1;
	domino[46][1] = 1;
	domino[47][0] = 1;
	domino[47][1] = 1;

	for (var i=0; i < 8; i++) { 
		for (var j=0; j < 6; j++) {
			console.log(document.getElementById('input_'+i+'_'+j+'_0'));
			console.log(document.getElementById('input_'+i+'_'+j+'_1'));
		}
	}

	document.getElementById("calficacion")[0].setAttribute("value", 10); 

	return 0;


}