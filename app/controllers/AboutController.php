<?php
//namespace Ofigest\Controllers;

class AboutController extends ControllerBase
{
    public function initialize()
    {
        $identity = $this->auth->getIdentity();
        $this->view->setVar('logged_in', $identity);
        if ($identity['profile']==='Administratores') {
            $this->view->setTemplateBefore('private');
        } else {
            $this->view->setTemplateBefore('public');
        }
        $this->tag->setTitle('Acerca do OfiGest');
        parent::initialize();
    }

    public function indexAction()
    {
        
    }
}
