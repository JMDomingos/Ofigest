<?php
//namespace Ofigest\Forms;

class MarcasForm {
	private function _Marca() {
		$element = new \Phalcon\Forms\Element\Text("Marca");
		$element->setLabel("Marca");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 45
		]));
		return $element;
	}
	public function setFields() {
		$this->add($this->_Marca());
	}
}

