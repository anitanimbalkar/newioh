<?php defined('SYSPATH') or die('No direct script access.');
class helper_Discount {
	public function getDiscount($pathologistid,$testid,$patientuserid)
	{
		$discount = 0;
		// Check if consumer is in some particular group
		$objPatient = ORM::factory("patient")
						->where("repatientsuserid_c","=",$patientuserid)
						->find();
		if($objPatient->id!=null)
		{	// Find discount group for the consumer
			$objDiscgrp = ORM::factory("discgrpmember")
						->where("refpatientsid_c","=",$objPatient->id)
						->where("active_c","=",1)
						->find();
			if($objDiscgrp->id != null)
			{
				// Attached to some group so check if separate discount for
				// this group present
				$testObj = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologistid)
						->where('refpathcatalogtestid_c','=',$testid)
						->where('refdiscgroupid_c','=',$objDiscgrp->refdiscgroupid_c)
						->find();
				if($testObj->id != null)
					return $testObj->discountpercent_c;
				else
				{
					// Find standard discount
					$testObj = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologistid)
						->where('refpathcatalogtestid_c','=',$testid)
						->where('refdiscgroupid_c','=',-1)->find();
					if($testObj->id != null)
						return $testObj->discountpercent_c;
					else
						return $discount;
				}				
			}
			else
			{
				// Search for standard discount			
				$testObj = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologistid)
							->where('refpathcatalogtestid_c','=',$testid)
							->where('refdiscgroupid_c','=',-1)->find();
				if($testObj->id != null)
					return $testObj->discountpercent_c;
				else
					return $discount;
			}
		}
	}
	/*public function getDiscount($pathologistid,$testid)
	{
		$discount = 0;
		$testObj = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$pathologistid)
						->where('refpathcatalogtestid_c','=',$testid)->find();
		if($testObj->id != null)
			return $testObj->discountpercent_c;
		else
			return $discount;
	}*/
}
