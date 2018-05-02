<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Crudoperationscontroller extends Controller_Basewebservice {
	
	public function action_create()
	{
			$modelName = $_GET['model'];
			$request_body = file_get_contents('php://input');
			$recordsToBeCreated = json_decode($request_body);
			
			$arrayToBeReturned = array();
			// if there is more than one record to be created then $recordsToBeCreated is an array, otherwise it is an object
			if (is_array($recordsToBeCreated))
			{
				foreach($recordsToBeCreated as $res)
				{					
					$modelInstance = ORM::factory($modelName);				
					$arrayOfKeys = array_keys((array)$res);
					foreach($arrayOfKeys as $columnName)
					{
						if( $columnName != "id")
						{
							$modelInstance->$columnName=$res->$columnName;
						}
					}
					$clientId =$res->id;
					$returnedObj = $modelInstance->save();
					
					$temp=array();
					// Important NOTE : When more than one record is sent by client store for creation,
					// then we must add 'clientId' which had come from the client side with each record.
					// This helps the client side store to know whether which record (record that has come from the server side) belongs to which record in the store.
					$temp['clientId']="" . $clientId;
					foreach($arrayOfKeys as $columnName)
					{
						$temp[$columnName]="" . $returnedObj->$columnName;
					}			
					array_push($arrayToBeReturned,$temp);
				}
			}
			else
			{
				$modelInstance = ORM::factory($modelName);
				foreach($recordsToBeCreated as $key=>$value)
				{					
						if( $key != "id")
						{
							$modelInstance->$key=$value;
						}
						else
						{
							$clientId =$value;
						}					
				}	
				
				$returnedObj = $modelInstance->save();
			
				$temp=array();
				// Important NOTE : When more than one record is sent by client store for creation,
				// then we must add 'clientId' which had come from the client side with each record.
				// This helps the client side store to know whether which record (record that has come from the server side) belongs to which record in the store.
				$temp['clientId']="" . $clientId;
				foreach($recordsToBeCreated as $key=>$value)
				{
					$temp[$key]="" . $returnedObj->$key;
				}			
				array_push($arrayToBeReturned,$temp);
				
			}
			
			$this->content = $arrayToBeReturned;
	}
	
	public function action_read()
	{
		$modelName = $_GET['model'];			
		
		$modelInstance = ORM::factory($modelName);
		
			if ( !empty($_GET['filter']))
			{
				$filtersToApply = json_decode($_GET['filter']);
				$count = 0;
				foreach($filtersToApply as $res)
				{
					if($count == 0)
					{
						$modelInstance->where($res->property,'=',$res->value);
					}
					else
					{
						$modelInstance->and_where($res->property,'=',$res->value);
					}
					$count++;
				}
			}
			
			$modelObjectsArray = $modelInstance->find_all();
			
			$arrayOfColumns = ORM::factory($modelName)->table_columns();
			$arrayOfColumnNames = array_keys($arrayOfColumns);
			$arrayOfRecordsToReturn=array();
			
			foreach($modelObjectsArray as $result)
			{		
				$temp=array();
				foreach($arrayOfColumnNames as $columnName)
				{					
					$temp[$columnName]=$result->$columnName;
				}				
				array_push($arrayOfRecordsToReturn,$temp);
			}
			
		$this->content = $arrayOfRecordsToReturn;
		
	}
	
	/*
		This function updates the record or records which come in the request body.
		In the implementation of this function, we have assumed that each record to be updated will have 'id' field which is 
		considered as primary key for the table in the database. Based on this id, we first fetch the record using orm and then update that 
		fetched object with the values from the record to be updated. And then we are saving this orm object.
	*/
	public function action_update()
	{
			$modelName = $_GET['model'];
			$request_body = file_get_contents('php://input');
			$recordsToBeUpdated = json_decode($request_body);
			
			$arrayToBeReturned = array();
			// if there is more than one record to be updated then $recordsToBeUpdated is an array, otherwise it is an object
			if (is_array($recordsToBeUpdated))
			{
				foreach($recordsToBeUpdated as $res)
				{					
					$modelInstance = ORM::factory($modelName);
					$fetchedModelInstance = $modelInstance->where('id','=',$res->id)->find();
					$arrayOfKeys = array_keys((array)$res);
					foreach($arrayOfKeys as $columnName)
					{
						if( $columnName != "id")
						{
							$fetchedModelInstance->$columnName=$res->$columnName;
						}
					}
					$returnedObj = $fetchedModelInstance->save();
					
					$temp=array();					
					foreach($arrayOfKeys as $columnName)
					{
						$temp[$columnName]="" . $returnedObj->$columnName;
					}			
					array_push($arrayToBeReturned,$temp);
				}
			}
			else
			{
				$modelInstance = ORM::factory($modelName);
				$fetchedModelInstance = $modelInstance->find()->where('id','=',$recordsToBeUpdated->id)->find();
				foreach($recordsToBeUpdated as $key=>$value)
				{					
						if( $key != "id")
						{
							$fetchedModelInstance->$key=$value;
						}										
				}	
				
				$returnedObj = $fetchedModelInstance->save();
			
				$temp=array();
				foreach($recordsToBeUpdated as $key=>$value)
				{
					$temp[$key]="" . $returnedObj->$key;
				}			
				array_push($arrayToBeReturned,$temp);
				
			}
			
			$this->content = $arrayToBeReturned;
	}
	
	public function action_delete()
	{
			$modelName = $_GET['model'];
			$request_body = file_get_contents('php://input');
			$recordsToBeDeleted = json_decode($request_body);
			
			/*array that will contain the records those will be deleted succesfully.
			  This array should be sent back as a response so that client knows which records were deleted succesfully
			  so that accordingly client can take further action.
			 */
			$arrayToBeReturned = array();
			// if there is more than one record to be updated then $recordsToBeDeleted is an array, otherwise it is an object
			if (is_array($recordsToBeDeleted))
			{
				foreach($recordsToBeDeleted as $res)
				{					
					$modelInstance = ORM::factory($modelName);
					$fetchedModelInstance = $modelInstance->where('id','=',$res->id)->find();
					
					$fetchedModelInstance->delete();
					
					array_push($arrayToBeReturned,$res);
				}
			}
			else
			{
				$modelInstance = ORM::factory($modelName);
				$fetchedModelInstance = $modelInstance->where('id','=',$recordsToBeDeleted->id)->find();
				$fetchedModelInstance->delete();
				
				array_push($arrayToBeReturned,(array)$recordsToBeDeleted);
			}
			
			$this->content=$arrayToBeReturned;
	}
}