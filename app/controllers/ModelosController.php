<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ModelosController extends ControllerBase
{
    public function initialize()
    {
        $this->view->marcas = Marcas::find(array(
            'columns'   => 'id,marca',
            //'conditions' => 'nome="mike',
            'order'     => 'marca'//,
            //'limit'   => 10
        ));

        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Modelos');
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
     * Searches for modelos
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Modelos', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "marca, modelo";

        $modelos = Modelos::find($parameters);
        if (count($modelos) == 0) {
            $this->flash->notice("A pesquisa não devolveu nenhum modelo");

            $this->dispatcher->forward(array(
                "controller" => "modelos",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $modelos,
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
     * Edits a modelo
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $modelo = Modelos::findFirstByid($id);
            if (!$modelo) {
                $this->flash->error("Esse Modelo não foi encontrado");

                $this->dispatcher->forward(array(
                    'controller' => "modelos",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id = $modelo->id;

            $this->tag->setDefault("id", $modelo->getId());
            $this->tag->setDefault("modelo", $modelo->getModelo());
            $this->tag->setDefault("marca", $modelo->getMarca());
            
        }
    }

    /**
     * Creates a new modelo
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "modelos",
                'action' => 'index'
            ));

            return;
        }

        $modelo = new Modelos();
        $modelo->setId($this->request->getPost("id"));
        $modelo->setModelo($this->request->getPost("modelo"));
        $modelo->setMarca($this->request->getPost("marca"));
        

        if (!$modelo->save()) {
            foreach ($modelo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "modelos",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("modelo was created successfully");

        $this->dispatcher->forward(array(
            'controller' => "modelos",
            'action' => 'index'
        ));
    }

    /**
     * Saves a modelo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "modelos",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $modelo = Modelos::findFirstByid($id);

        if (!$modelo) {
            $this->flash->error("Esse Modelo não existe " . $id);

            $this->dispatcher->forward(array(
                'controller' => "modelos",
                'action' => 'index'
            ));

            return;
        }

        $modelo->setId($this->request->getPost("id"));
        $modelo->setModelo($this->request->getPost("modelo"));
        $modelo->setMarca($this->request->getPost("marca"));
        

        if (!$modelo->save()) {

            foreach ($modelo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "modelos",
                'action' => 'edit',
                'params' => array($modelo->id)
            ));

            return;
        }

        $this->flash->success("modelo was updated successfully");

        $this->dispatcher->forward(array(
            'controller' => "modelos",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a modelo
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $modelo = Modelos::findFirstByid($id);
        if (!$modelo) {
            $this->flash->error("modelo was not found");

            $this->dispatcher->forward(array(
                'controller' => "modelos",
                'action' => 'index'
            ));

            return;
        }

        if (!$modelo->delete()) {

            foreach ($modelo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "modelos",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("modelo was deleted successfully");

        $this->dispatcher->forward(array(
            'controller' => "modelos",
            'action' => "index"
        ));
    }

}
