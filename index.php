<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('Location: sistema/');
    exit();
}

$alert = "";

if (!empty($_POST))
{
    if (empty($_POST["usuario"]) || empty($_POST["clave"]))
    {
        $alert = "Ingrese su usuario y su clave";
    }
    else
    {
        require_once "conexion.php"; // Asegúrate de que este archivo define $connection correctamente

        $user = $_POST['usuario'];
        $pass = $_POST['clave'];

        // Si usas variables directamente, cuidado con inyecciones SQL. Considera usar consultas preparadas.
        $query = mysqli_query($connection, "SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$pass'");
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            $data = mysqli_fetch_array($query);
            $_SESSION['active'] = true;
            $_SESSION['idUser'] = $data['idusuario'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['user'] = $data['usuario'];
            $_SESSION['rol'] = $data['rol'];

            header('Location: sistema/');
            exit();
        } else {
            $alert = "El usuario o la clave son incorrectos";
            session_destroy();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login / Sistema de Facturación</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <section id="container">
        <form action="" method="post">
            <h3>Iniciar Sesión</h3>
            <img class="logo1" src="img/login.png" alt="Login">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Contraseña">
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <input type="submit" value="INGRESAR">
        </form>
    </section>
</body>
</html>
