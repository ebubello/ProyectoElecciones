<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="form" name="form" method="post" action="#">
        <select name="test" id="test" onChange="document.form.submit();">
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
<input type="submit" name="btnAceptar" id="btnAceptar" value="Aceptar" />
</form>
</body>
</html>


<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['test']))
{
    $idMesa=$_POST['test'];
    

    $valor=CantidadVotantesPorMesa($idMesa);
    
    echo $valor."<br>";
    echo $idMesa;
}



function CantidadVotantesPorMesa($idMesa)
{
    $handle = fopen("./DAT/PERSONAS.DAT", "r") or die("No se puede abrir el archivo!");
    $registros = 0;
    
    while(!feof($handle))
    {
       
        $linea2 = fgets($handle); //fgets pasa una linea completa de un archivo (Personas.DAT) a una variable.
        $datos2=explode("|",$linea2);

        $mesa['mesa']=$datos2[7];

        //$idMesa=1;

        if ($mesa['mesa']==$idMesa)
            $registros++;

    
    }

    fclose($handle);

    return $registros;
    
}

?>