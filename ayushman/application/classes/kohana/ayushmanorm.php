<?php defined('SYSPATH') or die('No direct script access.');

class kohana_Ayushmanorm extends ORM {
	
	public function findAll()
	{
		$tableName = $this->_table_name;
		//$db = Database::instance(); 
		//$count = $db->count_records($tableName);
		
		//if($count == 0)
		//{
	//		throw new Exception ("No Records in table $tableName");
		//}
		
		return parent::find_all();
	}
	
	public function mustFindAll()
	{
		$objRecord = $this->findAll();
		
		if($objRecord == NULL)
		{
			throw new Exception ("Record Not Found");
		}
		
		return $objRecord;
	}
	
	public function find()
	{
		$tableName = $this->_table_name;
		
		/* commented by anand - Reason : -  if patient selecting plan first time then billingindividualplans table will not contain records. 
											At that time, function should not throw an error. If exception is thrown, user will never be able to select a plan. */
		
		// $db = Database::instance();
		// $count = $db->count_records($tableName);
		
		// if($count == 0)
		// {
			// throw new Exception ("No Records in table $tableName");
		// }
		
		return parent::find();
	}
	
	public function mustFind()
	{
		
		$objRecord = $this->find();
		
		if(! $objRecord->loaded())
		{
			//throw new Exception ("Record Not Found");
		}
		
		return $objRecord;
	}

	public function saveRecord($arrData = NULL)
	{
		$columns = $this->list_columns();
		foreach($columns as $key => $value)
		{
			if(isset($arrData[$key])){
				$this->$key = $arrData[$key];
			}
		}
		$objUser=Auth::instance()->get_user();

		if(isset($this->id))
		{
			//update orm query.	
			$arrData['editedon_c']= date('Y-m-d g:i:s a');
			if($objUser)
			{
				$arrData['editedby_c']=$objUser->id;
			}
		}
		else
		{
			//Insert orm Query
			$arrData['createdon_c']= date('Y-m-d g:i:s a');
			if($objUser)
			{
				$arrData['createdby_c']=$objUser->id;
			}
		}   
		$return = $this->values($arrData)->save();
		return $return;
	}
	public function saveValues($arrData = NULL)
	{
		$objUser=Auth::instance()->get_user();

		if(isset($this->id))
		{
			//update orm query.	
			$arrData['editedon_c']= date('Y-m-d g:i:s a');
			if($objUser)
			{
				$arrData['editedby_c']=$objUser->id;
			}
		}
		else
		{
			//Insert orm Query
			$arrData['createdon_c']= date('Y-m-d g:i:s a');
			if($objUser)
			{
				$arrData['createdby_c']=$objUser->id;
			}
		}   
		$return = $this->values($arrData)->save();
		return $return;
	}
	
	public function save(Validation $validation = NULL)
	{
		$objUser=Auth::instance()->get_user();
		if(isset($this->id))
		{
			//update orm query.	
			$this->editedon_c= date('Y-m-d g:i:s a');
			if($objUser)
			{
				$this->editedby_c=$objUser->id;
			}
		}
		else
		{
			//Insert orm Query
			$this->createdon_c= date('Y-m-d g:i:s a');
			if($objUser)
			{
				$this->createdby_c=$objUser->id;
			}
		}   
	                 
																								
		$return = parent::save();
		return $return;
	}
	
}
