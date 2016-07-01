<?php
//namespace Ofigest\Forms;

class UtilizadoresForm {
	private function _Nome() {
		$element = new \Phalcon\Forms\Element\Text("Nome");
		$element->setLabel("Nome");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 70
		]));
		return $element;
	}
	private function _Email() {
		$element = new \Phalcon\Forms\Element\Text("Email");
		$element->setLabel("Email");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 70
		]));
		return $element;
	}
	public function setFields() {
		$this->add($this->_Nome());
		$this->add($this->_Email());
	}
}

