document.addEventListener("DOMContentLoaded", function(){
	var table = document.getElementsByTagName('table')[0];

	for(var i = 2; i < table.rows.length ; i++){

		var link = document.createElement('a');
		var span = document.createElement('span');
		span.setAttribute('class','glyphicons glyphicons-calendar');

		link.setAttribute('title','Mensal');
		link.setAttribute('aria-label','Mensal');

		link.appendChild(span);

		console.log(link);
		console.log(table.rows[i].cells.item(table.rows[i].cells.length -1)); //.appendChild(link);

	}



});