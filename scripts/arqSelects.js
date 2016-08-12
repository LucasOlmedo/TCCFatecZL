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
			return exibe(text.replace(',]',']'));
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
			return exibe(text.replace(',]',']'));
		}
	}
	req.open('GET','getdiasemana.php?periodo='+periodo+'&curso='+curso+'&turno='+turno,true);
	req.send();
}

function exibe(text){
	console.log(JSON.parse(text));


}