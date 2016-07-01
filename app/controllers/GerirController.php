<?php
//namespace Ofigest\Controllers;

//use Phalcon\Flash;
//use Phalcon\Session;

class GerirController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Gestão de Tabelas');
        parent::initialize();
    }

    public function indexAction()
    {
        
    }
}
