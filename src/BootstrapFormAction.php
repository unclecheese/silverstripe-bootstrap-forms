<?php
namespace UncleCheese\BootstrapForms;

use SilverStripe\ORM\DataExtension;

/**
 * Creates a {@link FormAction} object that is compatible
 * with the Twitter Bootstrap CSS framework.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package bootstrap_forms
 */
class BootstrapFormAction extends DataExtension
{


    /**
     * Sets the style of button. Options include:
     *    - "success"
     *  - "danger"
     *  - "info"
     *  - "primary"
     *  - "warning"
     *  - "inverse"
     *
     * @param string $style
     * @return BootstrapFormAction
     */
    public function setStyle($style)
    {
        $this->owner->addExtraClass('btn-' . trim(strtolower($style)));
        return $this->owner;
    }


    /**
     * Sets the size of the button. Options include:
     *    - "large"
     *  - "small"
     *  - "mini"
     *
     * @param string $size
     * @return BootstrapFormAction
     */
    public function setSize($size)
    {
        $exists = preg_grep("/col-sm/", $this->owner->extraClasses);
        if (sizeof(preg_grep("/col-sm/", $this->owner->extraClasses)) === 0) {
            $this->setSpan(12);
        }
        $this->owner->addExtraClass(trim(strtolower('btn-' . $size)));
        return $this->owner;
    }

    /**
     * Sets the width of the text field to span grid columns
     *
     * @param string $span
     * @return BootstrapTextField
     */
    public function setSpan($span)
    {
        $s = trim(strtolower($span));
        $this->owner->addExtraClass("inline");
        $this->owner->removeExtraClass("col-sm-12");
        return $this->owner->addExtraClass("col-sm-{$s}");
    }


}
