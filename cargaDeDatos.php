<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("Select.php");
include("Validaciones.php");

$se= new Select(); 


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./JS/funciones.js"></script> 
</head>

<body style="background-color:#5499C7;">
  <br><br>
  <section>
    <div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-8">
              <h2><b style="color:white;">Certificado de Escrutinio</b></h2>
            </div>
            <br>
            <br>
            <div class="col-sm-4" style="text-align:right;">
              <a href="index.php" class="btn btn-secondary add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
            </div>
          </div>
        </div>
        <hr>
        <div class="card card-body">
          <h6 style="color:grey;"> </h6>

          <form action="#" method="post" >
            <div class=" row">
              <div class="col-md-4">
                <select class="custom-select" name="Distrito" required>
                  <option>Distrito</option>
                  <?php
                                 $se->selectDistrito();
                                 ?>
                </select>
              </div>
              <div class="col-md-4">
                <select class="custom-select" name="ambiente" required>
                  <option>Circuito</option>
                  <?php
                                 $se->selectCircuito();
                                 ?>
                </select>
              </div>
              <div class="col-md-4">
                <select class="custom-select" name="mesa" id="mesa" onChange="document.form.submit();" required>
                  <option>Mesa</option>
                  <?php
                                 $se->selectMesa();
                                 ?>
                </select>
              </div>
            </div>
            <br>



            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Cantidad de Ciudadanos que votaron</th>
                  <th scope="col">Cantidad de sobres utilizados en la urna</th>
                  <th scope="col">Direferencia</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">
                 
                  <input  id="CiudadanosVotaron" name="CiudadanosVotaron" class="form-control"
                      placeholder="Ingrese Cantidad de Ciudadanos que votaron" type="text"
                      onChange="document.form.submit();" required></th>
             

                  <td><input id="SobresUtilizados" name="SobresUtilizados" class="form-control"
                      placeholder="Ingrese Cantidad de sobres utilizados en la urna" type="text" 
                      onChange="document.form.submit();" required></td>

                  <td><input id="diferencias" name="diferencias" class="form-control" 
                      placeholder="Ingrese Direferencia" type="text" 
                      onChange="document.form.submit();" required></td>

                </tr>
                <br>
                <table class="table">
                  <thead>
                    <br>
                    <tr class="table-active">
                      <th scope="col">N°</th>
                      <th scope="col">Agrupaciones Politicas</th>
                      <th scope="col">Listas</th>
                      <th scope="col">Presidente <br>
                      <hr>
                        Total de votos</th>
                      <th scope="col">Diputados Nac.<br>
                      <hr>
                        Total de votos</th>
                      <th scope="col">Gobernadores<br>
                      <hr>
                        Total de votos</th>
                        <th scope="col">Diputados Prov.<br>
                      <hr>
                        Total de votos</th>
                        <th scope="col">Intendentes<br>
                      <hr>
                        Total de votos</th>
                    </tr>
                    
                  </thead>
                  <tbody>
                    <tr  >
                      <th scope="row">1</th>
                      <td>Alianza Consenso Federal</td>
                      <td>Hay Consenso</td>
                      <td><input name="f1c1" id="f1c1" class="form-control" placeholder="Ingrese Cantidad " type="text" onchange="SumarAutomatico(this.value);"></td>
                      <td><input name="f1c2" id="f1c2" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();" ></td>
                      <td><input name="f1c3" id="f1c3" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f1c4" id="f1c4" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f1c5" id="f1c5" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Alianza Juntos por el cambio</td>
                      <td>1 A</td>
                      <td><input name="f2c1" id="f2c1" class="form-control" placeholder="Ingrese Cantidad " type="text" onchange="SumarAutomatico(this.value);"></td>
                      <td><input name="f2c2" id="f2c2" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f2c3" id="f2c3" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f2c4" id="f2c4" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f2c5" id="f2c5" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Alianza frente de todos</td>
                      <td>Celeste y Blanca 2</td>
                      <td><input name="f3c1" id="f3c1" class="form-control" placeholder="Ingrese Cantidad " type="text" onchange="SumarAutomatico(this.value);"></td>
                      <td><input name="f3c2" id="f3c2" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f3c3" id="f3c3" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f3c4" id="f3c4" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="f3c5" id="f3c5" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                    </tr>
                    <tr class="table-dark">
                      
                      <th scope="row">#</th>
                      <td style="color:grey;"><b> Votos en blanco</b></td>
                      <td></td>
                      <td><input name="vb-c1" id="vb-c1" class="form-control" placeholder="Ingrese Cantidad " type="text" onchange="SumarAutomatico(this.value);"></td>
                      <td><input name="vb-c2" id="vb-c2" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vb-c3" id="vb-c3" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vb-c4" id="vb-c4" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vb-c5" id="vb-c5" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                    </tr>
                    <tr class="table-dark">
                      <th scope="row">#</th>
                      <td style="color:grey;"><b> Votos nulos</b></td>
                      <td></td>
                      <td><input name="vn-c1" name="vn-c1" class="form-control" placeholder="Ingrese Cantidad " type="text" onchange="SumarAutomatico(this.value);"></td>
                      <td><input name="vn-c2" name="vn-c2" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vn-c3" name="vn-c3" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vn-c4" name="vn-c4" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vn-c5" name="vn-c5" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                    </tr>
                    <tr class="table-dark">
                      <th scope="row">#</th>
                      <td style="color:grey;"><b> Votos recurridos</b></td>
                      <td></td>
                      <td><input name="vr-c1" id="vr-c1" class="form-control" placeholder="Ingrese Cantidad " type="text" onchange="SumarAutomatico(this.value);"></td>
                      <td><input name="vr-c2" id="vr-c2" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vr-c3" id="vr-c3" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vr-c4" id="vr-c4" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vr-c5" id="vr-c5" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                    </tr>
                    <tr class="table-dark">
                      <th scope="row">#</th>
                      <td style="color:grey;"><b> Votos de identidad impugnada</b></td>
                      <td></td>
                      <td><input name="vii-c1" id="vii-c1" class="form-control" placeholder="Ingrese Cantidad " type="text" onchange="SumarAutomatico(this.value);"></td>
                      <td><input name="vii-c2" id="vii-c2" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vii-c3" id="vii-c3" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vii-c4" id="vii-c4" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                      <td><input name="vii-c5" id="vii-c5" class="form-control" placeholder="Ingrese Cantidad " type="text" onChange="document.form.submit();"></td>
                    </tr>
                    <tr class="table-dark">
                      <th scope="row">#</th>
                      <td style="color:grey;"><b> Total de votos por columna</b></td>
                      <td></td>
                      <td><input name="tv-c1" id="tv-c1" class="form-control" placeholder="Ingrese Cantidad " type="text" value="" ></td>
                      <td><input name="tv-c2" id="tv-c2" class="form-control" placeholder="Ingrese Cantidad " type="text" value="" ></td>
                      <td><input name="tv-c3" id="tv-c3" class="form-control" placeholder="Ingrese Cantidad " type="text" value="" ></td>
                      <td><input name="tv-c4" id="tv-c4" class="form-control" placeholder="Ingrese Cantidad " type="text" value="" ></td>
                      <td><input name="tv-c5" id="tv-c5" class="form-control" placeholder="Ingrese Cantidad " type="text" value="" ></td>
                    </tr>
                  </tbody>
                </table>

              </tbody>
            </table>
            <hr>
            
           
            <cite>(*) Las suma de los totales por columna debera coincidir con la cantidad de sobre utilizados en la urna.</cite> 
                  <div>
                    <br>
                    
                    <button style="margin-left:20px" type="submit" class="btn btn-success btn-lg">Cargar</button>
                  </div>
                  </div>
          </form>
        </div>
      </div>

  </section>
  <br>

  <footer class="page-footer font-small blue pt-2">
    <!--Informacion Institucional-->

    <hr class="clearfix w-100 ">

    <div class="footer-copyright text-center py-1">
      <p style="color:	#FFFFFF" ;>Developed by Kamikaze Dev © 2019 Copyright - Todos los derechos reservados</p>
      <!--<a href="http://www.isft177.edu.ar/" target="_blank"> - Todos los derechos reservados</a>-->

    </div>

  </footer>

</body>

</html>