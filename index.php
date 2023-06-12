<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formulario PHP</title>
   
    <link rel="stylesheet" type="text/css" <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

</head> 
<body>

<div class="container">
    <form id="myForm" method="post" action=""  class="formulario">
            <h1>Registrar usuarios</h1> 
            <div >
                <label > Nombre </label>
                    <input type="text"  name="nombre" id="nombre"  autocomplete="off">
                    <p id="errorNombre"></p>
            </div>
            <div >
                <label > Primer Apellido </label>
                    <input type="text"  name="apellido1" id="apellido1"  autocomplete="off">
                    <p id="errorApellido1"></p>
            </div>
            <div >
                <label > Segundo Apellido </label>
                    <input type="text"  name="apellido2" id="apellido2"  autocomplete="off">
                    <p id="errorApellido2"></p>
            </div>
            <div >
                <label > Nombre de Usuario </label>
                    <input type="text"  name="usuario" id="usuario"  autocomplete="off">
                    <p id="errorUsuario"></p>
            </div>
            <div >
                <label > Email </label>
                    <input type="email"  name="email" id="email" autocomplete="off">
                    <p id="errorEmail"></p>
            </div>
            <div >
                <label > Clave </label>
                    <input type="password"  name="password" id="password" autocomplete="off">
                    <p id="errorPassword"></p>
            </div>
            <button id="enviar">Registro</button>
            <button id="list">Consultar lista</button>
            <script src="index.js"></script>

            
            <div class="sqlMessage">
                <?php
                    // Verificar si el formulario ha sido enviado
                    if ($_POST) {
                        // Recuperar los valores del formulario
                        $nombre = $_POST["nombre"];
                        $apellido1 = $_POST["apellido1"];
                        $apellido2 = $_POST["apellido2"];
                        $usuario = $_POST["usuario"];
                        $email = $_POST["email"];
                        $clave =  $_POST["password"];

                        //Conexión con PDO
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "cursosamsung";


                        //Crear conexión

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        
                        //Check connection

                        if($conn->connect_error){
                            die("connection failed: " . $conn->connect_error);
                        }

                        if (empty($nombre) || empty($apellido1) || empty($apellido2)|| empty($usuario) || empty($email)  || empty($clave)) {
                            die("Todos los campos deben estar rellenos");
                        }

                        if(!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)){
                            die("El formato de email no es válido");
                        }

                        if(!preg_match('/^[\s\S]{4,8}$/', $clave)){
                            die("La contraseña debe tener entre 4 y 8 caracteres");
                        }

                       
                        $usuariosEmail = $conn->query("SELECT * FROM usuario WHERE email='$email'");
                    
                        if ($usuariosEmail->num_rows > 0) {
                            die("Ya existe un usuarios con ese email");
                        }


                        $sql = "INSERT INTO usuario (NOMBRE, APELLIDO1, APELLIDO2, USUARIO, EMAIL, CLAVE)
                        VALUES ('$nombre','$apellido1', '$apellido2', '$usuario', '$email', '$clave')";

                


                        if ($conn->query($sql) === TRUE) {
                            echo "Registrado con éxito";
                        } else {
                            echo "Error: ". $sql . "<br>" . $conn->error;
                        }

                        $conn->close();


                    }
                ?>
            </div>
    </form>
      
</div>


</body>
</html>
