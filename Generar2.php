<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini_set('html_errors', 0);

$gen = new Generar();
$gen->generarEscuelas();
$gen->generarPersonas();
$gen->generarDistrito();
$gen->generarCircuito();
$gen->generarLocalidad();
$gen->generarMesa();
$gen->CloseFile();

class Generar
{
    private $myfile;
    private $linea;
    private $datos;
    private $found;
    private $miregistro;

    private function OpenFile()
    {
       $this -> myfile =  fopen("PILA.csv", "r") or die("No se puede abrir el archivo!");
    }

/*********************************************************************************************************************************************************************************** */
/**++++++++++++++++++++++++++++++++++++++++++INICIO Generacion de archivo ESCUELAS.DAT++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/*********************************************************************************************************************************************************************************** */
public function generarEscuelas()
{
    $this->OpenFile();

while(!feof($this->myfile)) {
   $this->linea = fgets($this->myfile); //fgets pasa una linea completa de un archivo (PILA.CSV)  a una variable.

    $this->datos=explode("|",$this->linea); //Explode devuelve palabra por palabra de lo guardado en$this->linea  delimitado por | .

    $escuela=$this->datos[13]; //Asigno el nombre de la escuela que esta en la posicion 13.
    $domescuela=$this->datos[14]; //Asigno el domicilio de la escuela que esta en la posicion 14.
    $localescuela=$this->datos[15]; //Asigno la localidad de la escuela que esta en la posicion 15.

    
    $school = fopen("DAT/ESCUELAS.DAT", "a+") or die("No se puede abrir el archivo!");

    $id_school=0;
    $this->found=0;

    if ( trim(file_get_contents('DAT/ESCUELAS.DAT')) == false) //Valido si el archivo esta vacio.
    {
        $id_school=1;
        $this->found=0;
     
    }
    else // Si no esta vacio
    {

        while(!feof($school)) // Y Mientras no sea fin de archivo
        {
           $this->linea2 = fgets($school); //fgets pasa una linea completa de un archivo (ESCUELAS.DAT) a una variable.
            $this->datos2=explode("|",$this->linea2); //Explode devuelve palabra por palabra de lo guardado en$this->linea2  delimitado por | .
            $id_school++;

            if (!empty($this->datos2[1])) //Valido que el nombre de la escuela no este vacia
            {
                if (strcmp($this->datos[13],$this->datos2[1])==0)//Comparo si el Nombre de la escuela existe en (ESCUELAS.DAT).
                {
                 $this->found=1;
                 break; // Si existe el registro finalizo la ejecucion.
                }
        	}
        }    
    }
    fclose($school); //Cierro ESCUELAS.DAT
    
    if ($this->found==0) //
    {
        $school = fopen("DAT/ESCUELAS.DAT", "a+") or die("No se puede abrir el archivo!");
        $this->miregistro=$id_school."|".$this->datos[13]."|".$this->datos[14]."|".$this->datos[15];

        fputs($school,$this->miregistro);
      
        fclose($school);
    }

    
    
}

//fclose($this->myfile);


echo "Archivo Escuelas OK";
echo"<br>";

}

/*********************************************************************************************************************************************************************************** */
/**++++++++++++++++++++++++++++++++++++++++++INICIO Generacion de archivo Personas.DAT++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/*********************************************************************************************************************************************************************************** */

public function generarPersonas()
{
   $this->OpenFile();

while(!feof($this->myfile)) {
   $this->linea = fgets($this->myfile); //fgets pasa una linea completa de un archivo (PILA.CSV)  a una variable.

    $this->datos=explode("|",$this->linea); //Explode devuelve palabra por palabra de lo guardado en$this->linea  delimitado por | .

    $apellido = $this->datos[4]; //Pos 1
    $nombre = $this->datos[5]; //Pos 2
    $dni = $this->datos[2]; //Pos 3
    $tipoDNI = $this->datos[1]; //Pos 4
    $clase = $this->datos[3]; //Pos 5
    $sexo = $this->datos[0]; //Pos 6

    
    $personas = fopen("DAT/PERSONAS.DAT", "a+") or die("No se puede abrir el archivo!");

    $id_persona=0;
    $this->found=0;

    if ( trim(file_get_contents('DAT/PERSONAS.DAT')) == false) //Valido si el archivo esta vacio.
    {
        $id_persona=1;
        $this->found=0;
        //echo filesize("PERSONAS.DAT");
    
    }
    else // Si no esta vacio
    {

        while(!feof($personas)) // Y Mientras no sea fin de archivo
        {
           $this->linea2 = fgets($personas); //fgets pasa una linea completa de un archivo (Personas.DAT) a una variable.
            $this->datos2=explode("|",$this->linea2); //Explode devuelve palabra por palabra de lo guardado en$this->linea2  delimitado por | .
            $id_persona++;
            
            if (!empty($this->datos2[3])) //Valido que el DNI no este vacia
            {
                if (strcmp($this->datos[2],$this->datos2[3])==0)//Comparo si el DNI Existe en (Personas.DAT).
                {
                 $this->found=1;
                 break; // Si existe el registro finalizo la ejecucion.
                }
        	}
        }    
    }
    fclose($personas); //Cierro Personas.DAT
    
    if ($this->found==0) //
    {
        $personas = fopen("DAT/PERSONAS.DAT", "a+") or die("No se puede abrir el archivo!");
        $this->miregistro=$id_persona."|".$this->datos[4]."|".$this->datos[5]."|".$this->datos[2]."|".$this->datos[1]."|".$this->datos[3]."|".$this->datos[0]."|".$this->datos[11]."|".$this->datos[12];

        fputs($personas,$this->miregistro.PHP_EOL); //PHP_EOL agrega un salto de linea
   
        fclose($personas);
    }

    
    
}


echo "Archivo Personas OK";
echo"<br>";

}


/*********************************************************************************************************************************************************************************** */
/**++++++++++++++++++++++++++++++++++++++++++INICIO Generacion de archivo Distrito.DAT++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/*********************************************************************************************************************************************************************************** */

public function generarDistrito()
{
    $this->OpenFile();

    while(!feof($this->myfile)) {
       $this->linea = fgets($this->myfile); //fgets pasa una linea completa de un archivo (PILA.CSV)  a una variable.
    
        $this->datos=explode("|",$this->linea); //Explode devuelve palabra por palabra de lo guardado en$this->linea  delimitado por | .
    
        $idDistrito=$this->datos[7]; //Asigno el nombre de la escuela que esta en la posicion 13.
        $descripcion=$this->datos[8];
    
        
        $distrito = fopen("DAT/DISTRITO.DAT", "a+") or die("No se puede abrir el archivo!");
    
        $id_distrito=0;
        $this->found=0;
    
        if ( trim(file_get_contents('DAT/DISTRITO.DAT')) == false) //Valido si el archivo esta vacio.
        {
            $id_distrito=1;
            $this->found=0;
            echo filesize("DAT/DISTRITO.DAT");
        
        }
        else // Si no esta vacio
        {
    
            while(!feof($distrito)) // Y Mientras no sea fin de archivo
            {
               $this->linea2 = fgets($distrito); //fgets pasa una linea completa de un archivo (ESCUELAS.DAT) a una variable.
                $this->datos2=explode("|",$this->linea2); //Explode devuelve palabra por palabra de lo guardado en$this->linea2  delimitado por | .
                $id_distrito++;
    
                if (!empty($this->datos2[1])) //Valido que el nombre de la escuela no este vacia
                {
                    if (strcmp($this->datos[7],$this->datos2[1])==0)//Comparo si el Nombre de la escuela existe en (ESCUELAS.DAT).
                    {
                     $this->found=1;
                     break; // Si existe el registro finalizo la ejecucion.
                    }
                }
            }    
        }
        fclose($distrito); //Cierro ESCUELAS.DAT
        
        if ($this->found==0) //
        {
            $distrito = fopen("DAT/DISTRITO.DAT", "a+") or die("No se puede abrir el archivo!");
            $this->miregistro=$id_distrito."|".$this->datos[7]."|".$this->datos[8];
    
            fputs($distrito,$this->miregistro);
    //       
            fclose($distrito);
        }
    
        
        
    }
    
    
    //CloseFile();
    
    echo "Archivo Distrito OK";
    echo"<br>";
}

/*********************************************************************************************************************************************************************************** */
/**++++++++++++++++++++++++++++++++++++++++++INICIO Generacion de archivo Circuito.DAT++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/*********************************************************************************************************************************************************************************** */

public function generarCircuito()
{
    $this->OpenFile();

    while(!feof($this->myfile)) {
       $this->linea = fgets($this->myfile); //fgets pasa una linea completa de un archivo (PILA.CSV)  a una variable.
    
        $this->datos=explode("|",$this->linea); //Explode devuelve palabra por palabra de lo guardado en$this->linea  delimitado por | .
    
        $idCircuito=$this->datos[9]; 
        $descripcion=$this->datos[10];
    
        
        $circuito = fopen("DAT/CIRCUITO.DAT", "a+") or die("No se puede abrir el archivo!");
    
        $id_circuito=0;
        $this->found=0;
    
        if ( trim(file_get_contents('DAT/CIRCUITO.DAT')) == false) //Valido si el archivo esta vacio.
        {
            $id_circuito=1;
            $this->found=0;
        }
        else // Si no esta vacio
        {
    
            while(!feof($circuito)) // Y Mientras no sea fin de archivo
            {
               $this->linea2 = fgets($circuito); //fgets pasa una linea completa de un archivo (ESCUELAS.DAT) a una variable.
                $this->datos2=explode("|",$this->linea2); //Explode devuelve palabra por palabra de lo guardado en$this->linea2  delimitado por | .
                $id_circuito++;
    
                if (!empty($this->datos2[1])) //Valido que el nombre de la escuela no este vacia
                {
                    if (strcmp($this->datos[9],$this->datos2[1])==0)//Comparo si el Nombre de la escuela existe en (ESCUELAS.DAT).
                    {
                     $this->found=1;
                     break; // Si existe el registro finalizo la ejecucion.
                    }
                }
            }    
        }
        fclose($circuito); //Cierro ESCUELAS.DAT
        
        if ($this->found==0) //
        {
            $circuito = fopen("DAT/CIRCUITO.DAT", "a+") or die("No se puede abrir el archivo!");
            $this->miregistro=$id_circuito."|".$this->datos[9]."|".$this->datos[10];
    
            fputs($circuito,$this->miregistro.PHP_EOL);
    //       
            fclose($circuito);
        }
    
        
        
    }
    
    
    //CloseFile();
    
    echo "Archivo Circuito OK";
    echo"<br>";
}

/*********************************************************************************************************************************************************************************** */
/**++++++++++++++++++++++++++++++++++++++++++INICIO Generacion de archivo Localidad.DAT++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/*********************************************************************************************************************************************************************************** */

public function generarLocalidad()
{
    $this->OpenFile();

    while(!feof($this->myfile)) {
       $this->linea = fgets($this->myfile); //fgets pasa una linea completa de un archivo (PILA.CSV)  a una variable.
    
        $this->datos=explode("|",$this->linea); //Explode devuelve palabra por palabra de lo guardado en$this->linea  delimitado por | .
    
        $descripcion=$this->datos[15];
    
        
        $localidad = fopen("DAT/LOCALIDAD.DAT", "a+") or die("No se puede abrir el archivo!");
    
        $id_localidad=0;
        $this->found=0;
    
        if ( trim(file_get_contents('DAT/LOCALIDAD.DAT')) == false) //Valido si el archivo esta vacio.
        {
            $id_localidad=1;
            $this->found=0;
        }
        else // Si no esta vacio
        {
    
            while(!feof($localidad)) // Y Mientras no sea fin de archivo
            {
               $this->linea2 = fgets($localidad); //fgets pasa una linea completa de un archivo (ESCUELAS.DAT) a una variable.
                $this->datos2=explode("|",$this->linea2); //Explode devuelve palabra por palabra de lo guardado en$this->linea2  delimitado por | .
                $id_localidad++;
    
                if (!empty($this->datos2[1])) //Valido que el nombre de la escuela no este vacia
                {
                    if (strcmp($this->datos[15],$this->datos2[1])==0)//Comparo si el Nombre de la escuela existe en (ESCUELAS.DAT).
                    {
                     $this->found=1;
                     break; // Si existe el registro finalizo la ejecucion.
                    }
                }
            }    
        }
        fclose($localidad); //Cierro ESCUELAS.DAT
        
        if ($this->found==0) //
        {
            $localidad = fopen("DAT/LOCALIDAD.DAT", "a+") or die("No se puede abrir el archivo!");
            $this->miregistro=$id_localidad."|".$this->datos[15];
    
            fputs($localidad,$this->miregistro);
    //       
            fclose($localidad);
        }
    
        
        
    }
    
    //CloseFile();
    
    
    echo "Archivo Localidad OK";
    echo"<br>";
}

/*********************************************************************************************************************************************************************************** */
/**++++++++++++++++++++++++++++++++++++++++++INICIO Generacion de archivo Mesa.DAT++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/*********************************************************************************************************************************************************************************** */

public function generarMesa()
{
    $this->OpenFile();

    while(!feof($this->myfile)) {
       $this->linea = fgets($this->myfile); //fgets pasa una linea completa de un archivo (PILA.CSV)  a una variable.
    
        $this->datos=explode("|",$this->linea); //Explode devuelve palabra por palabra de lo guardado en$this->linea  delimitado por | .
    
        $descripcion=$this->datos[11];
        //var_dump($descripcion);
        
        $mesa = fopen("DAT/MESA.DAT", "a+") or die("No se puede abrir el archivo!");
    
        $id_mesa=0;
        $this->found=0;
    
        if ( trim(file_get_contents('DAT/MESA.DAT')) == false) //Valido si el archivo esta vacio.
        {
            $id_mesa=1;
            $this->found=0;
        }
        else // Si no esta vacio
        {
    
            while(!feof($mesa)) // Y Mientras no sea fin de archivo
            {
               $this->linea2 = fgets($mesa); //fgets pasa una linea completa de un archivo (ESCUELAS.DAT) a una variable.
                $this->datos2=explode("|",$this->linea2); //Explode devuelve palabra por palabra de lo guardado en$this->linea2  delimitado por | .
                $id_mesa++;
    
                if (!empty($this->datos2[1])) //Valido que el nombre de la escuela no este vacia
                {
                    if (strcmp($this->datos[11],$this->datos2[1])==0)//Comparo si el Nombre de la escuela existe en (ESCUELAS.DAT).
                    {
                     $this->found=1;
                     break; // Si existe el registro finalizo la ejecucion.
                    }
                }
            }    
        }
        fclose($mesa); //Cierro ESCUELAS.DAT
        
        if ($this->found==0) //
        {
            
            $m='MESA ';
            $mesa = fopen("DAT/MESA.DAT", "a+") or die("No se puede abrir el archivo!");
            $this->miregistro=$id_mesa."|".$this->datos[11]."|".$m.$id_mesa;
            
    
            fputs($mesa,$this->miregistro.PHP_EOL);
    //       
            fclose($mesa);
        }
    
        
        
    }
    
    //CloseFile();
    
    
    echo "Archivo Mesa OK";
    echo"<br>";
}

public function CloseFile()
{
    fclose($this->myfile);
}

}




?>