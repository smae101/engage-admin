<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller{
	public function index($var){
		$data['page_title'] = "Error ".$var;
		$this->load->view("Globals/Header",$data);
		$this->load->view("Globals/nav_bar_top");
		$this->load->view("Globals/Footer");
	}
	public function Error_404(){
		$data['page_title'] = "Error 404!";
		$data['page_active'] = "Error";
		$this->load->view("Globals/Header",$data);
		$this->load->view("Globals/nav_bar_top");
		$this->load->view("Globals/Footer");
	}
}