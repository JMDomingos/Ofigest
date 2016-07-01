<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
//use Ofigest\Models\Profiles;
use Phalcon\Mvc\Model;

class UsersForm extends Form
{

    public function initialize($entity = null, $options = null)
    {

        // In edition the id is hidden
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id', array(
                'class' => 'form-control'
            ));
        }

        $this->add($id);

        $name = new Text('name', array(
            'placeholder' => 'Nome',
            'class' => 'form-control'
        ));

        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'O Nome é obrigatório'
            ))
        ));

        $this->add($name);

        $email = new Text('email', array(
            'placeholder' => 'Email',
            'class' => 'form-control'
        ));

        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'O E-Mail é obrigatório'
            )),
            new Email(array(
                'message' => 'O E-Mail não é válido'
            ))
        ));

        $this->add($email);

        $this->add(new Select('profilesId', Profiles::find('active = "Y"'), array(
            'using' => array(
                'id',
                'name'
            ),
            'useEmpty' => true,
            'emptyText' => '...',
            'emptyValue' => '',
            'class' => 'form-control'
        )));

        $this->add(new Select('banned', array(
            'Y' => 'Sim',
            'N' => 'Não'
        ), array(
            'class' => 'form-control'
        )));

        $this->add(new Select('suspended', array(
            'Y' => 'Sim',
            'N' => 'Não'
        ), array(
            'class' => 'form-control'
        )));

        $this->add(new Select('active', array(
            'Y' => 'Sim',
            'N' => 'Não'
        ), array(
            'class' => 'form-control'
        )));
    }
}
