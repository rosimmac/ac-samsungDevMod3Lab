<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lista usuarios</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

</head> 
<body>

    <div class="containerList">
        <h1>Consultar lista</h1> 


        <?php
        $servername = "localhost";
        $username = "root";
        $password_bd = "";
        $database = "cursosamsung";

        $conn = new mysqli($servername, $username, $password_bd, $database);

        if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>";
        echo "<tr class='header'><th>Nombre</th><th>Primer apellido</th><th>Segundo apellido</th><th>Email</th><th>Login</th><th>Contraseña</th></tr></div>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["NOMBRE"] . "</td>";
            echo "<td>" . $row["APELLIDO1"] . "</td>";
            echo "<td>" . $row["APELLIDO2"] . "</td>";
            echo "<td>" . $row["EMAIL"] . "</td>";
            echo "<td>" . $row["USUARIO"] . "</td>";
            echo "<td>" . $row["CLAVE"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        } else {
        echo "<p>No hay usuarios guardados</p>";
        }


        $conn->close();
        ?>
    
        <button id="form">Volver al formulario</button>
        <script src="lista.js"></script>

            
           
             
        
      
    </div>


</body>
</html>
