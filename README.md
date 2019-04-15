silverstripe-bootstrap-forms
============================

Allows the creation of forms compatible with the Twitter Bootstrap CSS framework in SilverStripe 4.

## Basic Usage
Just use the "BootstrapForm" subclass instead of Form.
```php
<?php

$form = BootstrapForm::create(
  $this,
  "MyBootstrapForm",
  FieldList::create(
    TextField::create("Name")
      ->addHelpText('Enter some text above')
  ),
  FieldList::create(
    FormAction::create("doStuff","Click this!")
      ->setStyle("success")
  )
);
```

### Bonus form fields
* SimpleHtmlEditorField
* ChosenDropdownField
* ChosenListboxField
* Textarea with maxlength

### The "Kitchen Sink" example
The following example showcases all of the options available on BootstrapForm and the BootstrapFormField extensions.

```php
<?php
public function FancyForm()
{
    return BootstrapForm::create(
        Controller::curr(),
        "FancyForm",
        FieldList::create(
            TextField::create("ATextField", "A text field with prepended and appended text")
                ->prependText("$")
                ->appendText(".00"),
            CheckboxSetField::create("InlineCheckboxes", "Inline Checkboxes")
                ->setSource(DataList::create(SiteTree::class))
                ->setInline(true)
                ->setColumns([
                    'xs' => 12,
                    'sm' => 12,
                    'md' => 6,
                    'lg' => 3
                ]),
            CheckboxSetField::create("Checkboxes", "Checkboxes")
                ->setSource(DataList::create(SiteTree::class))
                ->addHelpText("Check some of these."),
            OptionsetField::create("InlineRadios", "Inline Radios")
                ->setSource(DataList::create(SiteTree::class)->map('ID', 'Title'))
                ->setInline(true)
                ->setColumns([
                    'xs' => 12,
                    'sm' => 12,
                    'md' => 6,
                    'lg' => 3
                ]),

            OptionsetField::create("Radios", "Radios")
                ->setSource(DataList::create(SiteTree::class)->map('ID', 'Title'))
                ->addHelpText("Check one of these."),

            DropdownField::create("Dropdown", "Dropdown")
                ->setSource(DataList::create(SiteTree::class)->map('ID', 'Title'))
                ->setSpan(9)
                ->addInlineHelpText("<-- look at that!"),
            TextareaField::create("Textarea", "Textarea"),
            TextField::create("BigText", "Massive text field")
                ->setSize("lg"),

            TextField::create("SmallText", "Tiny text field")
                ->setSize("sm")
                ->setSpan(9),

            SimpleHtmlEditorField::create("HTML", "HTML Editor")
                ->setButtons("bold,italic"),
            ChosenDropdownField::create("FancyDropdown", "Fancy dropdown")
                ->setSource(SiteTree::get()->map()),
            ChosenListboxField::create("ListboxSelect", "Fancy dropdown")
                ->setSource(SiteTree::get()->map()),
            TextareaField::create("MaxLengthTextarea", "Textarea with a maxlength")
                ->setAttribute('maxlength', 150)
        ),
        FieldList::create(
            FormAction::create("yes", "YES!")
                ->setStyle("success")
                ->setSpan(6)
                ->setSize('lg'),
            FormAction::create("no", "NO!")
                ->setStyle("danger")
                ->setSpan(7)
                ->setSize('sm'),
            FormAction::create("maybe", "Maybe...")
                ->setStyle("info"),
            FormAction::create("sure", "Sure!")
                ->setStyle("primary")
                ->setSpan(2),
            FormAction::create("uhoh", "Uh-oh")
                ->setStyle("warning")
        )
    )
        ->addWell()
        ->setLayout("horizontal");
}



```
