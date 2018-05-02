<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/PHPExcel/IOFactory.php');
class helper_Import  {
	
	public static function excel($inputFileName)
	{
		try {
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		return $sheetData;
	}
	public static function exceltoKeyVal($inputFileName)
	{
		try {
			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		return $sheetData;
	}
	public static function Validatexml($xmlfile)
	{
		error_reporting(E_ALL);

		ini_set('include_path', DOCROOT.'Documents/zip/');
		$xsdfile = DOCROOT.'Documents/xml/example.xsd';
		libxml_use_internal_errors(true);
		$feed = new DOMDocument();
		$feed->preserveWhitespace = false;
		$result = $feed->load($xmlfile);
		if($result === TRUE) 
		{

		} 
		else 				{
			$msg= "Document is not well formed\n";
		}
		if(@($feed->schemaValidate($xsdfile))) 
		{
			
		} 
		else 
		{
			$msg= "! Document is not valid:\n";
			$errors = libxml_get_errors();
			echo date('H:i:s') . " Create new PHPExcel object\n";
			$objreader = new PHPExcel_Reader_Excel2007;
			$objPHPExcel = $objreader->load("example.xlsx");
			
			foreach($errors as $error) 
			{
				$errorline=$error->line +1;														
				echo date('H:i:s') . " Add some data\n";
				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('DP'.$errorline, $error->message);
			}
			$objPHPExcel->getActiveSheet()->setTitle('sheet');
			// Save Excel 2007 file
			echo date('H:i:s') . " Write to Excel2007 format\n";
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$objWriter->save(str_replace('.php', '.xlsx', "example.xlsx"));

			echo date('H:i:s') . " Done writing file.\r\n";
		
			$file = 'example.xlsx';
			if (file_exists($file)) 
			{
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				//exit;
			}
		}
	}
	public function xml($inputFileName)
	{
		try {
			if (file_exists($inputFileName)) {
				$xml = simplexml_load_file($inputFileName);
				$xml = $this::xml2array($xml);
				return $xml;
			} else {
				exit('Failed to open xml file while importing to xml object');
			}
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
	}
	private function xml2array ( $xmlObject, $out = array () )
	{
		foreach ( (array) $xmlObject as $index => $node )
			$out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;

		return $out;
	}
}