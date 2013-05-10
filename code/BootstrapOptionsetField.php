<?php


/**
 * Creates a {@link OptionsetField} or a subclass thereof that is compatible with the
 * Twitter Bootstrap CSS framework.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package bootstrap_forms
 */
class BootstrapOptionsetField extends BootstrapFormField {


	/**
	 * Enable or disable "inline" presentation, in which
	 * buttons are laid out left to right, rather than top to bottom.
	 *
	 * @param boolean $bool
	 * @return BootstrapOptionsetField
	 */
	public function setInline($bool = true) {
		$this->owner->Inline = $bool;
		return $this->owner;
	}
}