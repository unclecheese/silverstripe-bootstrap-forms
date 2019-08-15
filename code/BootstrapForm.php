<?php

use SilverStripe\Core\Config\Config;
use SilverStripe\View\Requirements;
use SilverStripe\Forms\Form;

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
	 * @var string The template that will render this form
	 */
	protected $template = "BootstrapForm";



	/**
	 * @var string The layout of the form.
	 * @see BootstrapForm::setLayout()
	 */
	protected $formLayout = "vertical";


    /**
     * The label grid class for the bootstrap 3 horizontal form
     *
     * @var String
     */
    protected $gridLabelClass = "col-sm-3";


    /**
     * The input grid class for the bootstrap 3 horizontal form
     *
     * @var String
     */
    protected $gridInputClass = "col-sm-9";

    /**
     * The Action grid class for the bootstrap 3 horizontal form
     *
     * @var String
     */
    protected $gridActionClass = "col-sm-offset-3 col-sm-9";



	/**
	 * Sets form to disable/enable inclusion of Bootstrap CSS
	 *
	 * @deprecated In 3.1
	 * @param bool $bool
	 */
	public static function set_bootstrap_included($bool = true) {
		Config::inst()->update("BootstrapForm", "bootstrap_included", $bool);
	}




	/**
	 * Sets form to disable/enable inclusion of jQuery
	 *
	 * @deprecated In 3.1
	 * @param bool $bool
	 */
	public static function set_jquery_included($bool = true) {
		Config::inst()->update("BootstrapForm", "jquery_included", $bool);
	}


	/**
	 * Sets form to disable/enable inclusion of bootstrap forms js
	 *
	 * @deprecated In 3.1
	 * @param bool $bool
	 */
	public static function set_bootstrap_form_included($bool = true) {
		Config::inst()->update("BootstrapForm", "bootstrap_form_included", $bool);
	}


	/**
	 * Applies the Bootstrap transformation to the fields and actiosn
	 * of the form
	 *
	 * @return BootstrapForm
	 */
	public function applyBootstrap() {
		$this->Fields()->bootstrapify();
		$this->Actions()->bootstrapify();

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
     * Sets the desired label Grid Class of the form. Options include:
     *		- "col-sm-3" (default)
     *		- "col-sm-4"
     * 		etc..
     *
     * @param String
     * @return BootstrapForm
     */
    public function setGridLabelClass($class) {
        $this->gridLabelClass = strtolower($class);
        return $this;
    }


    /**
     * Sets the desired Input Grid Class of the form. Options include:
     *		- "col-sm-9" (default)
     *		- "col-sm-8"
     * 		etc..
     *
     * @param String
     * @return BootstrapForm
     */
    public function setGridInputClass($class) {
        $this->gridInputClass = strtolower($class);
        return $this;
    }


    /**
     * Sets the desired Action Grid Class of the form. Options include:
     *		- "col-sm-offset-3 col-sm-9" (default)
     *		- "col-sm-offset-2 col-sm-10"
     * 		etc..
     *
     * @param String
     * @return BootstrapForm
     */
    public function setGridActionClass($class) {
        $this->gridActionClass = strtolower($class);
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
        if($this->stat('bootstrap_included')!=false) {
            Requirements::css(BOOTSTRAP_FORMS_DIR.'/css/bootstrap.css');
		}
		if($this->stat('jquery_included')!=false) {
			Requirements::javascript(THIRDPARTY_DIR."/jquery/jquery.js");
		}
		if(!$this->stat('bootstrap_form_included')!=false) {
			Requirements::javascript(BOOTSTRAP_FORMS_DIR."/javascript/bootstrap_forms.js");
		}
		$this->addExtraClass("form-{$this->formLayout}");

		$this->applyBootstrap();

		return parent::forTemplate();
	}




}
