document.addEventListener("DOMContentLoaded", function(){
	var table = document.getElementsByTagName('table')[0];

	for(var j = 2; j < table.rows.length ; j++){

		var link = document.createElement('a');
		var helper = document.createElement('i');
		var id_professor = table.rows[j].cells[0].innerHTML;

		helper.setAttribute('class','glyphicon glyphicon-calendar');
		helper.style.margin = 'auto 7px';
		link.setAttribute('title','Relatório Mensal');
		link.setAttribute('aria-label','Mensal');
		link.appendChild(helper);
		link.setAttribute('href','mensal/mensal.php?id='+id_professor);
		link.setAttribute('target','_blank');

		table.rows[j].cells.item(table.rows[j].cells.length -1).appendChild(link);

	}



});