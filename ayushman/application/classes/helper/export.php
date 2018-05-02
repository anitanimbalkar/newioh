<?php defined('SYSPATH') or die('No direct script access.');
require DOCROOT.'application/classes/helper/php-export-data.class.php';
include_once(DOCROOT.'application/classes/helper/PHPExcel/IOFactory.php');
require_once(DOCROOT.'simple_html_dom.php');
class Export  {
	
	 public static  function csvtoexcel($csv_file, $xls_file, $csv_enc=null) { 
       try
		{//set cache 
        $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp; 
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod); 
         
        //open csv file 
        $objReader = new PHPExcel_Reader_CSV(); 
        if ($csv_enc != null) 
            $objReader->setInputEncoding($csv_enc); 
        $objPHPExcel = $objReader->load($csv_file); 
        $in_sheet = $objPHPExcel->getActiveSheet(); 

        //open excel file 
        $objPHPExcel = new PHPExcel(); 
        $out_sheet = $objPHPExcel->getActiveSheet(); 
         
        //row index start from 1 
        $row_index = 0; 
        foreach ($in_sheet->getRowIterator() as $row) { 
            $row_index++; 
            $cellIterator = $row->getCellIterator(); 
            $cellIterator->setIterateOnlyExistingCells(false); 
             
            //column index start from 0 
            $column_index = -1; 
            foreach ($cellIterator as $cell) { 
                $column_index++; 
                $out_sheet->setCellValueByColumnAndRow($column_index, $row_index, $cell->getValue()); 
            } 
        } 
         
        //write excel file 
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
        $objWriter->save($xls_file); 
		}catch(Exception $e){
		
			throw new Exception($e);
		}
	} 
	public static function toexcel($data,$filename)
	{
		$exporter = new ExportDataExcel('file', 'temp/'.$filename);
		$exporter->initialize();
		foreach($data as $res)
			$exporter->addRow($res); 
		$exporter->finalize();
		
		$name = $filename;
		$path = 'temp/'.$filename;
		$file = $path;
		header("Content-Disposition: attachment; filename=".$name."");   
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");            
		header("Content-Length: " . filesize($file));
		flush(); // this doesn't really matter.
		$fp = fopen($file, "r");
		while (!feof($fp))
		{
			echo fread($fp, 65536);
			flush(); // this is essential for large downloads
		} 
		fclose($fp); 
		
		exit();
	}
	
	public static function toxmlfortally($data,$filename) // data in xml format.
	{
		$path = 'temp/'.$filename;
		$array_template = Kohana::$config->load('tallytemplate');
		$content = array();
		$count = 0;
		
		foreach($data as $transaction){
			if($count > 0 ){
				if($transaction[0] == $transaction[5])
				{
					if($transaction[8] == $transaction[7]){
						continue;
					}
					$date = date('Ymd', strtotime($transaction[11]));
					$narration = $transaction[10];
					$reference = $transaction[3];
					$partyledgername = $transaction[5];
					$toledgername = $transaction[6];
					$toamount = $transaction[8];
					$fromledgername = $transaction[5];
					
					$str = $array_template["debitvoucher"];
					$str = str_replace('$date',$date,$str);
					$str =str_replace('$reference',$reference,$str);
					$str =str_replace('$partyledgername',$partyledgername,$str);
					$str =str_replace('$toledgername',$toledgername,$str);
					$str =str_replace('$toamount',$toamount,$str);
					$str =str_replace('$fromledgername',$fromledgername,$str);
					$str =str_replace('$narration',$narration,$str);
					array_push($content,$str);
				}
				/*else if($transaction[0] == $transaction[6]){
					$date = date('Ymd', strtotime($transaction[11]));
					$narration = $transaction[10];
					$reference = $transaction[3];
					$partyledgername = $transaction[6];
					$toledgername = $transaction[6];
					$toamount = $transaction[7];
					$fromledgername = $transaction[5];
					
					$str = $array_template["creditvoucher"];
					$str = str_replace('$date',$date,$str);
					$str =str_replace('$reference',$reference,$str);
					$str =str_replace('$partyledgername',$partyledgername,$str);
					$str =str_replace('$toledgername',$toledgername,$str);
					$str =str_replace('$toamount',$toamount,$str);
					$str =str_replace('$fromledgername',$fromledgername,$str);
					$str =str_replace('$narration',$narration,$str);
					array_push($content,$str);
				}*/
			}
			$count++;
		}
		$str = '';
		foreach($content as $data){
			$str .= $data;
		}
		header("Content-Disposition: attachment; filename=".$filename."");   
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");  
		echo $str;
		die;

		
		exit();
	}
	public static function toxmlregfortally($data,$filename) // data in xml format.
	{
		$path = 'temp/'.$filename;
		$array_template = Kohana::$config->load('tallytemplate');
		$content = array();
		$count = 0;
		foreach($data as $registration){
			if($count > 0 ){
				$name = $registration[1] == '' ? 'temp' : $registration[1];
				$address = $registration[6];
				$email = $registration[3];
				$state = 'Maharashtra';
				$pin = '411027';
				
				$userid = orm::factory('billingaccount')->where('accountcode_c','=',$registration[2])->find()->refaccountuserid_c;
				$obj_user = orm::factory('user')->where('id','=',$userid)->find();
				$urole = '';
				if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
						$urole = 'Doctors';
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
						$urole = 'Individual Consumer';
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
						$urole = 'Chemists';
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
						$urole = 'Diagnostic Labs';
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
						$urole = 'Receptionists';
				else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
						$urole = 'Corporates';
				
				$parent = $urole;
				$phone = $registration[4];
				$accountid = $registration[2];
				$sortposition = 0;
				$openingbalance = 0;
				
				$str = $array_template["master"];
				$str = str_replace('$name',$name,$str);
				$str =str_replace('$address',$address,$str);
				$str =str_replace('$email',$email,$str);
				$str =str_replace('$state',$state,$str);
				$str =str_replace('$pin',$pin,$str);
				$str =str_replace('$parent',$parent,$str);
				$str =str_replace('$phone',$phone,$str);
				$str =str_replace('$accountid',$accountid,$str);
				$str =str_replace('$sortposition',$sortposition,$str);
				$str =str_replace('$openingbalance',$openingbalance,$str);
				array_push($content,$str);
			}
			$count++;
		}
		$str = '';
		foreach($content as $data){
			$str .= $data;
		}
		header("Content-Disposition: attachment; filename=".$filename."");   
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");  
		echo $str;
		exit();
	}
	public static function topdf($data,$pdfname,$template)
	{
		$arr_wk = Kohana::$config->load('application');
				
		$data = str_replace('?', '&bull;', $data);
		$data = str_replace('?', '&rarr;', $data);
		$html 	= new simple_html_dom();
		$html->load_file(DOCROOT."application/views/vtemplates/".$template);
		$labels = $html->find('label');
		
		foreach($labels as $label) {
			if(isset($data[$label->id])){
				$label->innertext  = $data[$label->id];
				$parent = $label->parent;
				if($parent->tag == 'div' && $label->innertext != '')
					$parent->attr['style'] = $parent->attr['style'].';display:block;';
			}
		}
		
		foreach($html->find('img') as $image) {
			$image->src = $_SERVER['DOCUMENT_ROOT'].$data['imgpatientphoto'];
		} 
		
		$array_files = Kohana::$config->load('application');
		
		$html->save($array_files['temp'].$pdfname.'.html');
		
		if(isset($_SERVER['HTTP_HOST'])){
			exec($arr_wk['wkhtmltopdfpath'].'  "'.$array_files['temp'].$pdfname.'.html" "'.$array_files['temp'].$pdfname.'.pdf"',$op);
		}else{
			exec($arr_wk['wkhtmltopdfpath'].'  "file://'.$array_files['temp'].$pdfname.'.html" "'.$array_files['temp'].$pdfname.'.pdf"',$op);
		}
		return $array_files['temp'].$pdfname.'.pdf';
	}
	private static function array_to_xml($array, $level=1) {
        $xml = '';
		if ($level==1) {
			$xml .= '<?xml version="1.0" encoding="ISO-8859-1"?>'.
					"\n<array>\n";
		}
		foreach ($array as $key=>$value) {
			$key = strtolower($key);
			if (is_array($value)) {
				$multi_tags = false;
				foreach($value as $key2=>$value2) {
					if (is_array($value2)) {
						$xml .= str_repeat("\t",$level)."<$key>\n";
						$xml .= array_to_xml($value2, $level+1);
						$xml .= str_repeat("\t",$level)."</$key>\n";
						$multi_tags = true;
					} else {
						if (trim($value2)!='') {
							if (htmlspecialchars($value2)!=$value2) {
								$xml .= str_repeat("\t",$level).
										"<$key><![CDATA[$value2]]>".
										"</$key>\n";
							} else {
								$xml .= str_repeat("\t",$level).
										"<$key>$value2</$key>\n";
							}
						}
						$multi_tags = true;
					}
				}
				if (!$multi_tags and count($value)>0) {
					$xml .= str_repeat("\t",$level)."<$key>\n";
					$xml .= array_to_xml($value, $level+1);
					$xml .= str_repeat("\t",$level)."</$key>\n";
				}
			} else {
				if (trim($value)!='') {
					if (htmlspecialchars($value)!=$value) {
						$xml .= str_repeat("\t",$level)."<$key>".
								"<![CDATA[$value]]></$key>\n";
					} else {
						$xml .= str_repeat("\t",$level).
								"<$key>$value</$key>\n";
					}
				}
			}
		}
		if ($level==1) {
			$xml .= "</array>\n";
		}
		return $xml;
	}
}
