<?php

class Application_Model_DbTable_Usuarios extends Zend_Db_Table_Abstract
{

    protected $_name = 'usuario';
    
    function login($usuario, $clave){
        $usuario = $this->fetchRow("usuario = '$usuario'");
        if($usuario){
            $clave = $this->fetchRow("clave = '$clave'");
            if($clave)
                return 1;
            else
                return "Clave incorrecta";    
        }else   
            return "Usuario no existe";
    }

}

