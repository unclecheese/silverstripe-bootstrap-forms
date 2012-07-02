<?php


class ChosenDropdownField extends DropdownField {

	public static $default_search_threshold = 12;



	public function setSearchThreshold($num) {
		return $this->setAttribute('data-search-threshold', $num);		
	}



	public function FieldHolder($attributes = array ()) {
		Requirements::javascript(FRAMEWORK_DIR."/admin/thirdparty/chosen/chosen/chosen.jquery.js");
		Requirements::css(FRAMEWORK_DIR."/admin/thirdparty/chosen/chosen/chosen.css");
		$this->addExtraClass('chosen');
		if(!$this->getAttribute('data-search-threshold')) {
			$this->setSearchThreshold(self::$default_search_threshold);
		}
		return parent::FieldHolder($attributes);
	}
}