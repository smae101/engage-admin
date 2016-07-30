<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	use SwfTools\PDFFile;
	use SwfTools\Configuration;

class System_Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('General_Info');
		$this->load->model("admin");
		$this->load->model('globals');
		$this->load->model('myforms');
		$this->load->model('authentication');
		$this->load->model('thesis_main');
		$this->load->library('form_validation');
		$this->load->helper('array');
	}
	//This is the system login page
	public function index(){
		if(empty($this->session->userdata("Logged_status"))){
			$data['page_title'] = "CIT-U Library || Admin";
			$data['page_active'] = "Login";
			$Status = null;
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
					if($this->myforms->is_validUserName($Username)){
						if($this->authentication->check_Username($Username)){
							if($this->authentication->check_Password($Username,md5($Password))){
								$temp = $this->authentication->get_Data($Username,md5($Password));
								if($temp AND ($temp['Uid'] == "SuperUser" OR $temp['Uid'] == "Admin")){
									$this->session->set_userdata("Logged_status",TRUE);
									$this->session->set_userdata("Logged_User",$temp['Username']);
									$this->session->set_userdata("Logged_encryp",md5(md5($temp['Id'])+md5($temp['Id'])));
									$this->session->set_userdata("Logged_level",$temp["Username"]);
									redirect(base_url("Admin/Dashboard"));
								}else{
									$Status = "User have been Blocked!";
								}
							}
							else
								$Status = "Password is Incorrent!";
						}
						else
							$Status = "Username is Not Authorized!";
					}
					else
						$Status = "Warning! Illegal Transction.";
				}
				$this->session->set_flashdata('Status', $Status);
				// $this->direct("Admin");
				redirect(base_url("Admin"));
			}
			$this->load->view("Globals/Header",$data);
			$this->load->view("Login-section/index");
			// $this->load->view("Globals/regular-footer");
		}else
			redirect(base_url("Admin/Dashboard"));
	}
	//Log out Function
	public function logout(){
		if(!empty($this->session->userdata("Logged_status")) || !empty($this->session->userdata("Logged_user")) || !empty($this->session->userdata("Logged_encryp"))){
			$this->session->sess_destroy();
		}
		redirect(base_url());
	}
	//Admin Thesis
	public function Home($var = null){
		if(empty($this->session->userdata("Logged_status"))){
			redirect(base_url("Admin"));
		}else{
			$this->load->model("thesis_main");
			$data['info'] = $this->admin->get_All($this->session->userdata("Logged_encryp"),$this->session->userdata("Logged_User"));
			if(!empty($var)){
				$data['page_title'] = "Library Search || New";
				$data['table_sorter'] = FALSE;
				$this->load->view("Globals/Header",$data);
				$this->load->view("Admin-section/Abstract-New");
				$this->load->view("Globals/regular-footer");
			}else{
				if($this->input->post()){
					if(!empty($this->input->post("Thesis_Selected"))){
						$To_Delete = filter_var_array($this->input->post("Thesis_Selected"),FILTER_VALIDATE_INT);
						foreach($To_Delete as $Delete){
							$File  = $this->thesis_main->DeletePdf($Delete);
							unlink('assets/pdf/'.$File['File']);						
							$this->thesis_main->DeleteWithId($Delete);
						}
						$Status = "<div class='alert alert-success'>Successfully Deleted Thesis Record(s)</div>";
					}else{
						$Status = "<div class='alert alert-warning'>Please Select Item(s) To Be Deleted!</div>";
					}
					$this->session->set_flashdata('Status',$Status);
					redirect(base_url("Admin/Dashboard"));
				}
				$data['category1']="";
				$data['keyword1']="";
				$data['txtField1']="";
				$data['condition']="";

				$data['category2']="";
				$data['keyword2']="";
				$data['txtField2']="";

				$data['subject']="";
				$data['txt1']="";
				$data['page_title'] = "Library Search || Admin";
				$data['table_sorter'] = TRUE;
				$data['page_sorter_base'] = "Thesis";
				$data['abstract_count_all'] = $this->thesis_main->countAll();
				$data['abstract_count_published'] = $this->thesis_main->countPublished();
				$data['Abstract'] = $this->thesis_main->selectAll();
				// $data['author'] = $this->thesis_main->getAuthor();
				$this->load->view("Globals/Header-Admin",$data);
				$this->load->view("Globals/nav_bar_admin");
				$this->load->view("Admin-section/Abstract");
				$this->load->view("Admin-section/Modal-Admin");
				$this->load->view("Globals/regular-footer");
			}
		}
	}
	//Create New Blog Post
	public function Abstract_New(){
		if(empty($this->session->userdata("Logged_status"))){
			redirect(base_url("Admin"));
		}else{
			$this->load->model("thesis_main");
			$data['info'] = $this->admin->get_All($this->session->userdata("Logged_encryp"),$this->session->userdata("Logged_User"));
			$data['page_title'] = "Library Search || New Abstract";
			$data['table_sorter'] = FALSE;
			$data['Abstract_College'] = $this->thesis_main->getCollege();		
			$data['Abstract_keyword'] = array("Technology","Computers");
			$data['Abstract_status'] = array("Available","Missing","Damaged","Discarded","For Bindery","Lost","On Process","Pending");
			$data['Abstract_month'] = array("January","February","March","April","May","June","July","August","September","October","November","December");
			$data['Editor'] =TRUE;
			$data['allow_date_picker'] = TRUE;
			$data['datetxt']="";
			$data['page_type'] = "New";
			$this->load->view("Globals/Header",$data);
			$this->load->view("Admin-section/Abstract-new");
			$this->load->view("Globals/regular-footer");
		}
	}
	//Edit Blog Post
	public function Edit_Abstract_With_Num($id=null){
		if(empty($this->session->userdata("Logged_status"))){
			redirect(base_url("Admin"));
		}else{
			$this->load->model("thesis_main");
			$data['info'] = $this->admin->get_All($this->session->userdata("Logged_encryp"),$this->session->userdata("Logged_User"));
			$data['page_title'] = "Library Search || Edit Thesis";
			$data['table_sorter'] = FALSE;
			$data['Abstract_College'] = $this->thesis_main->getCollege();
			$data['Abstract_status'] = array("Available","Missing","Damaged","Discarded","For Bindery","Lost","On Process","Pending");
			$data['Abstract_month'] = array("January","February","March","April","May","June","July","August","September","October","November","December");
			$data['Editor'] =TRUE;
			$data['allow_date_picker'] = TRUE;
			$book = $this->thesis_main->getById($id);
			$data['page_type'] = "Edit";
			$data["Data"] = $this->thesis_main->getById($id);
			$this->load->view("Globals/Header",$data);
			$this->load->view("Admin-section/Abstract-new");
			$this->load->view("Globals/regular-footer");
		}
	}
	//Save Editted Blog Post
	public function SaveEditedAbstract(){
		if(empty($this->session->userdata("Logged_status"))){
			redirect(base_url("Admin"));
		}else{
			if($this->input->post()){
				$this->load->model("thesis_main");
				$Id = filter_var($this->input->post("Id_Thesis",TRUE),FILTER_VALIDATE_INT);
				$c_loc = $this->input->post('location');
				$c_dewey = $this->input->post('deweyDecimal');
				$c_deweyExtend = $this->input->post('deweyExtension');
				$c_class = $this->input->post('classNumber');
				$c_printDate = $this->input->post('printDate');
				$c_numCopy = $this->input->post('numCopy');

				$accNum = $this->input->post('accNumber');
					
				$Date_Held = $this->input->post('Date_Start');
				$volNum = $this->input->post('volNume');
				$issNum = $this->input->post('issNum');
				if(!empty($this->input->post('regular'))){
					$reg=TRUE;
				}else{
					$reg=FALSE;
				}

				$b1 = $this->input->post('semNum');
				$b2 = $this->input->post('publish_year');
				$b3 = $this->input->post('groupNum');
				$Title = filter_var($this->input->post("title",true),FILTER_SANITIZE_STRING);
				$Body = $this->input->post("description");
				$Department = filter_var($this->input->post("departmentList",true),FILTER_SANITIZE_STRING);
				$Month = $this->input->post('publish_month');
				$Year =  $this->input->post('publish_year');				
				$Status = filter_var($this->input->post("Status",true),FILTER_SANITIZE_STRING);
				$Author = $this->input->post('author');
				$countAuthor = sizeof($Author);
                $Adviser = $this->input->post('adviser');
                $countAdviser = sizeof($Adviser);
                $Subject = $this->input->post('subject');
                $countSubject = sizeof($Subject);
                $Keyword = $this->input->post('keyword');
                $countKeyword = sizeof($Keyword);
				$Update = array(
					"Call_Location" => $c_loc,
					"Call_Dewey" => $c_dewey,
					"Call_DeweyExtend" => $c_deweyExtend,
					"Call_ClassNum" => $c_class, 
					"Call_Year" => $c_printDate, 
					"Call_Copy" => $c_numCopy,
					"Accession_Number" => $accNum,
					"Book_Sem" => $b1,
					"Book_Year" => $b2,
					"Book_Group" => $b3,
 					"Book_Number" => $b1."-".$b2."-".$b3,
 					"Volume_Number" => $volNum,
 					"Issue_Number" => $issNum,
 					"Regular" => $reg,
					"Title" => $Title,
					"Published_Month" =>$Month,
					"Date_Received" => $Date_Held,
					"Department" => $Department,
					"Published_Year" =>$Year,
					"Description" => $Body,
					// "Author" => $Author['Id'],
					"Status" => $Status
				);
				$config =  array(
				 'file_name'		=> uniqid(rand()),
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/assets/pdf",
                  'upload_url'      => base_url()."assets/pdf",
                  'allowed_types'   => "pdf",
                  'overwrite'       => TRUE,
                  'max_size'        => "300000KB",
                  'encrypt_name'	=> TRUE
                );
                $this->load->library('upload', $config);
                if($this->upload->do_upload())
				{
				    $pdf = $this->upload->data();
					$pdfFile = $pdf['file_name'];
					$Update += array(
						"File" => $pdfFile
					);
				}
				$data['info'] = $this->admin->get_All($this->session->userdata("Logged_encryp"),$this->session->userdata("Logged_User"));
				$data['page_title'] = "Library Search || Saved Edit";
				$data['page_admin'] = TRUE;
				$data['table_sorter'] = FALSE;
				$data['Editor'] =TRUE;
				$data['page_type'] = "Edit";
				$this->thesis_main->update($Update,$Id);
				$this->thesis_main->deleteAuthor($Id);
				$this->thesis_main->deleteAdviser($Id);
				$this->thesis_main->deleteKeyword($Id);
				$this->thesis_main->deleteSubject($Id);
				try{
					$Id = $this->thesis_main->getThesis_Id($Title);
					for($i = 0;$i<$countAuthor; $i++){
						$addAuthor = ucwords($Author[$i]);
						if ($addAuthor != null) {
							$queryAuthor = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Name" => $addAuthor
								);
		                    $this->thesis_main->Create_Author($queryAuthor);
						}
					}
					for($i = 0; $i<$countAdviser; $i++){
						$addAdviser = ucwords($Adviser[$i]);
						if ($addAdviser != null) {
							$queryAdviser = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Name" => $addAdviser
								);
		                    $this->thesis_main->Create_Adviser($queryAdviser);
						}
					}
					for($i = 0; $i<$countKeyword; $i++){
						$addKeyword = ucwords($Keyword[$i]);
						if ($addKeyword != null) {
							$queryKeyword = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Keyword" => $addKeyword
								);
		                    $this->thesis_main->Create_Keyword($queryKeyword);
						}
					}
					for($i = 0; $i<$countSubject; $i++){
						$addSubject = ucwords($Subject[$i]);
						if ($addSubject != null) {
							$querySubject = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Subject" => $addSubject
								);
		                    $this->thesis_main->Create_Subject($querySubject);
						}
					}
					$Status = "<div class='alert alert-success'>Successfully Updated A Thesis Report</div>";
				}catch(Exception $e){
					$Status = "<div class='alert alert-success'>Something Went Wrong!Please Contact Admin.</div>";
				}
				$this->session->set_flashdata("Status",$Status);
				// $data["Data"] = $this->thesis_main->getById($Id);
				// $this->load->view("Globals/Header",$data);
				// $this->load->view("Admin-section/blog-new");
				// $this->load->view("Globals/regular-footer");
				redirect("Admin/Dashboard");
			}
		}
	}
	//This function Let The Admin Create New Thesis File  
	public function Abstract_Create(){
		$this->load->model("thesis_main");
		if(empty($this->session->userdata("Logged_status"))){
			redirect(base_url("Admin"));
		}else{
			$this->load->helper('array');
			if($this->input->post()){
				$c_loc = $this->input->post('location');
				$c_dewey = $this->input->post('deweyDecimal');
				$c_deweyExtend = $this->input->post('deweyExtension');
				$c_class = $this->input->post('classNumber');
				$c_printDate = $this->input->post('printDate');
				$c_numCopy = $this->input->post('numCopy');

				$accNum = $this->input->post('accNumber');

				// if($this->input->post("Date_Start",TRUE) == null){
				// 	$Date = getDate("U");
				// 	$DispDate = $Date['year']."-".$Date['mon']."-".$Date['mday'];
				// 	$Date_Held = date("Y-M-j",strtotime($DispDate));
				// }					
				// else
				// 	$Date_Held = $this->input->post('Date_Start');

				// $Date_Held = date("Y-M-j",strtotime($DispDate));
				$Date_Held = $this->input->post('Date_Start');

				$volNum = $this->input->post('volNume');
				$issNum = $this->input->post('issNum');
				if(!empty($this->input->post('regular'))){
					$reg=TRUE;
				}else{
					$reg=FALSE;
				}

				$b1 = $this->input->post('semesterNum');
				$b2 = $this->input->post('publish_year');
				$b3 = $this->input->post('groupNum');
				$Title = filter_var($this->input->post("title",true),FILTER_SANITIZE_STRING);
				$Body = $this->input->post("description");
				$Department = filter_var($this->input->post("departmentList",true),FILTER_SANITIZE_STRING);
				$Month = $this->input->post('publish_month');
				$Year =  $this->input->post('publish_year');				
				$Status = filter_var($this->input->post("Status",true),FILTER_SANITIZE_STRING);
				$Author = $this->input->post('author');
				$countAuthor = sizeof($Author);
                $Adviser = $this->input->post('adviser');
                $countAdviser = sizeof($Adviser);
                $Subject = $this->input->post('subject');
                $countSubject = sizeof($Subject);
                $Keyword = $this->input->post('keyword');
                $countKeyword = sizeof($Keyword);

				$Thesis = array(
					"Call_Location" => $c_loc,
					"Call_Dewey" => $c_dewey,
					"Call_DeweyExtend" => $c_deweyExtend,
					"Call_ClassNum" => $c_class, 
					"Call_Year" => $c_printDate, 
					"Call_Copy" => $c_numCopy,
					"Accession_Number" => $accNum,
					"Book_Sem" => $b1,
					"Book_Year" => $b2,
					"Book_Group" => $b3,
 					"Book_Number" => $b1."-".$b2."-".$b3,
 					"Volume_Number" => $volNum,
 					"Issue_Number" => $issNum,
 					"Regular" => $reg,
					"Title" => $Title,
					"Published_Month" =>$Month,
					"Date_Received" => $Date_Held,
					"Department" => $Department,
					"Published_Year" =>$Year,
					"Description" => $Body,
					// "Author" => $Author['Id'],
					"Status" => $Status
				);
				$config =  array(
				  'file_name'		=> uniqid(rand()),
                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/assets/pdf",
                  'upload_url'      => base_url()."assets/pdf",
                  'allowed_types'   => "pdf",
                  'overwrite'       => TRUE,
                  'max_size'        => "300000KB",
                  'encrypt_name'	=> TRUE
                );
                $this->load->library('upload', $config);
                if($this->upload->do_upload())
				{
				    $Pdf = $this->upload->data();
				    $pdfFile = $Pdf['file_name'];
					// $Update += array(
					// 	"File" => $pdfFile
					// );
				    // echo $Pdf['tmp_name'].' '.$Pdf['file_name'];
					// $PdfFile = $Pdf['file_name'];
					// $swfFile = explode(".",$Pdf['file_name']);
				    // exec("C:\\Program Files (x86)\\SWFTools\\pdf2swf.exe C:\\xampp\\htdocs\\abstractsearch\\assets\\pdf\\".$Pdf['file_name']." -o C:\\xampp\\htdocs\\abstractsearch\\assets\\swf\\".$swfFile[0].".swf");
					
					// $Pdf['file_name'];
					$Thesis += array(
						"File" => $pdfFile
						// "File" => $swfFile[0].'.swf'
					);
					// print_r($Thesis);
				}
				$Status = null;
				$this->load->helper('array');
				try{
					$this->thesis_main->Create_thesis_information($Thesis);

					$Id = $this->thesis_main->getThesis_Id($Title);
					for($i = 0;$i<$countAuthor; $i++){
						$addAuthor = ucwords($Author[$i]);
						if ($addAuthor!=null) {
							$queryAuthor = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Name" => $addAuthor
								);
		                    $this->thesis_main->Create_Author($queryAuthor);
						}
					}
					for($i = 0; $i<$countAdviser; $i++){
						$addAdviser = ucwords($Adviser[$i]);
						if ($addAdviser!=null) {
							$queryAdviser = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Name" => $addAdviser
								);
		                    $this->thesis_main->Create_Adviser($queryAdviser);
						}
					}
					for($i = 0; $i<$countKeyword; $i++){
						$addKeyword = ucwords($Keyword[$i]);
						if ($addKeyword!=null) {
							$queryKeyword = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Keyword" => $addKeyword
								);
		                    $this->thesis_main->Create_Keyword($queryKeyword);
						}
					}
					for($i = 0; $i<$countSubject; $i++){
						$addSubject = ucwords($Subject[$i]);
						if ($addSubject!=null) {
							$querySubject = array( 
								"Id_Thesis" => $Id['Id_Thesis'],
								"Subject" => $addSubject
								);
		                    $this->thesis_main->Create_Subject($querySubject);
						}
					}
					$Status = "<div class='alert alert-success'>Successfully Added New Thesis!</div>";
				} catch (Exception $e){
					$Status = "<div class='alert alert-warning'>Something Went Wrong!,Please Contact Admin.</div>";
				}
				$this->session->set_flashdata("Status",$Status);
			}
			redirect(base_url("Admin/Dashboard"));
		}
	}
}