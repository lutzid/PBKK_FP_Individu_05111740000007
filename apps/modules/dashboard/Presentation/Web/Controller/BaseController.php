<?php

namespace MyModule\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
    public function beforeExecuteRoute()
    {
    	if(!$this->session->has('auth')){
    		return $this->response->redirect('login');
    	}
    }

    public function is_loggedin()
    {
    	if(!$this->session->has('auth'))
    		return False;
    	return True;
    }

    public function is_pemijat()
    {
    	if($this->session->has('auth') && $this->session->get('role') === 'Pemijat')
    		return True;
    	return False;
    }

    public function getSessionId()
    {
        return $this->session->get('auth')->id;
    }
}