<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdownload extends Controller_Ctemplatewithoutmenu {
	// Show Registration form
	public function innerXML($node)
	{
		$doc  = $node->ownerDocument;
		$frag = $doc->createDocumentFragment();
		foreach ($node->childNodes as $child)
		{
			$frag->appendChild($child->cloneNode(TRUE));
		}
		return $doc->saveXML($frag);
	}
	public function action_names()
	{
		error_reporting(E_ERROR | E_PARSE);
		$arr = array();
		$from = $_GET['from'];
		$to = $_GET['to'];
		
		$fp = fopen('temp/file-'.$from.'-'.$to.'.csv', 'w');
		fclose($fp);
		$DrugList = array();
		for($i=$from;$i<=$to;$i++){
			
			$homepage = file_get_contents('http://www.medguideindia.com/show_brand.php?nav_link=&pageNum_rr='.$i.'&nav_link=&selectme='.$i.'');
			$dom = new DOMDocument();
			$dom->loadHTML($homepage);
			
			$xpath = new DOMXpath($dom);
			$result = $xpath->query('//*[@class="row"]');
			foreach($result as $item){
				$name = array();
				$newdoc = new DOMDocument;
				$node = $newdoc->importNode($item, true);
				$newdoc->appendChild($node);
				$finder = new DomXPath($newdoc);
				$td = $finder->query('//td[@class="mosttext"]');
				for($nodcount = 0;$nodcount < $td->length;$nodcount++){
					if($nodcount == ($td->length - 1)){
						array_push($name, $this->innerXML($td->item($nodcount)));;
					}else{
						array_push($name, $td->item($nodcount)->nodeValue);;
					}					
				}
				$handle = fopen('temp/file-'.$from.'-'.$to.'.csv', "a");
				fputcsv($handle, $name);
				fclose($handle);
			}			
		}		
		$path = 'temp/file-'.$from.'-'.$to.'.csv';
		$file = $path;
		header("Content-Disposition: attachment; filename=".'file-'.$from.'-'.$to.'.csv'."");   
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
	public function action_copy()
	{
		echo 'done';		
		die;
		error_reporting(E_ERROR | E_PARSE);
		$arr = array();
		$from = 501;
		$to = 502;
		
		$fp = fopen('temp/file-'.$from.'-'.$to.'.csv', 'w');
		fclose($fp);
		$DrugList = array();
		for($i=$from;$i<=$to;$i++){
			$url = 'http://www.medguideindia.com/show_brand.php?nav_link=&pageNum_rr='.$i.'&nav_link=&selectme='.$i.'';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
			// This is what solved the issue (Accepting gzip encoding)
			curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
			$homepage = curl_exec($ch);
			curl_close($ch);
			
			//$homepage = file_get_contents('http://www.medguideindia.com/show_brand.php?nav_link=&pageNum_rr='.$i.'&nav_link=&selectme='.$i.'');
			$dom = new DOMDocument();
			$dom->loadHTML($homepage);
			
			$xpath = new DOMXpath($dom);
			$result = $xpath->query('//*[@class="row"]');
			foreach($result as $item){
				$name = array();
				$newdoc = new DOMDocument;
				$node = $newdoc->importNode($item, true);
				$newdoc->appendChild($node);
				$finder = new DomXPath($newdoc);
				$td = $finder->query('//td[@class="mosttext"]');
				for($nodcount = 0;$nodcount < $td->length;$nodcount++){
					if($nodcount == ($td->length - 1)){
						array_push($name, $this->innerXML($td->item($nodcount)));;
					}else{
						array_push($name, $td->item($nodcount)->nodeValue);;
					}					
				}
				$handle = fopen('temp/file-'.$from.'-'.$to.'.csv', "a");
				fputcsv($handle, $name);
				fclose($handle);
			}			
		}	
		echo 'done';		
		die;
	}
	public function action_brands()
	{
		error_reporting(E_ERROR | E_PARSE);
		$arr = array();
		$from = CLI::options('from');;
		$to = CLI::options('to');;
		die;
		$fp = fopen('temp/file-'.$from.'-'.$to.'.csv', 'w');
		fclose($fp);
		
		$homepage = file_get_contents('http://www.medguideindia.com/show_generics.php');

		$dom = new DOMDocument();
		$dom->loadHTML($homepage);

		$xpath = new DOMXpath($dom);
		$result = $xpath->query('//td[@class="mosttext"]');
		for($k=0;$k<=20;){
			if($result->item($k+3)->getElementsByTagName('a')->item(0) != null){
			
				//echo  $result->item($k+1)->nodeValue.'<br/>';
//				$result->item($k+3)->getElementsByTagName('a')->item(0)->getAttribute('href').'<br/>';
				
								
				$homepage1 = file_get_contents('http://www.medguideindia.com/'.$result->item($k+3)->getElementsByTagName('a')->item(0)->getAttribute('href'));
				
				$dom1 = new DOMDocument();
				$dom1->loadHTML($homepage1);
				$xpath1 = new DOMXpath($dom1);
				$result1 = $xpath->query('//table[@class="tabsborder2"]');
				
				$items = $result1->item(0)->getElementsByTagName('tr');
				
				//echo count($items);die;
				
				foreach ($items as $node)
				{
					echo $this->tdrows($node->childNodes) . "<br />";
				}
				//echo  $result1->item(0)->nodeValue;
			}
			$k = $k+5;
		}
		die;
		
	}
	
	public function tdrows($elements)
	{
		$str = "";
		foreach ($elements as $element)
		{
			$str .= $element->nodeValue . ", ";
		}
		return $str;
	}
	
	
}