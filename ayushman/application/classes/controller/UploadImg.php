<?php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');

class UploadImg
{
    protected $options = array(
        'upload_dir'=>'reports/',
        'script_url'=>'./',
        'upload_url' => null,
        'absolute_dir'=>'',
        'param_name'=>'files',
        'overwriteFiles'=>false,
        'accept_file_types'=>'/\.(gif|jpe?g|png)$/i',
        'max_file_size'=> null,
        'min_file_size'=>1,
        'max_number_of_files'=>null,
        'max_width'=>0,
        // Image resolution restrictions:
        'max_width' => null,
        'max_height' => null,
        'min_width' => 1,
        'min_height' => 1
        );

    function __construct(array $newOptions=null) {
        if ($newOptions) {
            foreach($options as $key => $value){
                if(isset( $newOptions[$key] )){
                    $this->options[$key] = $newOptions[$key];
                }
            }
        }
        $this->options['upload_url'] = $this->get_full_url().'/'.$this->options['upload_dir'];
		//var_dump($this->options['upload_url']); die;
    }

    protected function get_full_url() {
        $https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
      	return
    		($https ? 'https://' : 'http://').
    		(!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
    		(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
    		($https && $_SERVER['SERVER_PORT'] === 443 ||
    		$_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
    		substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
    }

    protected function set_file_delete_url($file) {
      
    }

    protected function get_file_object($file_name) {
        $file_path = $this->options['upload_dir'].$file_name;
		
        if (is_file($file_path) && $file_name[0] !== '.') {
            $file = new stdClass();
            $file->name = $file_name;
            $file->size = filesize($file_path);
            $file->url = $this->options['upload_url'].rawurlencode($file->name);
            foreach($this->options['image_versions'] as $version => $options) {
                if (is_file($options['upload_dir'].$file_name)) {
                    $file->{$version.'_url'} = $options['upload_url']
                        .rawurlencode($file->name);
                }
            }
            $this->set_file_delete_url($file);
            return $file;
        }
        return null;
    }

    protected function get_file_objects() {
        return array_values(array_filter(array_map(
            array($this, 'get_file_object'),
            scandir($this->options['upload_dir'])
        )));
    }

    

    protected function validate($uploaded_file, $file, $error, $index) {
        if ($error) {
            $file->error = $error;
            return false;
        }
        if (!$file->name) {
            $file->error = 'missingFileName';
            return false;
        }
        if (!preg_match($this->options['accept_file_types'], $file->name)) {
            $file->error = 'acceptFileTypes';
            return false;
        }
        if ($uploaded_file && is_uploaded_file($uploaded_file)) {
            $file_size = filesize($uploaded_file);
        } else {
            $file_size = $_SERVER['CONTENT_LENGTH'];
        }
        if ($this->options['max_file_size'] && (
                $file_size > $this->options['max_file_size'] ||
                $file->size > $this->options['max_file_size'])
            ) {
            $file->error = 'maxFileSize';
            return false;
        }
        if ($this->options['min_file_size'] &&
            $file_size < $this->options['min_file_size']) {
            $file->error = 'minFileSize';
            return false;
        }
        if (is_int($this->options['max_number_of_files']) && (
                count($this->get_file_objects()) >= $this->options['max_number_of_files'])
            ) {
            $file->error = 'maxNumberOfFiles';
            return false;
        }
        list($img_width, $img_height) = @getimagesize($uploaded_file);
        if (is_int($img_width)) {
            if ($this->options['max_width'] && $img_width > $this->options['max_width'] ||
                    $this->options['max_height'] && $img_height > $this->options['max_height']) {
                $file->error = 'maxResolution';
                return false;
            }
            if ($this->options['min_width'] && $img_width < $this->options['min_width'] ||
                    $this->options['min_height'] && $img_height < $this->options['min_height']) {
                $file->error = 'minResolution';
                return false;
            }
        }
        return true;
    }

    protected function upcount_name_callback($matches) {
        $index = isset($matches[1]) ? intval($matches[1]) + 1 : 1;
        $ext = isset($matches[2]) ? $matches[2] : '';
        return ' ('.$index.')'.$ext;
    }

    protected function upcount_name($name) {
        return preg_replace_callback(
            '/(?:(?: \(([\d]+)\))?(\.[^.]+))?$/',
            array($this, 'upcount_name_callback'),
            $name,
            1
        );
    }

    protected function trim_file_name($name, $type, $index) {
        // Remove path information and dots around the filename, to prevent uploading
        // into different directories or replacing hidden system files.
        // Also remove control characters and spaces (\x00..\x20) around the filename:
        $file_name = trim(basename(stripslashes($name)), ".\x00..\x20");
        // Add missing file extension for known image types:
        if (strpos($file_name, '.') === false &&
            preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)) {
            $file_name .= '.'.$matches[1];
        }
        return $file_name;
    }

    protected function handle_form_data($file, $index) {
        // Handle form data, e.g. $_REQUEST['description'][$index]
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error, $index = null) {
        
		 $session= Session::instance();
		 $session->set('fileid', "");
		 
		
		$file = array();	
        $file['name'] = $this->trim_file_name($name, $type, $index);
        $file['size'] = intval($size);
        $file['type'] = $type;
		$file['tmp_name'] = $uploaded_file;
        
           
            // $file_path = $this->options['upload_dir'].$file['name'];
            
            
               /*  $file_size = filesize($file_path);           
				$file->size = $file_size;
				 */
				// move_uploaded_file($uploaded_file, $file_path);
				
				$files = new helper_Files();
				$return = $files->saveTempFile($file);
				$html = "<img src='".$_SERVER['DOCUMENT_ROOT']."/ayushman/".$return["abspath"]."' />";
				$var=$session->get('html');
				if(isset($var))
				{
					
					//$session->set('html', "");
					$temp=$session->get('html').$html;
					$session->set('html', $temp);
					
				}
				else
				{
					$session->set('html', $html);
				}
				//
			
			
           
		
        return $file;
    }

    

    public function post() {
	
        $upload = isset($_FILES[$this->options['param_name']]) ?
        $_FILES[$this->options['param_name']] : null;
        $info = array();
		
		if ($upload || isset($_SERVER['HTTP_X_FILE_NAME'])) {
            // param_name is a single object identifier like "file",
            // $_FILES is a one-dimensional array:
            $info[] = $this->handle_file_upload(
                isset($upload['tmp_name']) ? $upload['tmp_name'] : null,
                isset($_SERVER['HTTP_X_FILE_NAME']) ?
                    $_SERVER['HTTP_X_FILE_NAME'] : (isset($upload['name']) ?
                        $upload['name'] : null),
                isset($_SERVER['HTTP_X_FILE_SIZE']) ?
                    $_SERVER['HTTP_X_FILE_SIZE'] : (isset($upload['size']) ?
                        $upload['size'] : null),
                isset($_SERVER['HTTP_X_FILE_TYPE']) ?
                    $_SERVER['HTTP_X_FILE_TYPE'] : (isset($upload['type']) ?
                        $upload['type'] : null),
                isset($upload['error']) ? $upload['error'] : null
            );
			 
        }
		var_dump($info);die;
        header('Vary: Accept');
        $json = json_encode($info);
        $redirect = isset($_REQUEST['redirect']) ?
            stripslashes($_REQUEST['redirect']) : null;
        if ($redirect) {
            header('Location: '.sprintf($redirect, rawurlencode($json)));
            return;
        }
        if (isset($_SERVER['HTTP_ACCEPT']) &&
            (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }
        echo "ok";
		
    }

    

}

