<?php



class BootstrapFieldList extends Extension {

	/**
	 * A list of ignored fields that should not take on Bootstrap transforms
	 * @var array
	 */
	protected $ignores = array ();

	/**
	 * Transforms all fields in the FieldList to use Bootstrap templates
	 * @return FieldList
	 */
	public function bootstrapify() {		
		foreach($this->owner as $f) {

			if(isset($this->ignores[$f->getName()])) continue;

			// If we have a Tabset, bootstrapify all Tabs
			if($f instanceof TabSet) {
				$f->Tabs()->bootstrapify();
			}

			// If we have a Tab, bootstrapify all its Fields
			if($f instanceof Tab) {
				$f->Fields()->bootstrapify();
			}

			$template = "Bootstrap{$f->class}_holder";			
			if(SSViewer::hasTemplate($template)) {					
				$f->setFieldHolderTemplate($template);				
			}
			else {				
				$f->setFieldHolderTemplate("BootstrapFieldHolder");
			}

			foreach(array_reverse(ClassInfo::ancestry($f)) as $className) {						
				$bootstrapCandidate = "Bootstrap{$className}";
				$nativeCandidate = $className;
				if(SSViewer::hasTemplate($bootstrapCandidate)) {
					$f->setTemplate($bootstrapCandidate);
					break;
				}
				elseif(SSViewer::hasTemplate($nativeCandidate)) {
					$f->setTemplate($nativeCandidate);
					break;
				}


			}
		}

		return $this->owner;		
	}

	/**
	 * Adds this field as ignored. Should not take on boostrap transformation
	 * 
	 * @param  string $field The name of the form field
	 * @return FieldList
	 */
	public function bootstrapIgnore($field) {
		$this->ignores[$field] = true;

		return $this->owner;
	}
}