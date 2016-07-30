<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class myforms extends CI_Model{
	public function check($var){

	}
	public function is_Email($var){
		$flag = false;
		if(filter_var($var,FILTER_VALIDATE_EMAIL) && $var!= null)
			$flag = true;
		return $flag;
	}
	public function is_Number($var){
		$flag = false;
		if(filter_var($var,FILTER_VALIDATE_INT))
			$flag = true;
		return $flag;
	}
	public function is_Number_Phone($var){
		$flag = false;
		$var = str_replace("-", "", $var);
		if(strlen($var) == 11)
			$flag = true;
		return $flag;
	}
	public function check_contact_form($Name,$Phone,$Email,$Message){
		$flag = false;
		if($Name != null && $Phone != null && $Email != null && $Message != null)
		$flag = true;
		return $flag;
	}
	public function is_validUserName($String){
		// $Flag = FALSE;
		// if(preg_match("/^[a-zA-Z_ ]*$/", $String))
			$Flag = TRUE;
		return $Flag;
	}
	public function valid_inputString($String){
		$Flag = FALSE;
		if(preg_match("/^[a-zA-Z]*$/",$String))
			$Flag = TRUE;
		return $Flag;
	}
	public function valid_ShoutOut($String){
		$Flag = FALSE;
		if(preg_match("/^[a-zA-Z0-9_!@#%&?\"]*$/", $String))
			$Flag = TRUE;
		return $Flag;
	}
}