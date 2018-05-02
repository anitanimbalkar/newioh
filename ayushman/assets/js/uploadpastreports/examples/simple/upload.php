<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Upload extends Controller_Ctemplatewithoutmenu {
public function action_saveuploadedreports()
{
if ( !empty( $_FILES ) ) {

    $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
    $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];

	$files = new helper_Files();
	$return = $files->saveTempFile($_FILES["file"]);
	var_dump($return);
	//$html = $html."<img src='"."http://localhost/ayushman/".$return["abspath"]."'/>";
    move_uploaded_file( $tempPath, $uploadPath );

    $answer = array( 'answer' => 'File transfer completed' );
    $json = json_encode( $answer );

    echo $json;

} else {

    echo 'No files';

}
}
}
?>