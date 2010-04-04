window.onload=montre;

function montre(menu) {

var d = document.getElementById(menu);

	for (var i = 1; i<=10; i++) {

		if (document.getElementById('smenu'+i)) {document.getElementById('smenu'+i).style.display='none';}

	}

if (d) {d.style.display='block';}

}