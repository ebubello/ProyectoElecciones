<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini_set('html_errors', 0);

$myfile = fopen("PILA.csv", "r") or die("No se puede abrir el archivo!");

while(!feof($myfile)) {
    $linea = fgets($myfile); //fgets pasa una linea completa de un archivo (PILA.CSV)  a una variable.

    $datos=explode("|", $linea); //Explode devuelve palabra por palabra de lo guardado en $linea  delimitado por | .

    $escuela=$datos[13]; //Asigno el nombre de la escuela que esta en la posicion 13.
    $domescuela=$datos[14]; //Asigno el domicilio de la escuela que esta en la posicion 14.
    $localescuela=$datos[15]; //Asigno la localidad de la escuela que esta en la posicion 15.

    
    $school = fopen("ESCUELAS.DAT", "r") or die("No se puede abrir el archivo!");

    $id_school=0;
    $found=0;

    if ( trim(file_get_contents('ESCUELAS.DAT')) == false) //Valido si el archivo esta vacio.
    {
        $id_school=1;
        $found=0;
        echo filesize("ESCUELAS.DAT");
    
    }
    else // Si no esta vacio
    {

        while(!feof($school)) // Y Mientras no sea fin de archivo
        {
            $linea2 = fgets($school); //fgets pasa una linea completa de un archivo (ESCUELAS.DAT) a una variable.
            $datos2=explode("|", $linea2); //Explode devuelve palabra por palabra de lo guardado en $linea2  delimitado por | .
            $id_school++;

            if (!empty($datos2[1])) //Valido que el nombre de la escuela no este vacia
            {
                if (strcmp($datos[13],$datos2[1])==0)//Comparo si el Nombre de la escuela existe en (ESCUELAS.DAT).
                {
                 $found=1;
                 break; // Si existe el registro finalizo la ejecucion.
                }
        	}
        }    
    }
    fclose($school); //Cierro ESCUELAS.DAT
    
    if ($found==0) //
    {
        $school = fopen("ESCUELAS.DAT", "a+") or die("No se puede abrir el archivo!");
        $miregistro=$id_school."|".$datos[13]."|".$datos[14]."|".$datos[15];

        fputs($school,$miregistro);
//       
        fclose($school);
    }

    
    
}
fclose($myfile);

/*
function limpiarCaracteresEspeciales($string ){
 $string = htmlentities($string);
 $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
 return $string;
} */

?>