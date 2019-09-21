<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Select
{
    private $handle;
    private $linea;
    private $datos;
    private $result;
    
    public function selectDistrito()
    {
        $this->handle = fopen("./DAT/DISTRITO.DAT", "r") or die("No se puede abrir el archivo!");

    
        while (!feof($this->handle)) {
            $this->linea = fgets($this->handle); //fgets pasa una linea completa de un archivo (Personas.DAT) a una variable.
            $this->datos=explode("|", $this->linea);
            echo "<option>".$this->datos[2]."</option>" ;
        }
        fclose($this->handle);
    }

    public function selectCircuito()
    {
        $this->handle = fopen("./DAT/CIRCUITO.DAT", "r") or die("No se puede abrir el archivo!");

    
        while (!feof($this->handle)) {
            $this->linea = fgets($this->handle); //fgets pasa una linea completa de un archivo (Personas.DAT) a una variable.
            $this->datos=explode("|", $this->linea);
            echo "<option>".$this->datos[2]."</option>" ;
        }
        fclose($this->handle);
    }

    public function selectMesa()
    {
        $this->handle = fopen("./DAT/MESA.DAT", "r") or die("No se puede abrir el archivo!");

    
        while (!feof($this->handle)) {
            $this->linea = fgets($this->handle); //fgets pasa una linea completa de un archivo (Personas.DAT) a una variable.
            $this->datos=explode("|", $this->linea);
            echo '<option value="'.$this->datos[1].'">'.$this->datos[1].'</option>' ;
        }
        fclose($this->handle);
    }
}
