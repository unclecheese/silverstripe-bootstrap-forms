<?php


class BootstrapFieldList extends Extension {


	protected $ignores = array ();


	public function bootstrapify() {
		$inline_fields = Config::inst()->get('BootstrapForm','inline_fields');

		foreach($this->owner as $f) {


			if(isset($this->ignores[$f->getName()])) continue;

			if($f instanceof CompositeField) {
				$f->getChildren()->bootstrapify();
				continue;
			}

			if(!in_array($f->class, $inline_fields )) {
				$f->addExtraClass('form-control');
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



	public function bootstrapIgnore($field) {
		$this->ignores[$field] = true;

		return $this->owner;
	}
}
