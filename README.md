silverstripe-bootstrap-forms
============================

Allows the creation of forms compatible with the Twitter Bootstrap CSS framework in SilverStripe

## Basic Usage
Just use the "BootstrapForm" subclass instead of Form.
```php
<?php

$form = new BootstrapForm(
  $this,
  "MyBootstrapForm",
  new FieldList(
    Object::create("TextField","Name")
      ->addHelpText('Enter some text above')
  ),
  new FieldList(
    Object::create("FormAction","doStuff","Click this!")
      ->setStyle("success")
  )
);
```

### The "Kitchen Sink" example
The following example showcases all of the options available on BootstrapForm and the BootstrapFormField extensions.

```php
  public function FancyForm() {
		return Object::create("BootstrapForm",			
			$this,
			"FancyForm",
			new FieldList(
				Object::create("TextField","Text")->prependText("$")->appendText(".00"),
				Object::create("CheckboxSetField","InlineCheckboxes","Inline Checkboxes", DataList::create("SiteTree"))
					->setInline(true),
				Object::create("CheckboxSetField","Checkboxes","Checkboxes", DataList::create("SiteTree"))					
					->addHelpText("Check some of these."),
				Object::create("OptionsetField","InlineRadios","Inline Radios", DataList::create("SiteTree")->map('ID','Title'))
					->setInline(true),					

				Object::create("OptionsetField","Radios","Radios", DataList::create("SiteTree")->map('ID','Title'))					
					->addHelpText("Check one of these."),

				Object::create("DropdownField","Dropdown","Dropdown", DataList::create("SiteTree")->map('ID','Title'))
					->addInlineHelpText("<-- look at that!"),
				Object::create("TextareaField","Textarea","Textarea"),
				Object::create("TextField","BigText","Massive text field")
					->setSize("xxlarge"),

				Object::create("TextField","SmallText","Tiny text field")
					->setSize("mini")

			),
			new FieldList(
				Object::create("FormAction","yes","YES!")
					->setStyle("success"),
				Object::create("FormAction","no","NO!")
					->setStyle("danger"),
				Object::create("FormAction","maybe","Maybe...")
					->setStyle("info"),
				Object::create("FormAction","sure","Sure!")
					->setStyle("primary"),
				Object::create("FormAction","uhoh","Uh-oh")
					->setStyle("warning")



			)
		)
			->addWell()
			->setLayout("horizontal");
	}


```