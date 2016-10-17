<?php

/**
 * Defines a FormField that uses the bootstrap-select JS plugin for making
 * dropdown fields nice.
 *
 */
class BootstrapDropdownField extends DropdownField {



	/**
	 * Builds the form field, sets default attributes, and includes JS
	 *
	 * @param array $attributes The attributes to include on the formfield
	 * @return SSViewer
	 */
	public function FieldHolder($attributes = array ()) {
		if(!Config::inst()->get('BootstrapForm', 'bootstrap_select_included')) {
			$current_locale = (class_exists('Translatable')) ? Translatable::get_current_locale() : i18n::get_locale();
			Requirements::javascript(BOOTSTRAP_FORMS_DIR."/javascript/bootstrap-select/js/bootstrap-select.min.js");
			Requirements::javascript(BOOTSTRAP_FORMS_DIR."/javascript/bootstrap-select/js/i18n/defaults-{$current_locale}.js");
			Requirements::css(BOOTSTRAP_FORMS_DIR."/javascript/bootstrap-select/css/bootstrap-select.min.css");
		}
		$this->addExtraClass('selectpicker');
		return parent::FieldHolder($attributes);
	}
}