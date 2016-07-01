<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class MarcasController extends ControllerBase
{

    public function initialize()
    {
        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Marcas');
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
     * Searches for marcas
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Marcas', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "marca";

        $marcas = Marcas::find($parameters);
        if (count($marcas) == 0) {
            $this->flash->notice("A pesquisa não devolveu nenhuma Marca");

            $this->dispatcher->forward(array(
                "controller" => "marcas",
                "action" => "new"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $marcas,
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
     * Edits a marca
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $marca = Marcas::findFirstByid($id);
            if (!$marca) {
                $this->flash->error("marca was not found");

                $this->dispatcher->forward(array(
                    'controller' => "marcas",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id = $marca->id;

            $this->tag->setDefault("id", $marca->getId());
            $this->tag->setDefault("marca", $marca->getMarca());
            
        }
    }

    /**
     * Creates a new marca
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "marcas",
                'action' => 'index'
            ));

            return;
        }

        $marca = new Marcas();
        $marca->setId($this->request->getPost("id"));
        $marca->setMarca($this->request->getPost("marca"));
        

        if (!$marca->save()) {
            foreach ($marca->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "marcas",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("marca was created successfully");

        $this->dispatcher->forward(array(
            'controller' => "marcas",
            'action' => 'index'
        ));
    }

    /**
     * Saves a marca edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "marcas",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $marca = Marcas::findFirstByid($id);

        if (!$marca) {
            $this->flash->error("marca does not exist " . $id);

            $this->dispatcher->forward(array(
                'controller' => "marcas",
                'action' => 'index'
            ));

            return;
        }

        $marca->setId($this->request->getPost("id"));
        $marca->setMarca($this->request->getPost("marca"));
        

        if (!$marca->save()) {

            foreach ($marca->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "marcas",
                'action' => 'edit',
                'params' => array($marca->id)
            ));

            return;
        }

        $this->flash->success("A Marca foi atualizada com sucesso");

        $this->dispatcher->forward(array(
            'controller' => "marcas",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a marca
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $marca = Marcas::findFirstByid($id);
        if (!$marca) {
            $this->flash->error("Essa marca não foi encontrada");

            $this->dispatcher->forward(array(
                'controller' => "marcas",
                'action' => 'index'
            ));

            return;
        }

        if (!$marca->delete()) {

            foreach ($marca->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "marcas",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("marca was deleted successfully");

        $this->dispatcher->forward(array(
            'controller' => "marcas",
            'action' => "index"
        ));
    }

}
