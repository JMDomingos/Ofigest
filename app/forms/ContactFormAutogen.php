<?php
//namespace Ofigest\Forms;

class ContactForm {
	private function _Name() {
		$element = new \Phalcon\Forms\Element\Text("Name");
		$element->setLabel("Name");
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
	private function _Comments() {
		$element = new \Phalcon\Forms\Element\Textarea("Comments");
		$element->setLabel("Comments");
		return $element;
	}
	private function _CreatedAt() {
		$element = new \Phalcon\Forms\Element\Numeric("CreatedAt");
		$element->setLabel("CreatedAt");
		return $element;
	}
	public function setFields() {
		$this->add($this->_Name());
		$this->add($this->_Email());
		$this->add($this->_Comments());
		$this->add($this->_CreatedAt());
	}
}

