<?php
/**
 * Created by PhpStorm.
 * User: Jose M. Domingos
 * Date: 15-04-2016
 * Time: 12:07
 */
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AgendaCliController extends ControllerBase
{
    public function initialize()
    {
        $identity = $this->auth->getIdentity();

        $Cliente = Clientes::findByUserId($identity['id']);
        $innerCliente = $Cliente->toArray();
        $this->persistent->clienteRow = $innerCliente[0];

        $Moradas = ClientesMoradas::findByIdCliente($innerCliente[0]['id']);

        $phql = "SELECT V.matricula, CONCAT(V.matricula, ' - ', Ma.marca, ' ', Mo.modelo) AS oModelo
                  FROM Clientes as C, ClientesVeiculos as CV, Veiculos as V, Modelos as Mo, Marcas as Ma
                  WHERE C.id=CV.id_cliente AND CV.id_veiculo=V.matricula AND V.modelo=Mo.id AND Mo.marca=Ma.id
                  AND C.user_id=" . $identity['id'];
        $veiculos = $this->modelsManager->executeQuery($phql);



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

        //ver se está vazio, FIXME Penso que isto não está a fazer nada
        if(empty($veiculos->toArray())) {
            $this->view->setVar('has_vehicles', false);
            $this->flash->warning("Não existem viaturas inseridas! Adicione os seus veiculos.");
        } else {
            $this->view->setVar('has_vehicles', true);
            $this->view->veiculos = $veiculos;
            $this->view->moradas = $Moradas;
        }

        $this->view->setVar('logged_in', is_array($identity));
        $this->view->setTemplateBefore('public');
        $this->tag->setTitle('Agenda');
        parent::initialize();
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        //$phql = "SELECT * FROM ManutencoesAgendadas WHERE (status='reservaWeb' OR status='reservaAdm' OR status='confirmado') ORDER BY data, hora";
        //$marcacoes = $this->modelsManager->executeQuery($phql)->toArray();

        $this->dispatcher->forward(array(
            "controller" => "agenda_cli",
            "action" => "search"
        ));

        //$this->persistent->parameters = null;
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

        $parameters["conditions"] = "id_cliente=" . $this->persistent->clienteRow['id']; //Só busca a sua agenda

        $parameters["order"] = "id";

        $manutencoes_agendadas = ManutencoesAgendadas::find($parameters);
        if (count($manutencoes_agendadas) == 0) {
            $this->flash->notice("Voçê ainda não Agendou Manutenções");
            return;
        } else {
            $this->view->contagem = count($manutencoes_agendadas);
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
        $this->tag->setDefault("id_cliente", $this->persistent->clienteRow['id']);
        //TODO: Adicionar select da morada aqui
        $this->tag->setDefault("doneByCliLogin", 'S');
        $this->tag->setDefault("confirmed", 'N');
        $this->tag->setDefault("status", 'reservaWeb');
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
                    'controller' => "agenda_cli",
                    'action' => 'search'
                ));

                return;
            }

            if ($manutencoes_agendada->getIdCliente() != $this->persistent->clienteRow['id']) {
                $this->flash->error("Essa Manutenção Agendada não pertence á sua conta");

                $this->dispatcher->forward(array(
                    'controller' => "agenda_cli",
                    'action' => 'search'
                ));

                return;
            }

            $this->view->id = $manutencoes_agendada->id;

            $this->tag->setDefault("id", $manutencoes_agendada->getId());
            $this->tag->setDefault("id_cliente", $manutencoes_agendada->getIdCliente());
            $this->tag->setDefault("matricula", $manutencoes_agendada->getMatricula());
            $this->tag->setDefault("data", $manutencoes_agendada->getData());
            $this->tag->setDefault("hora", $manutencoes_agendada->getHora());
            $this->tag->setDefault("mensagem", $manutencoes_agendada->getMensagem());
            $this->tag->setDefault("id_morada", $manutencoes_agendada->getIdMorada());
            $this->tag->setDefault("aguarda_orcamento", $manutencoes_agendada->getAguardaOrcamento());
            $this->tag->setDefault("orcamento", $manutencoes_agendada->getOrcamento());
            $this->tag->setDefault("doneByCliLogin", $manutencoes_agendada->getDonebyclilogin());
            $this->tag->setDefault("caraterUrgencia", $manutencoes_agendada->getCaraterurgencia());
            $this->tag->setDefault("confirmed", $manutencoes_agendada->getConfirmed());
            $this->tag->setDefault("status", $manutencoes_agendada->getStatus());

        }
    }

    /**
     * Creates a new manutencoes_agendada
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "agenda_cli",
                'action' => 'search'
            ));

            return;
        }

        $manutencoes_agendada = new ManutencoesAgendadas();
        $manutencoes_agendada->setIdCliente($this->request->getPost("id_cliente"));
        $manutencoes_agendada->setMatricula($this->request->getPost("matricula"));
        $manutencoes_agendada->setData($this->request->getPost("data"));
        $manutencoes_agendada->setHora($this->request->getPost("hora"));
        $manutencoes_agendada->setMensagem($this->request->getPost("mensagem"));
        $manutencoes_agendada->setIdMorada($this->request->getPost("id_morada"));
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
                'controller' => "agenda_cli",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("A nova Manutenção Agendada foi criada com successo");

        $this->dispatcher->forward(array(
            'controller' => "agenda_cli",
            'action' => 'search'
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
                'controller' => "agenda_cli",
                'action' => 'search'
            ));

            return;
        }

        //Já controla se a manutenção é deste login antes

        $id = $this->request->getPost("id");
        $manutencoes_agendada = ManutencoesAgendadas::findFirstByid($id);

        if (!$manutencoes_agendada) {
            $this->flash->error("Essa Manutenção Agendada não existe " . $id);

            $this->dispatcher->forward(array(
                'controller' => "agenda_cli",
                'action' => 'search'
            ));

            return;
        }

        //$manutencoes_agendada->setIdCliente($this->request->getPost("id_cliente"));
        $manutencoes_agendada->setMatricula($this->request->getPost("matricula"));
        $manutencoes_agendada->setData($this->request->getPost("data"));
        $manutencoes_agendada->setHora($this->request->getPost("hora"));
        $manutencoes_agendada->setMensagem($this->request->getPost("mensagem"));
        $manutencoes_agendada->setIdMorada($this->request->getPost("id_morada"));
        $manutencoes_agendada->setAguardaOrcamento($this->request->getPost("aguarda_orcamento"));
        //FIXME: Atualizar o valor do orçamento
        //$manutencoes_agendada->setOrcamento($this->request->getPost("orcamento"));
        $manutencoes_agendada->setDonebyclilogin("S");
        $manutencoes_agendada->setCaraterurgencia($this->request->getPost("caraterUrgencia"));
        $manutencoes_agendada->setConfirmed($this->request->getPost("confirmed")); //TODO: Desconfirma sempre que for alterado ???
        //Mudar o status para "reservaWeb" sempre que o cliente fizer uma edição
        $manutencoes_agendada->setStatus('reservaWeb');


        if (!$manutencoes_agendada->save()) {

            foreach ($manutencoes_agendada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "agenda_cli",
                'action' => 'edit',
                'params' => array($manutencoes_agendada->id)
            ));

            return;
        }

        $this->flash->success("Essa Manutenção Agendada foi atualizada com successo");

        $this->dispatcher->forward(array(
            'controller' => "agenda_cli",
            'action' => 'search'
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
                'controller' => "agenda_cli",
                'action' => 'search'
            ));

            return;
        }

        if ($manutencoes_agendada->getIdCliente() != $this->persistent->clienteRow['id']) {
            $this->flash->error("Essa Manutenção Agendada não pertence á sua conta");

            $this->dispatcher->forward(array(
                'controller' => "agenda_cli",
                'action' => 'search'
            ));

            return;
        }

        if (!$manutencoes_agendada->delete()) {

            foreach ($manutencoes_agendada->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "agenda_cli",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("A Manutenção Agendada foi eliminada com successo");

        $this->dispatcher->forward(array(
            'controller' => "agenda_cli",
            'action' => "search"
        ));
    }

}