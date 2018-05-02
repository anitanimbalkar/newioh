<?php defined('SYSPATH') or die('No direct script access.');
class Model_Masteraddress extends kohana_Ayushmanorm {
	protected $_table_name = 'masteraddress';
	public function getData($query, $column){
		$result = $this->where($column,'like',$query.'%')->order_by($column, 'ASC')
						->group_by($column)->find_all()->as_array();
		$arrayreturn = array();
		foreach($result as $data)
		{
			if(! empty($data->$column))
			{
				if (!in_array($data->$column,$arrayreturn))
				array_push($arrayreturn,trim(($data->$column)));
			}
		}
		return $arrayreturn;
	}
}