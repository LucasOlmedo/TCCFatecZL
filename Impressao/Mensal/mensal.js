document.addEventListener('DOMContentLoaded',function(){

	document.getElementById('btnOk').addEventListener('click',pegarValues);
	document.getElementById('mesAno').addEventListener('change',pegarValues);

});

function pegarValues(){
	var ano = mesAno.value.split('-')[0];
	var mes = mesAno.value.split('-')[1];

	var data = new Date(ano,mes-1);

	var lastDay = ultimoDiaDoMes(data);
	preencherTable(lastDay);	
}

function ultimoDiaDoMes(objDate){
 	return (new Date(objDate.getFullYear(), objDate.getMonth() + 1, 0) ).getDate();
}

function preencherTable(lastDay){
	var table = document.getElementById('table-frequencia');

	while (table.firstChild) {
    	table.removeChild(table.firstChild);
	}

	for(var i = 1; i <= lastDay ; i++){
		var row = table.insertRow(-1);

		for(k = 0; k < 20; k++){
			var x = row.insertCell(-1);

			if(i < 10 && k == 0){
				x.innerHTML = "0" + i;
			}
			else if(k==0){
				x.innerHTML = i;
			}

		}

	}
}