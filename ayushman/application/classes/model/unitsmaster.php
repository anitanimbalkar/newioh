<?php defined('SYSPATH') or die('No direct script access.');
class Model_unitsmaster extends kohana_Ayushmanorm {
	protected $_table_name = 'unitsmasters';
	
		public function getallunits(){
		try{
				$responce=array();
				$unitsmasters=$this->find_all();
				if($unitsmasters){
					foreach($unitsmasters as $unit){
						if($unit->id!=0){
							$data['unitid']=$unit->id;
							$data['unitname']=$unit->unitname_c;
							array_push($responce,$data);
						}
					}
				}		
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}
	
}