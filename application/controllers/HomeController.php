<?php

class HomeController extends Zend_Controller_Action
{
    private $_session = null;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->view->baseUrl = $this->_request->getBaseUrl();
      	$this->_session = new Application_Model_SesionUsuario();
      	$this->_session->iniciaSesion("my_session","session");
    }

    public function indexAction()
    {
        // action body
       $_session = $this->_session->getSesion("session");
       $this->view->usuario =  $_session->usuario;
        if($_session->usuario == '')
            $this->_redirect(index);
    }


}

