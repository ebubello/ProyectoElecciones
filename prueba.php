<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//$valor=ValidarCantidadVotantes();
//echo $valor;

ValidarCantidadVotantes();

function ValidarCantidadVotantes()
{
    $longitudDeLinea = 1000;
    $delimitador = "|"; # Separador de columnas

 

    $handle = fopen("./DAT/PERSONAS.DAT", "r") or die("No se puede abrir el archivo!");
    $registros = 0;
    
    while (($fila = fgetcsv($handle, $longitudDeLinea, $delimitador)) !== false)
    {
        //var_dump($fila);
        if (in_array("1", $fila)) {
            //echo "El color verde está en el array";
            $registros += 1;
            //echo $registros;
            }
        
            
/*
        foreach ($fila as  $columna => $valor) 
        {
            
            if($fila[7]==1)
            {
                //$registros++; //El contador no me devulve 350, que es la cantidad de personas que votan en la mesa 1
       
                echo "En la columna $columna tenemos a $valor"."<br>";
            
            }

        }
*/
      
        echo "<br>";
    }

   
    fclose($handle);

    //return $registros;
   
    echo $registros;
}

?>