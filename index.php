<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include ("Perfiles.php");

if(isset($_POST['TipoUser']))
{
  $tipoPerfil = $_POST['TipoUser'];
  
  $per= new Perfiles($tipoPerfil);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Sistema Electoral</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .body {
          <backgroud-color></backgroud-color>
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
<body style="background-color:#5499C7;">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<section>
<div class="container">
<br>
<br>
<br>
<br>
<br>
<br><br><br>
<div class="row justify-content-center">
	<aside class="offset-4 col-4">


<div class="card">
<article class="card-body">

<h4 class="card-title mb-4 mt-1">Sistema Electoral</h4>
	 <form action="#" method="post">
    <div class="form-group">
    	<label>Su Usuario</label>
        <input name="" class="form-control" placeholder="Ingrese Usuario" type="text" required>
    </div> <!-- form-group// -->

    <div class="form-group">
    	<a class="float-right" href="#">No Recuerda?</a>
    	<label>Su Contraseña</label>
        <input class="form-control" placeholder="******" type="password" required>
    </div> <!-- form-group// --> 

    <div class="form-group">
      <a class="float-right" href="#"></a>
      <label>Tipo de Usuario</label>
    	<select class="form-control" name="TipoUser" id="TipoUser" onChange="document.form.submit();" >
        <option value=""></option>
        <option value="CDatos">Carga de datos</option>
        <option value="Result">Resultados</option>
        <option value="Admin" >Administrador</option>
      </select>
    </div>

    <div class="form-group"> 
        <div class="checkbox">
            <label> <input type="checkbox"> Recordar Contraseña </label>
        </div> <!-- checkbox .// -->
    </div> <!-- form-group// -->  

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Login  </button>
    </div> <!-- form-group// -->                                 

</form>
</article>
</div> <!-- card.// -->

	</aside> <!-- col.// -->
	<aside class="col-sm-4">
    </section>
<br>
<br><br><br><br><br><br><br><br><br><br>

    <footer class="page-footer font-small blue pt-2"> <!--Informacion Institucional-->

	 <hr class="clearfix w-100 ">

	<div class="footer-copyright text-center py-1"><p style="color:	#FFFFFF";>Developed by Kamikaze Dev © 2019 Copyright - Todos los derechos reservados</p>
     	 <!--<a href="http://www.isft177.edu.ar/" target="_blank"> - Todos los derechos reservados</a>-->

    </div>

	</footer>
</body>
</html>