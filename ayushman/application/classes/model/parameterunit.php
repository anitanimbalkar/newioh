<?php defined('SYSPATH') or die('No direct script access.');
class Model_parameterunit extends kohana_Ayushmanorm {
	protected $_table_name = 'parameterunits';	

	public function getparameterunits($parameterid){
		try{
				$responce=array();
				$parameterunits=$this->where('refparameterid_c','=',$parameterid)->find_all();
				if(sizeof($parameterunits) > 0){
					foreach($parameterunits as $unit){
						$unitmaster=ORM::factory('unitsmaster')->where('id','=',$unit->refunitmasterid_c)->where('active_c','=','1')->find();
						if($unitmaster->id){
							$objunit=array();
							$objunit['unitid']=$unitmaster->id;
							$objunit['unitname']=$unitmaster->unitname_c;
							array_push($responce,$objunit);
						}	
					}
				}
				else
				{
					// If no units attached then by default 
					// unit = 1 which is N/A is attached 
					$unitmaster=ORM::factory('unitsmaster')->where('id','=',1)->where('active_c','=','1')->find();
					if($unitmaster->id){
						$objunit=array();
						$objunit['unitid']=$unitmaster->id;
						$objunit['unitname']=$unitmaster->unitname_c;
						array_push($responce,$objunit);
					}	
				}
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}	
}