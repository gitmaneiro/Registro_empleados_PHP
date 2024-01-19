<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">

    <title>Login</title>
  </head>
  <body>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card border-dark mb-3">
					<div class="card-header text-white bg-primary">
						<h6>Login de Usuario</h6>
					</div>
					<div class="card-body">
						<div style="text-align:center">
							<img class="rounded-circle img-thumbnail" src="img/login.png" width="235" height="240">
						</div>
						<form id="form_login">
							  <div class="mb-3"> 
								    <label class="form-label">Correo</label>
								    <input type="text" id="correo" class="form-control form-control-sm" placeholder="Correo">
							  </div>
							  <div class="mb-3"> 
								    <label class="form-label">Password</label>
								    <input type="password" id="password" class="form-control form-control-sm" placeholder="Password">
							  </div>
							    <button type="submit" class="btn btn-primary btn-sm">Entrar</button>
							    <a href="registro.html" class="btn btn-danger btn-sm">Registrar</a>
						</form>
                    </div>
                </div>
            <div class="col-md-4"></div>
        </div>

    </div>



  <script src="librerias/jquery-3.5.1.min.js"></script>
  <script src="librerias/alertifyjs/alertify.js"></script>	
  <script src="librerias/bootstrap/js/bootstrap.js"></script>
  <script src="controlador/relogin.js"></script>
  </body>
</html>