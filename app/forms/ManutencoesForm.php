<?php
/*
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
*/
//use Phalcon\Tag;

class ManutencoesForm //extends Form
{
	private function _Data() {
		$element = new \Phalcon\Forms\Element\Date("Data");
		$element->setLabel("Data");
		return $element;
	}
	private function _IdCliente() {
        //echo 'teste';
        //var_dump(Clientes::find());
		/*
              return new \Phalcon\Forms\Ement\Select(/*'IdCliente', Clientes::find(), array(
                    'using' => array(
                        'id',
                        'nome'
                    ),
                    'useEmpty' => true,
                    'emptyText' => '...',
                    'emptyValue' => '0'
                ));*/
        /*
        $element = new \Phalcon\Forms\Element\Select("IdCliente");
        $element->setLabel("Cliente");
        $element->setOptions(Clientes::find());
        return $element;
        */
	}
	private function _IdVeiculo() {
		$element = new \Phalcon\Forms\Element\Text("IdVeiculo");
		$element->setLabel("IdVeiculo");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 8
		]));
		return $element;
	}
	private function _InspecionadoAte() {
		$element = new \Phalcon\Forms\Element\Date("InspecionadoAte");
		$element->setLabel("InspecionadoAte");
		return $element;
	}
	private function _Kilometragem() {
		$element = new \Phalcon\Forms\Element\Numeric("Kilometragem");
		$element->setLabel("Kilometragem");
		return $element;
	}
	public function setFields() {
		$this->add($this->_Data());

		$this->add($this->_IdCliente());

		$this->add($this->_IdVeiculo());
		$this->add($this->_InspecionadoAte());
		$this->add($this->_Kilometragem());
	}
}

