<?php
    $url_base="http://localhost/empleados-php/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font/css/all.min.css">


	<title>Empleado PHP</title>
</head>
<body>

    <header>
        <div class="container">
            <nav class="main-nav navbar navbar-expand-md">
			<h1 class="logo">
				<a href="#" class="navbar-brand">PHP<span>.</span></a>
			</h1>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="menu navbar-nav ms-auto" id="menu">
                        <li class="nav-item"><a href="<?php echo $url_base?>" class="nav-link">DashBoard</a></li>
                        <li class="nav-item"><a href="<?php echo $url_base?>secciones/empleados/index.php" class="nav-link">Empleados</a></li>
						<li class="nav-item"><a href="<?php echo $url_base?>secciones/puestos/index.php"" class="nav-link">Puestos</a></li>
						<li class="nav-item"><a href="<?php echo $url_base?>secciones/usuarios/index.php"" class="nav-link">Usuarios</a></li>
						<li class="nav-item"><a href="" class="nav-link">Cerrar seción</a></li>
					</ul>
				</div>
			</nav>
        </div>
    </header>
    <main class="container pt-4 pb-4">
	