<?php
//namespace Ofigest\Forms;

class ClientesVeiculosForm {
	private function _Data() {
		$element = new \Phalcon\Forms\Element\Text("Data");
		$element->setLabel("Data");
		return $element;
	}
	public function setFields() {
		$this->add($this->_Data());
	}
}

