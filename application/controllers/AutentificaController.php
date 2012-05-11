<?php

class AutentificaController extends Zend_Controller_Action
{
    private $_session = null;
    private $_usuarios = null;    
    public function init()
    {
        /* Initialize action controller here */
        $this->view->baseUrl = $this->_request->getBaseUrl();
      	$this->_usuarios = new Application_Model_DbTable_Usuarios();
      	$this->_session = new Application_Model_SesionUsuario();
      	$this->_session->iniciaSesion("my_session","session");
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
            	$autentifica = $this->_usuarios->login($usuario, $clave);
            	if( $autentifica == 1){
            	    //Registrar la session
            		$_session = $this->_session->getSesion("session");
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
        $_session = $this->_session->getSesion("session");
        $_session->usuario = '';
        $this->_redirect('/index');
    }


}





