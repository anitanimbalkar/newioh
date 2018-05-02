<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cdirectoryofservices extends Controller {

	public function action_saveservices()
	{
		try
		{
			if($_GET){
			if (isset($_GET['label1']))
			{
				$label1 = $_GET['label1'];
			}
			if (isset($_GET['label2']))
			{
				$label2 = $_GET['label2'];
			}
			if (isset($_GET['charge1']))
			{
				$charge1= $_GET['charge1'];
			}
			if (isset($_GET['charge2']))
			{
				$charge2=$_GET['charge2'];
			}
			if (isset($_GET['label3']))
			{
				$label3 = $_GET['label3'];
			}
			if (isset($_GET['label4']))
			{
				$label4= $_GET['label4'];
			}
			if (isset($_GET['label5']))
			{
				$label5=$_GET['label5'];
			}
			if (isset($_GET['label6']))
			{
				$label6=$_GET['label6'];
			}
			if (isset($_GET['label7']))
			{
				$label7=$_GET['label7'];
			}
			if (isset($_GET['label8']))
			{
				$label8=$_GET['label8'];
			}
			if (isset($_GET['label9']))
			{
				$label9=$_GET['label9'];
			}
			if (isset($_GET['label10']))
			{
				$label10=$_GET['label10'];
			}

			if (isset($_GET['label11']))
			{
				$label11 = $_GET['label11'];
			}
			if (isset($_GET['label12']))
			{
				$label12 = $_GET['label12'];
			}
			if (isset($_GET['label13']))
			{
				$label13 = $_GET['label13'];
			}
			if (isset($_GET['label14']))
			{
				$label14= $_GET['label14'];
			}
			if (isset($_GET['label15']))
			{
				$label15=$_GET['label15'];
			}
			if (isset($_GET['label16']))
			{
				$label16=$_GET['label16'];
			}
			if (isset($_GET['label17']))
			{
				$label17=$_GET['label17'];
			}
			if (isset($_GET['label18']))
			{
				$label18=$_GET['label18'];
			}
			if (isset($_GET['label19']))
			{
				$label19=$_GET['label19'];
			}
			if (isset($_GET['label20']))
			{
				$label20=$_GET['label20'];
			}
			if (isset($_GET['label21']))
			{
				$label21=$_GET['label21'];
			}
			if (isset($_GET['label22']))
			{
				$label22=$_GET['label22'];
			}
			if (isset($_GET['label23']))
			{
				$label23=$_GET['label23'];
			}
			if (isset($_GET['label24']))
			{
				$label24=$_GET['label24'];
			}
			if (isset($_GET['label25']))
			{
				$label25=$_GET['label25'];
			}

			
			if (isset($_GET['charge3']))
			{
				$charge3 = $_GET['charge3'];
			}
			if (isset($_GET['charge4']))
			{
				$charge4= $_GET['charge4'];
			}
			if (isset($_GET['charge5']))
			{
				$charge5=$_GET['charge5'];
			}
			if (isset($_GET['charge6']))
			{
				$charge6=$_GET['charge6'];
			}
			if (isset($_GET['charge7']))
			{
				$charge7=$_GET['charge7'];
			}
			if (isset($_GET['charge8']))
			{
				$charge8=$_GET['charge8'];
			}
			if (isset($_GET['charge9']))
			{
				$charge9=$_GET['charge9'];
			}
			if (isset($_GET['charge10']))
			{
				$charge10=$_GET['charge10'];
			}

			if (isset($_GET['charge11']))
			{
				$charge11 = $_GET['charge11'];
			}
			if (isset($_GET['charge12']))
			{
				$charge12 = $_GET['charge12'];
			}
			if (isset($_GET['charge13']))
			{
				$charge13 = $_GET['charge13'];
			}
			if (isset($_GET['charge14']))
			{
				$charge14= $_GET['charge14'];
			}
			if (isset($_GET['charge15']))
			{
				$charge15=$_GET['charge15'];
			}
			if (isset($_GET['charge16']))
			{
				$charge16=$_GET['charge16'];
			}
			if (isset($_GET['charge17']))
			{
				$charge17=$_GET['charge17'];
			}
			if (isset($_GET['charge18']))
			{
				$charge18=$_GET['charge18'];
			}
			if (isset($_GET['charge19']))
			{
				$charge19=$_GET['charge19'];
			}
			if (isset($_GET['charge20']))
			{
				$charge20=$_GET['charge20'];
			}
			if (isset($_GET['charge21']))
			{
				$charge21=$_GET['charge21'];
			}
			if (isset($_GET['charge22']))
			{
				$charge22=$_GET['charge22'];
			}
			if (isset($_GET['charge23']))
			{
				$charge23=$_GET['charge23'];
			}
			if (isset($_GET['charge24']))
			{
				$charge24=$_GET['charge24'];
			}
			if (isset($_GET['charge25']))
			{
				$charge25=$_GET['charge25']; 
			}
			
			
			/*if (isset($_GET['doctoridnew'])!=null)
				{
				$docid=$_GET['doctoridnew']; 
				//var_dump($docid);
				}
			*/
			 if (isset($_GET['doctorid']))
			{
				$docid=$_GET['doctorid'];
			}
			else
			{
				$user = Auth::instance()->get_user();
				$userid=$user->id;
				$docobj=ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
				$docid=$docobj->id;
			}
		
			$objservices=ORM::factory('doctorservice')->where('refdoctorid','=',$docid)->find();
				
			//var_dump($objservices);die;
			$objservices->refdoctorid=$docid;
			$objservices->label1_c=$label1;
			$objservices->label2_c=$label2;
			$objservices->charge1_c=$charge1;
			$objservices->charge2_c=$charge2;
			$objservices->label3_c= $label3;
			$objservices->label4_c= $label4;
			$objservices->label5_c= $label5;
			$objservices->label6_c= $label6;
			$objservices->label7_c= $label7;
			$objservices->label8_c= $label8;
			$objservices->label9_c= $label9;
			$objservices->label10_c= $label10;
			$objservices->label11_c= $label11;
			$objservices->label12_c= $label12;
			$objservices->label13_c= $label13;
			$objservices->label14_c= $label14;
			$objservices->label15_c= $label15;
			$objservices->label16_c= $label16;
			$objservices->label17_c= $label17;
			$objservices->label18_c= $label18;
			$objservices->label19_c= $label19;
			$objservices->label20_c= $label20;
			$objservices->label21_c= $label21;
			$objservices->label22_c= $label22;
			$objservices->label23_c= $label23;
			$objservices->label24_c= $label24;
			$objservices->label25_c= $label25;
			 
			$objservices->charge3_c=$charge3;
			$objservices->charge4_c=$charge4;
			$objservices->charge5_c=$charge5;
			$objservices->charge6_c=$charge6;
			$objservices->charge7_c=$charge7;
			$objservices->charge8_c=$charge8;
			$objservices->charge9_c=$charge9;
			$objservices->charge10_c=$charge10;
			$objservices->charge11_c=$charge11;
			$objservices->charge12_c=$charge12;
			$objservices->charge13_c=$charge13;
			$objservices->charge14_c=$charge14;
			$objservices->charge15_c= $charge15;
			$objservices->charge16_c= $charge16;
			$objservices->charge17_c= $charge17;
			$objservices->charge18_c= $charge18;
			$objservices->charge19_c= $charge19;
			$objservices->charge20_c= $charge20;
			$objservices->charge21_c= $charge21;
			$objservices->charge22_c= $charge22;
			$objservices->charge23_c= $charge23;
			$objservices->charge24_c= $charge24;
			$objservices->charge25_c= $charge25;
			$objservices->save();
		
		}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}

}


public function action_showdocservices(){
		try{
			$result = array();
			$order= array();
			//var_dump($_GET['doctorid']);
			//var_dump("show services");
			if (isset($_GET['doctorid']))
			{
				$docid=$_GET['doctorid']; 
			}
			else
			{
				$user = Auth::instance()->get_user();
				$userid=$user->id;
				$docobj=ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
				$docid=$docobj->id;
			}
			$objservices=ORM::factory('doctorservice')->where('refdoctorid','=',$docid)->find();
			//var_dump($objservices);die;
			if($objservices->id==null)
			{
				$objservices=ORM::factory('doctorservice')->where('refdoctorid','=',-1)->find();
				$result['label1_c']=$objservices->label1_c;
				$result['label2_c']=$objservices->label2_c;
				$result['label3_c']=$objservices->label3_c;
				$result['label4_c']=$objservices->label4_c;
				$result['label5_c']=$objservices->label5_c;
				$result['label6_c']=$objservices->label6_c;
				$result['label7_c']=$objservices->label7_c;
				$result['label8_c']=$objservices->label8_c;
				$result['label9_c']=$objservices->label9_c;
				$result['label10_c']=$objservices->label10_c;
				$result['label11_c']=$objservices->label11_c;
				$result['label12_c']=$objservices->label12_c;
				$result['label13_c']=$objservices->label13_c;
				$result['label14_c']=$objservices->label14_c;
				$result['label15_c']=$objservices->label15_c;
				$result['label16_c']=$objservices->label16_c;
				$result['label17_c']=$objservices->label17_c;
				$result['label18_c']=$objservices->label18_c;
				$result['label19_c']=$objservices->label19_c;
				$result['label20_c']=$objservices->label20_c;
				$result['label21_c']=$objservices->label21_c;
				$result['label22_c']=$objservices->label22_c;
				$result['label23_c']=$objservices->label23_c;
				$result['label24_c']=$objservices->label24_c;
				$result['label25_c']=$objservices->label25_c;
			
				/////// 25 Charges//////////////////////////////
				$result['charge1_c']=$objservices->charge1_c;
				$result['charge2_c']=$objservices->charge2_c;
				$result['charge3_c']=$objservices->charge3_c;
				$result['charge4_c']=$objservices->charge4_c;
				$result['charge5_c']=$objservices->charge5_c;
				$result['charge6_c']=$objservices->charge6_c;
				$result['charge7_c']=$objservices->charge7_c;
				$result['charge8_c']=$objservices->charge8_c;
				$result['charge9_c']=$objservices->charge9_c;
				$result['charge10_c']=$objservices->charge10_c;
				$result['charge11_c']=$objservices->charge11_c;
				$result['charge12_c']=$objservices->charge12_c;
				$result['charge13_c']=$objservices->charge13_c;
				$result['charge14_c']=$objservices->charge14_c;
				$result['charge15_c']=$objservices->charge15_c;
				$result['charge16_c']=$objservices->charge16_c;
				$result['charge17_c']=$objservices->charge17_c;
				$result['charge18_c']=$objservices->charge18_c;
				$result['charge19_c']=$objservices->charge19_c;
				$result['charge20_c']=$objservices->charge20_c;
				$result['charge21_c']=$objservices->charge21_c;
				$result['charge22_c']=$objservices->charge22_c;
				$result['charge23_c']=$objservices->charge23_c;
				$result['charge24_c']=$objservices->charge24_c;
				$result['charge25_c']=$objservices->charge25_c;
				$result['docid']=$docid;
				array_push($order, $result);
				$response['orderservices'] = $order;
			}

			$result['label1_c']=$objservices->label1_c;
			$result['label2_c']=$objservices->label2_c;
			$result['label3_c']=$objservices->label3_c;
			$result['label4_c']=$objservices->label4_c;
			$result['label5_c']=$objservices->label5_c;
			$result['label6_c']=$objservices->label6_c;
			$result['label7_c']=$objservices->label7_c;
			$result['label8_c']=$objservices->label8_c;
			$result['label9_c']=$objservices->label9_c;
			$result['label10_c']=$objservices->label10_c;
			$result['label11_c']=$objservices->label11_c;
			$result['label12_c']=$objservices->label12_c;
			$result['label13_c']=$objservices->label13_c;
			$result['label14_c']=$objservices->label14_c;
			$result['label15_c']=$objservices->label15_c;
			$result['label16_c']=$objservices->label16_c;
			$result['label17_c']=$objservices->label17_c;
			$result['label18_c']=$objservices->label18_c;
			$result['label19_c']=$objservices->label19_c;
			$result['label20_c']=$objservices->label20_c;
			$result['label21_c']=$objservices->label21_c;
			$result['label22_c']=$objservices->label22_c;
			$result['label23_c']=$objservices->label23_c;
			$result['label24_c']=$objservices->label24_c;
			$result['label25_c']=$objservices->label25_c;
				/////// 25 Charges//////////////////////////////
			$result['charge1_c']=$objservices->charge1_c;
			$result['charge2_c']=$objservices->charge2_c;
			$result['charge3_c']=$objservices->charge3_c;
			$result['charge4_c']=$objservices->charge4_c;
			$result['charge5_c']=$objservices->charge5_c;
			$result['charge6_c']=$objservices->charge6_c;
			$result['charge7_c']=$objservices->charge7_c;
			$result['charge8_c']=$objservices->charge8_c;
			$result['charge9_c']=$objservices->charge9_c;
			$result['charge10_c']=$objservices->charge10_c;
			$result['charge11_c']=$objservices->charge11_c;
			$result['charge12_c']=$objservices->charge12_c;
			$result['charge13_c']=$objservices->charge13_c;
			$result['charge14_c']=$objservices->charge14_c;
			$result['charge15_c']=$objservices->charge15_c;
			$result['charge16_c']=$objservices->charge16_c;
			$result['charge17_c']=$objservices->charge17_c;
			$result['charge18_c']=$objservices->charge18_c;
			$result['charge19_c']=$objservices->charge19_c;
			$result['charge20_c']=$objservices->charge20_c;
			$result['charge21_c']=$objservices->charge21_c;
			$result['charge22_c']=$objservices->charge22_c;
			$result['charge23_c']=$objservices->charge23_c;
			$result['charge24_c']=$objservices->charge24_c;
			$result['charge25_c']=$objservices->charge25_c;
			$result['docid']=$objservices->refdoctorid;
				array_push($order, $result);
				$response['orderservices'] = $order;
				echo(json_encode($response));die;
		}
		catch(Exception $e){throw new Exception($e);}
	}





}