<?php

class SimpleHtmlEditorField extends TextareaField {
	

	public static $default_buttons = "bold,italic,bullist,link,formatselect";



	public static $default_blockformats = "p,h3,h4";



	public function setButtons($buttons) {
		return $this->setAttribute('data-buttons', $buttons);		
	}
	


	public function setBlockFormats($formats) {
		return $this->setAttribute('data-blockformats', $formats);		
	}



	public function setCSS($css) {
		return $this->setAttribute('data-css', $css);		
	}



	public function FieldHolder($attributes = array ()) {
		Requirements::javascript("bootstrap_forms/javascript/tinymce/jscripts/tiny_mce/jquery.tinymce.js");
    	Requirements::javascript("bootstrap_forms/javascript/tinymce/jscripts/tiny_mce/tiny_mce.js");		
    	if(!$this->getAttribute('data-buttons')) {
    		$this->setButtons(self::$default_buttons);
    	}
    	if(!$this->getAttribute('data-blockformats')) {
    		$this->setBlockFormats(self::$default_blockformats);
    	}
		$this->addExtraClass('wysiwyg');
		return parent::FieldHolder($attributes);
	}

}