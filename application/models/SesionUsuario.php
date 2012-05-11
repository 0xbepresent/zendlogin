<?php

class Application_Model_SesionUsuario
{
    function iniciaSesion($nombre_global, $nombre_sesion){
        $_session = new Zend_Session_Namespace($nombre_global);
        Zend_Registry::set($nombre_sesion, $_session);
    }
    function getSesion($nombre_sesion){
   		$_session = Zend_Registry::get($nombre_sesion);
   		return $_session;
    }
}

