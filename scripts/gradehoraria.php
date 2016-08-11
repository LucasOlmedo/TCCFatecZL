<!DOCTYPE html>
<html>
<head>
	<title>Grade Horária - FATEC Zona Leste</title>
	<script>
		document.addEventListener("DOMContentLoaded", function(){
			var ajax;

			if(window.XMLHttpRequest){
				ajax = new XMLHttpRequest();
			}
			else{
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}

			ajax.onreadystatechange = function(){
	 			if(ajax.readyState == 4 ){
					preencher(ajax.responseText);
	 			}
	 		}
	 		ajax.open("GET","getdadosweb.php",true);
	 		ajax.send();


	 		function preencher(dados){
	 			dados = dados.replace(',]',']');

	 			//var textCurso = "<option>";
	 			//var textProfessor = "<option>";
	 			//var myArr = JSON.parse(dados);

	 			//for(var i = 0; i < myArr.length; i++){
	 				//textCurso += 
	 				//textProfessor += myArr[i].nome;
	 			//}
	 			console.log(JSON.parse(dados));

	 		}
		});


	</script>


</head>
<body>
	<h1>Grade Horária Fatec Zona Leste</h1>
	<select id="select-curso" disabled>
		<option value="0">Escolha uma turma</option>
	</select>
	<select id="select-professor" disabled>
		<option value="0">Escolha um professor</option>
	</select>
</body>
</html>