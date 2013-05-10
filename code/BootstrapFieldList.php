<?php


class BootstrapFieldList extends Extension {


	public function bootstrapify() {
		foreach($this->owner as $f) {

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
}