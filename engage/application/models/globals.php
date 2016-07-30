<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class globals extends CI_Model{
	public function seoUrl($string){
	    //Lower case everything
	    $string = strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	}
	public function decodeseoUrl($string){
	    //Lower case everything
	    $string = strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[-]/", " ", $string);
	    return $string;
	}
	public function Count_Abstract(){
		return $this->db->select("Id_Thesis")->from("thesis_information")->get()->num_rows();
	}
	// public function getLatestNews(){
	// 	return $this->db->select("Title")->from("news_and_events")->order_by("Timestamp","DESC")->limit(5,0)->get()->result("array");
	// }
	// public function getLatestBlog(){
	// 	return $this->db->select("Title")->from("blog")->order_by("Timestamp","DESC")->limit(5,0)->get()->result("array");
	// }
	// public function Count_Blog(){
	// 	return $this->db->select("Id")->from("blog")->get()->num_rows();
	// }
	// public function Count_News(){
	// 	return $this->db->select("Id")->from("news_and_events")->get()->num_rows();
	// }
	// public function Count_Resources(){
	// 	return $this->db->select("Id")->from("resources")->get()->num_rows();
	// }
	// public function getSocials($Data){
	// 	$Array = array();
	// 	if(!empty(trim($Data['Facebook_page'])) and trim($Data['Facebook_page']) != ""){
	// 		$Array += array(
	// 			array(
	// 				"Name" => "fa-facebook",
	// 				"Value" => trim($Data['Facebook_page'])
	// 			)
	// 		);
	// 	}
	// 	if(!empty(trim($Data['Twitter_page'])) and trim($Data['Twitter_page']) != ""){
	// 		$Array += array(
	// 			array(
	// 				"Name" => "fa-twitter",
	// 				"Value" => trim($Data['Twitter_page'])
	// 			)
	// 		);
	// 	}
	// 	if(!empty(trim($Data['Google+_page'])) and trim($Data['Google+_page']) != ""){
	// 		$Array += array(
	// 			array(
	// 				"Name" => "fa-google-plus",
	// 				"Value" => trim($Data['Google+_page'])
	// 			)
	// 		);
	// 	}
	// 	if(!empty(trim($Data['LinkLn_page'])) and trim($Data['LinkLn_page']) != ""){
	// 		$Array += array(
	// 			array(
	// 				"Name" => "fa-linkedin",
	// 				"Value" => trim($Data['LinkLn_page'])
	// 			)
	// 		);
	// 	}
	// 	return $Array;
	// }
}