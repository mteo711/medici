function logo(cb, ids, ids2) {
	var x = document.getElementById(cb).checked;
	if (x == true){
        document.getElementById(ids).style.visibility='visible';
		document.getElementById(ids2).style.visibility='visible'; return;
	}
	else
        document.getElementById(ids).style.visibility='hidden';
		document.getElementById(ids2).style.visibility='hidden'; return;
};

function logob(cb, ids) {
	var x = document.getElementById(cb).checked;
	if (x == false){
        document.getElementById(ids).style.visibility='visible'; return;
	}
	else
        document.getElementById(ids).style.visibility='hidden'; return;
};

function capCheck(cap) {
    var x = document.getElementById(cap).value;
    if (x.toString().length != 5){
        alert("cap sbagliato"+x.toString().length);
    }
    else {
    }
}
