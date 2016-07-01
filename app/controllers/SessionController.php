<?php

use Exception as AuthException;


/**
 * Controller used handle non-authenticated session actions like login/logout, user signup, and forgotten passwords
 */
class SessionController extends ControllerBase
{

    /**
     * Default action. Set the public layout (layouts/public.volt)
     */
    public function initialize()
    {
        $this->view->setTemplateBefore('public');
        $this->tag->setTitle('Gestor de sessão');
        parent::initialize();
    }

    public function indexAction()
    {
        //Ver se têm login e reencaminhar para o login ou ?
        //Melhor maneira de fazer, não está nada bom
        if($this->auth->getUser()===false) {
            return $this->dispatcher->forward(array(
                'controller' => 'session',
                'action' => 'login'
            ));
        } else {
            return $this->dispatcher->forward(array(
                'controller' => 'index',
                'action' => 'index'
            ));
        }
    }

    /**
     * Allow a user to signup to the system
     */
    public function signupAction()
    {
        $form = new SignUpForm();
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {
                $user = new Users();
                $user->assign(array(
                    'name' => $this->request->getPost('name', 'striptags'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'profilesId' => 2
                ));

                if ($user->create()) {
                    $cliente = new Clientes();
                    $cliente->assign(array(
                        'user_id' => $user->id,
                        'nome' => $this->request->getPost('name', 'striptags'),
                        //'morada' => $this->request->getPost('morada', 'striptags'),
                        //'telefone' => $this->request->getPost('telefone'),
                        //'telemovel' => $this->request->getPost('telemovel'),
                        'email' => $this->request->getPost('email')//,
                        //'NIF' => $this->request->getPost('NIF')
                    ));

                    if ($cliente->create()) {
                        return $this->dispatcher->forward(array(
                            'controller' => 'index',
                            'action' => 'index'
                        ));
                    }

                    $this->flash->error($cliente->getMessages());
                }
                $this->flash->error($user->getMessages());
            }
        }
        $this->view->form = $form;
    }

    /**
     * Starts a session in the admin backend
     */
    public function loginAction()
    {
        $form = new LoginForm();
        try {
            if (!$this->request->isPost()) {
                if ($this->auth->hasRememberMe()) {
                    return $this->auth->loginWithRememberMe();
                }
            } else {
                if ($form->isValid($this->request->getPost()) == false) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $this->auth->check(array(
                        'email' => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                        'remember' => $this->request->getPost('remember')
                    ));

                    /*
                    $identity = $this->auth->getIdentity();
                    if ($identity['profile']==='Administratores') {
                        return $this->response->redirect('agenda');
                    } else {
                        return $this->response->redirect('index');
                    }
                    */
                    
                    return $this->response->redirect('index');

                }
            }
        } catch (AuthException $e) {
            $this->flash->error($e->getMessage());
        }
        $this->view->form = $form;
    }

    /**
     * Shows the forgot password form
     */
    public function forgotPasswordAction()
    {
        $form = new ForgotPasswordForm();
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) == false) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {
                $user = Users::findFirstByEmail($this->request->getPost('email'));
                if (!$user) {
                    $this->flash->success('Não existem contas associadas a este email');
                } else {
                    $resetPassword = new ResetPasswords();
                    $resetPassword->usersId = $user->id;
                    if ($resetPassword->save()) {
                        $this->flash->success('Foi feito o reset da sua Password! Verifique o seu email.');
                    } else {
                        foreach ($resetPassword->getMessages() as $message) {
                            $this->flash->error($message);
                        }
                    }
                }
            }
        }
        $this->view->form = $form;
    }

    /**
     * Closes the session
     */
    public function logoutAction()
    {
        $this->auth->remove();
        return $this->response->redirect('index');
    }
}
