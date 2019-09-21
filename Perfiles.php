<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Perfiles{

    private $perfil;
  

      function __construct($perfiles){
        $this-> perfil = $perfiles;
        $this-> ValidarPerfil();
        
    }
    
/*
    public function set_Perfil($perfil){
        $this->perfil = $perfil;
    }
*/
    public function ValidarPerfil(){
        
        switch ($this->perfil) {
            case 'CDatos':
                            header ("Location:cargaDeDatos.php");
                            break;
            case 'Result':
                            header ("Location:cargaDeDatos.php");
                            break;
            case 'Admin':
                            header ("Location:cargaDeDatos.php");
                            break;
            
            default:
                            echo '<script language="javascript">alert("Debe seleccionar un perfil");</script>';
                break;
        }
    }
}

  

?>