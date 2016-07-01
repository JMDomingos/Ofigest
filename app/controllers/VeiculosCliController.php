<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class VeiculosCliController extends ControllerBase
{
    public function initialize()
    {
        $ident = $this->auth->getIdentity();

        $marcas = Marcas::find(array(
            'columns'   => 'id,marca',
            'order'     => 'marca'
        ));

        $this->persistent->clienteId = Clientes::findByUserId($ident['id'])->toArray();

        $phql1 = "SELECT mo.id, mo.modelo AS oModelo FROM Modelos as mo WHERE mo.marca=" . $marcas[0]['id'] . " ORDER BY mo.modelo";

        $phql2 = "SELECT V.matricula, CONCAT(V.matricula, ' - ', Ma.marca, ' ', Mo.modelo) AS oModelo
        FROM ClientesVeiculos AS CV, Veiculos AS V, Modelos as Mo, Marcas as Ma
        WHERE CV.id_veiculo=V.matricula AND V.modelo=Mo.id AND Mo.marca=Ma.id
        AND CV.id_cliente=" . $this->persistent->clienteId[0]['id'];

        $this->view->marcas  = $marcas;
        $this->view->modelos = $this->modelsManager->executeQuery($phql1);
        $this->view->matriculas = $this->modelsManager->executeQuery($phql2);

        $this->view->setVar('logged_in', is_array($ident));
        $this->view->setTemplateBefore('public');
        $this->tag->setTitle('Viaturas');
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
     * Searches for veiculos
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            //para limpar o notice
            if($_POST['marca']=='') unset($_POST['marca']);
            //print_r($_POST);
            $query = Criteria::fromInput($this->di, 'Veiculos', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();

            //Filtra por Viaturas do Cliente pelo id na tabela user,
            //devolve só as matriculas deste cliente
            $viaturasCli = ClientesVeiculos::find(array(
                'columns'=>'id_veiculo',
                'conditions'=>'id_cliente=' . $this->persistent->clienteId[0]['id']
            ));

            if (count($viaturasCli) == 0) {
                $this->flash->notice("Voçê ainda não introduziu nenhum Veiculo");

                $this->dispatcher->forward(array(
                    "controller" => "veiculos_cli",
                    "action" => "new"
                ));

                return;
            }

            foreach($viaturasCli->toArray() as $viatura) {
                $matriculas[] = $viatura['id_veiculo'];
            }

            $cond = '';
            for($x=0; $x<count($matriculas); $x++) {
                $cond .= '?' . $x;
                if($x<(count($matriculas)-1)) {
                    $cond .= ',';
                }
            }
            $parameters["conditions"] = "matricula=" . $cond;
            $parameters["bind"] = $matriculas; //Só busca as suas manutenções

        }

        $parameters["order"] = "matricula";

        $veiculos = Veiculos::find($parameters);
        if (count($veiculos) == 0) {
            $this->flash->notice("Voçê ainda não introduziu nenhum Veiculo");

            $this->dispatcher->forward(array(
                "controller" => "veiculos_cli",
                "action" => "new"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $veiculos,
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
     * Edits a veiculo
     *
     * @param string $matricula
     */
    public function editAction($matricula)
    {
        if (!$this->request->isPost()) {

            $viaturasCli = ClientesVeiculos::find(array(
                'columns'=>'id_veiculo',
                'conditions'=>'id_cliente=' . $this->persistent->clienteId[0]['id']
            ));

            foreach($viaturasCli->toArray() as $viatura) {
                $matriculas[] = $viatura['id_veiculo'];
            }

            if(!in_array($matricula, $matriculas)) {
                $this->flash->error("O Veiculo que tentou editar não lhe pertence");

                $this->dispatcher->forward(array(
                    'controller' => "veiculos_cli",
                    'action' => 'search'
                ));

                return;
            }

            $veiculo = Veiculos::findFirstBymatricula($matricula);
            if (!$veiculo) {
                $this->flash->error("Esse Veiculo não foi encontrado");

                $this->dispatcher->forward(array(
                    'controller' => "veiculos_cli",
                    'action' => 'search'
                ));

                return;
            }

            $this->view->matricula = $veiculo->matricula;
            $this->tag->setDefault("matricula", $veiculo->getMatricula());
            $this->tag->setDefault("id_marca", $veiculo->modelos->getMarca());
            $phql = "SELECT mo.id, mo.modelo AS oModelo FROM Modelos as mo WHERE mo.marca="
                     . $veiculo->modelos->getMarca() . " ORDER BY mo.modelo";
            $this->view->modelos = $this->modelsManager->executeQuery($phql);
            $this->tag->setDefault("modelo", $veiculo->getModelo());
            $this->tag->setDefault("n_quadro", $veiculo->getNQuadro());
            $this->tag->setDefault("ano", $veiculo->getAno());
            $this->tag->setDefault("mes", $veiculo->getMes());
            $this->tag->setDefault("cor", $veiculo->getCor());
            $this->tag->setDefault("tamanho_pneus", $veiculo->getTamanhoPneus());
        }
    }

    /**
     * Creates a new veiculo
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'index'
            ));

            return;
        }

        $veiculo = new Veiculos();
        $veiculo->setMatricula($this->request->getPost("matricula"));
        $veiculo->setModelo($this->request->getPost("modelo"));
        $veiculo->setNQuadro($this->request->getPost("n_quadro"));
        $veiculo->setAno($this->request->getPost("ano"));
        $veiculo->setMes($this->request->getPost("mes"));
        $veiculo->setCor($this->request->getPost("cor"));
        $veiculo->setTamanhoPneus($this->request->getPost("tamanho_pneus"));

        if (!$veiculo->save()) {
            foreach ($veiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("O Veiculo foi criado com successo");

        //Associar o veiculo ao cliente durante a criação
        $veiculo_cliente = new ClientesVeiculos();
        $veiculo_cliente->id_cliente = $this->persistent->clienteId[0]['id'];
        $veiculo_cliente->id_veiculo = $this->request->getPost("matricula");
        $veiculo_cliente->data = date('Y-m-d H:i:s');

        if (!$veiculo_cliente->save()) {
            foreach ($veiculo_cliente->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("O Veiculo foi associado à sua conta com successo");

        $this->dispatcher->forward(array(
            'controller' => "veiculos_cli",
            'action' => 'search'
        ));
    }

    /**
     * Saves a veiculo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'search'
            ));

            return;
        }

        $matricula = $this->request->getPost("matricula");
        $veiculo = Veiculos::findFirstBymatricula($matricula);

        if (!$veiculo) {
            $this->flash->error("O Veiculo com a matricula " . $matricula . " não existe");

            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'index'
            ));

            return;
        }

        $veiculo->setMatricula($this->request->getPost("matricula"));
        $veiculo->setModelo($this->request->getPost("modelo"));
        $veiculo->setNQuadro($this->request->getPost("n_quadro"));
        $veiculo->setAno($this->request->getPost("ano"));
        $veiculo->setMes($this->request->getPost("mes"));
        $veiculo->setCor($this->request->getPost("cor"));
        $veiculo->setTamanhoPneus($this->request->getPost("tamanho_pneus"));
        

        if (!$veiculo->save()) {

            foreach ($veiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'edit',
                'params' => array($veiculo->matricula)
            ));

            return;
        }

        $this->flash->success("O Veiculo foi atualizado com successo");

        $this->dispatcher->forward(array(
            'controller' => "veiculos_cli",
            'action' => 'search'
        ));
    }

    /**
     * Deletes a veiculo
     *
     * @param string $matricula
     */
    public function deleteAction($matricula)
    {
        //Desassociar o veiculo do cliente em vez de eliminar
        //$veiculo = Veiculos::findFirstBymatricula($matricula);
        $veiculo = ClientesVeiculos::find(
            array(
                'conditions' => 'id_cliente = ?1 AND id_veiculo = ?2',
                'bind'       => array(
                    1 => $this->persistent->clienteId[0]['id'],
                    2 => $matricula
                )
            )
        );

        if (!$veiculo) {
            $this->flash->error("Esse veiculo não foi encontrado");

            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'search'
            ));

            return;
        }

        if (!$veiculo->delete()) {

            foreach ($veiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "veiculos_cli",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("O Veiculo foi eliminado com successo");

        $this->dispatcher->forward(array(
            'controller' => "veiculos_cli",
            'action' => "search"
        ));
    }

}
