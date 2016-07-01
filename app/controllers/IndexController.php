<?php

/**
 * Display the default index page.
 */
class IndexController extends ControllerBase
{
    public function initialize()
    {
        $identity = $this->auth->getIdentity();
        if ($identity['profile']==='Administratores') {
            $this->view->setTemplateBefore('private');
        } else {
            $this->view->setVar('logged_in', is_array($identity));
            $this->view->setTemplateBefore('public');
        }
        $this->tag->setTitle('Bemvindo');
        parent::initialize();
    }
    
    public function indexAction()
    {
        if (!$this->request->isPost()) {
            $this->flash->notice('Esta aplicação está em desenvolvimento,
                agradecemos as suas sugestões.');
        }

        if($this->session->get('auth-identity')===NULL) {
            $this->flash->error('Faça o login para poder usufruir da nossa plataforma.');
        } else {
            $identity = $this->auth->getIdentity();

            if ($identity['profile']==='Administratores') {
                $this->dispatcher->forward(array(
                    'controller' => 'index',
                    'action' => 'indexAdmin'
                ));
            } else {
                $this->dispatcher->forward(array(
                    'controller' => 'index',
                    'action' => 'indexCli'
                ));
            }
        }
    }

    public function indexAdminAction()
    {
        //Página inicial login Admin

    }

    public function indexCliAction()
    {
        //Página inicial login cliente


    }
}
