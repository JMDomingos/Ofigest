<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class ForgotPasswordForm extends Form
{

    public function initialize()
    {
        $email = new Text('email', array(
            'placeholder' => 'Email',
            'class' => 'form-control',
            'style' => 'width: 200px;'

        ));

        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'O e-mail é obrigatório'
            )),
            new Email(array(
                'message' => 'O e-mail não é válido'
            ))
        ));
        $this->add($email);

        $this->add(new Submit('Enviar', array(
            'class' => 'btn btn-primary'
        )));
    }
}
