<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;

/**
 * ControllerBase
 * This is the base controller for all controllers in the application
 */
class ControllerBase extends Controller
{
    protected function initialize()
    {
        //Busca as mensagens por ler
        $mensagens = Contact::find("read_at is null");
        $this->view->unreadMessages = $mensagens;
        $this->view->unreadMessagesCount = count($mensagens);

        $marcacoes = ManutencoesAgendadas::find("confirmed=0"); //e diferente de anulada/cancelada
        $this->view->marcacoes = $marcacoes;
        $this->view->marcacoesPorConfirmar = count($marcacoes);
        
        $this->tag->prependTitle('OfiGest - ');
    }
	
	/**
     * Execute before the router so we can determine if this is a private controller, and must be authenticated, or a
     * public controller that is open to all.
     *
     * @param Dispatcher $dispatcher
     * @return boolean
     */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        $controllerName = $dispatcher->getControllerName();

        // Only check permissions on private controllers
        if ($this->acl->isPrivate($controllerName)) {
            $identity = $this->auth->getIdentity();

            if (!is_array($identity)) {
                $this->flash->notice('Voçê não têm acesso, este módulo é privado');
                $dispatcher->forward(array(
                    'controller' => 'index',
                    'action' => 'index'
                ));
                return false;
            }

            $actionName = $dispatcher->getActionName();

            //TODO: Para obrigar a recriar a Acl de todas as vezes, apagar qd tiver pronto
            $this->acl->rebuild();

            if (!$this->acl->isAllowed($identity['profile'], $controllerName, $actionName)) {
                $this->flash->notice('Voçê não têm acesso a este módulo: ' . $controllerName . ':' . $actionName);

                if ($this->acl->isAllowed($identity['profile'], $controllerName, 'index')) {
                    $dispatcher->forward(array(
                        'controller' => $controllerName,
                        'action' => 'index'
                    ));
                } else {
                    //Mudar para o contate-nos???
                    $dispatcher->forward(array(
                        'controller' => 'user_control',
                        'action' => 'index'
                    ));
                }

                return false;
            }
        }
    }

    public function afterExecuteRoute(Dispatcher $dispatcher) {
        if($this->request->isAjax() == true && $dispatcher->getControllerName()==='assync') {
            $this->view->disableLevel(array(
                View::LEVEL_ACTION_VIEW     => true,
                View::LEVEL_LAYOUT          => true,
                View::LEVEL_MAIN_LAYOUT     => true,
                View::LEVEL_AFTER_TEMPLATE  => true,
                View::LEVEL_BEFORE_TEMPLATE => true
            ));

            $this->response->setContentType('application/json', 'UTF-8');
            $data = $this->view->getParamsToView();

            /*
             * Or for returnish action lovers:
             *   ->  $data = $dispatcher->getReturnedValue();
             */

            /* Set global params if is not set in controller/action */
            if (is_array($data)) {
                $data['success'] = isset($data['success']) ?: true;
                $data['message'] = isset($data['message']) ?: '';
                $data = json_encode($data);
            }

            $this->response->setContent($data);

            //Estava a dar barraca nos não Ajax, mudei o if e meti isto dentro
            return $this->response->send();
        }

    }

    protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0],
    			'action' => $uriParts[1],
                'params' => $params
    		)
    	);
    }
}
