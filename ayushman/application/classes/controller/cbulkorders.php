<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
include_once(DOCROOT.'application/classes/helper/transaction.php');
require_once(DOCROOT.'simple_html_dom.php');

class Controller_Cbulkorders extends Controller_Cservicetemplate  {
	public function action_view(){
		$errors = array();
		$messages = array();
		$serviceid = $_GET['serviceid'];
		$packageid = $_GET['packageid'];
		$bookingid=$_GET['bookingid'];
		$this->display($errors,$messages,$serviceid,$packageid,$bookingid);
	}
	public function action_upload()
	{
		set_time_limit(120);
		$errors = array();
		$messages = array();
		$resultdata = array();
		$msg="";
			if($_POST)
					{   
						$file = new helper_Files();
						$return = $file->saveTempFile($_FILES['file']);
						
						$this->autoplaceorder($return['path']);
						
								$this->display($errors,$messages,$serviceid,$packageid,$bookingid);
					}

			
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
					$this->display($errors,$messages,$serviceid,$packageid,$bookingid);
		}
		
	}
	public function autoplaceorder($filename)
        {
			try {
					$inputFileType = PHPExcel_IOFactory::identify($filename);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($filename);
				} catch(Exception $e) 
				{
				die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
				}

				//  Get worksheet dimensions
				$sheet = $objPHPExcel->getSheet(0); 
				$highestRow = $sheet->getHighestRow(); 
				$highestColumn = $sheet->getHighestColumn();
				//  Loop through each row of the worksheet in turn
				
				for ($row = 3; $row <= $highestRow; $row++)
				{ 
				//  Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
									// var_dump($rowData); die;
				$employeeid = $rowData[0][0];
				$firstname = $rowData[0][1];
				$middlename	= $rowData[0][2];
				$lastname	= $rowData[0][3];
				$iohid = $rowData[0][4];
				$arraydata=array($firstname,$middlename,$lastname,$employeeid,$iohid);
				$chckforerrors=1;
				//var_dump($_POST); die;
				$objuser=ORM::factory('corporatemember')->where('iohid_c','=',$iohid)->find();
				if(!$objuser)
				{ $statuscode="User not present in system";
					$chckforerrors=0;
				}
				elseif($employeeid!=$objuser->employeeid_c)
				{ $statuscode= 'employeeid and iohid does not match for '.$firstname.' '.$middlename.' '.$lastname;
					$chckforerrors=0;
					
				}
				else
				{
					$userid = $iohid;
					
					$objOrders = ORM::factory('Diagnosticlabsorder');
					$today = date('Y-m-d g:i:s a');
					$objOrders->orderdate_c = $today;
					$objOrders->status_c = 'requested';
					$objOrders->refdiaglabsorderspathologistsid_c = $_POST['pathologistsid'];
					$objOrders->updatestatusdate_c = $today;
					$objOrders->rate_c = '0';
					$objOrders->paid_c= 1;
					$objOrders->save();
					$orderid = $objOrders->id;//get order id 
					//place record in orderedtest table
					$objordertest = ORM::factory('orderedtest');
					$objordertest->customeruserid_c = $userid;
					$objordertest->testid_c = $_POST['testid'];
					$objordertest->diagnosticlabsorderid_c = $orderid;
					$objordertest->rate_c='0';
					$objordertest->save();
					$objpackorder = ORM::factory('packageorder');
					$objpackorder->packageid_c=$_POST['packageid'];
					$objpackorder->serviceid_c=$_POST['serviceid'];
					$objpackorder->bookingid_c=$_POST['bookingid'];
					$objpackorder->orderid_c=$orderid;
					$objpackorder->save();
					$statuscode=$orderid;
				}
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $statuscode);	
			}
			$objPHPExcel->getActiveSheet()->setTitle('sheet');
						$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
						$objWriter->save(str_replace('.php', '.xlsx', "example.xlsx"));
						$file = 'example.xlsx';
							if (file_exists($file)) 
									{
										header('Content-Description: File Transfer');
										header('Content-Type: application/octet-stream');
										header('Content-Disposition: attachment; filename='.basename($file));
										header('Expires: 0');
										header('Cache-Control: must-revalidate');
										header('Pragma: public');
										header('Content-Length: ' . filesize($file));
										ob_clean();
										flush();
										readfile($file);
										exit;
									}
			die('done');
        }
		public function action_download()
	{
		$file = DOCROOT."temp/Bulkorderformat.xlsx";
							if (file_exists($file)) 
									{
										header('Content-Description: File Transfer');
										header('Content-Type: application/octet-stream');
										header('Content-Disposition: attachment; filename='.basename($file));
										header('Expires: 0');
										header('Cache-Control: must-revalidate');
										header('Pragma: public');
										header('Content-Length: ' . filesize($file));
										ob_clean();
										flush();
										readfile($file);
										exit;
									}
	}
	private function display($errors, $messages,$serviceid, $packageid,$bookingid){
		$objViewUsers= ORM::factory('pathologist')->find_all()->as_array();
		$array_status= array();
		//array_push($array_status,"All");
		foreach($objViewUsers as $objViewUser )
		{
		if($objViewUser->nameofcenter_c != '')
			array_push($array_status,trim($objViewUser->nameofcenter_c));
		}
		/*$objtests= ORM::factory('testmaster')->find_all()->as_array();
		foreach($objtests as $objtest )
		{
		if($objtest->testname_c != '')
			array_push($array_status2,trim($objtest->testname_c));
		}
		*/
		$content = View::factory('vuser/vserviceadmin/vbulkorders');
		$content->bind('serviceid',$serviceid);
		$content->bind('packageid',$packageid);
		$content->bind('bookingid',$bookingid);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('array_status',$array_status);
		$content->bind('array_status2',$array_status2);
		$this->response->body($content);
	}
}
