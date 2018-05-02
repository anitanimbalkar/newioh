<?php
Class helper_datagenerator {
	public $page;
	public $limit;
	public $sidx;
	public $sord;
	public $classname;	
	public $columns;
	public $data;
	public $groupby;

	function __construct($page=null,$limit=null,$sidx=null,$sord=null,$class=null,$columns=null,$whereclause=null,$groupby=null,$data=null)
	{		
		try
		{
			$this->page = $page;
			$this->limit = $limit;
			$this->sidx = $sidx;
			$this->sord = $sord;
			$this->classname = $class;
			$this->columns = $columns;
			$this->data = $data;
			$this->groupby = $groupby;
			$this->data = $this->convertdata($data);
		}	
		catch (Exception $e)
		{
			var_dump($e->getMessage());
		}
	}
	private function convertdata($data){
		$data = str_replace(']','',$data);
		$data = explode('[',$data );
		$keypair = array();
		$i = 0;
		foreach($data as $key){
			if($i != 0){
				$key = explode(':',$key);
				$keypair[$key[0]] = $key[1];
			}
			$i++;
		}
		return $keypair;
	}
	private function getquery($data,$templateName){
		$template = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/queries/queries.php');
		$query = $template[$templateName]['query'];
		$variable = $template[$templateName]['variables'];
		foreach($variable as $val)
		{
			if (array_key_exists($val , $data) == "true")//check for user given all required values.
			{	
				$$val = $data[$val]; 
				$query =str_replace ('$'.$val, $$val , $query );
			}
			else 
			{
				throw new Exception("Complete Information is not provided for sms ".$val);
			}
		}
		return $query;
	}
	public function executeQuery($data,$templateName){
		$query = $this->getquery($data,$templateName);
		$result = DB::query(Database::SELECT, $query.' ;')->execute()->as_array();
		return $result;
	}
	public function exportdata(){
		try{
			
			$query = "";
			$query = $this->getquery($this->data,$this->classname);
			

			$result = DB::query(Database::SELECT, $query.' ;')->execute()->as_array();
			
			$columns = $this->columns;
			
			if(!(strpos($columns, ',') === false ))
			{		
				$colarr = explode (",",$columns);
			
			}
			
			$res1 = array();
			array_push($res1,$colarr);
			foreach($result as $res) {		
				$s = array();
				for ($i=0;$i<sizeof($colarr);$i++  )
				{	
					array_push($s,str_replace('----',', ',preg_replace('/----/','',$res[$colarr[$i]],1)));
				}
				array_push($res1,$s);
			}
			return $res1;
			//return $result;
			
		}
		catch (Exception $e)
		{
			var_dump($e);
		}
	}
	public function getdata(){
		try{
			
			$query = "";
			$query = $this->getquery($this->data,$this->classname);
			//var_dump($query);
			//die();
			

			$page = $this->page;
			$limit = $this->limit;
			$result = DB::query(Database::SELECT, $query)->execute()->as_array();
			$count = count($result);
			
			$sidx = $this->sidx;
			if(!$sidx) $sidx =1; 
			if( $count > 0 && $limit > 0)
			{
				$total_pages = ceil($count/$limit);
			}
			else
			{
				$total_pages = 0;
			}
		
			if ($page > $total_pages) 
				$page=$total_pages;
			$start = $limit*$page - $limit;
		
			if($start <0) $start = 0;
			//$result = DB::query(Database::SELECT, $query)->LIMIT($limit)->offset($start)->execute()->as_array();
			$result = DB::query(Database::SELECT, $query.' limit '.$limit.' offset '.$start.' ;')->execute()->as_array();
			header("Content-type: text/xml;charset=utf-8");
			$s = "<?xml version='1.0' encoding='utf-8'?>";
			$s .=  "<rows>";
			$s .= "<page>".$page."</page>";
			$s .= "<total>".$total_pages."</total>";
			$s .= "<records>".$count."</records>";
			if(!(strpos($this->columns, ',') === false ))
			{		
				$colarr = explode (",",$this->columns);
			}

			foreach($result as $res) {
				for ($i=0;$i<sizeof($colarr);$i++  )
				{	
					
					if(!(strpos($colarr[$i],'[') === false))
					{
						
						$columntext = substr(trim( $colarr[$i]),1);
						
				
						$coltext = substr(trim($columntext), 0, -1);
						
						if(!(strpos($coltext,'{') === false))
						{
							$arrcoltext = explode('{',$coltext );
							if(!(strpos($arrcoltext[0],'(') === 0))
							{
								$imagesrc = substr(trim($arrcoltext[0]),1);
								$imagesrc = substr(trim($imagesrc),0,-1);
								$displaynm = "&lt;image height='20' style='position:centre' src=".$imagesrc."/&gt;";
							}
							else
							$displaynm = $arrcoltext[0];
							$url =  substr(trim($arrcoltext[1]), 0, -1);
							//echo $url;
						}
						else	
							$url = $coltext;
					
				
						if(!(strpos($url, '&') === false))
						{
							$url = str_replace('&','&amp;',$url );
						}
						//echo "after = ".$url;
						if(!(strpos($url, '<') === false ))
						{				
							$urlparts = explode ("<",$url);
							$urlfirstpart = $urlparts[0];
							///ayushman/cviewemr/index/?puid=<appointmentid>&docud=<docid>&role=pat
							$urltext = $urlfirstpart;
							//echo $urltext;
							for($j=1;$j<sizeof($urlparts);$j++)
							{
								$urlval = explode( ">", $urlparts[$j]);	
								$urltext = $urltext. $res[$urlval[0].$urlval[1]];	
							}
						}
						else
						{
							$urltext = $url ;							
						}					 		
					 	 if(!(empty ($url)))
							$s .= "<cell>&lt;a href= ". $urltext."  style='color: #0000FF;;font:bold;'&gt; ". $displaynm  ." &lt;/a&gt;</cell>";		
					}
					else
					{
						if($i===0)
						 $s .= "<row id='". $res[$colarr[$i]]."'>"; 				 
						$s .= "<cell>". $res[$colarr[$i]]."</cell>";
					}	
				 
				}
				$s .= "</row>";
			}
		
			$s .= "</rows>";
			return $s;
			
		}
		catch (Exception $e)
		{
			var_dump($e);
		}
	}
}
