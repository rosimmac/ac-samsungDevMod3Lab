
const expresiones = {
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    clave: /^[\s\S]{4,8}$/,
}

const inputNombre=document.getElementById('nombre');

const inputApellido1=document.getElementById('apellido1');

const inputApellido2=document.getElementById('apellido2');

const inputUsuario=document.getElementById('usuario');

const inputEmail=document.getElementById('email');

const inputPassword=document.getElementById('password');

let formularioValido=true;



const validarNombre=()=>{


	if(inputNombre.value===''){
		formularioValido=false;
		inputNombre.classList.add("red");
		inputNombre.classList.remove("green");
		document.getElementById('errorNombre').textContent ="Rellene este campo";
	}else{
		inputNombre.classList.remove("red");
		inputNombre.classList.add("green");
		document.getElementById('errorNombre').textContent ="";
	}
}

const validarApellido1=()=>{

	if(inputApellido1.value===''){
		formularioValido=false;
		inputApellido1.classList.add("red");
		inputApellido1.classList.remove("green");
		document.getElementById('errorApellido1').textContent ="Rellene este campo";
	}else{
		inputApellido1.classList.remove("red");
		inputApellido1.classList.add("green");
		document.getElementById('errorApellido1').textContent ="";
	}
}

const validarApellido2=()=>{

	if(inputApellido2.value===''){
		formularioValido=false;
		inputApellido2.classList.add("red");
		inputApellido2.classList.remove("green");
		document.getElementById('errorApellido2').textContent ="Rellene este campo";
	}else{
		inputApellido2.classList.remove("red");
		inputApellido2.classList.add("green");
		document.getElementById('errorApellido2').textContent ="";
	}
}

const validarUsuario=()=>{

	if(inputUsuario.value===''){
		formularioValido=false;
		inputUsuario.classList.add("red");
		inputUsuario.classList.remove("green");
		document.getElementById('errorUsuario').textContent ="Rellene este campo";
	}else{
		inputUsuario.classList.remove("red");
		inputUsuario.classList.add("green");
		document.getElementById('errorUsuario').textContent ="";
	}
}



const validarEmail=()=>{
	if(inputEmail.value===''){
		formularioValido=false;
		inputEmail.classList.add("red");
		inputEmail.classList.remove("green");
		document.getElementById('errorEmail').textContent ="Rellene este campo";
	}else if(!expresiones.email.test(inputEmail.value)){
		formularioValido=false;
		inputEmail.classList.add("red");
		inputEmail.classList.remove("green");
		document.getElementById('errorEmail').textContent ="Email inválido";
		inputEmail.title
	}else{
		inputEmail.classList.remove("red");
		inputEmail.classList.add("green");
		document.getElementById('errorEmail').textContent ="";
	}
}

const validarPassword=()=>{
	if(inputPassword.value===''){
		formularioValido=false;
		inputPassword.classList.add("red");
		inputPassword.classList.remove("green");
		document.getElementById('errorPassword').textContent ="Rellene este campo";
	}else if(!expresiones.clave.test(inputPassword.value)){
		formularioValido=false;
		inputPassword.classList.add("red");
		inputPassword.classList.remove("green");
		document.getElementById('errorPassword').textContent ="Debe tener entre 4 y 8 caracteres";
	}else{
		inputPassword.classList.remove("red");
		inputPassword.classList.add("green");
		document.getElementById('errorPassword').textContent ="";
	}
}



inputNombre.addEventListener('change', () => {
	validarNombre();
});

inputApellido1.addEventListener('change', () => {
	validarApellido1();
});

inputApellido2.addEventListener('change', () => {
	validarApellido2();
});

inputUsuario.addEventListener('change', () => {
	validarUsuario();
});

inputEmail.addEventListener('change', () => {
	validarEmail();
});

inputPassword.addEventListener('change', () => {
	validarPassword();
});



document.getElementById('enviar').addEventListener('click', (e) => {
    e.preventDefault();

	formularioValido=true;

	validarNombre();
    validarApellido1();
    validarApellido2();
    validarUsuario();
	validarEmail();
	validarPassword();

	if(formularioValido){
		document.getElementById("myForm").submit();
	}
	
});

document.getElementById('list').addEventListener('click', (e) => {
    e.preventDefault();

	window.location.href = "lista.php";
	
});

