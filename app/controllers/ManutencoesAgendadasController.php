<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ManutencoesAgendadasController extends ControllerBase
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

        for($x=9;$x<=17;$x++) {
            if($x==13) continue;

            if (strlen($x)==1) {
                $theHour = '0'.$x;
            } else {
                $theHour = $x;
            }

            $horas[$x.':00:00'] = $x . ':00';
            if($x!=12) {
                $horas[$x.':30:00'] = $x . ':30';
            }
        }

        $this->view->horas = $horas;
        $this->view->Select10 = array('0'=>'Não', '1'=>'Sim');
        $this->view->SelectSN = array('N'=>'Não', 'S'=>'Sim');
        $this->view->SelectStatus = array(
            'reservaWeb'    =>'Reserva Web',
            'reservaAdm'    =>'Reserva Admin',
            'confirmado'    =>'Confirmado',
            'transferido'   =>'Transferido',
            'cancelado'     =>'Cancelado'
        );

        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Manutenções Agendadas');
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
     * Searches for manutencoes_agendadas
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'ManutencoesAgendadas', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $manutencoes_agendadas = ManutencoesAgendadas::find($parameters);
        if (count($manutencoes_agendadas) == 0) {
            $this->flash->notice("Essa Pesquisa não devolveu Manutenções Agendadas");

            $this->dispatcher->forward(array(
                "controller" => "manutencoes_agendadas",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $manutencoes_agendadas,
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
     * Edits a manutencoes_agendada
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $manutencoes_agendada = ManutencoesAgendadas::findFirstByid($id);
            if (!$manutencoes_agendada) {
                $this->flash->error("Essa Manutenção Agendada não foi encontrada");

                $this->dispatcher->forward(array(
                    'controller' => "manutencoes_agendadas",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id = $manutencoes_agendada->id;
            $this->view->id_cliente = $manutencoes_agendada->id_cliente;

            $this->tag->setDefault("id", $manutencoes_agendada->getId());
            $this->tag->setDefault("id_cliente", $manutencoes_agendada->getIdCliente());
            $this->tag->setDefault("matricula", $manutencoes_agendada->getMatricula());
            $this->tag->setDefault("data", $manutencoes_agendada->getData());
            $this->tag->setDefault("hora", $manutencoes_agendada->getHora());
            $this->tag->setDefault("mensagem", $manutencoes_agendada->getMensagem());
            $this->tag->setDefault("aguarda_orcamento", $manutencoes_agendada->getAguardaOrcamento());
            $this->tag->setDefault("orcamento", $manutencoes_agendada->getOrcamento());
            $this->tag->setDefault("doneByCliLogin", $manutencoes_agendada->getDonebyclilogin());
            $this->tag->setDefault("caraterUrgencia", $manutencoes_agendada->getCaraterurgencia());
            $this->tag->setDefault("confirmed", $manutencoes_agendada->getConfirmed());
            $this->tag->setDefault("status", $manutencoes_agendada->getStatus());

            $this->view->idDaMorada = $manutencoes_agendada->getIdMorada();

            //var_dump(ClientesMoradas::findFirstByid($manutencoes_agendada->getIdMorada()));

            $this->view->morada = ClientesMoradas::findFirstByid($manutencoes_agendada->getIdMorada());
        }
    }

    /**
     * Creates a new manutencoes_agendada
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'index'
            ));

            return;
        }

        $manutencoes_agendada = new ManutencoesAgendadas();
        $manutencoes_agendada->setIdCliente($this->request->getPost("id_cliente"));
        $manutencoes_agendada->setMatricula($this->request->getPost("matricula"));
        $manutencoes_agendada->setData($this->request->getPost("data"));
        $manutencoes_agendada->setHora($this->request->getPost("hora"));
        $manutencoes_agendada->setMensagem($this->request->getPost("mensagem"));
        $manutencoes_agendada->setAguardaOrcamento($this->request->getPost("aguarda_orcamento"));
        $manutencoes_agendada->setOrcamento($this->request->getPost("orcamento"));
        $manutencoes_agendada->setDonebyclilogin($this->request->getPost("doneByCliLogin"));
        $manutencoes_agendada->setCaraterurgencia($this->request->getPost("caraterUrgencia"));
        $manutencoes_agendada->setConfirmed($this->request->getPost("confirmed"));
        $manutencoes_agendada->setStatus($this->request->getPost("status"));
        

        if (!$manutencoes_agendada->save()) {
            foreach ($manutencoes_agendada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("A nova Manutenção Agendada foi criada com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes_agendadas",
            'action' => 'index'
        ));
    }

    /**
     * Saves a manutencoes_agendada edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $manutencoes_agendada = ManutencoesAgendadas::findFirstByid($id);

        if (!$manutencoes_agendada) {
            $this->flash->error("Essa Manutenção Agendada não existe " . $id);

            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'index'
            ));

            return;
        }

        $manutencoes_agendada->setIdCliente($this->request->getPost("id_cliente"));
        $manutencoes_agendada->setMatricula($this->request->getPost("matricula"));
        $manutencoes_agendada->setData($this->request->getPost("data"));
        $manutencoes_agendada->setHora($this->request->getPost("hora"));
        $manutencoes_agendada->setMensagem($this->request->getPost("mensagem"));
        $manutencoes_agendada->setAguardaOrcamento($this->request->getPost("aguarda_orcamento"));
        $manutencoes_agendada->setOrcamento($this->request->getPost("orcamento"));
        $manutencoes_agendada->setDonebyclilogin($this->request->getPost("doneByCliLogin"));
        $manutencoes_agendada->setCaraterurgencia($this->request->getPost("caraterUrgencia"));
        $manutencoes_agendada->setConfirmed($this->request->getPost("confirmed"));
        $manutencoes_agendada->setStatus($this->request->getPost("status"));
        

        if (!$manutencoes_agendada->save()) {

            foreach ($manutencoes_agendada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'edit',
                'params' => array($manutencoes_agendada->id)
            ));

            return;
        }

        $this->flash->success("Essa Manutenção Agendada foi atualizada com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes_agendadas",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a manutencoes_agendada
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $manutencoes_agendada = ManutencoesAgendadas::findFirstByid($id);
        if (!$manutencoes_agendada) {
            $this->flash->error("Essa Manutenção Agendada não foi encontrada");

            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'index'
            ));

            return;
        }

        if (!$manutencoes_agendada->delete()) {

            foreach ($manutencoes_agendada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "manutencoes_agendadas",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("A Manutenção Agendada foi eliminada com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes_agendadas",
            'action' => "index"
        ));
    }

}
