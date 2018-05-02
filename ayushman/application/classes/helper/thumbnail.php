<?php defined('SYSPATH') or die('No direct script access.');
class helper_thumbnail{
      
      public function getThumbFromImg($filename){
      	     $ext = pathinfo($filename, PATHINFO_EXTENSION);
	     if($ext == 'pdf')
	       return ('/ayushman/assets/thumbs/pdf_icon.svg');
             $filename = $_SERVER['DOCUMENT_ROOT'].'/'.$filename;
	     $outfilename = explode('/', $filename);
	     $actual_file_name = end($outfilename);
	     $web_file_name = '/ayushman/assets/'.'thumbs/'.$actual_file_name;
	     $outfilename = $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/'.'thumbs/'.$actual_file_name;
	     if(!file_exists($outfilename)){
	       $im = new Image_Imagick($filename);
	       $im->resize(100, null);
	       file_put_contents($outfilename, $im);
	       }	       
	       return $web_file_name;
      }
}