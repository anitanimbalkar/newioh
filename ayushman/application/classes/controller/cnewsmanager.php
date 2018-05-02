<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cnewsmanager extends Controller_Ctemplatewithmenu {
	
	public function action_viewtoadmin()
	{
		$errors = array();
		$messages = array();
		$this->displaynews($errors,$messages);
	}
	
	private function displaynews($errors,$messages)
	{
		try
		{	
			$obj_user = Auth::instance()->get_user();				
			$content = View::factory('vuser/vadmin/vnews');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$urole = "admin";
			$breadcrumb = "Home>>";
			$username = $obj_user->Firstname_c;
			$content->bind('obj_user', $obj_user);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $username;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
		
	}
	
	public function action_save()
	{
		$messages = array();
		$errors = array();
		$db = Database::instance();
		$db->begin();
		try {
			if($_POST)
			{
				//get posted elements
				$newsid 		= $_POST['newsid'];
				$userid 		= Auth::instance()->get_user()->id;
				//insert record in newa table
				if($newsid != -1) // if user is creating new news, id will be -1, otherwise it will be + number.
				{
					$objNews = ORM::factory('newsdetail')->where('id', '=',$newsid)->mustFind();
					if($objNews->loaded() == false){
						throw new HTTP_Exception_500('objNews object not loaded');
					}
					$objNews->newstitle_c=$_POST['newstitle_c'];
					$objNews->newsdescription_c=$_POST['newsdescription_c'];
					$objNews->saveRecord($_POST);
					$db->commit();
				}
				else{
					$objNews = ORM::factory('newsdetail');
					$objNews->newstitle_c= $_POST['newstitle_c'];
					$objNews->newsdescription_c=$_POST['newsdescription_c'];
					$objNews->saveRecord($_POST);
					$db->commit();
				}
				$messages['success'] = 'Successfully save the News Details';
				$this->displaynews($errors, $messages);
			}else{
				$errors['saveplan'] = 'Could not news details';
				$this->displaynews($errors, $messages);
			}
		} catch (Exception $e) {
			$db->rollback();
			throw new Exception($e);
		}
	}
	
	public function action_remove()
	{
		$messages = array();
		$errors = array();
		$db = Database::instance();
		$db->begin();
		try {
			if($_GET)
			{
				$objNews = ORM::factory('newsdetail')->where('id','=',$_GET['id'])->find();
				$objNews->active_c= 'deactive';
				$objNews->saveRecord($_GET);
				$db->commit();
				$messages['success'] = 'Successfully save the News Details';
				$this->displaynews($errors, $messages);
			}else{
				$errors['saveplan'] = 'Could not remove news details';
				$this->displaynews($errors, $messages);
			}
		} catch (Exception $e) {
			$db->rollback();
			throw new Exception($e);
		}
	}
	
	
	public function action_getnewsdetails()
	{
		try{
			$newsid = $_GET['newsid'];
			$objNews = ORM::factory('newsdetail')->where('id','=',$newsid)->find();
			$data = array();
			$data['type'] ="data";
			$data['nametitle'] = $objNews->newstitle_c ;
			$data['details']= $objNews->newsdescription_c ;
			die(json_encode($data));
		}catch(Exception $e){
			$data = array();
			$data['type'] ="error";
			$data['data'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Could not able to retrieve new data.';
			die(json_encode($data));
		}
	}
	
	public function action_displaynews()
	{
		try
		{	
			$objsNews = ORM::factory('newsdetail')->where('active_c','=','active')->find_all();
			$data = array();
			$text="";
			foreach($objsNews as $objNews)
			{
				$text=$text."<lable id='newstext' class='bodytext_normal' style='align:center;' >".$objNews->newsdescription_c."</lable><br/><hr  style='border:1px;color:green;' /><br/>";
			}
			$data['text'] = $text;
			die(json_encode($data));
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}

} 
