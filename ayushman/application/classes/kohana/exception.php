<?php defined('SYSPATH') or die('No direct script access.');
 

class Kohana_Exception extends Kohana_Kohana_Exception {
 
    public static function handler(Exception $e)
    {
            parent::handler($e);
		$params = array
        (
            'action'  => 500,
            'message' => rawurlencode($e->getMessage())
        );

        if ($e instanceof HTTP_Exception)
        {
            $params['action'] = $e->getCode();
        }
        
        try
        {
			Kohana::$log->add(Log::ERROR, $e->getMessage());
			Kohana::$log->write();
			Kohana::$log->add(Log::ERROR, $e->getTraceAsString());
			Kohana::$log->write();
			
			/*$errorObj = new Model_Errorlog;
			$user = Auth::instance()->get_user();
			if($user != NULL)
				$errorObj->refuserid_c = Auth::instance()->get_user()->id;
			else
				$errorObj->refuserid_c = NULL;
			$errorObj->message_c = $e->getMessage();
			$errorObj->trace_c = $e->getTraceAsString();
			$errorObj->file_c = $e->getFile();
			$errorObj->line_c = $e->getLine();
			try{
				$result = $errorObj->save();
			} catch (Exception $f) {
				Kohana::$log->add(Log::ERROR, $f);
			}*/

            // Error sub-request.
            echo Request::factory(Route::get('error')->uri($params))
                ->execute()
                ->send_headers()
                ->body();
        }
        catch (Exception $e)
        {
			
            // Clean the output buffer if one exists
            ob_get_level() and ob_clean();
            // Exit with an error status
			echo Request::factory(Route::get('error')->uri($params))
                ->execute()
                ->send_headers()
                ->body();
            exit(1);
        }
    }
}
