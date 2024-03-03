<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Settings";
		$this->data['main_menu_active'] = 'Settings';
        $this->data['sub_menu_active'] = "";
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array();
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_settings', 'acpSettings');
		if (!hasUserAccess(6)) acp_show403();
		date_default_timezone_set(TIMEZONE);
		$this->load->library("pagination");
		$this->load->library('csvimport');
		$this->load->helper('file');
	}

	// Initial Listing
	public function index()
	{
		$this->load->model('acp/Manage_common', 'commonModel');
        $this->data['settings'] = $this->commonModel->getSiteDetails();
        $this->data['countries'] = $this->commonModel->getCountry();
		$this->data['provinces'] = array();
		if (!empty($this->data['settings']) && isset($this->data['settings']['site_country']) && !empty($this->data['settings']['site_country']))
        $this->data['provinces'] = $this->commonModel->getProvince($this->data['settings']['site_country'], 'country_id');
		$this->data['available_currency'] = $this->commonModel->getAvailableCurrencies();
		$this->load->view('acp/settings', $this->data);
	}

	// Listing Province/State related to selected country
	public function ajaxProvince()
	{
		if ($this->input->is_ajax_request()) {
			$this->load->model('acp/Manage_common', 'commonModel');
			$country = $this->input->post('cid', true);
			$provinces = $this->commonModel->getProvince($country, 'country_id');
			$options = '';
			foreach ($provinces as $province) {
				$options .= "<option value='{$province['province_id']}'>{$province['province_name']} ({$province['province_code']})</option>";
			}
			send_json_response(array('provinceList' => $options));
		}
	}

	// Save or Update a Settings
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$setgs = $this->input->post(null, true);
			
			$save = $this->acpSettings->saveSettings($setgs);
			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Settings updated successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	public function metatag()
	{
//echo "hello";
$this->data['page_title'] = "List Categories";
		$this->data['page_breadcrumb'] = array("Categories" => array('active' => true, 'link' => site_url().'acp/Categories'));
		$this->data['innersub_menu_active'] = "List Categories";
		//$this->load->view('acp/categories', $this->data);
		$this->data['meta'] = $this->commonModel->getdata();
$this->load->view('acp/addmetatag', $this->data);


	}
	public function homepage()
	{
//echo "hello";
$this->data['page_title'] = "List HomePage Details";
		$this->data['page_breadcrumb'] = array("Categories" => array('active' => true, 'link' => site_url().'acp/Categories'));
		$this->data['innersub_menu_active'] = "List HomePage Details";
		//$this->load->view('acp/categories', $this->data);
		$this->data['meta'] = $this->commonModel->getdata();
$this->load->view('acp/addhomepage', $this->data);


	}






	public function managemetatagprocess(){

		$this->load->model('acp/Manage_common', 'commonModel');
		$meta1 = $this->input->post('meta1', true);
		$meta2 = $this->input->post('meta2', true);
		$meta3 = $this->input->post('meta3', true);
		$meta4 = $this->input->post('meta4', true);
		$meta5 = $this->input->post('meta5', true);
		$meta6 = $this->input->post('meta6', true);
		$data=array("meta1"=>$meta1,"meta2"=>$meta2,"meta3"=>$meta3,"meta4"=>$meta4,"meta5"=>$meta5,"meta6"=>$meta6);
		$this->data['data'] = $this->commonModel->insertdata($data);
		$this->session->set_flashdata('flash_msg', 'Meta tag edited successfully');
		redirect("acp/Settings/metatag");

	}


	public function managehomepageprocess(){

		$this->load->model('acp/Manage_common', 'commonModel');
		//$this->db->where('serviceid',1);
		$this->db->select('*');
		$this->db->from('homepagedetails');
		$query = $this->db->get();
	   $imgdetails=$query->row();
	   $image1old=$imgdetails->banner1;
	   $image2old=$imgdetails->banner2;
	   $image3old=$imgdetails->image1;
	   $image4old=$imgdetails->image2;
	   $image5old=$imgdetails->image3;
	   //$image2old=$imgdetails->banner2;


	   $image6old=$imgdetails->img1;
	   $image7old=$imgdetails->img2;
	   $image8old=$imgdetails->img3;
	   $image9old=$imgdetails->img4;


		$file_ext = pathinfo($_FILES["image1"]["name"],PATHINFO_EXTENSION);	
		$new_name = time().'banner1'.'.'.$file_ext;
		$config1['file_name'] = $new_name;
		$config1['upload_path'] = 'assets/uploads/homepage';
		$config1['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config1['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config1);
		$this->upload->initialize($config1);
		if (($_FILES['image1']['name'])!='') {
		//if (isset($_FILES['image1']['name'])) {
			if (0 < $_FILES['image1']['error']) {
				echo 'Error during file upload' . $_FILES['image1']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image1=$image1old;
				} else {
					
					if (!$this->upload->do_upload('image1')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image1=$new_name;
					}
					$image1=$image1old;
	
				}
			}
			$image1=$new_name;;
	
		} else {
			//echo 'Please choose a file';
			$image1=$image1old;
	
		}
	
	
	
		$file_ext2 = pathinfo($_FILES["image2"]["name"],PATHINFO_EXTENSION);	
		$new_name2 = time().'banner2nd'.'.'.$file_ext2;
		$config2['file_name'] = $new_name2;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image2']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image2']['error']) {
				echo 'Error during file upload' . $_FILES['image2']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name2)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image2=$image2old;
				} else {
					
					if (!$this->upload->do_upload('image2')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image2=$new_name2;
					}
					$image2=$image2old;
	
				}
			}
			$image2=$new_name2;
	
		} else {
			//echo 'Please choose a file';
			$image2=$image2old;
	
		}



		$file_ext3 = pathinfo($_FILES["image3"]["name"],PATHINFO_EXTENSION);	
		$new_name3 = time().'banner3rd'.'.'.$file_ext3;
		$config2['file_name'] = $new_name3;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image3']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image3']['error']) {
				echo 'Error during file upload' . $_FILES['image3']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name2)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image3=$image3old;
				} else {
					
					if (!$this->upload->do_upload('image3')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image3=$new_name3;
					}
					$image3=$image3old;
	
				}
			}
			$image3=$new_name3;
	
		} else {
			//echo 'Please choose a file';
			$image3=$image3old;
	
		}


		$file_ext4 = pathinfo($_FILES["image4"]["name"],PATHINFO_EXTENSION);	
		$new_name4 = time().'banner4rd'.'.'.$file_ext4;
		$config2['file_name'] = $new_name4;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image4']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image4']['error']) {
				echo 'Error during file upload' . $_FILES['image4']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name4)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image4=$image4old;
				} else {
					
					if (!$this->upload->do_upload('image4')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image4=$new_name4;
					}
					$image4=$image4old;
	
				}
			}
			$image4=$new_name4;
	
		} else {
			//echo 'Please choose a file';
			$image4=$image4old;
	
		}


		$file_ext5 = pathinfo($_FILES["image5"]["name"],PATHINFO_EXTENSION);	
		$new_name5 = time().'banner5th'.'.'.$file_ext5;
		$config2['file_name'] = $new_name5;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image5']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image5']['error']) {
				echo 'Error during file upload' . $_FILES['image5']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name5)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image5=$image5old;
				} else {
					
					if (!$this->upload->do_upload('image5')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image5=$new_name5;
					}
					$image5=$image5old;
	
				}
			}
			$image5=$new_name5;
	
		} else {
			//echo 'Please choose a file';
			$image5=$image5old;
	
		}



		$file_ext6 = pathinfo($_FILES["image6"]["name"],PATHINFO_EXTENSION);	
		$new_name6 = time().'img6th'.'.'.$file_ext6;
		$config2['file_name'] = $new_name6;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg|svg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image6']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image6']['error']) {
				echo 'Error during file upload' . $_FILES['image6']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name6)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image6=$image6old;
				} else {
					
					if (!$this->upload->do_upload('image6')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image6=$new_name6;
					}
					$image6=$image6old;
	
				}
			}
			$image6=$new_name6;
	
		} else {
			//echo 'Please choose a file';
			$image6=$image6old;
	
		}



		$file_ext7 = pathinfo($_FILES["image7"]["name"],PATHINFO_EXTENSION);	
		$new_name7 = time().'img7th'.'.'.$file_ext7;
		$config2['file_name'] = $new_name7;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg|svg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image7']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image7']['error']) {
				echo 'Error during file upload' . $_FILES['image7']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name7)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image7=$image7old;
				} else {
					
					if (!$this->upload->do_upload('image7')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image7=$new_name7;
					}
					$image7=$image7old;
	
				}
			}
			$image7=$new_name7;
	
		} else {
			//echo 'Please choose a file';
			$image7=$image7old;
	
		}



		$file_ext8 = pathinfo($_FILES["image8"]["name"],PATHINFO_EXTENSION);	
		$new_name8 = time().'img8th'.'.'.$file_ext8;
		$config2['file_name'] = $new_name8;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg|svg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image8']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image8']['error']) {
				echo 'Error during file upload' . $_FILES['image8']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name8)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image8=$image8old;
				} else {
					
					if (!$this->upload->do_upload('image8')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image8=$new_name8;
					}
					$image8=$image8old;
	
				}
			}
			$image8=$new_name8;
	
		} else {
			//echo 'Please choose a file';
			$image8=$image8old;
	
		}




		$file_ext9 = pathinfo($_FILES["image9"]["name"],PATHINFO_EXTENSION);	
		$new_name9 = time().'img9th'.'.'.$file_ext9;
		$config2['file_name'] = $new_name9;
		$config2['upload_path'] = 'assets/uploads/homepage';
		$config2['allowed_types'] = 'gif|jpg|png|jpeg|svg';	
		$config2['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config2);
		$this->upload->initialize($config2);
		if (($_FILES['image9']['name'])!='') {
		//if (isset($_FILES['image2']['name'])) {
			if (0 < $_FILES['image9']['error']) {
				echo 'Error during file upload' . $_FILES['image9']['error'];
			} else {
				if (file_exists('assets/uploads/homepage/'.$new_name9)) {
					//echo 'File already exists : uploads/contactus/'.$new_name;
					$image9=$image9old;
				} else {
					
					if (!$this->upload->do_upload('image9')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image9=$new_name9;
					}
					$image9=$image9old;
	
				}
			}
			$image9=$new_name9;
	
		} else {
			//echo 'Please choose a file';
			$image9=$image9old;
	
		}














	
		$desc1 = $this->input->post('desc1', true);
		$desc2 = $this->input->post('desc2', true);
		$title1 = $this->input->post('title1', true);
		$title2 = $this->input->post('title2', true);


		$label1 = $this->input->post('label1', true);
		$label2 = $this->input->post('label2', true);
		$label3 = $this->input->post('label3', true);
		$label4 = $this->input->post('label4', true);
		$label5 = $this->input->post('label5', true);
		$label6 = $this->input->post('label6', true);
		$label7 = $this->input->post('label7', true);
		$label8 = $this->input->post('label8', true);

		$label9 = $this->input->post('label9', true);
		$label10 = $this->input->post('label10', true);
		$label11 = $this->input->post('label11', true);
		$label12 = $this->input->post('label12', true);
		$label13 = $this->input->post('label13', true);
		$label14 = $this->input->post('label14', true);
		$label15 = $this->input->post('label15', true);
		$label16 = $this->input->post('label16', true);

		$label17 = $this->input->post('label17', true);
		$label18 = $this->input->post('label18', true);

		$membershipdesc= $this->input->post('membershipdesc', true);
		/*$meta3 = $this->input->post('meta3', true);
		$meta4 = $this->input->post('meta4', true);
		$meta5 = $this->input->post('meta5', true);
		$meta6 = $this->input->post('meta6', true);*/
		$data=array("label17"=>$label17,"label18"=>$label18,"img1"=>$image6,"img2"=>$image7,"img3"=>$image8,"img4"=>$image9,"image1"=>$image3,"image2"=>$image4,"image3"=>$image5,"label9"=>$label9,"label10"=>$label10,"label11"=>$label11,"label12"=>$label12,"label13"=>$label13,"label14"=>$label14,"label15"=>$label15,"label16"=>$label16,"label8"=>$label8,"label1"=>$label1,"label2"=>$label2,"label3"=>$label3,"label4"=>$label4,"label5"=>$label5,"label6"=>$label6,"label7"=>$label7,"label8"=>$label8,"banner1"=>$image1,"banner2"=>$image2,"desc1"=>$desc1,"desc2"=>$desc2,"title1"=>$title1,"title2"=>$title2,'membershipdesc'=>$membershipdesc);
		//"meta3"=>$meta3,"meta4"=>$meta4,"meta5"=>$meta5,"meta6"=>$meta6);
		$this->data['data'] = $this->commonModel->updatedata($data);
		$this->session->set_flashdata('flash_msg', 'Home Page details edited successfully');
		redirect("acp/Settings/Homepage");

	}


	public function listmenus(){
		$this->load->model('acp/Manage_common', 'commonModel');


		$config = array();
$config["base_url"] = base_url()."acp/Settings/listmenus";
$config["total_rows"] = $this->commonModel->get_countmenu();
$config["per_page"] = 10;
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
$data["links"] = $this->pagination->create_links();	
$data['result']=$this->commonModel->get_menuadmin($config["per_page"],$page);
/*$data['contactus']=$this->sm->get_contactus();
$data['newsletter']=$this->sm->get_newsletter();
$data['siteinf']=$this->sm->get_siteinf();*/
$this->data['page_title'] = "List Menu";
//$this->data['page_title'] = "List Carousal";
$this->data['page_breadcrumb'] = array("Menu" => array('active' => false, 'link' => site_url().'acp/Settings/listmenu'), ((empty($uid))? "List" : (($view)? "View" : "List" )) => array('active' => true, 'link' => ''));
		//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/listmenus'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), "List Brands" => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = "List Menu";
		$this->load->view('acp/listmenus', $this->data);


//$this->load->view('acp/addmenu', $this->data);

	}



	
// Ajax Listing
public function getMenus()
{
	if ($this->input->is_ajax_request()) {
		$this->data['productbrands'] = $this->acpProducts->getBrands();
		$this->load->view('acp/includes/productBrandsTable', $this->data);
	}
}

public function getMenuTable()
{
	if ($this->input->is_ajax_request()) {
		$this->data['menu'] = $this->commonModel->getMenu();
		$this->load->view('acp/includes/menuTable', $this->data);
	}
}

public function getcarousalTable()
{
	if ($this->input->is_ajax_request()) {
		$this->data['carousal'] = $this->commonModel->getcarousal();
		$this->load->view('acp/includes/carousalTable', $this->data);
	}
}

public function getcarousalTable1()
{
	if ($this->input->is_ajax_request()) {
		
		//$this->data['carousal1'] = $this->commonModel->get_customers();
		//$this->load->view('acp/includes/carousalTable1', $this->data);
		$this->data['customers'] = $this->commonModel->get_customers();
	$this->load->view('acp/includes/customersTable', $this->data);

	}
}



public function getbillingdetailsTable(){

	if ($this->input->is_ajax_request()) {
		//$this->data['carousal'] = $this->commonModel->getcarousal();
		$this->data['billcustomers'] = $this->commonModel->get_billingdetails();
	$this->load->view('acp/includes/billingTable', $this->data);
	}

}


public function getcustomersTable()
{
	if ($this->input->is_ajax_request()) {
		//$this->data['carousal'] = $this->commonModel->getcarousal();
		$this->data['customers'] = $this->commonModel->get_customers();
	$this->load->view('acp/includes/customersTable', $this->data);
	}
}

public function listcarousal(){
	$this->load->model('acp/Manage_common', 'commonModel');


	$config = array();
//$config["base_url"] = base_url()."acp/Settings/listmenus";
$config["base_url"] = base_url()."acp/Settings/listcarousal";
//$config["total_rows"] = $this->commonModel->get_countmenu();
$config["total_rows"] = $this->commonModel->get_countcarousel();
$config["per_page"] = 10;
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
$data["links"] = $this->pagination->create_links();	
//$data['result']=$this->commonModel->get_menuadmin($config["per_page"],$page);
$data['result']=$this->commonModel->get_carousel($config["per_page"],$page);
/*$data['contactus']=$this->sm->get_contactus();
$data['newsletter']=$this->sm->get_newsletter();
$data['siteinf']=$this->sm->get_siteinf();*/
$this->data['page_title'] = "List Carousal";
$this->data['page_breadcrumb'] = array("Carousel" => array('active' => false, 'link' => site_url().'acp/Settings/listcarousal'), ((empty($uid))? "List" : (($view)? "View" : "List" )) => array('active' => true, 'link' => ''));
	//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/listmenus'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), "List Brands" => array('active' => true, 'link' => ''));
	$this->data['innersub_menu_active'] = "List  Carousal";
	$this->load->view('acp/listcarousal', $this->data);


//$this->load->view('acp/addmenu', $this->data);

}


//public function listcarousal1(){
	public function listcustomers(){
	$this->load->model('acp/Manage_common', 'commonModel');


	$config = array();
//$config["base_url"] = base_url()."acp/Settings/listmenus";
$config["base_url"] = base_url()."acp/Settings/listcustomers";
//$config["total_rows"] = $this->commonModel->get_countmenu();
//$config["total_rows"] = $this->commonModel->get_countcarousel();
$config["total_rows"] = $this->commonModel->get_countcustomers();
$config["per_page"] = 10;
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
$data["links"] = $this->pagination->create_links();	
//$data['result']=$this->commonModel->get_menuadmin($config["per_page"],$page);
//$data['result']=$this->commonModel->get_carousel($config["per_page"],$page);

$data['result']=$this->commonModel->get_customers($config["per_page"],$page);
/*$data['contactus']=$this->sm->get_contactus();
$data['newsletter']=$this->sm->get_newsletter();
$data['siteinf']=$this->sm->get_siteinf();*/
$this->data['page_title'] = "List Customers";
$this->data['page_breadcrumb'] = array("Carousel" => array('active' => false, 'link' => site_url().'acp/Settings/listcarousal1'), ((empty($uid))? "List" : (($view)? "View" : "List" )) => array('active' => true, 'link' => ''));
	//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/listmenus'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), "List Brands" => array('active' => true, 'link' => ''));
	$this->data['innersub_menu_active'] = "List  Customers";
	//$this->load->view('acp/listcarousal1', $this->data);
$this->load->view('acp/listcustomers', $this->data);



}



public function listbillingdetails(){
	$this->load->model('acp/Manage_common', 'commonModel');


	$config = array();
//$config["base_url"] = base_url()."acp/Settings/listmenus";
$config["base_url"] = base_url()."acp/Settings/listbillingdetails";
//$config["total_rows"] = $this->commonModel->get_countmenu();
//$config["total_rows"] = $this->commonModel->get_countcarousel();
$config["total_rows"] = $this->commonModel->get_countbillingdetails();
$config["per_page"] = 10;
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
$data["links"] = $this->pagination->create_links();	
//$data['result']=$this->commonModel->get_menuadmin($config["per_page"],$page);
//$data['result']=$this->commonModel->get_carousel($config["per_page"],$page);

$data['result']=$this->commonModel->get_billingdetails($config["per_page"],$page);
/*$data['contactus']=$this->sm->get_contactus();
$data['newsletter']=$this->sm->get_newsletter();
$data['siteinf']=$this->sm->get_siteinf();*/
$this->data['page_title'] = "List Billing details";
$this->data['page_breadcrumb'] = array("Billing details" => array('active' => false, 'link' => site_url().'acp/Settings/listbillingdetails'), ((empty($uid))? "List" : (($view)? "View" : "List" )) => array('active' => true, 'link' => ''));
	//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/listmenus'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), "List Brands" => array('active' => true, 'link' => ''));
	$this->data['innersub_menu_active'] = "List Billing details";
	//$this->load->view('acp/listcarousal1', $this->data);
$this->load->view('acp/listbillingdetails', $this->data);



}





















public function listcustomers_old(){
	$this->load->model('acp/Manage_common', 'commonModel');


	$config = array();
$config["base_url"] = base_url()."acp/Settings/listcustomers";
$config["total_rows"] = $this->commonModel->get_countcustomers();
$config["per_page"] = 10;
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
$data["links"] = $this->pagination->create_links();	
$data['result']=$this->commonModel->get_customers($config["per_page"],$page);
/*$data['contactus']=$this->sm->get_contactus();
$data['newsletter']=$this->sm->get_newsletter();
$data['siteinf']=$this->sm->get_siteinf();*/
$this->data['page_title'] = "List Customers";
$this->data['page_breadcrumb'] = array("Carousel" => array('active' => false, 'link' => site_url().'acp/Settings/listcustomers'), ((empty($uid))? "List" : (($view)? "View" : "List" )) => array('active' => true, 'link' => ''));
	//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/listmenus'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), "List Brands" => array('active' => true, 'link' => ''));
	$this->data['innersub_menu_active'] = "List  Carousal";
	$this->load->view('acp/listcustomers', $this->data);


//$this->load->view('acp/addmenu', $this->data);

}




















public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$brand = $this->input->post('brand', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->commonModel->actionMenu($brand, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Menu '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}




	public function actioncarousal()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$brand = $this->input->post('brand', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->commonModel->actioncarousel($brand, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Carousel '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}


	public function actioncust()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$brand = $this->input->post('brand', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->commonModel->actioncust($brand, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Customer '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	public function actionbill()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$brand = $this->input->post('brand', true);
			$action = $this->input->post('action', true); // 2=> delete / 0=> lock / 1=> unlock
			$resp = $this->commonModel->actionbill($brand, $action);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Billing details '.(($action == 'delete')? 'deleted' : (($action == 'unlock')? 'unlocked' : 'locked')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}










	public function addmenu($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))." Menu";
		$this->data['page_breadcrumb'] = array("Menu" => array('active' => false, 'link' => site_url().'acp/Settings/listmenu'), ((empty($uid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		
		//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), ((empty($cid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($cid))? "Add Menu" : "List Menu");
		$this->data['productbrand'] = array();
		/*if (!empty($cid)) {
			$this->data['productbrand'] = $this->acpProducts->getBrands($cid);
		}*/

		$this->data['pmenus']=$this->commonModel->get_parentmenus();
		$this->load->view('acp/addmenu', $this->data);
	}



	public function addcarousal($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))."Carousel";
		$this->data['page_breadcrumb'] = array("Carousel" => array('active' => false, 'link' => site_url().'acp/Settings/listcarousal'), ((empty($uid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), ((empty($cid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($cid))? "Add Carousel" : "List Carousel");
		$this->data['productbrand'] = array();
		if (!empty($cid)) {
			$this->data['productbrand'] = $this->acpProducts->getBrands($cid);
		}
		$this->load->view('acp/addcarousal', $this->data);
	}


	public function editcarousel($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))."Carousel";
		$this->data['page_breadcrumb'] = array("Carousel" => array('active' => false, 'link' => site_url().'acp/Settings/listcarousal'), ((empty($uid))? "Edit" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($cid))? "Add Carousel" : "List Carousel");
		//$this->data['carousal'] = array();
		//echo $cid;
		//die;
		if (!empty($cid)) {
			$this->data['carousal'] = $this->commonModel->getcarousalrow($cid);
			//print_r($this->data['carousal']);
			//die;
		}
		$this->load->view('acp/editcarousal', $this->data);
	}


	public function editmenu($mid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($mid))? "Add" : (($view)? "View" : "Edit" ))."Menu";
		$this->data['page_breadcrumb'] = array("Menu" => array('active' => false, 'link' => site_url().'acp/Settings/listmenu'), ((empty($uid))? "Edit" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		//$this->data['page_breadcrumb'] = array("Products" => array('active' => false, 'link' => site_url().'acp/Products'), "Product Brands" => array('active' => false, 'link' => site_url().'acp/Productbrands'), ((empty($cid))? "Add" : (($view)? "View" : "Edit" )) => array('active' => true, 'link' => ''));
		$this->data['innersub_menu_active'] = ((empty($mid))? "Add Menu" : "List Menu");
		//$this->data['carousal'] = array();
		//echo $cid;
		//die;
		if (!empty($mid)) {
			$this->data['result'] = $this->commonModel->getmenurow($mid);
			//print_r($this->data['carousal']);
			//die;
		}
		$this->data['pmenus']=$this->commonModel->get_parentmenus();
		$this->load->view('acp/editmenu', $this->data);
	}







	public function editcarousalprocess(){



		$id=$this->input->post('id');
		$this->db->where('carouselid',$id);
		$this->db->select('*');
		$this->db->from('carousel');
		$query = $this->db->get();
	   $imgdetails=$query->row();
	   $image11=$imgdetails->picture;
		$ext=pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION);
		$new_name = time().'carousel'.'.'.$ext;
		$config['file_name'] = $new_name;
	
		//$file_name=$_FILES['image1']['name'];
		//$new_name = time().$file_name;
		$config['file_name'] = $new_name;
		$config['upload_path'] = 'assets/uploads/carousel';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		//if (isset($_FILES['image1']['name'])) {
			if (($_FILES['image1']['name'])!='') {
			if (0 < $_FILES['image1']['error']) {
				echo 'Error during file upload' . $_FILES['image1']['error'];
			} else {
				if (file_exists('assets/uploads/carousel' . $_FILES['image1']['name'])) {
					echo 'File already exists : assets/uploads/carousel' . $_FILES['image1']['name'];
				} else {
					
					if (!$this->upload->do_upload('image1')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
					}
				}
			}
			$image1=$new_name;
		} else {
			$image1=$image11;
		}
	
		//$image1=$_FILES['image1']['name'];
		//$image2=$_FILES['image2']['name'];
		
	
	
		 $title=$this->input->post('maintitle');
	
		 $title2=$this->input->post('title2');
		 $title3=$this->input->post('title3');
		 $title4=$this->input->post('title4');
		//$link=$this->input->post('link');
		 //$description=$this->input->post('description');
		 $alttag1=$this->input->post('alttag1');
		 $status=$this->input->post('status');
		  //$date=$this->input->post('date');
		  
		 $data = array(
			 //'description' =>"$description",
			 //'link' =>"$link",
			 'title'=>"$title",
			 'title2'=>"$title2",
			 'title3'=>"$title3",
			 'title4'=>"$title4",
			 'picture'=>$image1,
			 'alttagimg1'=>"$alttag1",'active'=>"$status"		
		  );
		  //print_r($data);
		  $id=$this->input->post('id'); 
		  $this->db->where('carouselid',$id);
		  $this->db->update('carousel', $data);
		   //$this->db->insert('problems', $data);
		   
		   //$this->db->insert('carousel', $data);
		  echo ($this->db->affected_rows() != 1) ? 'Error in Editing Carousel' : '<b>Carousel Edited Successfully</b>';
	
	
	
	}










	public function savemenu()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			//$brands = $this->input->post(null, true);
			//$menu=$this->input->post(null, true);
			// Fetching detailed brand from DB
			/*$productBrand = $this->acpProducts->getBrands();
			if (!(isset($brands['brand_id']) && !empty($brands['brand_id']))) {
				foreach ($productBrand as $key => $detailBrand) {
					// product detail brand exist check
					if (strtolower($detailBrand['brand_name']) == strtolower(trim($brands['brand_name']))) {
						send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Brand already exist.'));
					}
				}
			}*/

			/*$brandAdd = array(
				'brand_name' => trim($brands['brand_name']),
				'brand_canonial_name' => trim($brands['brand_canonial_name']),
				'brand_image' => trim($brands['brand_image']),
				'brand_desc' => trim($brands['brand_desc']),
				'brand_added_user' => $this->loggedInUser['user_id'],
			);*/
			/*if (isset($brands['brand_id']) && !empty($brands['brand_id'])) {
				// Edit product brand
				$brandAdd = array_merge($brandAdd, array('brand_id' => trim($brands['brand_id'])));
			}*/
			//$menuAdd=array();
			//$save = $this->acpProducts->saveProductBrand($brandAdd);

			$menuname=$this->input->post('menuname');
			$menutype=$this->input->post('menutype');
			$menuurl=$this->input->post('menuurl');
			$status=$this->input->post('status');
			$pmenu=$this->input->post('pmenu');
			$orderno=$this->input->post('orderno');
			$data = array(
				'orderno' =>"$orderno",
				'menuname' =>"$menuname",
				'menutype' =>"$menutype",
				'url'=>"$menuurl",
				'status'=>$status,'parentmenuid'=>$pmenu,'menuimg'=>$image1,'alttagimg1'=>$alttag1		
			 );
			 //print_r($data);
			 $save=$this->db->insert('menus', $data);
			 
		




			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product brand '.((isset($brands['brand_id']) && !empty($brands['brand_id']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}



	public function _old()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			//$brands = $this->input->post(null, true);
			//$menu=$this->input->post(null, true);
			// Fetching detailed brand from DB
			/*$productBrand = $this->acpProducts->getBrands();
			if (!(isset($brands['brand_id']) && !empty($brands['brand_id']))) {
				foreach ($productBrand as $key => $detailBrand) {
					// product detail brand exist check
					if (strtolower($detailBrand['brand_name']) == strtolower(trim($brands['brand_name']))) {
						send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Brand already exist.'));
					}
				}
			}*/

			/*$brandAdd = array(
				'brand_name' => trim($brands['brand_name']),
				'brand_canonial_name' => trim($brands['brand_canonial_name']),
				'brand_image' => trim($brands['brand_image']),
				'brand_desc' => trim($brands['brand_desc']),
				'brand_added_user' => $this->loggedInUser['user_id'],
			);*/
			/*if (isset($brands['brand_id']) && !empty($brands['brand_id'])) {
				// Edit product brand
				$brandAdd = array_merge($brandAdd, array('brand_id' => trim($brands['brand_id'])));
			}*/
			//$menuAdd=array();
			//$save = $this->acpProducts->saveProductBrand($brandAdd);

			$menuname=$this->input->post('menuname');
			$menutype=$this->input->post('menutype');
			$menuurl=$this->input->post('menuurl');
			$status=$this->input->post('status');
			$pmenu=$this->input->post('pmenu');
			$orderno=$this->input->post('orderno');
			$data = array(
				'orderno' =>"$orderno",
				'menuname' =>"$menuname",
				'menutype' =>"$menutype",
				'url'=>"$menuurl",
				'status'=>$status,'parentmenuid'=>$pmenu,'menuimg'=>$image1,'alttagimg1'=>$alttag1		
			 );
			 //print_r($data);
			 $save=$this->db->insert('menus', $data);
			 
		




			if ($save) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Product brand '.((isset($brands['brand_id']) && !empty($brands['brand_id']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}


	public function savecarousel(){

		$ext=pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION);
		$new_name = time().'carousel'.'.'.$ext;
		$config['file_name'] = $new_name;
	
		//$file_name=$_FILES['image1']['name'];
		//$new_name = time().$file_name;
		$config['file_name'] = $new_name;
		$config['upload_path'] = 'assets/uploads/carousel';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (isset($_FILES['image1']['name'])) {
			if (0 < $_FILES['image1']['error']) {
				echo 'Error during file upload' . $_FILES['image1']['error'];
			} else {
				if (file_exists('assets/uploads/carousel' . $_FILES['image1']['name'])) {
					echo 'File already exists : assets/uploads/carousel' . $_FILES['image1']['name'];
				} else {
					
					if (!$this->upload->do_upload('image1')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
					}
				}
			}
		} else {
			echo 'Please choose a file';
		}
	
		//$image1=$_FILES['image1']['name'];
		//$image2=$_FILES['image2']['name'];
		$image1=$new_name;
	
	
		 $title=$this->input->post('maintitle');
	
		 $title2=$this->input->post('title2');
		 $title3=$this->input->post('title3');
		 $title4=$this->input->post('title4');
		//$link=$this->input->post('link');
		 //$description=$this->input->post('description');
		 //$alttag1=$this->input->post('alttag1');
		 $status=$this->input->post('status');
		  //$date=$this->input->post('date');
		  
		 $data = array(
			 //'description' =>"$description",
			 //'link' =>"$link",
			 'title'=>"$title",
			 'title2'=>"$title2",
			 'title3'=>"$title3",
			 'title4'=>"$title4",
			 'picture'=>$image1,
			 //'alttagimg1'=>"$alttag1",
			 'active'=>"$status"		
		  );
		  //print_r($data);
		  $id=$this->uri->segment(3); 
		  //$this->db->where('testimonialid',$id);
		   //$this->db->update('testimonials', $data);
		   //$this->db->insert('problems', $data);
		   
		   $this->db->insert('carousel', $data);
		  echo ($this->db->affected_rows() != 1) ? 'Error in Adding Carousel' : '<b>Carousel Added Successfully</b>';
	
	
	
	}



	public function editmenuprocess(){

		if ($_FILES['image1']['name']!=''){
	
			$ext=pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION);
		$new_name = time().'menu'.'.'.$ext;
		$config['file_name'] = $new_name;
		
		$config['upload_path'] = 'uploads/menu';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';	
		$config['max_size'] = '1024'; //1 MB
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (isset($_FILES['image1']['name'])) {
			if (0 < $_FILES['image1']['error']) {
				echo 'Error during file upload' . $_FILES['image1']['error'];
			} else {
				if (file_exists('uploads/menu' .$new_name)) {
					echo 'File already exists : uploads/menu'.$new_name;
				} else {
					
					if (!$this->upload->do_upload('image1')) {
						//echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
						$image1=$new_name;
					}
	
	
				}
			}
		} else {
			//echo 'Please choose a file';
		}
	}
	else{
		$image1='';
	}
		
	
	
		$alttag1=$this->input->post('alttagimg1');
		$menuid=$this->input->post('menuid');
		$menuname=$this->input->post('menuname');
		$menutype=$this->input->post('menutype');
		$menuurl=$this->input->post('menuurl');
		$status=$this->input->post('status');
		$pmenu=$this->input->post('pmenu');
		$orderno=$this->input->post('orderno');
		if ($image1!=''){
			$data = array(
				'orderno' =>"$orderno",
				'menuname' =>"$menuname",
				'menutype' =>"$menutype",
				'url'=>"$menuurl",
				'status'=>$status,'parentmenuid'=>$pmenu,'menuimg'=>$image1,'alttagimg1'=>$alttag1		
			 );
	
	
	
		}else{
		$data = array(
			'orderno' =>"$orderno",
			'menuname' =>"$menuname",
			'menutype' =>"$menutype",
			'url'=>"$menuurl",
			'status'=>$status,'parentmenuid'=>$pmenu,'alttagimg1'=>$alttag1		
		 );
		}
		 //print_r($data);
		 $this->db->where('menuid',$menuid);
		 $this->db->update('menus', $data);
	
		  ($this->db->affected_rows() != 1) ? $this->session->set_flashdata('flash_msg', 'Error in Editing Menu') : $this->session->set_flashdata('flash_msg', 'Menu Edited Successfully');
	
	 redirect("welcome/listmenus");
	
	
	}



public function bulkupload(){


	$this->data['page_title'] = "List Bulk Upload";
		$this->data['page_breadcrumb'] = array("Categories" => array('active' => true, 'link' => site_url().'acp/Categories'));
		$this->data['innersub_menu_active'] = "List Bulk Upload";
		//$this->load->view('acp/categories', $this->data);
		$this->data['meta'] = $this->commonModel->getdata();
		
$this->load->view('acp/addbulkupload', $this->data);





}



public function bulkuploadimages(){


	$this->data['page_title'] = "List Bulk Upload";
		$this->data['page_breadcrumb'] = array("Categories" => array('active' => true, 'link' => site_url().'acp/Categories'));
		$this->data['innersub_menu_active'] = "List Bulk Upload";
		//$this->load->view('acp/categories', $this->data);
		$this->data['meta'] = $this->commonModel->getdata();
		//echo "jjj";
$this->load->view('acp/addbulkuploadimages', $this->data);





}












public function managebulkuploadprocess(){

	$image1old='';
	$file_ext1 = pathinfo($_FILES["image1"]["name"],PATHINFO_EXTENSION);	
	$new_name1 = time().'img1th'.'.'.$file_ext1;
	$config2['file_name'] = $new_name1;
	$config2['upload_path'] = 'assets/uploads/csv';
	$config2['allowed_types'] = 'csv';	
	$config2['max_size'] = '1024'; //1 MB
	$this->load->library('upload', $config2);
	$this->upload->initialize($config2);
	if (($_FILES['image1']['name'])!='') {
	//if (isset($_FILES['image2']['name'])) {
		if (0 < $_FILES['image1']['error']) {
			echo 'Error during file upload' . $_FILES['image1']['error'];
		} else {
			if (file_exists('assets/uploads/homepage/'.$new_name1)) {
				//echo 'File already exists : uploads/contactus/'.$new_name;
				$image1=$image1old;
			} else {
				
				if (!$this->upload->do_upload('image1')) {
					//echo $this->upload->display_errors();
				} else {
					//echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
					$image1=$new_name1;
				}
				$image1=$image1old;

			}
		}
		$image1=$new_name1;

	} else {
		//echo 'Please choose a file';
		$image1=$image1old;

	}




	$file_data = $this->upload->data();
	$file_path = base_url() . "uploads/" . $file_data['file_name'];

	//$csv_data = $this->mycsv->parse_file($file_path);

  // Add created and modified date if not include
	$date = date("Y-m-d H:i:s");

		$filename=$_FILES["image1"]["tmp_name"];
		if($_FILES["image1"]["size"] > 0)
		{
			$file = fopen($filename, "r");
			while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
			{
				echo "enter";
				print_r($importdata);
				//die;
	
					$data = array(
						'test1' =>$importdata[0],
						'test2' =>$importdata[1],
	
					);
					$flags=array();
					if($importdata[14]==1){
						$flags[]=1;

					}

					if($importdata[15]==1){
						$flags[]=2;

					}
					if($importdata[16]==1){
						$flags[]=3;

					}
					

$flagstr=implode('-',$flags);
					$insert_datap = array(
						'prod_name' => $importdata[7],
							//'email' => $row['countryorigin'],
							//'phone' => $row['sku'],
							'prod_status' => 1,
							'prod_opt_type' =>$flagstr,
							'prod_added_user'=>2,
							'prod_updated_user'=>2
					);
			

  $prdid=$this->commonModel->insert_product($insert_datap);

  $insert_datac = array(
	'pc_cat_id' => $importdata[3],
		//'email' => $row['countryorigin'],
		//'phone' => $row['sku'],
		'pc_prod_id' =>$prdid,
		//'created' => $date,
		//'modified' => $date,
);

$insert_datab = array(
	'pb_brand_id' => $importdata[6],
		//'email' => $row['countryorigin'],
		//'phone' => $row['sku'],
		'pb_prod_id' =>$prdid,
		//'created' => $date,
		//'modified' => $date,
);

  $this->commonModel->insert_category($insert_datac);
  $this->commonModel->insert_brand($insert_datab);

  $insert_datad=array('prod_dt_prodid'=>$prdid,'prod_dt_typeid'=>$prdid);
  
 
  for($i=0;$i<6;$i++){
	if ($i==0){
		$typeid=1;

	$insert_datad=array('prod_dt_prodid'=>$prdid,'prod_dt_typeid'=>$typeid,'prod_dt_desc'=>$importdata[3]);
	}

	if ($i==1){
		$typeid=4;

	$insert_datad=array('prod_dt_prodid'=>$prdid,'prod_dt_typeid'=>$typeid,'prod_dt_desc'=>$importdata[12]);
	}
  
	if ($i==2){
		$typeid=5;

	$insert_datad=array('prod_dt_prodid'=>$prdid,'prod_dt_typeid'=>$typeid,'prod_dt_desc'=>$importdata[11]);
	}

	if ($i==3){
		$typeid=15;

	$insert_datad=array('prod_dt_prodid'=>$prdid,'prod_dt_typeid'=>$typeid,'prod_dt_desc'=>$importdata[10]);
	}


	if ($i==4){
		$typeid=16;

	$insert_datad=array('prod_dt_prodid'=>$prdid,'prod_dt_typeid'=>$typeid,'prod_dt_desc'=>$importdata[9]);
	}

	
	if ($i==5){
		$typeid=17;

	$insert_datad=array('prod_dt_prodid'=>$prdid,'prod_dt_typeid'=>$typeid,'prod_dt_desc'=>$importdata[8]);
	}

	
  
	$this->commonModel->insert_detail($insert_datad);


			}}
			fclose($file);

  $this->session->set_flashdata('msg', "Csv imported successfully");
		redirect("acp/Settings/bulkupload");

	} else {
		$data['error'] = "Error occured";
		$this->session->set_flashdata('msg', $data['error']);
		redirect("acp/Settings/bulkupload");
	}


}


}
