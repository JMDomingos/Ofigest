<?php
//namespace Ofigest\Controllers;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class IntervencoesTiposController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Tipos de Intervenção');
        parent::initialize();
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for intervencoes_tipos
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'IntervencoesTipos', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "desc_tipo_intervencao";

        $intervencoes_tipos = IntervencoesTipos::find($parameters);
        if (count($intervencoes_tipos) == 0) {
            $this->flash->notice("The search did not find any intervencoes_tipos");

            $this->dispatcher->forward(array(
                "controller" => "intervencoes_tipos",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $intervencoes_tipos,
            'limit'=> 10,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a intervencoes_tipo
     *
     * @param string $id_tipo_intervencao
     */
    public function editAction($id_tipo_intervencao)
    {
        if (!$this->request->isPost()) {

            $intervencoes_tipo = IntervencoesTipos::findFirstByid_tipo_intervencao($id_tipo_intervencao);
            if (!$intervencoes_tipo) {
                $this->flash->error("intervencoes_tipo was not found");

                $this->dispatcher->forward(array(
                    'controller' => "intervencoes_tipos",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id_tipo_intervencao = $intervencoes_tipo->id_tipo_intervencao;

            $this->tag->setDefault("id", $intervencoes_tipo->getIdTipoIntervencao());
            $this->tag->setDefault("desc_tipo_intervencao", $intervencoes_tipo->getDescTipoIntervencao());
            
        }
    }

    /**
     * Creates a new intervencoes_tipo
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "intervencoes_tipos",
                'action' => 'index'
            ));

            return;
        }

        $intervencoes_tipo = new IntervencoesTipos();
        $intervencoes_tipo->setDescTipoIntervencao($this->request->getPost("desc_tipo_intervencao"));
        

        if (!$intervencoes_tipo->save()) {
            foreach ($intervencoes_tipo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "intervencoes_tipos",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("intervencoes_tipo was created successfully");

        $this->dispatcher->forward(array(
            'controller' => "intervencoes_tipos",
            'action' => 'index'
        ));
    }

    /**
     * Saves a intervencoes_tipo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "intervencoes_tipos",
                'action' => 'index'
            ));

            return;
        }

        $id_tipo_intervencao = $this->request->getPost("id");
        $intervencoes_tipo = IntervencoesTipos::findFirstByid_tipo_intervencao($id_tipo_intervencao);

        if (!$intervencoes_tipo) {
            $this->flash->error("intervencoes_tipo does not exist " . $id_tipo_intervencao);

            $this->dispatcher->forward(array(
                'controller' => "intervencoes_tipos",
                'action' => 'index'
            ));

            return;
        }

        $intervencoes_tipo->setDescTipoIntervencao($this->request->getPost("desc_tipo_intervencao"));
        

        if (!$intervencoes_tipo->save()) {

            foreach ($intervencoes_tipo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "intervencoes_tipos",
                'action' => 'edit',
                'params' => array($intervencoes_tipo->id_tipo_intervencao)
            ));

            return;
        }

        $this->flash->success("intervencoes_tipo was updated successfully");

        $this->dispatcher->forward(array(
            'controller' => "intervencoes_tipos",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a intervencoes_tipo
     *
     * @param string $id_tipo_intervencao
     */
    public function deleteAction($id_tipo_intervencao)
    {
        $intervencoes_tipo = IntervencoesTipos::findFirstByid_tipo_intervencao($id_tipo_intervencao);
        if (!$intervencoes_tipo) {
            $this->flash->error("intervencoes_tipo was not found");

            $this->dispatcher->forward(array(
                'controller' => "intervencoes_tipos",
                'action' => 'index'
            ));

            return;
        }

        if (!$intervencoes_tipo->delete()) {

            foreach ($intervencoes_tipo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "intervencoes_tipos",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("intervencoes_tipo was deleted successfully");

        $this->dispatcher->forward(array(
            'controller' => "intervencoes_tipos",
            'action' => "index"
        ));
    }

}
