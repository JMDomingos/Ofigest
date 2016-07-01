<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ClientesController extends ControllerBase
{
    public function initialize()
    {
        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Clientes');
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
     * Searches for clientes
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Clientes', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $clientes = Clientes::find($parameters);
        if (count($clientes) == 0) {
            $this->flash->notice("A pesquisa não devolveu nenhum Cliente");

            $this->dispatcher->forward(array(
                "controller" => "clientes",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $clientes,
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
     * Edits a cliente
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $cliente = Clientes::findFirstByid($id);
            if (!$cliente) {
                $this->flash->error("O Cliente não foi encontrado");

                $this->dispatcher->forward(array(
                    'controller' => "clientes",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id = $cliente->id;

            $this->tag->setDefault("id", $cliente->getId());
            $this->tag->setDefault("nome", $cliente->getNome());
            $this->tag->setDefault("morada", $cliente->getMorada());
            $this->tag->setDefault("telefone", $cliente->getTelefone());
            $this->tag->setDefault("telemovel", $cliente->getTelemovel());
            $this->tag->setDefault("email", $cliente->getEmail());
            $this->tag->setDefault("NIF", $cliente->getNif());
            
        }
    }

    /**
     * Creates a new cliente
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "clientes",
                'action' => 'index'
            ));

            return;
        }

        $cliente = new Clientes();
        $cliente->setNome($this->request->getPost("nome"));
        $cliente->setMorada($this->request->getPost("morada"));
        $cliente->setTelefone($this->request->getPost("telefone"));
        $cliente->setTelemovel($this->request->getPost("telemovel"));
        $cliente->setEmail($this->request->getPost("email", "email"));
        $cliente->setNif($this->request->getPost("NIF"));
        

        if (!$cliente->save()) {
            foreach ($cliente->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("O Cliente foi criado com sucesso");

        $this->dispatcher->forward(array(
            'controller' => "clientes",
            'action' => 'index'
        ));
    }

    /**
     * Saves a cliente edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "clientes",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $cliente = Clientes::findFirstByid($id);

        if (!$cliente) {
            $this->flash->error("Esse Cliente não existe " . $id);

            $this->dispatcher->forward(array(
                'controller' => "clientes",
                'action' => 'index'
            ));

            return;
        }

        $cliente->setNome($this->request->getPost("nome"));
        $cliente->setMorada($this->request->getPost("morada"));
        $cliente->setTelefone($this->request->getPost("telefone"));
        $cliente->setTelemovel($this->request->getPost("telemovel"));
        $cliente->setEmail($this->request->getPost("email", "email"));
        $cliente->setNif($this->request->getPost("NIF"));
        

        if (!$cliente->save()) {

            foreach ($cliente->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes",
                'action' => 'edit',
                'params' => array($cliente->id)
            ));

            return;
        }

        $this->flash->success("O Cliente foi atualizado com successo");

        $this->dispatcher->forward(array(
            'controller' => "clientes",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a cliente
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $cliente = Clientes::findFirstByid($id);
        if (!$cliente) {
            $this->flash->error("Esse Cliente não foi encontrado");

            $this->dispatcher->forward(array(
                'controller' => "clientes",
                'action' => 'index'
            ));

            return;
        }

        if (!$cliente->delete()) {

            foreach ($cliente->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("O Cliente foi eliminado com successo");

        $this->dispatcher->forward(array(
            'controller' => "clientes",
            'action' => "index"
        ));
    }
}
