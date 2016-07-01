<?php
//namespace Ofigest\Controllers;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ClientesVeiculosController extends ControllerBase
{
    public function initialize()
    {
        $this->view->clientes = Clientes::find(array(
            'columns'   => 'id,nome',
            'order'     => 'nome'
        ));

        $phql = "SELECT V.matricula, CONCAT(V.matricula, ' - ', Ma.marca, ' ', Mo.modelo) AS oModelo
                  FROM Veiculos as V, Modelos as Mo, Marcas as Ma WHERE V.modelo=Mo.id AND Mo.marca=Ma.id ";
        $this->view->veiculos = $this->modelsManager->executeQuery($phql);

        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Associar Viaturas a Clientes');
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
     * Searches for clientes_veiculos
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'ClientesVeiculos', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id_cliente";

        $clientes_veiculos = ClientesVeiculos::find($parameters);
        if (count($clientes_veiculos) == 0) {
            $this->flash->notice("Esta Pesquisa não devolveu nenhuma associação Cliente/Veiculo");

            $this->dispatcher->forward(array(
                "controller" => "clientes_veiculos",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $clientes_veiculos,
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
     * Edits a clientes_veiculo
     *
     * @param string $id_cliente
     */
    public function editAction($id_cliente)
    {
        if (!$this->request->isPost()) {

            $clientes_veiculo = ClientesVeiculos::findFirstByid_cliente($id_cliente);
            if (!$clientes_veiculo) {
                $this->flash->error("Esse Cliente/Veiculo não foi encontrado");

                $this->dispatcher->forward(array(
                    'controller' => "clientes_veiculos",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id_cliente = $clientes_veiculo->id_cliente;

            $this->tag->setDefault("id_cliente", $clientes_veiculo->getIdCliente());
            $this->tag->setDefault("id_veiculo", $clientes_veiculo->getIdVeiculo());
            $this->tag->setDefault("data", $clientes_veiculo->getData());
            
        }
    }

    /**
     * Creates a new clientes_veiculo
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "clientes_veiculos",
                'action' => 'index'
            ));

            return;
        }

        $clientes_veiculo = new ClientesVeiculos();
        $clientes_veiculo->setIdCliente($this->request->getPost("id_cliente"));
        $clientes_veiculo->setIdVeiculo($this->request->getPost("id_veiculo"));
        $clientes_veiculo->setData($this->request->getPost("data"));
        

        if (!$clientes_veiculo->save()) {
            foreach ($clientes_veiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes_veiculos",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("O Cliente/Veiculo foi criado com successo");

        $this->dispatcher->forward(array(
            'controller' => "clientes_veiculos",
            'action' => 'index'
        ));
    }

    /**
     * Saves a clientes_veiculo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "clientes_veiculos",
                'action' => 'index'
            ));

            return;
        }

        $id_cliente = $this->request->getPost("id_cliente");
        $clientes_veiculo = ClientesVeiculos::findFirstByid_cliente($id_cliente);

        if (!$clientes_veiculo) {
            $this->flash->error("Esse Cliente/Veiculo não foi existe " . $id_cliente);

            $this->dispatcher->forward(array(
                'controller' => "clientes_veiculos",
                'action' => 'index'
            ));

            return;
        }

        $clientes_veiculo->setIdCliente($this->request->getPost("id_cliente"));
        $clientes_veiculo->setIdVeiculo($this->request->getPost("id_veiculo"));
        $clientes_veiculo->setData($this->request->getPost("data"));
        

        if (!$clientes_veiculo->save()) {

            foreach ($clientes_veiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes_veiculos",
                'action' => 'edit',
                'params' => array($clientes_veiculo->id_cliente)
            ));

            return;
        }

        $this->flash->success("O Cliente/Veiculo foi atualizado com successo");

        $this->dispatcher->forward(array(
            'controller' => "clientes_veiculos",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a clientes_veiculo
     *
     * @param string $id_cliente
     */
    public function deleteAction($id_cliente)
    {
        $clientes_veiculo = ClientesVeiculos::findFirstByid_cliente($id_cliente);
        if (!$clientes_veiculo) {
            $this->flash->error("Esse Cliente/Veiculo não foi encontrado");

            $this->dispatcher->forward(array(
                'controller' => "clientes_veiculos",
                'action' => 'index'
            ));

            return;
        }

        if (!$clientes_veiculo->delete()) {

            foreach ($clientes_veiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "clientes_veiculos",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("A associação Cliente/Veiculo foi eliminada com successo");

        $this->dispatcher->forward(array(
            'controller' => "clientes_veiculos",
            'action' => "index"
        ));
    }

}
