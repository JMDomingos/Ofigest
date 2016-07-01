<?php
//namespace Ofigest\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class ContactForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
        // Name
        $name = new Text('name');
        $name->setLabel('O seu nome');
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'O Nome é obrigatório'
            ))
        ));
        $this->add($name);

        // Email
        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->setFilters('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'O E-mail é obrigatório'
            )),
            new Email(array(
                'message' => 'O E-mail não é válido'
            ))
        ));
        $this->add($email);

        $comments = new TextArea('comments');
        $comments->setLabel('Mensagem');
        $comments->setFilters(array('striptags', 'string'));
        $comments->addValidators(array(
            new PresenceOf(array(
                'message' => 'A mensagem é obrigatória'
            ))
        ));
        $this->add($comments);
    }
}
