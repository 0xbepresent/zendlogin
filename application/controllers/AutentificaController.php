<?php

class AutentificaController extends Zend_Controller_Action
{
    private $_session = null;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->view->baseUrl = $this->_request->getBaseUrl();
        $_session = new Zend_Session_Namespace("my_session");
        Zend_Registry::set("session", $_session);
    }

    public function indexAction()
    {
        // action body
    }

    public function loginDataAction()
    {
        // action body
        //Verificar que venga de una peticion AJAX
        if( $this->getRequest()->isXmlHttpRequest() ){
                $this->_helper->viewRenderer->setNoRender();
                //Recibir los valores
			    $usuario = $this->_request->getPost("usuario");
            	$clave = md5($this->_request->getPost("clave"));
            	//Consultar en la BD
            	$usuarios = new Application_Model_DbTable_Usuarios();
            	$autentifica = $usuarios->login($usuario, $clave);
            	if( $autentifica == 1){
            	    //Registrar la session
            		$_session = Zend_Registry::get('session');
            		$_session->usuario= $usuario;
            		echo 1;
            	}
            	else
            		echo $autentifica;
        }   
    }

    public function logoutDataAction()
    {
        // action body
        $_session = Zend_Registry::get('session');
        $_session->usuario = '';
        $this->_redirect('/index');
    }


}





