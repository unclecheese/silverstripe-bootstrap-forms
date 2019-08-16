<?php

namespace UncleCheese\BootstrapForms;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Core\Config\Config;
use SilverStripe\View\Requirements;

/**
 * Defines a FormField that uses the Chosen JS plugin for making
 * dropdown fields nice.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package bootstrap_forms
 */
class ChosenDropdownField extends DropdownField
{


    /**
     * @var int The number of items that need to appear in the dropdown
     *            in order to trigger a search bar
     */
    public static $default_search_threshold = 12;


    /**
     * Sets the search threshold for this dropdown
     *
     * @param int $num The number of items
     * @return ChosenDropdownField
     */
    public function setSearchThreshold($num)
    {
        return $this->setAttribute('data-search-threshold', $num);
    }


    /**
     * Builds the form field, sets default attributes, and includes JS
     *
     * @param array $attributes The attributes to include on the formfield
     * @return SSViewer
     */
    public function FieldHolder($attributes = [])
    {

        if (!Config::inst()->get(BootstrapForm::class, 'jquery_included')) {
            Requirements::javascript('silverstripe/admin: thirdparty/jquery/jquery.js');
        }

        Requirements::javascript("unclecheese/bootstrap-forms: javascript/chosen/chosen.jquery.js");
        Requirements::css("unclecheese/bootstrap-forms: javascript/chosen/chosen.css");

        $this->addExtraClass('chosen');
        if (!$this->getAttribute('data-search-threshold')) {
            $this->setSearchThreshold(self::$default_search_threshold);
        }
        return parent::FieldHolder($attributes);
    }
}
