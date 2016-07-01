<?php
//namespace Ofigest\Controllers;
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UtilizadoresController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for Utilizadores
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Utilizadores', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $utilizadores = Utilizadores::find($parameters);
        if (count($utilizadores) == 0) {
            $this->flash->notice("The search did not find any utilizadores");

            $this->dispatcher->forward(array(
                "controller" => "utilizadores",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $utilizadores,
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
     * Edits a user
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $user = Utilizadores::findFirstByid($id);
            if (!$user) {
                $this->flash->error("user was not found");

                $this->dispatcher->forward(array(
                    'controller' => "utilizadores",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id = $user->id;

            $this->tag->setDefault("id", $user->getId());
            $this->tag->setDefault("nome", $user->getNome());
            $this->tag->setDefault("email", $user->getEmail());
            
        }
    }

    /**
     * Creates a new user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "utilizadores",
                'action' => 'index'
            ));

            return;
        }

        $user = new Utilizadores();
        $user->setNome($this->request->getPost("nome"));
        $user->setEmail($this->request->getPost("email", "email"));
        

        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "utilizadores",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("user was created successfully");

        $this->dispatcher->forward(array(
            'controller' => "utilizadores",
            'action' => 'index'
        ));
    }

    /**
     * Saves a user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "utilizadores",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $user = Utilizadores::findFirstByid($id);

        if (!$user) {
            $this->flash->error("user does not exist " . $id);

            $this->dispatcher->forward(array(
                'controller' => "utilizadores",
                'action' => 'index'
            ));

            return;
        }

        $user->setNome($this->request->getPost("nome"));
        $user->setEmail($this->request->getPost("email", "email"));
        

        if (!$user->save()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "utilizadores",
                'action' => 'edit',
                'params' => array($user->id)
            ));

            return;
        }

        $this->flash->success("user was updated successfully");

        $this->dispatcher->forward(array(
            'controller' => "utilizadores",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a user
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $user = Utilizadores::findFirstByid($id);
        if (!$user) {
            $this->flash->error("user was not found");

            $this->dispatcher->forward(array(
                'controller' => "utilizadores",
                'action' => 'index'
            ));

            return;
        }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "utilizadores",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("user was deleted successfully");

        $this->dispatcher->forward(array(
            'controller' => "utilizadores",
            'action' => "index"
        ));
    }

}
