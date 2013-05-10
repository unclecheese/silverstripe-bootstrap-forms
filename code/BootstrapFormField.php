<?php

/**
 * The base class for creating a {@link FormField} object
 * that is compatible with the Twitter Bootstrap CSS framework.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package bootstrap_forms
 */
class BootstrapFormField extends DataExtension {


	/**
	 * @var array Attributes and values for the holder tag of the form field
	 */
	protected $holderAttributes = array();


	protected $holderClasses = array(
		"control-group"
	);


	/**
	 * Adds a HTML5 placeholder attribute to the form field
	 * 
	 * @param $text the placeholder text to add
	 * @return BootstrapFormField
	 */
	public function addPlaceholder($text) {
		return $this->owner->setAttribute("placeholder",$text);
	}

	
	/**
	 * Adds a block of help text to the form field. (HTML safe).
	 * By default, this text appears below a field and its label.
	 *
	 * @param string $text The text to add
	 * @return BootstrapFormField
	 */
	public function addHelpText($text) {
		$this->owner->HelpText = $text;
		return $this->owner;
	}



	/**
	 * Adds a line of inline help text to a form field (HTML safe).
	 * By default, this text appears to the right of a form field.
	 *
	 * @param string $text The text to add
	 * @return BootstrapFormField
	 */
	public function addInlineHelpText($text) {
		$this->owner->InlineHelpText = $text;
		return $this->owner;
	}



	/**
	 * Sets an attribute on the wrapper <div> for the formfield
	 *
	 * @param string $key The attribute name
	 * @param string $val The value for the attribute
	 *
	 * @return BootstrapFormField
	 */
	public function setHolderAttribute($key, $val) {
		$this->holderAttributes[$key] = $val;
		return $this->owner;
	}



	/**
	 * Returns the list of attributes suitable for an HTML tag
	 *
	 * @return string
	 */
	public function HolderAttributes() {
		$ret = "";
		foreach($this->holderAttributes as $k => $v) {
			$ret .= "$k=\"".Convert::raw2att($v)."\" ";
		}
		return $ret;
	}

	/**
	 * Allows adding custom classes to the holder 
	 * 
	 * @param string $class the class
	 * 
	 * @return BootstrapFormField
	 */
	public function addHolderClass($class) {
		$this->holderClasses[] = $class;
		return $this->owner;
	}

	/**
	 * returns the holder classes to be used in templates
	 * also triggers checking for error messages
	 * 
	 * @return string of classes
	 */
	public function HolderClasses() {
		$this->loadErrorMessage();
		return implode(" ",$this->holderClasses);
	}

	/**
	 * checks for error messages in owner form field
	 * adds error class to holder and loads error message as helptext
	 * 
	 * @todo allow setting error message as inline
	 */
	private function loadErrorMessage() {
		if($this->owner->message) {
			$this->addHolderClass("error");
			$this->addHelpText($this->owner->message);
		}
	}
	
}