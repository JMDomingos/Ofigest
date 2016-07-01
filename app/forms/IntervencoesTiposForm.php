<?php
//namespace Ofigest\Forms;

class IntervencoesTiposForm {
	private function _DescTipoIntervencao() {
		$element = new \Phalcon\Forms\Element\Text("DescTipoIntervencao");
		$element->setLabel("DescTipoIntervencao");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 100
		]));
		return $element;
	}
	public function setFields() {
		$this->add($this->_DescTipoIntervencao());
	}
}

