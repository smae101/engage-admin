<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_main extends CI_Controller {

	public function index()
	{
		// print_r("Home");
		$data['page_title'] = "Engage | Admin";
		$data['page_active'] = "Login";
		$this->load->view("Globals/Header",$data);
		$this->load->view("Login-section/index");
	}

	public function login(){
		$this->load->model('authentication');
		if($this->input->post()){
			$data['username'] = $Username = trim($this->input->post("admin-username"));
			$data['password'] = $Password = trim($this->input->post("admin-password"));

			if(empty($Username) && empty($Password))
					$Status = "<b>Fields</b> are lacking!";
				elseif(empty($Username))
					$Status = "<b>Username</b> is lacking!";
				elseif(empty($Password)) 
					$Status = "<b>Password</b> is lacking!";
				elseif(!empty($Username) && !empty($Password)){
					//if($this->myforms->is_validUserName($Username)){
						if($this->authentication->check_Username($Username)){
							//if($this->authentication->check_Password($Username,md5($Password))){
							if($this->authentication->check_Password($Username, $Password)){
								$temp = $this->authentication->get_Data($Username,$Password);
								if($temp){
									$this->session->set_userdata("Logged_status",TRUE);
									$this->session->set_userdata("Logged_User",$temp['username']);
									//$this->session->set_userdata("Logged_encryp",md5(md5($temp['Id'])+md5($temp['Id'])));
									$this->session->set_userdata("Logged_level",$temp["role"]);
									redirect(base_url("Home"));
								}
								else
									$Status = "No data found";
							}
							else
								$Status = "Incorrect username or password";
					}
					$this->session->set_flashdata('Status', $Status);
				}
		}
	}
}