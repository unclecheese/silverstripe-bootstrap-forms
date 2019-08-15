<?php

namespace UncleCheese\BootstrapForms;

use SilverStripe\Control\Controller;
use SilverStripe\Security\LoginForm;
use SilverStripe\Security\MemberAuthenticator\MemberLoginForm;

class BootstrapMemberLoginForm extends MemberLoginForm {


	public function __construct($controller = null, $name = null, $fields = null, $actions = null, $checkCurrentUser = true) {
		if(!$controller) $controller = Controller::curr();
		if(!$name) $name = LoginForm::class;
		parent::__construct($controller, $name, $fields, $actions, $checkCurrentUser);
		$this->Fields()->bootstrapify();
		$this->Actions()->bootstrapify();
		$this->setTemplate("BootstrapForm");

		$this->invokeWithExtensions('updateBoostrapMemberLoginForm', $this);
	}

}