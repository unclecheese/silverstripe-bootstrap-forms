<?php

namespace UncleCheese\BootstrapForms;

use SilverStripe\Control\Controller;
use SilverStripe\Security\LoginForm;
use SilverStripe\Security\MemberAuthenticator\MemberLoginForm;

class BootstrapMemberLoginForm extends MemberLoginForm {
	public function __construct(
        $controller,
        $authenticatorClass,
        $name,
        $fields = null,
        $actions = null,
        $checkCurrentUser = true
    ) {
		parent::__construct($controller, $authenticatorClass, $name, $fields, $actions, $checkCurrentUser);
		$this->Fields()->bootstrapify();
		$this->Actions()->bootstrapify();
		$this->setTemplate("BootstrapForm");

		$this->invokeWithExtensions('updateBoostrapMemberLoginForm', $this);
	}

}
