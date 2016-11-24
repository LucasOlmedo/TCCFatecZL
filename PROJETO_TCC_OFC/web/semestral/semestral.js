arrHoraIni = preencherArrInicio();
arrHoraFim = preencherArrFim(arrHoraIni);
arrMsgs = preencherMsgs();

document.addEventListener('DOMContentLoaded',function(){
	document.getElementById('btnOk').addEventListener('click',pegarValues);
	document.getElementById('mesAno').addEventListener('change',pegarValues);
	document.getElementById('btnImprimir').addEventListener('click',imprimir);
	pegarValues();
	imprimir();
});

function imprimir(){
	window.print();
}

function validarEntrada(texto){
	if(texto.split('-').length != 2){
		return false;
	}
	if(isNaN(Number(texto.split('-')[0])) || isNaN(Number(texto.split('-')[1]))){
		return false;
	}
	else if(Number(texto.split('-')[1])> 12){
		return false;
	}
	return true;
}

function pegarValues(){
	if(validarEntrada(mesAno.value)){
		var ano = mesAno.value.split('-')[0];
		var mes = mesAno.value.split('-')[1];

		if(mes >= 7){
			document.getElementById('semestre-header').innerHTML = '2º';
		}
		else{
			document.getElementById('semestre-header').innerHTML = '1º';
		}

		document.getElementById('ano-header').innerHTML = ano;

		openAjaxReqDisciplina();
		openAjaxReq();
	}
	else{
		alert('Data inválida');
	}
}

function openAjaxReqDisciplina(){
	var idProf = document.getElementById('idProf').value;

	if(window.XMLHttpRequest){
		req = new XMLHttpRequest();
	} else{
		req = new new ActiveXObject("Microsoft.XMLHTTP");
	}

	req.onreadystatechange = function() {
		if (req.readyState == 4) {
			var text = "[" + req.responseText + "]";
			exibe(text.replace(',]', ']'));
		}
	}
	req.open('GET','getDisciplinas.php?id='+idProf+'&sem='+mesAno.value,false);
	req.send();
}

function openAjaxReq(){
	var idProf = document.getElementById('idProf').value;

	if(window.XMLHttpRequest){
		req = new XMLHttpRequest();
	} else{
		req = new new ActiveXObject("Microsoft.XMLHTTP");
	}

	req.onreadystatechange = function() {
		if (req.readyState == 4) {
			var text = "[" + req.responseText + "]";
			exibeAulas(text.replace(',]', ']'));
		}
	}
	req.open('GET','getAulas.php?id='+idProf+'&sem='+mesAno.value,false);
	req.send();
}

function limpaExt(){
	$('parte-less-font').removeClass('is-ext');
	for(var i = 1; i <= 10 ; i ++){
		$('.aula-ext-'+i).text('-');
	}
}

function attResumo(){
	if($('.is-aula').length != 0){
		$('#ha').text($('.is-aula').length);
	}

	if($('.aula-ext-10').text() != '-'){
		$('#hativi').text($('.aula-ext-10').text());
	}

	if($('.aula-ext-4').text() != '-'){
		$('#jornada').text($('.aula-ext-4').text());
	}

	if($('.aula-ext-5').text() != '-'){
		if($('#jornada').text() != ''){
			$('#jornada').text((Number($('#jornada').text())+Number($('.aula-ext-5').text())));
		}
		else{
			$('#jornada').text($('.aula-ext-5').text());
		}
	}

	if($('.aula-ext-1').text() != '-'){
		$('#rji').text($('.aula-ext-1').text());
	}

	if($('.aula-ext-2').text() != '-'){
		if($('#rji').text() != ''){
			$('#rji').text((Number($('#rji').text())+Number($('.aula-ext-2').text())));
		}
		else{
			$('#rji').text($('.aula-ext-2').text());
		}
	}

	if($('#ha').text() != ''){
		$('#hativi').text(Math.ceil(Number($('#ha').text())/2));
	}

	setTextHAE($('.aula-ext-3').text());
	setTextHAE($('.aula-ext-6').text());
	setTextHAE($('.aula-ext-7').text());
	setTextHAE($('.aula-ext-8').text());
	setTextHAE($('.aula-ext-9').text());

	contaSemanal();
	contaMensal();
}

function contaSemanal(){
	setTextSemanal($('#ha').text());
	setTextSemanal($('#hativi').text());
	setTextSemanal($('#hae').text());
	setTextSemanal($('#rji').text());
	setTextSemanal($('#jornada').text());
}

function contaMensal(){
	setTextMensal($('#ha').text(),$('#ha-mensal'));
	setTextMensal($('#hativi').text(),$('#hativi-mensal'));
	setTextMensal($('#hae').text(),$('#hae-mensal'));
	setTextMensal($('#rji').text(),$('#rji-mensal'));
	setTextMensal($('#jornada').text(),$('#jornada-mensal'));
	setTextMensal($('#total-g-semanal').text(),$('#total-g-mensal'));
}

function setTextMensal(text,element){
	if(text != ''){
		$(element).text(Math.ceil(Number(text) * Number(4.5)));
	}
	else{
		$(element).text('0');
	}
}

function setTextSemanal(text){
	if(text != ''){
		if($('#total-g-semanal').text() != ''){
			$('#total-g-semanal').text((Number($('#total-g-semanal').text())+Number(text)));
		}
		else{
			$('#total-g-semanal').text(text);
		}
	}
}

function setTextHAE(text){
	if(text != '-'){
		if($('#hae').text() != ''){
			$('#hae').text((Number($('#hae').text())+Number(text)));
		}
		else{
			$('#hae').text(text);
		}
	}
}

function attExt(){
	var arrExternos = $('.is-ext');

	var v1 = arrExternos.filter('.ext-1');
	var v2 = arrExternos.filter('.ext-2');
	var v3 = arrExternos.filter('.ext-3');
	var v4 = arrExternos.filter('.ext-4');
	var v5 = arrExternos.filter('.ext-5');
	var v6 = arrExternos.filter('.ext-6');
	var v7 = arrExternos.filter('.ext-7');
	var v8 = arrExternos.filter('.ext-8');
	var v9 = arrExternos.filter('.ext-9');
	var v10 = arrExternos.filter('.ext-10');

	var arr = [v1,v2,v3,v4,v5,v6,v7,v8,v9,v10];

	for(aula in arr){
		if(arr[aula].length > 0){
			$('.aula-ext-'+(Number(aula)+1)).text(arr[aula].length);
		}
	}
}

function exibe(text){
	var aulas = JSON.parse(text);
	var dias = document.getElementsByClassName('aula');

	limpaDisciplinas();

	if(aulas.length > 0){
		for(var aula in aulas){
			preencheDisciplinas(aulas[aula],aula);
		}
	}
}

function limpaAulas(){
	$('.seg, .ter, .qua, .qui, .sex, .sab').text('').removeClass('.is-aula');
}

function limpaResumo(){
	$('#ha, #hativi, #hae, #rji, #jornada, #total-g-semanal, #ha-mensal, #hativi-mensal, #hae-mensal, #rji-mensal, #jornada-mensal, #total-g-mensal').text('');
}

function exibeAulas(text){
	var aulas = JSON.parse(text);
	var dias = document.getElementsByClassName('aula');
	limpaExt();
	limpaAulas();
	limpaResumo();
	updateObservacao();

	if(aulas.length > 0){
		for(var aula in aulas){
			var aulaRec = montarAula(aulas[aula]);

			var dia = null;
			if(aulas[aula].dia_semana == 0){
				dia = $('.seg');
			}else if(aulas[aula].dia_semana == 1){
				dia = $('.ter');
			} else if(aulas[aula].dia_semana == 2){
				dia = $('.qua');
			} else if(aulas[aula].dia_semana == 3){
				dia = $('.qui');
			} else if(aulas[aula].dia_semana == 4){
				dia = $('.sex');
			} else{
				dia = $('.sab');
			}

			for(var horario in aulaRec.arrHorarios) {
				if(aulas[aula].EXTERNO == 0){
					dia[aulaRec.arrHorarios[horario]].innerHTML = aulas[aula].abreviacao;
					dia[aulaRec.arrHorarios[horario]].setAttribute('class',dia[aulaRec.arrHorarios[horario]].getAttribute('class') + ' is-aula');
				}
				else{
					dia[aulaRec.arrHorarios[horario]].innerHTML = aulas[aula].EXTERNO;
					dia[aulaRec.arrHorarios[horario]].setAttribute('class',dia[aulaRec.arrHorarios[horario]].getAttribute('class') + ' is-ext' + ' ext-'+aulas[aula].EXTERNO);

				}
			}

		}
		attExt();
		attResumo();
		insertObservacao(aulas);
	}
}

function insertObservacao(aulas){
	var observacoes = [];
	observacoes.push('OBSERVAÇÕES: ');

	for(aula in aulas){
		if(aulas[aula].EXTERNO == 1){
			observacoes = seeObservacao(observacoes,$('.aula-ext-1').text() + arrMsgs[1]);
		}
		else if(aulas[aula].EXTERNO == 2){
			observacoes = seeObservacao(observacoes,$('.aula-ext-2').text() + arrMsgs[2]);
		}
		else if(aulas[aula].EXTERNO == 3){
			observacoes = seeObservacao(observacoes,$('.aula-ext-3').text() + arrMsgs[3]);
		}
		else if(aulas[aula].EXTERNO == 4){
			observacoes = seeObservacao(observacoes,$('.aula-ext-4').text() + arrMsgs[4] + aulas[aula].nome_curso);
		}
		else if(aulas[aula].EXTERNO == 5){
			observacoes = seeObservacao(observacoes,$('.aula-ext-5').text() + arrMsgs[5] + aulas[aula].nome_curso);
		}
		else if(aulas[aula].EXTERNO == 6){
			observacoes = seeObservacao(observacoes,$('.aula-ext-6').text() + arrMsgs[6] + aulas[aula].nome_disc);
		}
		else if(aulas[aula].EXTERNO == 7){
			observacoes = seeObservacao(observacoes,$('.aula-ext-7').text() + arrMsgs[7] + aulas[aula].nome_disc);
		}
		else if(aulas[aula].EXTERNO == 8){
			observacoes = seeObservacao(observacoes,$('.aula-ext-8').text() + arrMsgs[8] + aulas[aula].nome_curso);
		}
		else if(aulas[aula].EXTERNO == 9){
			observacoes = seeObservacao(observacoes,$('.aula-ext-9').text() + arrMsgs[9] + aulas[aula].nome_disc);
		}
		else if(aulas[aula].EXTERNO == 10){
			observacoes = seeObservacao(observacoes,$('.aula-ext-10').text() + arrMsgs[10] + aulas[aula].nome_disc);
		}
	}

	if(observacoes.length > 1){
		var linha = document.createElement('tr');
		var col = document.createElement('td');
		col.setAttribute('class','font-arial parte-medium-tit-font');
		var textoFinal = '';
		for(var i = 0 ; i < observacoes.length; i++){
			textoFinal += observacoes[i];
		}
		var txtNode = document.createElement('p');
		txtNode.innerHTML = textoFinal;
		txtNode.setAttribute('style','margin: 1%');
		col.appendChild(txtNode);
		linha.appendChild(col);
		document.getElementById('observacoes').appendChild(linha);
	}

}

function seeObservacao(observacoes,texto){
	for(obs in observacoes){
		if(observacoes[obs].includes(texto)){
			return observacoes;
		}
	}
	observacoes.push(texto +'.');
	return observacoes;
}

function updateObservacao(){
	$('#observacoes').empty();
}

function preencheDisciplinas(aula,id) {
	var disciplinas = document.getElementsByClassName('disc-f');
	var cursos = document.getElementsByClassName('curso-f');

	disciplinas[id].innerHTML = aula.abreviacao;
	cursos[id].innerHTML = aula.curso_abreviacao;
}

function limpaDisciplinas(){
	$('.disc-f').text('');
	$('.curso-f').text('');
}

function montarAula(aula){
	var dtHorIni = new Date();
	var dtHorFim = new Date();

	var arrIni = aula.horario_inicio.split(':');
	var arrFim = aula.horario_fim.split(':');

	dtHorIni.setHours(arrIni[0]);
	dtHorIni.setMinutes(arrIni[1]);
	dtHorIni.setSeconds('59');

	dtHorFim.setHours(arrFim[0]);
	dtHorFim.setMinutes(arrFim[1]);
	dtHorFim.setSeconds('00');

	aula.arrHorarios = montarArr(dtHorIni,dtHorFim);
	return aula;
}

function montarArr(dtHorIni,dtHorFim){
	var arrCompleto = [];

	for(var i = 0; i < arrHoraIni.length ; i++){

		if(dtHorIni.getHours() == "21" && arrHoraIni[i].getHours() == "21"){
			arrCompleto.push(i);
			arrCompleto.push(i+1);
			return arrCompleto;
		}
		if(arrHoraIni[i] > dtHorIni){

			arrCompleto.push(i-1);

			for(var j = i - 1;j < arrHoraFim.length ; j++){
				if((arrHoraFim[j].getHours() == dtHorFim.getHours()) && arrHoraFim[j].getMinutes() == dtHorFim.getMinutes()){
					arrCompleto.push(j);
					break;
				}
				else if(arrHoraFim[j] < dtHorFim){
					if(j>=i){
						arrCompleto.push(j);
					}
				}
				else {
					arrCompleto.push(j);
					break;
				}

			}
			return arrCompleto;
		}
	}
}

function preencherArrInicio(){
	var d1 = new Date();
	d1.setHours('07');
	d1.setMinutes('30');
	d1.setSeconds('00');

	var d2 = new Date();
	d2.setHours('08');
	d2.setMinutes('20');
	d2.setSeconds('00');

	var d3 = new Date();
	d3.setHours('09');
	d3.setMinutes('20');
	d3.setSeconds('00');

	var d4 = new Date();
	d4.setHours('10');
	d4.setMinutes('10');
	d4.setSeconds('00');

	var d5 = new Date();
	d5.setHours('11');
	d5.setMinutes('10');
	d5.setSeconds('00');

	var d6 = new Date();
	d6.setHours('12');
	d6.setMinutes('00');
	d6.setSeconds('00');

	var d7 = new Date();
	d7.setHours('13');
	d7.setMinutes('00');
	d7.setSeconds('00');

	var d8 = new Date();
	d8.setHours('13');
	d8.setMinutes('50');
	d8.setSeconds('00');

	var d9 = new Date();
	d9.setHours('14');
	d9.setMinutes('50');
	d9.setSeconds('00');

	var d10 = new Date();
	d10.setHours('15');
	d10.setMinutes('40');
	d10.setSeconds('00');

	var d11 = new Date();
	d11.setHours('16');
	d11.setMinutes('40');
	d11.setSeconds('00');

	var d12 = new Date();
	d12.setHours('17');
	d12.setMinutes('30');
	d12.setSeconds('00');

	var d13 = new Date();
	d13.setHours('19');
	d13.setMinutes('20');
	d13.setSeconds('00');

	var d14 = new Date();
	d14.setHours('20');
	d14.setMinutes('10');
	d14.setSeconds('00');

	var d15 = new Date();
	d15.setHours('21');
	d15.setMinutes('10');
	d15.setSeconds('00');

	var d16 = new Date();
	d16.setHours('22');
	d16.setMinutes('00');
	d16.setSeconds('00');

	var d17 = new Date();
	d17.setHours('22');
	d17.setMinutes('50');
	d17.setSeconds('00');

	return [d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12,d13,d14,d15,d16,d17];
}

function preencherArrFim(arrInicio){
	var arr = [];
	for(var dt in arrInicio){
		var newDt = new Date(arrInicio[dt]);
		newDt.setTime(arrInicio[dt].getTime() + 3000000);
		arr.push(newDt);
	}
	return arr;
}

function preencherMsgs(){
	var arr = [];
	arr[1] = ' Jornadas como diretor(a) ou vice-diretor da Faculdade';
	arr[2] = ' Jornadas como assessor(a) ao CEETEPS';
	arr[3] = " HAE'S como apoio à Direção da FATEC";
	arr[4] = " HAE'S como coordenador(a) do Curso Superior de Tecnologia em ";
	arr[5] = ' Jornadas como responsável pela implantação do Curso Superior de Tecnologia em ';
	arr[6] = " HAE'S como responsável pela disciplina ";
	arr[7] = " HAE'S como coordenador(a) da oficina ou laboratório ";
	arr[8] = " HAE'S como coordenador(a) de estágio do Curso Superior de Tecnologia em ";
	arr[9] = " HAE'S como orientador(a) de TCC do projeto ";
	arr[10] = ' Horas Atividades como ';

	return arr;
}
