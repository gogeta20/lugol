var $cajaRotar = document.getElementById("cajaRotar");
	var $registro = document.getElementById("registro");
	var $inputNombre = document.getElementById("RegNombre");
	var $volverLogin = document.getElementById("volverLogin");
	

	$registro.addEventListener('click',function(){
		$cajaRotar.className = "cajaRotar Rotar";
		//$inputNombre.focus();
	});
	
	$inputNombre.addEventListener('focus',function(){
		//document.getElementById("cajaRotar").classList.remove="cajaRotar Rotar";
		//document.getElementById("cajaRotar").className="quedateRotado";
		$cajaRotar.classList.remove="cajaRotar Rotar";
		//$cajaRotar.className="quedateRotado";
	});
	
	$volverLogin.addEventListener('click',function(){
		$cajaRotar.className = "cajaRotar volver";
	});