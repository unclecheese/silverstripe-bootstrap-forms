<?php

class BootstrapDropdownField extends DropdownField {
	protected $optionsList;

	public function __construct($name, $title = NULL, $options = array(), $value = NULL) {
		parent::__construct($name, $title, $value);
		$this->optionsList = $options;

		return $this;
	}

	public function setOptions($opts) {
		$this->optionsList = $opts;

		return $this;
	}

	public function getOptions() {
		$options = ArrayList::create();
		$selectedValue = $this->Value();
		foreach ($this->optionsList as $val => $label) {
			$isSelected = $selectedValue == (string) $val;
			$options->push(ArrayData::create(array(
				'Label' => $label,
				'Value' => $val,
				'Selected' => $isSelected
			)));
		}

		return $options;
	}

	public function Field($attributes = array()) {
		Requirements::javascript(BOOTSTRAP_FORMS_DIR . "/javascript/bootstrap_forms.js");

		return $this->renderWith('BootstrapDropdownField');
	}
}