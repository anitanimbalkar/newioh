<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cfolder extends Controller_Ctemplatewithoutmenu {
	public function action_create()
        {
			 $obj_coepusers=ORM::factory('coepuser')->where('test','=','30AugRem')->find_all();
			 foreach($obj_coepusers as $obj_coepuser){
				 try{
						if (!is_dir('reports/'.$obj_coepuser->iohid)) {
							mkdir('reports/'.$obj_coepuser->iohid);
						}
						if (!is_dir('reports/'.$obj_coepuser->iohid.'/order_'.$obj_coepuser->ordernumber)) {
							mkdir('reports/'.$obj_coepuser->iohid.'/order_'.$obj_coepuser->ordernumber);
						}
						echo 'cp /var/www/html/ayushman/coepreports1/'.$obj_coepuser->file.' /var/www/html/ayushman/reports/'.$obj_coepuser->iohid.'/order_'.$obj_coepuser->ordernumber.'</br>';
						exec('cp /var/www/html/ayushman/coepreports1/'.$obj_coepuser->file.' /var/www/html/ayushman/reports/'.$obj_coepuser->iohid.'/order_'.$obj_coepuser->ordernumber);
					}
					catch (Exception $e)
					{
						var_dump($e);
							echo 'failed-'.$arrPost['username'].'</br>';
					}
			}
			die('done');
     }
}
