<?php
/* 
$xml = new SimpleXMLElement('<com/>');
function array_to_xml(array $arr, SimpleXMLElement $xml) {
	foreach ($arr as $k => $v) {
		is_array($v)
			? array_to_xml($v, $xml->addChild($k))
			: $xml->addChild($k, $v);
	}
	return $xml;
}
$content1["indiaonlinehealth"] = $content;
if (is_array($content1) || is_object($content1)) {
	array_to_xml($content1, $xml);
} else {
	$xml->addChild('content', (string)$content1);
}
echo $xml->asXML(); */



/**
 * Lifted from StackOverflow:
 * http://stackoverflow.com/questions/1397036/how-to-convert-array-to-simplexml-in-php/1397164#1397164
 */
$xml = new SimpleXMLElement('<root/>');
function array_to_xml(array $arr, SimpleXMLElement $xml) {
	foreach ($arr as $k => $v) {
		is_array($v)
			? array_to_xml($v, $xml->addChild($k))
			: $xml->addChild($k, $v);
	}
	return $xml;
}

if (is_array($content) || is_object($content)) {
	array_to_xml($content, $xml);
} else {
	$xml->addChild('content', (string)$content);
}
echo $xml->asXML();
