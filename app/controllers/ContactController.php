<?php
//namespace Ofigest\Controllers;

/**
 * ContactController
 *
 * Allows to contact the staff using a contact form
 */
class ContactController extends ControllerBase
{
    public function initialize()
    {
        $identity = $this->auth->getIdentity();
        $this->view->setVar('logged_in', $identity);
        if ($identity['profile']==='Administratores') {
            $this->view->setTemplateBefore('private');
        } else {
            $this->view->setTemplateBefore('public');
        }
        $this->tag->setTitle('Contate-nos');
        parent::initialize();
    }
    
    public function indexAction()
    {
        $this->view->form = new ContactForm;

        $identity = $this->auth->getIdentity();
        $this->tag->setDefault("name", $identity['name']);
        $this->tag->setDefault("email", $identity['email']);

    }
    
    /**
     * Saves the contact information in the database
     */
    public function sendAction()
    {
        if ($this->request->isPost() != true) {
            return $this->forward('contact/index');
        }
        
        $form = new ContactForm;
        $contact = new Contact();
        
        // Validate the form
        $data = $this->request->getPost();
        if (!$form->isValid($data, $contact)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->forward('contact/index');
        }
        
        if ($contact->save() == false) {
            foreach ($contact->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->forward('contact/index');
        }
        
        $this->flash->success('Obrigado, iremos entrar em contato consigo nas próximas 48 horas.');
        return $this->forward('index/index');
    }
}
