<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class authentication extends CI_Model{

	public function check_Username($Username){
		$where = array(
			"Username like BINARY" => $Username
		);
		$this->db->select("Username")->from("System_Authority")->where($where);
		if(empty($this->db->get()->first_row('array')))
			return false;
		return true;
	}
	public function check_Password($Username,$Password){
		$where = array(
			"Username " => $Username,
			"Password " => $Password
		);
		$this->db->select("Username,Password")->from("System_Authority")->where($where);
		if(empty($this->db->get()->first_row('array')))
			return false;
		return true;
	}

	public function get_Data($Username,$Password){
		$where = array(
			"Username " => $Username,
			"Password " => $Password
		);
		$this->db->select("username,role")->from("System_Authority");
		$result = $this->db->get()->first_row('array');
		if(empty($result))
			return false;
		return $result;
	}
	public function getId($Uid){
		$where = array(
			"Uid like BINARY"=> $Uid
		);
		return $this->db->select("Uid")->from("System_Authority")->where($where)->get()->first_row("array");
	}
}