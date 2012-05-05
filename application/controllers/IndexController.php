<?php

class IndexController extends Zend_Controller_Action
{
    private $_session = null;
    public function init()
    {
        /* Initialize action controller here */
        //Obtener la URL del proyecto
        $this->view->baseUrl = $this->_request->getBaseUrl();
        $_session = new Zend_Session_Namespace("my_session");
		Zend_Registry::set('session', $_session);
    }

    public function indexAction()
    {
        // action body
       //Verificar que ya existe una Session
       $_session = Zend_Registry::get('session');
       if($_session->usuario != '')
            $this->_redirect(home);
    }


}

