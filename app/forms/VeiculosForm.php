<?php
//namespace Ofigest\Forms;

class VeiculosForm {
	private function _Modelo() {
		$element = new \Phalcon\Forms\Element\Numeric("Modelo");
		$element->setLabel("Modelo");
		return $element;
	}
	private function _NQuadro() {
		$element = new \Phalcon\Forms\Element\Text("NQuadro");
		$element->setLabel("NQuadro");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 45
		]));
		return $element;
	}
	private function _Ano() {
		$element = new \Phalcon\Forms\Element\Numeric("Ano");
		$element->setLabel("Ano");
		return $element;
	}
	private function _Mes() {
		$element = new \Phalcon\Forms\Element\Numeric("Mes");
		$element->setLabel("Mes");
		return $element;
	}
	private function _Cor() {
		$element = new \Phalcon\Forms\Element\Text("Cor");
		$element->setLabel("Cor");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 45
		]));
		return $element;
	}
	private function _TamanhoPneus() {
		$element = new \Phalcon\Forms\Element\Text("TamanhoPneus");
		$element->setLabel("TamanhoPneus");
		$element->addValidator(new \Phalcon\Validation\Validator\StringLength([
			"max" => 45
		]));
		return $element;
	}
	public function setFields() {
		$this->add($this->_Modelo());
		$this->add($this->_NQuadro());
		$this->add($this->_Ano());
		$this->add($this->_Mes());
		$this->add($this->_Cor());
		$this->add($this->_TamanhoPneus());
	}
}

