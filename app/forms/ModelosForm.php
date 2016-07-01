<?php
//namespace Ofigest\Forms;

class ModelosForm {
	private function _Modelo() {
		$element = new \Phalcon\Forms\Element\Text("Modelo");
		$element->setLabel("Modelo");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 255
		]));
		return $element;
	}
	private function _Marca() {
		$element = new \Phalcon\Forms\Element\Numeric("Marca");
		$element->setLabel("Marca");
		return $element;
	}
	public function setFields() {
		$this->add($this->_Modelo());
		$this->add($this->_Marca());
	}
}

