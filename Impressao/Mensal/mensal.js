document.addEventListener('DOMContentLoaded',function(){

	document.getElementById('btnOk').addEventListener('click',pegarValues);
	document.getElementById('mesAno').addEventListener('change',pegarValues);

	pegarValues();
});

function pegarValues(){
	var ano = mesAno.value.split('-')[0];
	var mes = mesAno.value.split('-')[1];

	var data = new Date(ano,mes,0);

	var mesTxt = mes;

	if(mes < 10 && !mesTxt.includes('0')){
		mesTxt = "0"+mesTxt;
	}

	document.getElementById('text-data').innerHTML = mesTxt+"/"+ano;

	preencherTable(data);	
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

			if(day.getDay() == 0 && (k == 1 || k == 8 || k == 15)){
				x.innerHTML = "Domingo";
			}
		}

	}
}