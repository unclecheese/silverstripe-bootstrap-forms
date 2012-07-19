<?php

/**
 * Builds a form that renders {@link FormField} objects
 * using templates that are compatible with Twitter Bootstrap.
 * Extra methods are decorated on to the {@link BootstrapFormField}
 * objects and their subclasses to support special features
 * of the framework.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package boostrap_forms
 */
class BootstrapForm extends Form {
	
	
	/**
	 * @var bool If true, the Bootstrap CSS will not be included in order
	 *			to avoid collisions
	 */
	protected static $bootstrap_included = false;



	/**
	 * @var bool If true, jQuery will not be included in order
	 *			to avoid collisions
	 */
	protected static $jquery_included = false;




	/**
	 * @var string The template that will render this form
	 */
	protected $template = "BootstrapForm";



	/**
	 * @var string The layout of the form.
	 * @see BootstrapForm::setLayout()
	 */
	protected $formLayout = "vertical";




	/**
	 * Sets form to disable/enable inclusion of Bootstrap CSS
	 *
	 * @param bool $bool
	 */
	public static function set_bootstrap_included($bool = true) {
		self::$bootstrap_included = $bool;
	}




	/**
	 * Sets form to disable/enable inclusion of jQuery
	 *
	 * @param bool $bool
	 */
	public static function set_jquery_included($bool = true) {
		self::$jquery_included = $bool;
	}


	/**
	 * Changes the templates of all the {@link FormField}
	 * objects in a given {@link FieldList} object to those
	 * that work the Bootstrap framework
	 *
	 * @param FieldList $fields
	 */
	public static function apply_bootstrap_to_fieldlist($fields) {
		foreach($fields as $f) {
			$template = "Bootstrap{$f->class}_holder";			
			if(SSViewer::hasTemplate($template)) {					
				$f->setFieldHolderTemplate($template);				
			}
			else {				
				$f->setFieldHolderTemplate("BootstrapFieldHolder");
			}

			foreach(array_reverse(ClassInfo::ancestry($f)) as $className) {						
				$bootstrapCandidate = "Bootstrap{$className}";
				$nativeCandidate = $className;
				if(SSViewer::hasTemplate($bootstrapCandidate)) {
					$f->setTemplate($bootstrapCandidate);
					break;
				}
				elseif(SSViewer::hasTemplate($nativeCandidate)) {
					$f->setTemplate($nativeCandidate);
					break;
				}
			}
		}		
	}




	/**
	 * Applies the Bootstrap transformation to the fields and actiosn
	 * of the form
	 *
	 * @return BootstrapForm
	 */
	public function applyBootstrap() {
		$this->applyBootstrapToFieldList($this->Fields());
		$this->applyBootstrapToFieldList($this->Actions());
		return $this;
	}



	/**
	 * Changes the templates of all the {@link FormField}
	 * objects in a given {@link FieldList} object to those
	 * that work the Bootstrap framework
	 *
	 * @param FieldList $fields
	 * @return BootstrapForm
	 */
	protected function applyBootstrapToFieldList($fields) {
		self::apply_bootstrap_to_fieldlist($fields);
		return $this;
	}



	/**
	 * Sets the desired layout of the form. Options include:
	 *		- "vertical" (default)
	 *		- "horizontal"
	 *		- "inline"
	 *		- "search"
	 *
	 * @todo Add template support for "inline"
	 * @param string $layout The desired layout to use
	 * @return BootstrapForm
	 */
	public function setLayout($layout) {
		$this->formLayout = trim(strtolower($layout));
		return $this;
	}



	/**
	 * Adds a "well," or sunken background and border, to the form
	 *
	 * @return BootstrapForm
	 */
	public function addWell() {
		return $this->addExtraClass("well");
	}



	/**
	 * Includes the dependency if necessary, applies the Bootstrap templates,
	 * and renders the form HTML output
	 *
	 * @return string
	 */
	public function forTemplate() {
		if(!$this->stat('bootstrap_included')) {
			Requirements::css('bootstrap_forms/css/bootstrap.css');
		}
		if(!$this->stat('jquery_included')) {
			Requirements::javascript(THIRDPARTY_DIR."/jquery/jquery.js");
		}
		Requirements::javascript("bootstrap_forms/javascript/bootstrap_forms.js");
		$this->addExtraClass("form-{$this->formLayout}");
		$this->applyBootstrap();
		return parent::forTemplate();
	}




}