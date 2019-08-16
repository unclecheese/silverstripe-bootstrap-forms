<?php
namespace UncleCheese\BootstrapForms;

use SilverStripe\Core\Config\Config;
use SilverStripe\View\Requirements;
use SilverStripe\Forms\DropdownField;
use SilverStripe\i18n\i18n;

/**
 * Defines a FormField that uses the bootstrap-select JS plugin for making
 * dropdown fields nice.
 *
 */
class BootstrapDropdownField extends BootstrapFormField {



	/**
	 * Builds the form field, sets default attributes, and includes JS
	 *
	 * @param array $attributes The attributes to include on the formfield
	 * @return SSViewer
	 */
	public function FieldHolder($attributes = array ()) {
		if(!Config::inst()->get(BootstrapForm::class, 'bootstrap_select_included')) {
			$current_locale = i18n::get_locale();
			Requirements::javascript("unclecheese/bootstrap-forms: javascript/bootstrap-select/js/bootstrap-select.min.js");
			Requirements::javascript("unclecheese/bootstrap-forms: javascript/bootstrap-select/js/i18n/defaults-{$current_locale}.js");
			Requirements::css("unclecheese/bootstrap-forms: javascript/bootstrap-select/css/bootstrap-select.min.css");
		}
		$this->addExtraClass('selectpicker');
		return parent::FieldHolder($attributes);
	}

    /**
     * Sets the width of the text field to a pre-configured size. Options include:
     *  - sm
     *  - lg
     *
     * @param string $text The text to add
     * @return BootstrapTextField
     */
    public function setSize($size)
    {
        $s = trim(strtolower($size));
        return $this->owner->addExtraClass("input-{$s}");
    }


    /**
     * Sets the width of the text field to span grid columns
     *
     * @param string $span
     * @return BootstrapTextField
     */
    public function setSpan($span)
    {
        $s = trim(strtolower($span));
        return $this->owner->addExtraClass("col-sm-{$s}");
    }
}
