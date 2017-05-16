<?php

class TaxedProductDecorator extends DataExtension{

	function extraStatics($class = NULL, $extension = NULL){
		return array(
			'has_one' => array(
				'TaxClass' => 'TaxClass'
			)
		);
	}

	function updateCMSFields(FieldList $fields){
		if($taxclasses = DataObject::get("TaxClass","","\"Name\" ASC")){
			$fields->addFieldsToTab("Root.Content.Pricing", array(
				new DropdownField("TaxClass","Tax Class",$taxclasses->map('ID','Name'))
			));
		}
	}

	/*
	 //this is done using the modifier
	function updateSellingPrice(&$price){
		if($taxclass = $this->owner->TaxClass()){
			$price += $taxclass->getTax($price); //TODO: specify address
		}
	}
	*/

}
