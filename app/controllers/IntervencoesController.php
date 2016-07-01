<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class IntervencoesController extends ControllerBase
{
    public function initialize()
    {
        $this->view->intervencoes_tipos = IntervencoesTipos::find(array(
            'columns'   => 'id_tipo_intervencao,desc_tipo_intervencao',
            'order'     => 'desc_tipo_intervencao'
        ));

        $this->view->setTemplateBefore('private');
        $this->tag->setTitle('Intervenções');
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
     * Searches for intervencoes
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Intervencoes', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $intervencoes = Intervencoes::find($parameters);
        if (count($intervencoes) == 0) {
            $this->flash->notice("A pesquisa não devolveu nenhuma Intervenção");

            $this->dispatcher->forward(array(
                "controller" => "intervencoes",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $intervencoes,
            'limit'=> 10,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction($id_manutencao)
    {
        $this->tag->setDefault("id_manutencoes", $id_manutencao);

        $this->view->manutencao = Manutencoes::findFirstByid($id_manutencao);

    }

    /**
     * Edits a intervencoe
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $intervencoe = Intervencoes::findFirstByid($id);
            if (!$intervencoe) {
                $this->flash->error("Essa Intervenção não foi encontrada");

                $this->dispatcher->forward(array(
                    'controller' => "intervencoes",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->manutencao = Manutencoes::findFirstByid($intervencoe->getIdManutencoes());

            $this->view->id = $intervencoe->id;

            $this->tag->setDefault("id", $intervencoe->getId());
            //$this->tag->setDefault("id_manutencoes", $intervencoe->getIdManutencoes());
            $this->tag->setDefault("id_tipo_intervencao", $intervencoe->getIdTipoIntervencao());
            $this->tag->setDefault("desc_intervencao", $intervencoe->getDescIntervencao());
            $this->tag->setDefault("data_intervencao", $intervencoe->getDataIntervencao());
            $this->tag->setDefault("custo_intervencao", $intervencoe->getCustoIntervencao());
            
        }
    }

    /**
     * Creates a new intervencoe
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

        $intervencoe = new Intervencoes();
        $intervencoe->setId($this->request->getPost("id"));
        $intervencoe->setIdManutencoes($this->request->getPost("id_manutencoes"));
        $intervencoe->setIdTipoIntervencao($this->request->getPost("id_tipo_intervencao"));
        $intervencoe->setDescIntervencao($this->request->getPost("desc_intervencao"));
        $intervencoe->setDataIntervencao($this->request->getPost("data_intervencao"));
        $intervencoe->setCustoIntervencao($this->request->getPost("custo_intervencao"));
        

        if (!$intervencoe->save()) {
            foreach ($intervencoe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "intervencoes",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("A Intervenção foi criada com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes",
            'action' => 'search'
        ));
    }

    /**
     * Saves a intervencoe edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "intervencoes",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $intervencoe = Intervencoes::findFirstByid($id);

        if (!$intervencoe) {
            $this->flash->error("Essa intervenção não existe " . $id);

            $this->dispatcher->forward(array(
                'controller' => "intervencoes",
                'action' => 'index'
            ));

            return;
        }

        //$intervencoe->setId($this->request->getPost("id"));
        //$intervencoe->setIdManutencoes($this->request->getPost("id_manutencoes"));
        $intervencoe->setIdTipoIntervencao($this->request->getPost("id_tipo_intervencao"));
        $intervencoe->setDescIntervencao($this->request->getPost("desc_intervencao"));
        $intervencoe->setDataIntervencao($this->request->getPost("data_intervencao"));
        $intervencoe->setCustoIntervencao($this->request->getPost("custo_intervencao"));
        

        if (!$intervencoe->save()) {

            foreach ($intervencoe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "intervencoes",
                'action' => 'edit',
                'params' => array($intervencoe->id)
            ));

            return;
        }

        $this->flash->success("Esta Intervenção foi atualizada com successo");

        $this->dispatcher->forward(array(
            'controller' => "manutencoes",
            'action' => 'search'
        ));
    }

    /**
     * Deletes a intervencoe
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $intervencoe = Intervencoes::findFirstByid($id);
        if (!$intervencoe) {
            $this->flash->error("A Intervenção não foi encontrada");

            $this->dispatcher->forward(array(
                'controller' => "manutencoes",
                'action' => 'search'
            ));

            return;
        }

        if (!$intervencoe->delete()) {

            foreach ($intervencoe->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "intervencoes",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("intervencoe was deleted successfully");

        $this->dispatcher->forward(array(
            'controller' => "intervencoes",
            'action' => "index"
        ));
    }

}
