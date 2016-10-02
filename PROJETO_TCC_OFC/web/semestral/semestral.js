document.addEventListener('DOMContentLoaded',function(){

	document.getElementById('btnOk').addEventListener('click',pegarValues);
	document.getElementById('mesAno').addEventListener('change',pegarValues);

	pegarValues();
});

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

}