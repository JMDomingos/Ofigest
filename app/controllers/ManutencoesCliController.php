<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ManutencoesCliController extends ControllerBase
{
    public function initialize()
    {
        $identity = $this->auth->getIdentity();

        $Cliente = Clientes::findByUserId($identity['id']);
        $innerCliente = $Cliente->toArray();
        $this->persistent->clienteRow = $innerCliente[0];
        //var_dump($Cliente->toArray());

        $phql = "SELECT V.matricula, CONCAT(V.matricula, ' - ', Ma.marca, ' ', Mo.modelo) AS oModelo
                  FROM Clientes as C, ClientesVeiculos as CV, Veiculos as V, Modelos as Mo, Marcas as Ma
                  WHERE C.id=CV.id_cliente AND CV.id_veiculo=V.matricula AND V.modelo=Mo.id AND Mo.marca=Ma.id
                  AND C.user_id=" . $identity['id'];
        $veiculos = $this->modelsManager->executeQuery($phql);

        if(empty($veiculos->toArray())) {
            $this->view->setVar('has_vehicles', false);
            $this->flash->warning("Não existem viaturas inseridas! Adicione os seus veiculos.");
        } else {
            $this->view->setVar('has_vehicles', true);
            $this->view->veiculos = $veiculos;
            $this->view->clientes = $Cliente;
        }

        $this->view->setVar('logged_in', is_array($identity));
        $this->view->setTemplateBefore('public');
        $this->tag->setTitle('Manutenções');
        parent::initialize();
    }
    /**
     * Index action
     */
    public function indexAction()
    {
        $parameters["id_cliente"] = $this->persistent->clienteRow['id'];
        $this->persistent->parameters = $parameters;

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

        $parameters["conditions"] = "id_cliente=" . $this->persistent->clienteRow['id']; //Só busca as suas manutenções
        $parameters["order"] = "data desc";

        $manutencoes = Manutencoes::find($parameters);

        $this->view->setVar('contagem', count($manutencoes));

        if (count($manutencoes) == 0) {
            $this->flash->notice("Não existe nenhum registo de manutenções para esse Cliente/Viatura");
            return;
        }

        $paginator = new Paginator(array(
            'data' => $manutencoes,
            'limit'=> 5,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

}
