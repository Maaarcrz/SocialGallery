function validacionFormulario(){

	var user=document.getElementById('user').value;
	var password=document.getElementById('password').value;
	//Si el campo user y password está vacío...
	if (user == '' || password == '') {
		//Mostrará este mensaje
		alert('Rellene todos los campos');
		return false;
	}else{
		//Si no continua (independientemente de que el usuario sea o no correcto)
		return true;
	}
}

function validacionSubidaImgs(){

	var titulo=document.getElementById('titulo2').value;
	var userfile=document.getElementById('userfile2').value;
	//Si el campo user y password está vacío...
	if (titulo == '' || userfile == '') {
		//Mostrará este mensaje
		alert('Rellene todos los campos');
		return false;
	}else{
		//Si no continua (independientemente de que el usuario sea o no correcto)
		return true;
	}
}
