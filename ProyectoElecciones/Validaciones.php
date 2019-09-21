<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Valido los datos recibidos del Formulario "cargaDeDatos.php"

if (isset($_POST['mesa']) && $_POST['CiudadanosVotaron'] && $_POST['SobresUtilizados'] && $_POST['diferencias'] 
       && $_POST['tv-c1'] && $_POST['tv-c2'] && $_POST['tv-c3'] && $_POST['tv-c4'] && $_POST['tv-c5']) 
{
    $idMesa=$_POST['mesa'];
    $CiudadanosVotaron=$_POST['CiudadanosVotaron'];
    $SobresUtilizados = $_POST['SobresUtilizados'];
    $diferencias = $_POST['diferencias'];
    $totalVotosCol1 = $_POST['tv-c1'];
    $totalVotosCol2 = $_POST['tv-c2'];
    $totalVotosCol3 = $_POST['tv-c3'];
    $totalVotosCol4 = $_POST['tv-c4'];
    $totalVotosCol5 = $_POST['tv-c5'];

    //Instancio un objeto de la clase Validacion.

    $val = new Validacion($idMesa, $CiudadanosVotaron, $SobresUtilizados, $diferencias, $totalVotosCol1, 
                          $totalVotosCol2, $totalVotosCol3, $totalVotosCol4, $totalVotosCol5 ); 
 
}


class Validacion
{
    // Atributos de la clase.

    private $idMesa;
    private $CiudadanosVotaron;
    private $SobresUtilizados;
    private $diferencias;
    private $handle;
    private $linea;
    private $datos;
    private $result;

    private $totalVotosCol1; 
    private $totalVotosCol2; 
    private $totalVotosCol3; 
    private $totalVotosCol4; 
    private $totalVotosCol5;


    //El constructor recibe los parametros y ejecuta automaticamente la validacion.

    function __construct( $idMesa, $CiudadanosVotaron, $SobresUtilizados, $diferencias, $totalVotosCol1, 
                          $totalVotosCol2, $totalVotosCol3, $totalVotosCol4, $totalVotosCol5) 
    {
        $this -> idMesa = $idMesa;
        $this ->CiudadanosVotaron = $CiudadanosVotaron;
        $this ->SobresUtilizados = $SobresUtilizados;
        $this ->diferencias = $diferencias;

        $this ->totalVotosCol1 =  $totalVotosCol1;  
        $this ->totalVotosCol2 =  $totalVotosCol2;  
        $this ->totalVotosCol3 =  $totalVotosCol3;  
        $this ->totalVotosCol4 =  $totalVotosCol4;  
        $this ->totalVotosCol5 =  $totalVotosCol5;

        $this ->CantidadVotantesPorMesa();
        $this ->VotosYSobres();
        $this ->Diferencias();
        $this ->TotalesPorColumnas();
        
    }
    
//Funcion para validar si la cantidad de votos ingresados es mayor al numero de personas de la mesa.

    function CantidadVotantesPorMesa() 
    {
        $this -> handle = fopen("./DAT/PERSONAS.DAT", "r") or die("No se puede abrir el archivo!");
        $registros = 0;

        while (!feof($this ->handle)) {
            $this ->linea = fgets($this ->handle); //fgets pasa una linea completa de un archivo (Personas.DAT) a una variable.
            $this ->datos=explode("|", $this ->linea);

            $mesa['mesa']=$this ->datos[7];

            if ($mesa['mesa']==$this->idMesa) {
                $registros++;
            }
        } // Fin While

        fclose($this ->handle); //Cierro Archivo

        if ($this->CiudadanosVotaron > $registros) {
            $this ->result ='<script language="javascript">alert("La cantidad de votos no puede superar a la cantidad de Votantes de la mesa seleccionada!!!");</script>';
        }

        echo $this ->result; //Esto no es recomendable, pero funciona.
    }

//Funcion para validar si la cantidad de votos es igual a la cantidad de sobres.

    function VotosYSobres()
    {
        if($this ->CiudadanosVotaron != $this ->SobresUtilizados)
        {
            $this ->result = '<script language="javascript">alert("La cantidad de votos debe ser igual a la cantidad de sobres utilizados!!!");</script>';
        }

        echo $this ->result;
    }

  
//Funcion para validar si la diferencia ingresada esta dentro de la toleracia configurada.

    function Diferencias()
    {
        $tolerancia = 1;
        $CalDiferencia = 0;

        //var_dump($this ->diferencias);
      
       if($this ->diferencias > -1)
        {
            $CalDiferencia = ($this ->diferencias * 100 ) / $this ->CiudadanosVotaron;
        }
        else {
            $this ->result = '<script language="javascript">alert("La diferencia ingresada debe ser mayor a CERO !!!");</script>';
        }

        if ($CalDiferencia > $tolerancia)
        {
            $this ->result = '<script language="javascript">alert("La diferencia no puede ser mayor al porcentaje configurado!!! Diferencia (%): '.$CalDiferencia.' Porcentaje Configurado (%): '.$tolerancia.'");</script>';
        }
    
        
        echo $this ->result;
    }


//Funcion para validar si los totales por columna corresponden con la de sobres utilizados.

    function TotalesPorColumnas()
    {
        $total = ( $this ->totalVotosCol1 + $this ->totalVotosCol2 + $this ->totalVotosCol3 + $this ->totalVotosCol4 + $this ->totalVotosCol5);

        if ($total > $this ->SobresUtilizados)
        {
            $this ->result = '<script language="javascript">alert("(*) Las suma de los totales por columna debera coincidir con la cantidad de sobre utilizados en la urna");</script>';
        }

        echo $this ->result;
    }

    
}


?>
