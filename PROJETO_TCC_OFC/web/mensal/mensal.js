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

		var data = new Date(ano,mes,0);

		var mesTxt = mes;

		if(mes < 10 && !mesTxt.includes('0')){
			mesTxt = "0"+mesTxt;
		}

		document.getElementById('text-data').innerHTML = mesTxt+"/"+ano;

		preencherTable(data);
		openAjaxReq();
	}
	else{
		alert('Data inválida');
	}

}

function preencherTable(day){
	var table = document.getElementById('table-frequencia');

	while (table.firstChild) {
    	table.removeChild(table.firstChild);
	}

	var lastDay = day.getDate();

	for(var i = 1; i <= lastDay ; i++){
		var row = table.insertRow(-1);

		day.setDate(i);
		for(k = 0; k < 20; k++){
			var x = row.insertCell(-1);

			if(i < 10 && k == 0){
				x.innerHTML = "0" + i;
			}
			else if(k == 0){
				x.innerHTML = i;
			}

			if(k==7 || k==14){
				x.setAttribute('class','border-right');
			}

			if(day.getDay() == 0 && (k == 1 || k == 8 || k == 15)){
				x.innerHTML = "Domingo";
			}
		}

	}
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

    limpaTable();
    limpaTextosExternos();

	if(aulas.length > 0){
		for(var aula in aulas){
			var aulaRec = montarAula(aulas[aula]);

            textoExternos(aulaRec);

            for(var horario in aulaRec.arrHorarios) {
                dias[aulas[aula].Dia_Semana].children[aulaRec.arrHorarios[horario] + 1].innerHTML = getTexto(aulaRec);
                dias[aulas[aula].Dia_Semana].children[aulaRec.arrHorarios[horario] + 1].setAttribute('class','table-element aula-semetre font-less');
            }
		}
	}
}

function textoExternos(aula){
	var campoAtiv = document.getElementById('hae-ativ');
	var campoProf = document.getElementById('hae-prof');
	var campoCoord = document.getElementById('hae-coord');

	switch(aula.EXTERNO){
		case '4':
		case '5': campoCoord.innerText += montaTextoExterno(aula); break;
		case '3':
		case '6':
		case '7':
		case '8':
		case '9': campoProf.innerHTML += montaTextoExterno(aula); break;
		case '10': campoAtiv.innerHTML += montaTextoExterno(aula); break;
	}
}

function montaTextoExterno(aula){
	var txt= " "+ (new Number(aula.Dia_Semana) + 1) +'º ';

	if(aula.horario_inicio.substring(3,5) == '00'){
		txt += aula.horario_inicio.substring(0,2) + "h às ";
	}
	else{
		txt+= aula.horario_inicio.substring(0,2) + "h" + aula.horario_inicio.substring(3,5) + " às ";
	}

	if(aula.horario_fim.substring(3,5) == '00'){
		txt += aula.horario_fim.substring(0,2) + "h;";
	}
	else{
		txt+= aula.horario_fim.substring(0,2) + "h" + aula.horario_inicio.substring(3,5) + ";";
	}
	return txt;
}

function limpaTextosExternos(){
	document.getElementById('hae-ativ').innerHTML = '';
	document.getElementById('hae-prof').innerHTML = '';
	document.getElementById('hae-coord').innerHTML = '';
}

function limpaTable(){
        var tds = document.getElementsByClassName('table-element');
        for(var i = 0; i < tds.length ; i++ ){
            if (tds[i].getAttribute('class') && typeof tds[i] != 'function') {
                tds[i].setAttribute('class', 'text-branco table-element font-less');
            }
        }
}

function getTexto(aula){
    var text = "";

    text += aula.abreviacao+ " " + aula.id_periodo+"º"+aula.nome_curso.charAt(0)+converterTurno(aula.turno);
    return text;
}

function converterTurno(turno){
    switch(turno){
        case '0': return "M"; break;
        case '1': return "T"; break;
        case '2': return "N"; break;
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
		if(dtHorIni.getHours() == "21" && arrHoraIni[i].getHours() == "21"){
			arrCompleto.push(i);
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

	var d3 = new Date();
	d3.setHours('09');
	d3.setMinutes('20');
	d3.setSeconds('00');

	var d5 = new Date();
	d5.setHours('11');
	d5.setMinutes('10');
	d5.setSeconds('00');

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

	return [d1,d3,d5,d7,d8,d9,d10,d11];
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
