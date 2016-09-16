arrHoraIni = preencherArrInicio();
arrHoraFim = preencherArrFim(arrHoraIni);

document.addEventListener("DOMContentLoaded", function(){
	var selectCurso = document.getElementById('select-curso');
 	var selectProfessor = document.getElementById('select-professor');

 	selectCurso.addEventListener('change',function(){
 		if(selectProfessor.selectedIndex != 0){
 			selectProfessor.selectedIndex = 0;
 		}
 		replaceTextGrade(selectCurso.options[selectCurso.selectedIndex].text);
		openAjaxTurma(selectCurso.value);
 	});	

 	selectProfessor.addEventListener('change',function(){
 		if(selectCurso.selectedIndex != 0){
 			selectCurso.selectedIndex = 0;
		}
		replaceTextGrade('Professor(a) ' + selectProfessor.options[selectProfessor.selectedIndex].text);
		openAjaxProfessor(selectProfessor.value);
	});

});

function replaceTextGrade(text){
	document.getElementById('text-grade').innerHTML = text;
}

function openAjaxProfessor(idProfessor){
	var req;

	if(window.XMLHttpRequest){
		req = new XMLHttpRequest();
	} else{
		req = new new ActiveXObject("Microsoft.XMLHTTP");
	}

	req.onreadystatechange = function(){
		if(req.readyState == 4){
			var text = "["+req.responseText+"]";
			exibe(text.replace(',]',']'));
		}
	}
	req.open('GET','getdiasemana.php?professor='+idProfessor,true);
	req.send();

}

function openAjaxTurma(idTurma){
	var arr = idTurma.split('-');
	var curso = arr[0];
	var periodo = arr[1];
	var turno = arr[2];

	var req;

	if(window.XMLHttpRequest){
		req = new XMLHttpRequest();
	} else{
		req = new new ActiveXObject("Microsoft.XMLHTTP");
	}

	req.onreadystatechange = function(){
		if(req.readyState == 4){
			var text = "["+req.responseText+"]";
			exibe(text.replace(',]',']'));
		}
	}
	req.open('GET','getdiasemana.php?periodo='+periodo+'&curso='+curso+'&turno='+turno,true);
	req.send();
}

function exibe(text){
	var aulas = JSON.parse(text);
	var dias = document.getElementsByTagName('tr');

	limparTable();

	if(aulas.length > 0){
		var cor = 0;
		for (var aula in aulas){
			var aulaRec = montarAula(aulas[aula]);			

			cor++;
			// horario das aula desse for, por isso o incremento na cor para cada repeticao do for
			for(var horario in aulaRec.arrHorarios){
				// acessando o dia junto com o horário
				dias[aulas[aula].id_DiaSemana].children[aulaRec.arrHorarios[horario] + 1].setAttribute('class','cor-'+ cor); 

				// para nao duplicar o texto
				if(!dias[aulas[aula].id_DiaSemana].children[aulaRec.arrHorarios[horario] + 1].innerHTML){
					dias[aulas[aula].id_DiaSemana].children[aulaRec.arrHorarios[horario] + 1].appendChild(getTexto(aulaRec));
				}
			}

		}

	}

}

function getTexto(aulaRec){
	if(document.getElementById('text-grade').innerHTML.includes('Professor(a)')){

		return document.createTextNode(aulaRec.nome_curso + aulaRec.id_periodo + aulaRec.abreviacao);
	}
	return document.createTextNode(aulaRec.nome + aulaRec.abreviacao);
}

// Limpar a table
function limparTable(){
	var tds = document.getElementsByTagName('td');
	for(var i = 0; i < tds.length ; i++ ){
		if(tds[i].getAttribute('class') && typeof tds[i] != 'function'){
			tds[i].setAttribute('class',null);
			tds[i].innerHTML = '';
		}
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