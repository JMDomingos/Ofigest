<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ClientesMoradasCliController extends ControllerBase
{
    public function initialize()
    {
        $ident = $this->auth->getIdentity();

        $cliente = Clientes::find('user_id='.$ident['id'])->toArray();

        $this->persistent->idCliente = $cliente[0]['id'];

        $this->view->setVar('logged_in', is_array($ident));
        $this->view->setTemplateBefore('public');
        $this->tag->setTitle('Associar Moradas a Clientes');
        parent::initialize();
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;

        $this->dispatcher->forward(array(
            "controller" => "clientes_moradas_cli",
            "action" => "search"
        ));
    }

    /**
     * Searches for clientes_moradas
     */
    public function searchAction()
    {

        $numberPage = 1;

        if (!$this->request->isPost()) {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters["conditions"] = "id_cliente=" . $this->persistent->idCliente;
        $parameters["order"] = "id";

        $clientes_moradas = ClientesMoradas::find($parameters);
        if (count($clientes_moradas) == 0) {
            $this->flash->notice("Voçê ainda não introduziu nenhuma Morada");

            $this->dispatcher->forward(array(
                "controller" => "clientes_moradas_cli",
                "action" => "new"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $clientes_moradas,
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
        $this->tag->setDefault("id_cliente", $this->persistent->idCliente);
    }

    /**
     * Edits a clientes_morada
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $clientes_morada = ClientesMoradas::findFirstByid($id);
            if (!$clientes_morada) {
                $this->flash->error("Essa Morada não foi encontrada");

                $this->dispatcher->forward(array(
                    'controller' => "clientes_moradas_cli",
                    'action' => 'search'
                ));

                return;
            }

            if($clientes_morada->id_cliente != $this->persistent->idCliente) {
                $this->flash->error("Essa Morada não pertence a esta conta ");

                $this->dispatcher->forward(array(
                    'controller' => "clientes_moradas_cli",
                    'action' => 'search'
                ));

                return;
            }


            $this->view->id = $clientes_morada->id;

            $this->tag->setDefault("id", $clientes_morada->getId());
            $this->tag->setDefault("id_cliente", $clientes_morada->getIdCliente());
            $this->tag->setDefault("morada_rua", $clientes_morada->getMoradaRua());
            $this->tag->setDefault("morada_cp_localidade", $clientes_morada->getMoradaCpLocalidade());
            
        }
    }

    /**
     * Creates a new clientes_morada
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "clientes_moradas_cli",
                'action' => 'search'
            ));

            return;
        }

        $clientes_morada = new ClientesMoradas();
        $clientes_morada->setIdCliente($this->request->getPost("id_cliente"));
        $clientes_morada->setMoradaRua($this->request->getPost("morada_rua"));
        $clientes_morada->setMoradaCpLocalidade($this->request->getPost("morada_cp_localidade"));
        

        if (!$clientes_morada->save()) {
            foreach ($clientes_morada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes_moradas_cli",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("A Morada foi criada com sucesso");

        $this->dispatcher->forward(array(
            'controller' => "clientes_moradas_cli",
            'action' => 'search'
        ));
    }

    /**
     * Saves a clientes_morada edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "clientes_moradas_cli",
                'action' => 'search'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $clientes_morada = ClientesMoradas::findFirstByid($id);

        if (!$clientes_morada) {
            $this->flash->error("A Morada com o id " . $id . " não existe ");

            $this->dispatcher->forward(array(
                'controller' => "clientes_moradas_cli",
                'action' => 'search'
            ));

            return;
        }

        $clientes_morada->setIdCliente($this->request->getPost("id_cliente"));
        $clientes_morada->setMoradaRua($this->request->getPost("morada_rua"));
        $clientes_morada->setMoradaCpLocalidade($this->request->getPost("morada_cp_localidade"));

        if (!$clientes_morada->save()) {

            foreach ($clientes_morada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes_moradas_cli",
                'action' => 'edit',
                'params' => array($clientes_morada->id)
            ));

            return;
        }

        $this->flash->success("A Morada foi atualizada com sucesso");

        $this->dispatcher->forward(array(
            'controller' => "clientes_moradas_cli",
            'action' => 'search'
        ));
    }

    /**
     * Deletes a clientes_morada
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $clientes_morada = ClientesMoradas::findFirstByid($id);
        if (!$clientes_morada) {
            $this->flash->error("Essa Morada não foi encontrada");

            $this->dispatcher->forward(array(
                'controller' => "clientes_moradas_cli",
                'action' => 'search'
            ));

            return;
        }

        if (!$clientes_morada->delete()) {

            foreach ($clientes_morada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes_moradas_cli",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("A Morada foi eliminada com sucesso");

        $this->dispatcher->forward(array(
            'controller' => "clientes_moradas_cli",
            'action' => "search"
        ));
    }

}
