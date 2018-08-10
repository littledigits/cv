var a=document.body.clientHeight;
var b=document.getElementById('header-dimension').offsetHeight;
var c=document.getElementById('nav-dimension').offsetHeight;
var d=document.getElementById('footer-dimension').offsetHeight;
var total=a-b-c-d-6;
document.getElementById('article-dimension').style.height=total;

function menuOpen() {document.getElementById("menu-content").classList.toggle("show");}

function setCookieDos() {document.cookie="css=dos";location.reload(true);}

function setCookieNc() {document.cookie="css=nc";location.reload(true);}

function selekcja(thisstring) {
	var xhttp;
	if (thisstring.length == 0) { 
		document.getElementById("wynik_selekcji").innerHTML = "";
		return;
	}
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("wynik_selekcji").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "../widgets/oninput.php?q="+thisstring, true);
	xhttp.send();   
}

function subdirOpenClose1() {
	document.getElementById("h301i02").classList.toggle("subdir-hidden-visible");
	document.getElementById("h301div").classList.toggle("subdir-hidden-visible");
	document.getElementById("h301i01").classList.toggle("subdir-visible-hidden");
}
function subdirOpenClose2() {
	document.getElementById("h302i02").classList.toggle("subdir-hidden-visible");
	document.getElementById("h302div").classList.toggle("subdir-hidden-visible");
	document.getElementById("h302i01").classList.toggle("subdir-visible-hidden");
}
function subdirOpenClose3() {
	document.getElementById("h303i02").classList.toggle("subdir-hidden-visible");
	document.getElementById("h303div").classList.toggle("subdir-hidden-visible");
	document.getElementById("h303i01").classList.toggle("subdir-visible-hidden");
}
function subdirOpenClose4() {
	document.getElementById("h304i02").classList.toggle("subdir-hidden-visible");
	document.getElementById("h304div").classList.toggle("subdir-hidden-visible");
	document.getElementById("h304i01").classList.toggle("subdir-visible-hidden");
}
function subdirOpenClose5() {
	document.getElementById("h305i02").classList.toggle("subdir-hidden-visible");
	document.getElementById("h305div").classList.toggle("subdir-hidden-visible");
	document.getElementById("h305i01").classList.toggle("subdir-visible-hidden");
}