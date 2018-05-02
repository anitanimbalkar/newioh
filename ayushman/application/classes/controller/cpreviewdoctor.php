<?php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');
class Controller_Cpreviewdoctor extends  Controller_Template{
	
public function action_previewdoctortemplate()
		{	
		   $id = $_GET['userid'];	
		   $content = View::factory('previewDoctor');	
		   $objvisit = ORM::factory('doctor')->where('refdoctorsid_c','=', $id)->find();
		   $header = $objvisit->header_c;
		   $footer = $objvisit->footer_c;
		   $signature = $objvisit->signature_c;
		   $content->bind('header', $header);
		   $this->template->content = $content;
		   setcookie("header_image", $header, time() + (86400 * 30), "/");
           setcookie("signature_image", $signature, time() + (86400 * 30), "/");
           setcookie("footer_image", $footer, time() + (86400 * 30), "/");		   
		}
	
}
?>
