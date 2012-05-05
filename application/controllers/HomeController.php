<?php

class HomeController extends Zend_Controller_Action
{
    private $_session = null;
    
    public function init()
    {
        /* Initialize action controller here */
        $this->view->baseUrl = $this->_request->getBaseUrl();
        $_session = new Zend_Session_Namespace("my_session");
        Zend_Registry::set('session', $_session);
    }

    public function indexAction()
    {
        // action body
       $_session = Zend_Registry::get('session');
       $this->view->usuario =  $_session->usuario;
        if($_session->usuario == '')
            $this->_redirect(index);
    }


}

