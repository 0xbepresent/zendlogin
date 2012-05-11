<?php

class IndexController extends Zend_Controller_Action
{
    private $_session = null;
    public function init()
    {
        /* Initialize action controller here */
        //Obtener la URL del proyecto
        $this->view->baseUrl = $this->_request->getBaseUrl();
      	$this->_session = new Application_Model_SesionUsuario();
      	$this->_session->iniciaSesion("my_session","session");
    }

    public function indexAction()
    {
        // action body
       //Verificar que ya existe una Session
        $_session = $this->_session->getSesion("session");
       if($_session->usuario != '')
            $this->_redirect(home);
    }


}

