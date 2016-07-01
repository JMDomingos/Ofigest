<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 15-04-2016
 * Time: 12:07
 */

class AgendaController extends ControllerBase
{
    public function initialize()
    {

        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Agenda');
        parent::initialize();
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->assets->addCss('css/calendario.css');

        $phql = "SELECT * FROM ManutencoesAgendadas WHERE (status='reservaWeb' OR status='reservaAdm' OR status='confirmado') ORDER BY data, hora";
        $marcacoes = $this->modelsManager->executeQuery($phql)->toArray();

        $calendar = new Calendario();
        echo $calendar->show($marcacoes);
        //$this->persistent->parameters = null;
    }

}