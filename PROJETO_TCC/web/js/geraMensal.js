document.addEventListener("DOMContentLoaded", function(){
	var table = document.getElementsByTagName('table')[0];

	for(var j = 2; j < table.rows.length ; j++){

		var link = document.createElement('a');
		var i = document.createElement('i');

		i.setAttribute('class','glyphicon glyphicon-calendar');
		i.style.margin = 'auto 7px';
		link.setAttribute('title','Mensal');
		link.setAttribute('aria-label','Mensal');
		link.appendChild(i);

		table.rows[j].cells.item(table.rows[j].cells.length -1).appendChild(link);

	}



});