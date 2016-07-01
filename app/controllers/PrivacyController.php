<?php
//namespace Ofigest\Controllers;

/**
 * Display the privacy page.
 */
class PrivacyController extends ControllerBase
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
        $this->tag->setTitle('Declaração de Privacidade');
        parent::initialize();
    }

    /**
     * Default action. Set the public layout (layouts/public.volt)
     */
    public function indexAction()
    {
        //$this->view->setTemplateBefore('public');
    }
}
