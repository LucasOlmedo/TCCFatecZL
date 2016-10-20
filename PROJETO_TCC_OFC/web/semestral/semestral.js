arrHoraIni = preencherArrInicio();
arrHoraFim = preencherArrFim(arrHoraIni);

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

function pegarValues(){
	var ano = mesAno.value.split('-')[0];
	var mes = mesAno.value.split('-')[1];

	if(mes >= 7){
		document.getElementById('semestre-header').innerHTML = '2º';
	}
	else{
		document.getElementById('semestre-header').innerHTML = '1º';
	}

	document.getElementById('ano-header').innerHTML = ano;

	openAjaxReq();
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
			exibe(text.replace(',]', ']'));
		}
	}
	req.open('GET','getAulas.php?id='+idProf+'&sem='+mesAno.value,false);
	req.send();
}

function exibe(text){
	var aulas = JSON.parse(text);
	var dias = document.getElementsByClassName('aula');

	limpaDisciplinas();

	if(aulas.length > 0){
		for(var aula in aulas){
			var aulaRec = montarAula(aulas[aula]);

			preencheDisciplinas(aulaRec,aula);
			for(var horario in aulaRec.arrHorarios) {

			}
		}
	}
}

function preencheDisciplinas(aula,id) {
	var disciplinas = document.getElementsByClassName('disc-f');
	var cursos = document.getElementsByClassName('curso-f');

	disciplinas[id].innerHTML = aula.abreviacao;
	cursos[id].innerHTML = aula.curso_abreviacao;
}

function limpaDisciplinas(){
	var disciplinas = document.getElementsByClassName('disc-f');
	var cursos = document.getElementsByClassName('curso-f');

	for(disciplina in disciplinas){
		disciplinas[disciplina].innerHTML = '';
		cursos[disciplina].innerHTML = '';
	}
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

		if(arrHoraIni[i] > dtHorIni){

			arrCompleto.push(i-1);

			for(var j = i - 1;j < arrHoraFim.length ; j++){
				if((arrHoraFim[j].getHours() == dtHorFim.getHours()) && arrHoraFim[j].getMinutes() == dtHorFim.getMinutes()){
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
	d8.setHours('14');
	d8.setMinutes('50');
	d8.setSeconds('00');

	var d9 = new Date();
	d9.setHours('16');
	d9.setMinutes('40');
	d9.setSeconds('00');

	var d10 = new Date();
	d10.setHours('19');
	d10.setMinutes('20');
	d10.setSeconds('00');

	var d11 = new Date();
	d11.setHours('21');
	d11.setMinutes('10');
	d11.setSeconds('00');

	return [d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11];
}

function preencherArrFim(arrInicio){
	var arr = [];
	for(var dt in arrInicio){
		var newDt = new Date(arrInicio[dt]);
		if(arrInicio[dt].getHours() > 12){
			newDt.setTime(arrInicio[dt].getTime() + 6000000);
		}
		else{
			newDt.setTime(arrInicio[dt].getTime() + 3000000);
		}
		arr.push(newDt);
	}
	return arr;
}
