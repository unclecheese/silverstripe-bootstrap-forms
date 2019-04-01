<?php

namespace UncleCheese\BootstrapForms;

use SilverStripe\Security\MemberAuthenticator\MemberLoginForm;
use SilverStripe\Control\Controller;

class BootstrapMemberLoginForm extends MemberLoginForm
{


    public function __construct(
        $controller,
        $authenticator,
        $name,
        $fields = null,
        $actions = null,
        $checkCurrentUser = true
    ) {
        if (!$controller) {
            $controller = Controller::curr();
        }
        if (!$name) {
            $name = "LoginForm";
        }
        parent::__construct($controller, $authenticator, $name, $fields, $actions, $checkCurrentUser);
        $this->Fields()->bootstrapify();
        $this->Actions()->bootstrapify();
        $this->setTemplate("BootstrapForm");
    }

}
