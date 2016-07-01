<?php

use Phalcon\Paginator\Adapter\Model as Paginator;


/**
 * ContactController
 *
 * Allows to contact the staff using a contact form
 */
class MensagensController extends ControllerBase
{
    public function initialize()
    {
        $identity = $this->auth->getIdentity();
        $this->view->setVar('logged_in', $identity);
        $this->view->setTemplateBefore('private');

        $this->tag->setTitle('Mensagens');
        parent::initialize();
    }
    
    public function indexAction()
    {
        $parameters = array();
        $parameters["order"] = "created_at desc";

        $mensagens = Contact::find($parameters);
        if (count($mensagens) == 0) {
            $this->flash->notice("A pesquisa não devolveu nenhuma Mensagem");

            return;
        }

        $paginator = new Paginator(array(
            'data' => $mensagens,
            'limit'=> 15,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    public function lerAction($id)
    {
        $mensagem = Contact::findFirstByid($id);
        if (!$mensagem) {
            $this->flash->error("Essa mensagem não foi encontrada ");

            $this->dispatcher->forward(array(
                'controller' => "mensagens",
                'action' => 'index'
            ));

            return;
        }

        $this->view->mensagem = $mensagem;

        if($mensagem->read_at === null) {

            $mensagem->setReadAt(date('Y-m-d H:m:s'));

            if (!$mensagem->save()) {
                foreach ($mensagem->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->flash->error("Não foi possível marcar a mensagem como lida");

                return;
            }

            $this->flash->success("A mensagem foi marcada como lida");

            return;
        }

        $this->flash->notice("Esta mensagem foi lida em " . $mensagem->read_at);

    }
}
