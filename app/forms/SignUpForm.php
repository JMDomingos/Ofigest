<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;

class SignUpForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
        $name = new Text('name', array(
            'class' => 'form-control'
        ));
        $name->setLabel('Nome');
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'O Nome é obrigatório'
            ))
        ));
        $this->add($name);

        // Email
        $email = new Text('email', array(
            'class' => 'form-control'
        ));
        $email->setLabel('E-Mail');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'O e-mail é obrigatório'
            )),
            new Email(array(
                'message' => 'O e-mail não é válido'
            ))
        ));
        $this->add($email);

        // Password
        $password = new Password('password', array(
            'class' => 'form-control'
        ));
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'A password é obrigatória'
            )),
            new StringLength(array(
                'min' => 8,
                'messageMinimum' => 'A Password têm um minimo de 8 carateres'
            )),
            new Confirmation(array(
                'message' => 'As Passwords não são idênticas',
                'with' => 'confirmPassword'
            ))
        ));
        $this->add($password);

        // Confirm Password
        $confirmPassword = new Password('confirmPassword', array(
            'class' => 'form-control'
        ));
        $confirmPassword->setLabel('Confirme a Password');
        $confirmPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'A confirmação da password é obrigatória'
            ))
        ));
        $this->add($confirmPassword);

        // Remember
        $terms = new Check('terms', array(
            'value' => 'yes'
        ));
        $terms->setLabel('Aceito os termos e condições');
        $terms->addValidator(new Identical(array(
            'value' => 'yes',
            'message' => 'Os Termos e Condições deverão ser aceites'
        )));
        $this->add($terms);

        // CSRF
        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));
        $this->add($csrf);

        // Sign Up
        $this->add(new Submit('Aderir', array(
            'class' => 'btn btn-success'
        )));
    }

    /**
     * Prints messages for a specific element
     */
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}
