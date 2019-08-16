<?php

namespace UncleCheese\BootstrapForms;

use Exception;

/**
 * Creates a {@link OptionsetField} or a subclass thereof that is compatible with the
 * Twitter Bootstrap CSS framework.
 *
 * @author Uncle Cheese <unclecheese@leftandmain.com>
 * @package bootstrap_forms
 */
class BootstrapCheckboxSetField extends BootstrapFormField
{

    /**
     * An array of column_name => span_length pairs.
     * @example
     * <code>
     * array (
     *    'xs' => 12,
     *    'sm' => 12,
     *    'md' => 6,
     *    'lg' => 3
     * )
     * </code>
     * @var array
     */
    protected $columnCounts = [];

    /**
     * True if fields should be displayed inline
     * @var bool
     */
    protected $inline = false;

    /**
     * Enable or disable "inline" presentation, in which
     * buttons are laid out left to right, rather than top to bottom.
     *
     * @param boolean $bool
     * @return BootstrapOptionsetField
     */
    public function setInline($bool = true)
    {
        $this->owner->inline = $bool;
        return $this->owner;
    }

    /**
     * return true if the field is set to be displayed inline
     *
     * @return Boolean
     */
    public function getInline() {
        if($this->owner->hasField('inline')){
            return $this->owner->inline;
        }
        return false;
    }

    /**
     * Sets the column layout for the options
     * @param array $cols An array of column_name => span_length pairs
     * @see  $columnCounts
     *
     * @return   OptionsetField
     */
    public function setColumns($cols)
    {
        if (!is_array($cols)) {
            throw new Exception("BootstrapOptionsetField::setColumns must be passed an array.");
        }

        $allowed_keys = ['lg', 'md', 'sm', 'xs'];
        $diff = array_diff($allowed_keys, array_keys($cols));
        if (!empty($diff)) {
            throw new Exception("BootstrapOptionsetField::setColumns must be passed an array with keys " . implode(', ',
                    $allowed_keys));
        }

        $this->owner->columnCounts = $cols;
        $this->setInline(true);

        return $this->owner;
    }


    /**
     * Tells whether this option set is using a columnar layout
     *
     * @return boolean
     */
    public function HasColumns()
    {
        return !empty($this->owner->columnCounts);
    }

    /**
     * A list of classes for the column divs
     *
     * @return  string
     */
    public function ColumnClasses()
    {
        $classes = [];
        foreach ($this->owner->columnCounts as $colName => $val) {
            $classes[] = "col-{$colName}-{$val}";
        }

        return implode(" ", $classes);
    }
}
