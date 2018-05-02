<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
	class Controller_Validatehistoryexcel extends Controller_Service 
		{
			public function action_index()
			{   $result = array();
				$result = $this->Login($_GET['username'],$_GET['password'],false);
				//return $this->content;
				if($result["type"]=="success")
				{ 
				$xsdarray = array
				(
					array("A","string",1,"NULL"),
					array("B","string",1,"NULL"),
					array("C","string",0,"NULL"),
					array("D","string",1,"NULL"),
					array("E","string",1,"isemail"),
					array("F","string",1,"ismobile"),
					array("G","string",0,"NULL"),
					array("H","string",0,"NULL"),
					array("I","string",0,"isgender"),
					array("J","date",0,"isdate"),
					array("K","string",0,"NULL"),
					array("L","string",0,"NULL"),
					array("M","string",0,"NULL"),
					array("N","string",0,"NULL"),
					array("O","string",0,"NULL"),
					array("P","string",0,"NULL"),
					array("Q","string",0,"NULL"),
					array("R","string",0,"NULL"),
					array("S","string",0,"NULL"),
					array("T","string",0,"NULL"),
					array("U","string",0,"NULL"),
					array("V","string",0,"NULL"),
					array("W","string",0,"NULL"),
					array("X","string",0,"NULL"),
					array("Y","string",0,"NULL"),
					array("Z","string",0,"NULL"),
					array("AA","string",0,"NULL"),
					array("AB","string",0,"NULL"),
					array("AC","string",0,"NULL"),
					array("AD","string",0,"NULL"),
					array("AE","string",0,"NULL"),
					array("AF","string",0,"NULL"),
					array("AG","string",0,"NULL"),
					array("AH","string",0,"NULL"),
					array("AI","string",0,"NULL"),
					array("AJ","string",0,"NULL"),
					array("AK","string",0,"NULL"),
					array("AL","string",0,"NULL"),
					array("AM","string",0,"NULL"),
					array("AN","string",0,"NULL"),
					array("AO","string",0,"NULL"),
					array("AP","string",0,"NULL"),
					array("AQ","string",0,"NULL"),
					array("AR","string",0,"NULL"),
					array("AS","string",0,"NULL"),
					array("AT","string",0,"NULL"),
					array("AU","string",0,"NULL"),
					array("AV","string",0,"NULL"),
					array("AW","string",0,"NULL"),
					array("AX","string",0,"NULL"),
					array("AY","string",0,"NULL"),
					array("AZ","string",0,"NULL"),
					array("BA","string",0,"NULL"),
					array("BB","string",0,"NULL"),
					array("BC","string",0,"NULL"),
					array("BD","string",0,"NULL"),
					array("BE","string",0,"NULL"),
					array("BF","string",0,"NULL"),
					array("BG","string",0,"NULL"),
					array("BH","string",0,"NULL"),
					array("BI","string",0,"NULL"),
					array("BJ","string",0,"NULL"),
					array("BK","string",0,"NULL"),
					array("BL","string",0,"NULL"),
					array("BM","string",0,"NULL"),
					array("BN","string",0,"NULL"),
					array("BO","string",0,"NULL"),
					array("BP","string",0,"NULL"),
					array("BQ","string",0,"NULL"),
					array("BR","string",0,"NULL"),
					array("BS","string",0,"NULL"),
					array("BT","string",0,"NULL"),
					array("BU","string",0,"NULL"),
					array("BV","string",0,"NULL"),
					array("BW","string",0,"NULL"),
					array("BX","string",0,"NULL"),
					array("BY","string",0,"NULL"),
					array("BZ","string",0,"NULL"),
					array("CA","string",0,"NULL"),
					array("CB","string",0,"NULL"),
					array("CC","string",0,"NULL"),
					array("CD","string",0,"NULL"),
					array("CE","string",0,"NULL"),
					array("CF","string",0,"NULL"),
					array("CG","string",0,"NULL"),
					array("CH","string",0,"NULL"),
					array("CI","string",0,"NULL"),
					array("CJ","string",0,"NULL"),
					array("CK","string",0,"NULL"),
					array("CL","string",0,"NULL"),
					array("CM","string",0,"NULL"),
					array("CN","string",0,"NULL"),
					array("CO","string",0,"NULL"),
					array("CP","string",0,"NULL"),
					array("CQ","string",0,"NULL"),
					array("CR","string",0,"NULL"),
					array("CS","string",0,"NULL"),
					array("CT","string",0,"NULL"),
					array("CU","string",0,"NULL"),
					array("CV","string",0,"NULL"),
					array("CW","string",0,"NULL"),
					array("CX","string",0,"NULL"),
					array("CY","string",0,"NULL"),
					array("CZ","string",0,"NULL"),
					array("DA","string",0,"NULL"),
					array("DB","string",0,"NULL"),
					array("DC","string",0,"NULL"),
					array("DD","string",0,"NULL"),
					array("DE","string",0,"NULL"),
					array("DF","string",0,"NULL"),
					array("DG","string",0,"NULL"),
					array("DH","string",0,"NULL"),
					array("DI","string",0,"NULL"),
					array("DJ","string",0,"NULL"),
					array("DK","string",0,"NULL"),
					array("DL","string",0,"NULL"),
					array("DM","string",0,"NULL"),
					array("DN","string",0,"NULL"),
					array("DO","string",0,"NULL"),
					array("DP","string",0,"NULL")
					
					
					
					
				
				);
				$result = $xsdarray;	
				$this->content = $result;
				}
				else
				{ return $this->content;
				}
				
			}
	private function Login($username,$password,$remember)
	{
		$array_data=array();
		session_cache_limiter('private');
		session_cache_expire(1);
		$user = Auth::instance()->login($username,$password,$remember);
		if ($user=="true") 
		{
			$user = Auth::instance()->get_user();
			if($user->activationstatus_c === "active")
			{
				$array_data["type"]="success";
				$array_data["data"]= session_id();
			}
			else
			{
				$array_data["type"]="error";
				$array_data["data"]="Your account is not activated yet.";
			}
		} 
		else 
		{
			$array_data["type"]="error";
			$array_data["data"]="The username or password you entered is incorrect.";
		}
		
		return $array_data;
	}
		}
