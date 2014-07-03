<?php



class BootstrapUserForm extends Extension {



	public function updateForm($form) {
		$form->Fields()->bootstrapify();
		$form->Actions()->bootstrapify();
		$form->setTemplate("BootstrapForm");
	}

}