<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<?php include "includes/scripts.php"?>
	<title>Registro Usuario</title>
</head>
<body>
		<?php include "includes/header.php"?>
	<section id="container">
		
		<div class="form_register">
			<h1>Registro Usuario</h1>
			<br>
			<div class="alert">Error</div>

			<form>
				<label for="nombre">Nombre</label>
				<input type="text" name="name" id="nombre" placeholder="Nombre completo">
				<label for="correo">Correo Electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo Electrónico">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				<label for="rol">Tipo de Usuario</label>
				<select name="rol" id="rol">
					<option value="1">Administrador</option>
					<option value="2">Supervisor</option>
					<option value="3">Vendedor</option>
				</select>
				<input type="submit" value="Crear Usuario" class="btn_save">
			</form>

		</div>

	</section>
		<?php include "includes/footer.php"?>

</body>
</html>