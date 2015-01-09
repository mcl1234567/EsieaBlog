
function likes(id) {
	var xmlhttp;
	var type = "no";

	// Like
	if(document.getElementById(id).className != "btn btn-success") {
		// Changement de classe css :
		document.getElementById(id).className = "btn btn-success";
		type = "yes";

		// Récupération du nombre de likes
		text = document.getElementById(id).childNodes[0].nodeValue;
		var numberLikes = parseInt(text.replace( /[A-Z][a-z]+/g, ''));
		document.getElementById(id).childNodes[0].nodeValue = numberLikes + 1 + " Likes";
	}
	// Dislike
	else if(document.getElementById(id).className != "btn btn-primary") {
		// Changement de classe CSS :
		document.getElementById(id).className = "btn btn-primary";

		// Récupération du nombre de likes
		text = document.getElementById(id).childNodes[0].nodeValue;
		var numberLikes = parseInt(text.replace( /[A-Z][a-z]+/g, ''));
		document.getElementById(id).childNodes[0].nodeValue = numberLikes - 1 + " Likes";
	}

	// Sauvegarde en bdd
  	if(window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
	}

	xmlhttp.open("GET", "article_liked?id="+id+"&type="+type, true);
	xmlhttp.send();
}