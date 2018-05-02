<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/Barcode39.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/BarcodeQR.php');
class helper_codeprinter  {
	public static function barcode($information)
	{
		try
		{
			// set object 
			$bc = new Barcode39($information); 

			// set text size 
			$bc->barcode_text_size = 1; 

			// set barcode bar thickness (thick bars) 
			$bc->barcode_bar_thick = 4; 

			// set barcode bar thickness (thin bars) 
			$bc->barcode_bar_thin = 2; 
			
			$date = date_create();		
			$url = "temp/Barcode_".date_timestamp_get($date).".gif";
			// save barcode GIF file 
			$bc->draw(DOCROOT.$url);
			return $url;
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
	public static function qrcode($url)
	{
		try
		{
			$qr = new BarcodeQR(); 
			$qr->url($url); 
			$date = date_create();		
			$link = "temp/qrcode_".date_timestamp_get($date).".png";
			$qr->draw(150, DOCROOT.$link);
			return $link;
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
}
