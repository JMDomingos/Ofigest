<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class VeiculosController extends ControllerBase
{
    public function initialize()
    {
         $marcas = Marcas::find(array(
            'columns'   => 'id,marca',
            'order'     => 'marca'
        ));


        //"SELECT Mo.id, CONCAT(Mo.id, ' - ', Ma.marca, ' ', Mo.modelo) AS oModelo FROM Modelos as Mo, Marcas as Ma WHERE Mo.marca=Ma.id  AND Ma.id=" . $marcas[0]['id'];
        $phql = "SELECT mo.id, mo.modelo AS oModelo FROM Modelos as mo WHERE mo.marca=" . $marcas[0]['id'] . " ORDER BY mo.modelo";

        $this->view->marcas  = $marcas;
        $this->view->modelos = $this->modelsManager->executeQuery($phql);
        $this->view->setTemplateBefore('private');
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
        }
        $parameters["order"] = "matricula";

        $veiculos = Veiculos::find($parameters);
        if (count($veiculos) == 0) {
            $this->flash->notice("A Pesquisa efetuada não devolveu Veiculos");

            $this->dispatcher->forward(array(
                "controller" => "veiculos",
                "action" => "index"
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

            $veiculo = Veiculos::findFirstBymatricula($matricula);
            if (!$veiculo) {
                $this->flash->error("Esse Veiculo não foi encontrado");

                $this->dispatcher->forward(array(
                    'controller' => "veiculos",
                    'action' => 'index'
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
                'controller' => "veiculos",
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
                'controller' => "veiculos",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("O Veiculo foi criado com successo");

        $this->dispatcher->forward(array(
            'controller' => "veiculos",
            'action' => 'index'
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
                'controller' => "veiculos",
                'action' => 'index'
            ));

            return;
        }

        $matricula = $this->request->getPost("matricula");
        $veiculo = Veiculos::findFirstBymatricula($matricula);

        if (!$veiculo) {
            $this->flash->error("O Veiculo com a matricula " . $matricula . " não existe");

            $this->dispatcher->forward(array(
                'controller' => "veiculos",
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
                'controller' => "veiculos",
                'action' => 'edit',
                'params' => array($veiculo->matricula)
            ));

            return;
        }

        $this->flash->success("O Veiculo foi atualizado com successo");

        $this->dispatcher->forward(array(
            'controller' => "veiculos",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a veiculo
     *
     * @param string $matricula
     */
    public function deleteAction($matricula)
    {
        $veiculo = Veiculos::findFirstBymatricula($matricula);
        if (!$veiculo) {
            $this->flash->error("Esse veiculo não foi encontrado");

            $this->dispatcher->forward(array(
                'controller' => "veiculos",
                'action' => 'index'
            ));

            return;
        }

        if (!$veiculo->delete()) {

            foreach ($veiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "veiculos",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("O Veiculo foi eliminado com successo");

        $this->dispatcher->forward(array(
            'controller' => "veiculos",
            'action' => "index"
        ));
    }

}
