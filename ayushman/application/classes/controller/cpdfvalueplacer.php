<?php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');
class Controller_Cpdfvalueplacer extends Controller
{
	public function action_place()
	{
		$arr_wk = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/application.php');
		$template = $_GET['template'];
		$pdfname = $_GET['name'];
		$data = json_decode($_GET['data'],true);

		$html = new simple_html_dom();
		$html->load_file("application/views/vtemplates/".$template);
		
		$ret = $html->find('label');
		foreach($ret as $element) {
			if(isset($data[$element->id])){
				$element->innertext  = $data[$element->id];
				$parent = $element->parent;
				if($parent->tag == 'div' && $element->innertext != ''){
					$parent->attr['style'] = $parent->attr['style'].';display:block;';
				}
			}
		}
		$files = new helper_Files();
		$return = $files->savePdfFile($html);
	}
}
?>