<?php

class helper_Serializer
{
	public function initiate($name, $array)
	{
		$c = new $this;
		$dom = new DOMDocument();
		$xml=$c->create($name, $array, $dom , null);
		return $xml;
	}

//code for creating xml file
	public function create($name, $array, $dom , $node)
	{
		try
		{
			if(!$dom->hasChildNodes())
			{
				$node=$dom->appendChild($dom->createElement($name));	
			}
			foreach($array as $key=> $value)
			{
				$row_element = "tuple";
				
				if (is_array($value))
				{
					 $node1 = $node->appendChild($dom->createElement($row_element));
					
					$xmlArrayMapper = new $this();
					
					if (!($this->isAssoc($value)))
					{
						$i = 0;
						for ($i=0;$i< count($value);$i++)
							$xmlArrayMapper->create($key,$value[$i],$dom, $node1);
					}
					else
					{
						$xmlArrayMapper->create($key,$value, $dom ,$node1);
					}
				}
				else
				{
					$node->appendChild($dom->createElement($key))->appendChild($dom->createCDATASection($value));
				}
			}
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			//$dom->save('in.xml');
			return $dom->saveXML();
		}
		catch (Exception $e)
		{
			var_dump($e);
		}
	}
	
	function isAssoc($arr)
	{
		return array_keys($arr) !== range(0, count($arr) - 1);
	}
	
	
}


?>