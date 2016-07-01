<?php
//namespace Ofigest\Forms;

class ClientesForm {
	private function _Nome() {
		$element = new \Phalcon\Forms\Element\Text("Nome");
		$element->setLabel("Nome");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 45
		]));
		return $element;
	}
	private function _Morada() {
		$element = new \Phalcon\Forms\Element\Text("Morada");
		$element->setLabel("Morada");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 255
		]));
		return $element;
	}
	private function _Telefone() {
		$element = new \Phalcon\Forms\Element\Numeric("Telefone");
		$element->setLabel("Telefone");
		return $element;
	}
	private function _Telemovel() {
		$element = new \Phalcon\Forms\Element\Numeric("Telemovel");
		$element->setLabel("Telemovel");
		return $element;
	}
	private function _Email() {
		$element = new \Phalcon\Forms\Element\Text("Email");
		$element->setLabel("Email");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 75
		]));
		return $element;
	}
	private function _Nif() {
		$element = new \Phalcon\Forms\Element\Numeric("Nif");
		$element->setLabel("Nif");
		return $element;
	}
	public function setFields() {
		$this->add($this->_Nome());
		$this->add($this->_Morada());
		$this->add($this->_Telefone());
		$this->add($this->_Telemovel());
		$this->add($this->_Email());
		$this->add($this->_Nif());
	}
}

