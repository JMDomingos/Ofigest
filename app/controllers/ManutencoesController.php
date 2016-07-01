<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ManutencoesController extends ControllerBase
{
    public function initialize()
    {
        $this->view->clientes = Clientes::find(array(
            'columns'   => 'id,nome',
            //'conditions' => 'nome=mike',
            'order'     => 'nome'//,
            //'limit'   => 10
        ));

        $phql = "SELECT V.matricula, CONCAT(V.matricula, ' - ', Ma.marca, ' ', Mo.modelo) AS oModelo
                  FROM Veiculos as V, Modelos as Mo, Marcas as Ma WHERE V.modelo=Mo.id AND Mo.marca=Ma.id ";
        $this->view->veiculos = $this->modelsManager->executeQuery($phql);

        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Manutenções');
        parent::initialize();
    }
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        //$this->view->form = new ManutencoesForm();
    }

    /**
     * Searches for manutencoes
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Manutencoes', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "data desc";

        $manutencoes = Manutencoes::find($parameters);
        if (count($manutencoes) == 0) {
            $this->flash->notice("Não existe registo de manutenções para esse Cliente/Viatura");

            $this->dispatcher->forward(array(
                "controller" => "manutencoes",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $manutencoes,
            'limit'=> 5,
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
     * Displays the creation form
     */
    public function newFromAgendaAction($idMarcacao)
    {
        $manutencoes_agendada = ManutencoesAgendadas::findFirstByid($idMarcacao);

        if (!$manutencoes_agendada) {
            $this->flash->error("Essa Manutenção Agendada não foi encontrada");

            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'index'
            ));

            return;
        }

        //busca da Agenda

        //$this->view->idMarcacao = $idMarcacao;
        $this->view->id = $manutencoes_agendada->id;

        $this->tag->setDefault("id", $manutencoes_agendada->getId());
        /*
        $this->tag->setDefault("mensagem", $manutencoes_agendada->getMensagem());
        $this->tag->setDefault("orcamento", $manutencoes_agendada->getOrcamento());

        $this->tag->setDefault("status", $manutencoes_agendada->getStatus());
        */



        $this->tag->setDefault("data", $manutencoes_agendada->getData());
        $this->tag->setDefault("id_cliente", $manutencoes_agendada->getIdCliente());
        $this->tag->setDefault("id_veiculo", $manutencoes_agendada->getMatricula());
        //$this->tag->setDefault("inspecionado_ate", );
        //$this->tag->setDefault("kilometragem", );


    }

    /**
     * Edits a manutencoe
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $manutencoe = Manutencoes::findFirstByid($id);
            if (!$manutencoe) {
                $this->flash->error("Essa manutenção não foi encontrada");

                $this->dispatcher->forward(array(
                    'controller' => "manutencoes",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id = $manutencoe->id;

            $this->tag->setDefault("id", $manutencoe->getId());
            $this->tag->setDefault("data", $manutencoe->getData());
            $this->tag->setDefault("id_cliente", $manutencoe->getIdCliente());
            $this->tag->setDefault("id_veiculo", $manutencoe->getIdVeiculo());
            $this->tag->setDefault("inspecionado_ate", $manutencoe->getInspecionadoAte());
            $this->tag->setDefault("kilometragem", $manutencoe->getKilometragem());
            
        }
    }

    /**
     * Creates a new manutencoe
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'index'
            ));

            return;
        }

        $manutencoe = new Manutencoes();
        $manutencoe->setData($this->request->getPost("data"));
        $manutencoe->setIdCliente($this->request->getPost("id_cliente"));
        $manutencoe->setIdVeiculo($this->request->getPost("id_veiculo"));
        $manutencoe->setInspecionadoAte($this->request->getPost("inspecionado_ate"));
        $manutencoe->setKilometragem($this->request->getPost("kilometragem"));
        

        if (!$manutencoe->save()) {
            foreach ($manutencoe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("Novo registo de manutenção criado com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes",
            'action' => 'index'
        ));
    }

    /**
     * Saves a manutencoe edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $manutencoe = Manutencoes::findFirstByid($id);

        if (!$manutencoe) {
            $this->flash->error("Não existe registo de manutenção com o id " . $id);

            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'index'
            ));

            return;
        }

        $manutencoe->setData($this->request->getPost("data"));
        $manutencoe->setIdCliente($this->request->getPost("id_cliente"));
        $manutencoe->setIdVeiculo($this->request->getPost("id_veiculo"));
        $manutencoe->setInspecionadoAte($this->request->getPost("inspecionado_ate"));
        $manutencoe->setKilometragem($this->request->getPost("kilometragem"));
        

        if (!$manutencoe->save()) {

            foreach ($manutencoe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'edit',
                'params' => array($manutencoe->id)
            ));

            return;
        }

        $this->flash->success("Registo de manutenção editado com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a manutencoe
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $manutencoe = Manutencoes::findFirstByid($id);
        if (!$manutencoe) {
            $this->flash->error("manutencoe was not found");

            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'index'
            ));

            return;
        }

        if (!$manutencoe->delete()) {

            foreach ($manutencoe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("Registo de manutenção eliminado com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes",
            'action' => "index"
        ));
    }

}
