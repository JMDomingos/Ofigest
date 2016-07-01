<?php
//namespace Ofigest\Forms;

class IntervencoesForm {
	private function _IdManutencoes() {
		$element = new \Phalcon\Forms\Element\Numeric("IdManutencoes");
		$element->setLabel("IdManutencoes");
		return $element;
	}
	private function _IdTipoIntervencao() {
		$element = new \Phalcon\Forms\Element\Numeric("IdTipoIntervencao");
		$element->setLabel("IdTipoIntervencao");
		return $element;
	}
	private function _DescIntervencao() {
		$element = new \Phalcon\Forms\Element\Text("DescIntervencao");
		$element->setLabel("DescIntervencao");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 255
		]));
		return $element;
	}
	private function _DataIntervencao() {
		$element = new \Phalcon\Forms\Element\Text("DataIntervencao");
		$element->setLabel("DataIntervencao");
		return $element;
	}
	private function _CustoIntervencao() {
		$element = new \Phalcon\Forms\Element\Numeric("CustoIntervencao");
		$element->setLabel("CustoIntervencao");
		return $element;
	}
	public function setFields() {
		$this->add($this->_IdManutencoes());
		$this->add($this->_IdTipoIntervencao());
		$this->add($this->_DescIntervencao());
		$this->add($this->_DataIntervencao());
		$this->add($this->_CustoIntervencao());
	}
}

