<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $categories = [];
    public $recentCategories = [];

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Home";
        $this->load->model('Manage_frontend', 'frontend');
        $this->categories = $this->frontend->getCategories();
        $this->data['recent_categories'] = array_slice($this->categories, 0, 9);
        $this->data['sitecurrency'] = sitecurrency();
        $this->load->library('cart');
        $this->load->model('product');
        $this->load->library('email');
        $this->load->library("pagination");
        //$this->load->model('checkout');
	}

    public function homeold()
	{
        $this->data['page_title'] = "Home";
        $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3);
        $this->data['latest_products'] = $this->frontend->getProducts(null, [], [], 2);
        $this->data['brands'] = $this->frontend->getBrands();
        $this->data['metatag']= $this->frontend->getmetatag();
        $this->data['getga']= $this->frontend->getga();
        //$this->data['sitedetails']= $this->frontend->sitedetails();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
       
		$this->load->view('home', $this->data);
	}

    public function index()
	{
        $this->data['page_title'] = "Home";
        $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3);
        $this->data['latest_products'] = $this->frontend->getProducts(null, [], [], 2);
        $this->data['featured_products'] = $this->frontend->getProducts(null, [], [], 1);
        //print_r($this->data['featured_products']);
        //die;
        $this->data['brands'] = $this->frontend->getBrands();
        $this->data['metatag']= $this->frontend->getmetatag();
        $this->data['getga']= $this->frontend->getga();
        $this->data['site']= $this->frontend->sitedetails();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
        $this->data['menus']=$this->frontend->get_menus();
        $this->data['result']=$this->frontend->get_carousalactive();
        $this->data['most_viewed']= $this->frontend->mostviewed();
        //print_r($this->data['most_viewed']);
        //die;
        $this->data['gt']=$this->db->get('site')->row();
        //$this->data['wishlistcount']=$this->checkout->wishlistcount();


        $custname=$this->session->userdata('username');
if($custname!=''){

        $custID=$this->product->getcustdata($custname);


       
            //$custID=1;
            $this->db->where('customer_id',$custID);
            $this->db->select('*');
            $this->db->from('wishlist');
            $query = $this->db->get();
            $this->data['wishlistcount'] = $query->num_rows();
}
else{
    $this->data['wishlistcount'] =0;
}
        
        
       



		$this->load->view('index', $this->data);
	}


    public function about_us()
	{
        $this->data['page_title'] = "About Us";
        $this->data['metatag']= $this->frontend->getmetatag();
        $this->data['getga']= $this->frontend->getga();
        $this->data['menus']=$this->frontend->get_menus();
        $this->data['gt']=$this->db->get('site')->row();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
        $this->data['site']= $this->frontend->sitedetails();
       // $custID=1;


       $custname=$this->session->userdata('username');


       if($custname!=''){

        $custID=$this->product->getcustdata($custname);


       
            //$custID=1;
            $this->db->where('customer_id',$custID);
            $this->db->select('*');
            $this->db->from('wishlist');
            $query = $this->db->get();
            $this->data['wishlistcount'] = $query->num_rows();
}
else{
    $this->data['wishlistcount'] =0;
}
        
		$this->load->view('aboutus', $this->data);
	}

    public function products_old($prod_slug = null)
	{
        $this->data['page_title'] = "Products";
        //$custID=1;


        $custname=$this->session->userdata('username');


        $custID=$this->product->getcustdata($custname);


        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
        if (empty($prod_slug) || ($prod_slug === 'listall')) {
            $this->data['products'] = $this->frontend->getProducts();
            $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3);
            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;
            $this->data['metatag']= $this->frontend->getmetatag();
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();


            $this->load->view('products', $this->data);
        } else {
            $this->data['product'] = $this->frontend->getProducts(['prod_canonial_name' => $prod_slug]);
            if (! empty($this->data['product'])) {
                $this->data['productdetails'] = $this->frontend->getProductAllDetails($this->data['product']['prod_id']);
                //print_r($this->data['productdetails']);
                //die;
                $this->data['metatag']= $this->frontend->getmetatag();
                $this->data['getga']= $this->frontend->getga();
                $this->data['menus']=$this->frontend->get_menus();

                $this->data['gt']=$this->db->get('site')->row();
                $this->data['homepagedetails']= $this->frontend->homepagedetails();
                $this->data['site']= $this->frontend->sitedetails();
                $this->load->view('product', $this->data);
            } else {
                show404();
            }
        }
	}


    public function products($prod_slug = null){
        $this->data['page_title'] = "Products";
        //$custID=1;


        $custname=$this->session->userdata('username');


        $custID=$this->product->getcustdata($custname);


        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
        /*$config = array();
        $config["base_url"] = base_url() . "Welcome/listcategory";
        $config["total_rows"] = $this->sm->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();	
        $data['result']=$this->sm->get_categories($config["per_page"], $page);
        $this->db->from('contactus');
        $query = $this->db->get();
        $data['resultphone']=$query->row();	
        $data['contactus']=$this->sm->get_contactus();
        $data['newsletter']=$this->sm->get_newsletter();
        $data['siteinf']=$this->sm->get_siteinf();
        $this->load->view('services/listcategory',$data);*/
        //echo $prod_slug;

        if (empty($prod_slug) || ($prod_slug === 'listall')) {
           // $this->data['products'] = $this->frontend->getProducts();
            $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3);


            $config = array();
        //$config["base_url"] = base_url() . "Welcome/listcategory";

        $config["base_url"] = base_url() . "Home/products";
        $config["total_rows"] = $this->frontend->get_countproducts(null, [], [], 3);
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data["links"] = $this->pagination->create_links();	
        $limit=array('limit'=>"$config[per_page]",'offset'=>$page);
        $this->data['products']=$this->frontend->getProducts(null, $limit, [], 3);


            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;
            $this->data['metatag']= $this->frontend->getmetatag();
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();
            //echo "enter1";

            $this->load->view('products', $this->data);
        } else {
            //echo "enter";
          $this->data['product'] = $this->frontend->getProducts(['prod_canonial_name' => $prod_slug]);

            /*$config = array();
            
    
            $config["base_url"] = base_url() . "Home/products";
            $config["total_rows"] = $this->frontend->get_countproducts();
            $config["per_page"] = 3;
            $config["uri_segment"] = 3;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->data["links"] = $this->pagination->create_links();	
            $limit=array('limit'=>"$config[per_page]",'offset'=>$page);


            $this->data['product'] = $this->frontend->getProducts(['prod_canonial_name' => $prod_slug], $limit, [], 3);*/



            if (! empty($this->data['product'])) {
                $this->data['productdetails'] = $this->frontend->getProductAllDetails($this->data['product']['prod_id']);
                //print_r($this->data['productdetails']);
                //die;
                $this->data['metatag']= $this->frontend->getmetatag();
                $this->data['getga']= $this->frontend->getga();
                $this->data['menus']=$this->frontend->get_menus();

                $this->data['gt']=$this->db->get('site')->row();
                $this->data['homepagedetails']= $this->frontend->homepagedetails();
                $this->data['site']= $this->frontend->sitedetails();
                $this->load->view('product', $this->data);
            } else {
                show404();
            }
        }


    }


    public function productsByBrand($brand = null)
    {
        $this->data['page_title'] = "Products";
        if (empty($brand)) {
            show404();
        } else {
            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;
            //print_r($this->data['categories']);
            //die;
            /*$this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3, $brand, null);
            $this->data['products'] = $this->frontend->getProducts(null, [], [], null, $brand, null);*/


            $config = array();
        //$config["base_url"] = base_url() . "Welcome/listcategory";

        $config["base_url"] = base_url() . "Home/productsByBrand";
        $config["total_rows"] = $this->frontend->get_countproducts(null, [], [], null, $brand, null);
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data["links"] = $this->pagination->create_links();	
        $limit=array('limit'=>"$config[per_page]",'offset'=>$page);
        $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3, $brand, null);
        $this->data['products']=$this->frontend->getProducts(null, $limit,[], null, $brand, null);








            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            
        $custname=$this->session->userdata('username');


      

            if($custname!=''){

                $custID=$this->product->getcustdata($custname);
        
        
               
                    //$custID=1;
                    $this->db->where('customer_id',$custID);
                    $this->db->select('*');
                    $this->db->from('wishlist');
                    $query = $this->db->get();
                    $this->data['wishlistcount'] = $query->num_rows();
        }
        else{
            $this->data['wishlistcount'] =0;
        }


            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();

            $this->load->view('products', $this->data);
        }
    }

    public function productsByCategory($category = null)
    {
        $this->data['page_title'] = "Products";
        if (empty($category)) {
            show404();
        } else {
            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;


            $config = array();

          
      

        //$config["base_url"] = base_url() . "Home/clearencesale";
        //$config["total_rows"] = $this->frontend->get_countproductsclear(null,[], [],null,'-5');
        //$config["per_page"] = 2;
        //
        $config["uri_segment"] = 3;

        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['first_link']       = false;
        $config['last_link']        = false;
        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['attributes']       = ['class' => 'page-link'];
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';

        
      

        $config["base_url"] = base_url() . "Home/productsByCategory";
        $config["total_rows"] = $this->frontend->get_countproducts(null, [], [], 3, null, $category);
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data["links"] = $this->pagination->create_links();	
        $limit=array('limit'=>"$config[per_page]",'offset'=>$page);

            $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3, null, $category);
            $this->data['products'] = $this->frontend->getProducts(null, $limit, [], null, null, $category);




            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();

            
        $custname=$this->session->userdata('username');


        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
            $this->load->view('products', $this->data);
        }
    }




    public function productsByCategorysort($category = null)
    {
        $this->data['page_title'] = "Products";
        if (empty($category)) {
            show404();
        } else {
            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;


            $config = array();

          
      

        //$config["base_url"] = base_url() . "Home/clearencesale";
        //$config["total_rows"] = $this->frontend->get_countproductsclear(null,[], [],null,'-5');
        //$config["per_page"] = 2;
        //
        $config["uri_segment"] = 3;

        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['first_link']       = false;
        $config['last_link']        = false;
        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['attributes']       = ['class' => 'page-link'];
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';

        
      

        $config["base_url"] = base_url() . "Home/productsByCategorysort";
        $config["total_rows"] = $this->frontend->get_countproductssort(null, [], [], 3, null, $category);
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data["links"] = $this->pagination->create_links();	
        $limit=array('limit'=>"$config[per_page]",'offset'=>$page);

            $this->data['best_selling'] = $this->frontend->getProductssort(null, [], [], 3, null, $category);
            $this->data['products'] = $this->frontend->getProductssort(null, $limit, [], null, null, $category);




            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();

            
        $custname=$this->session->userdata('username');


        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
            $this->load->view('products', $this->data);
        }
    }












    public function blogs($blog_slug = null)
	{
        $this->data['blogs'] = $this->frontend->getBlogs();
        if (empty($blog_slug) || ($blog_slug === 'listallblogs')) {
            $this->data['page_title'] = "Blogs";
            $this->data['metatag']= $this->frontend->getmetatag();
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();
            $this->load->view('blogs', $this->data);
        } else {
            $this->data['page_title'] = "Blogs";
            $this->data['blog'] = $this->frontend->getBlogs($blog_slug);
            $this->data['metatag']= $this->frontend->getmetatag();
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();
            $this->load->view('blog', $this->data);
        }
	}

    public function contactUs()
	{
        $this->data['page_title'] = "Contact Us";
        $this->data['metatag']= $this->frontend->getmetatag();
        $this->data['getga']= $this->frontend->getga();
        $this->data['menus']=$this->frontend->get_menus();

        $this->data['gt']=$this->db->get('site')->row();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
        $this->data['site']= $this->frontend->sitedetails();
        
        $custname=$this->session->userdata('username');


        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
		$this->load->view('contact-us', $this->data);
	}

    public function submitContactUsForm()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$data = $this->input->post(null, true);
            $car_name = (isset($data['car_name'])) ? trim($data['car_name']) : ''; // For Enquiry form
            $period_text = (isset($data['period_text'])) ? trim($data['period_text']) : null; // For Enquiry form
            $promotion_car_text = (isset($data['promotion_car_text'])) ? trim($data['promotion_car_text']) : null; // For Get in Touch form
            
			$arr = array(
				'cus_subject' => (isset($data['enquiry_on_car'])) ? 'Enquiry by '.trim($data['fullname']) : ((isset($data['promotion'])) ? 'Get in Touch form submission by '.trim($data['fullname']) : 'Contacted by '.trim($data['fullname'])),

                'enq_car_id' => (isset($data['enquiry_on_car'])) ? trim($data['enquiry_on_car']) : null, // For Enquiry form
                'enq_period' => (isset($data['period'])) ? trim($data['period']) : null, // For Enquiry form
                'enq_promo_id' => (isset($data['promotion'])) ? trim($data['promotion']) : null, // For Get in Touch form

                'is_enquiry' => (isset($data['enquiry_on_car'])) ? 1 : 0, // For Enquiry form 
                'get_in_touch' => (isset($data['promotion'])) ? 1 : 0, // For Get in Touch form

				'cus_message' => (isset($data['message'])) ? trim($data['message']) : (isset($data['enquiry_on_car']) ? 'Enquiry by '.trim($data['fullname']) .' regarding '. $car_name .' for '. $period_text : 'Get in Touch submission by '.trim($data['fullname']) .' regarding promotion '.$promotion_car_text),

				'cus_name' => trim($data['fullname']),
				'cus_email' => trim($data['email']),
				'cus_phone' => trim($data['phone']),

				'cus_added_date' => mysql_datetime(),
				'cus_updated_user' => mysql_datetime(),
				'cus_status' => 1
			);
			$save = $this->frontend->saveContactus($arr);
			if ($save) {
				$this->contactUsMail($arr);
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => ((isset($arr['is_enquiry'])) ? 'Enquiry' : (isset($arr['get_in_touch']) ? 'Get in Touch' : 'Contact Us')) . ' added successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			show_404();
		}
	}

	public function contactUsMail($data = [])
	{
		if (!empty($data)) {
			$sitedetails = sitedetails();

            //Sanitizing email
            $php_email   = filter_var($data['cus_email'], FILTER_SANITIZE_EMAIL);
            $valid_email = filter_var($php_email, FILTER_VALIDATE_EMAIL);

            // Validate Phone number
            // Allowed 0-9, +, -, space, ()
            $valid_phone = preg_match('/^(?=.*[0-9])[- +()0-9]+$/', $data['cus_phone']);

            //After sanitization Validation is performed
            if ($valid_email && $valid_phone) {
                $php_subject = "[".$sitedetails['sitename']."] ". ((isset($data['is_enquiry'])) ? 'Enquiry' : (isset($data['get_in_touch']) ? 'Get in Touch' : 'Contact Us'));
                    
                // To send HTML mail, the Content-type header must be set
                $php_headers = "MIME-Version: 1.0" . "\r\n";
                $php_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $php_headers .= 'From: '.$sitedetails['sitename'].' <'.site_mailfrom().'>' . "\r\n";
                $php_headers .= "Return-Path: ".$sitedetails['sitename'].' <'.site_mailfrom().'>' . "\r\n";
                $php_headers .= "Organization: ".$sitedetails['sitename']."\r\n";
                $php_headers .= "X-Priority: 3\r\n";
                $php_headers .= 'X-Mailer: PHP' . phpversion() . PHP_EOL;
                
                $php_template = '<strong style="color:#f00a77;">Name:</strong>  ' . $data['cus_name'] . '<br/>'
                . '<strong style="color:#f00a77;">Email:</strong>' . $data['cus_email'] . '<br/>'
                . '<strong style="color:#f00a77;">Phone:</strong>' . $data['cus_phone'] . '<br/>'
                . '<strong style="color:#f00a77;">Message:</strong>  ' . $data['cus_message'] . '<br/><br/>';
                
                // Sending mail to Customer
                $reply_headers = 'Reply-To: '.$sitedetails['sitename'].' <'.site_mailreplyto().'>' . PHP_EOL;
                $php_template_header = '<h4>Hi ' . $data['cus_name'] . ',</h4>Thank you for contacting us.<br/><br/>';
                $php_template_footer = 'This is a Contact Confirmation mail.<br/> We will contact you as soon as possible.';
                $php_sendmessage = '<div style="background-color:#ccd1ca; padding:50px;"><div style="text-align: center;"><a href="'.site_url().'"><img src="'.$sitedetails['logo'].'" width="100" alt="'.$sitedetails['sitename'].'"></a></div><div style="background-color:#fff; padding:20px;"><div style="background-color:#fff; color:#333;">' . $php_template_header.$php_template.$php_template_footer . '</div></div></div>';
                mail($data['cus_email'], $php_subject, $php_sendmessage, $php_headers);
                
                // Sending mail to Admin
                $reply_headers = 'Reply-To: '.$data['cus_name'].' <'.$data['cus_email'].'>' . PHP_EOL;
                $php_template_header = '<h4>Hi Admin,</h4>'. $data['cus_name'] .' has send you a enquiry.<br/><br/>';
                $php_template_footer = '';
                $php_sendmessage = '<div style="background-color:#ccd1ca; padding:50px;"><div style="text-align: center;"><a href="'.site_url().'"><img src="'.$sitedetails['logo'].'" width="100" alt="'.$sitedetails['sitename'].'"></a></div><div style="background-color:#fff; padding:20px;"><div style="background-color:#fff; color:#333;">' . $php_template_header.$php_template.$php_template_footer . '</div></div></div>';
                mail(site_mailto(), $php_subject, $php_sendmessage, $php_headers);

                echo "";
            } else  if (! $valid_email) {
                echo "<span class='contact_error'>Invalid email</span>";
            } else  if (! $valid_phone) {
                echo "<span class='contact_error'>Invalid contact number. (Allowed character: 0-9, +, -, (), space)</span>";
            }
		}
	}

    public function newslettersubscribe(){
	
        $newsletteremailid=$this->input->post('emailidnews');
        $data=array('subscribeemailid'=>$newsletteremailid);
        $this->db->insert('newslettersubscribe', $data);
        echo ($this->db->affected_rows() != 1) ? 'Error in Subscription' : 'Your emailid subscribed Successfully';
    
    }




    public function login(){

        //echo 'die';

        //$this->load->view('login');
        $this->data['menus']=$this->frontend->get_menus();
        
  $this->data['gt']=$this->db->get('site')->row();
  $this->data['site']= $this->frontend->sitedetails();
  $this->data['homepagedetails']= $this->frontend->homepagedetails();
  
  $custname=$this->session->userdata('username');


  if($custname!=''){

    $custID=$this->product->getcustdata($custname);


   
        //$custID=1;
        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
}
else{
$this->data['wishlistcount'] =0;
}


        $this->load->view('login', $this->data);

        
    }



    public function register(){

        $this->data['menus']=$this->frontend->get_menus();
        $this->data['gt']=$this->db->get('site')->row();
        $this->data['site']= $this->frontend->sitedetails();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
       
        
        $custname=$this->session->userdata('username');


        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
        $this->load->view('register', $this->data);

        //$this->load->view('login', $this->data);

        
    }


    public function wishlist(){

        $this->data['menus']=$this->frontend->get_menus();
        $this->data['gt']=$this->db->get('site')->row();
        $this->data['site']= $this->frontend->sitedetails();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
        //$this->data['custwishlist']=$this->product->get_custwishlist();

        $custname=$this->session->userdata('username');
 

$custID=$this->product->getcustdata($custname);
$this->data['custwishlist']=$this->product->custwishlist($custID);

        //print_r($this->data['custwishlist']);
        //die;
        //$custID=1;
        
        $custname=$this->session->userdata('username');


        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
        $this->load->view('wishlist', $this->data);

        //$this->load->view('login', $this->data);

        
    }



    public function cart(){
        $this->data['menus']=$this->frontend->get_menus();
        $this->data['gt']=$this->db->get('site')->row();
        $this->data['site']= $this->frontend->sitedetails();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
        //$custID=1;
        
        $custname=$this->session->userdata('username');

        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
        $this->load->view('cart', $this->data);

        //$this->load->view('login', $this->data);

        
    }


    public function checkout_old(){

        $this->data['menus']=$this->frontend->get_menus();
        $this->data['gt']=$this->db->get('site')->row();
        $this->data['site']= $this->frontend->sitedetails();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
        $this->load->view('checkout', $this->data);

        //$this->load->view('login', $this->data);

        
    }


    public function loginprocess(){

        //$services=$this->load->model('Servicesmodel');
        $this->load->library('session');
        $username=$this->input->post('username');
        $password=$this->input->post('password');	
        $pass=md5($password);
        //echo 
        //die;
        
        $user_detail=$this->frontend->get_user($username,$pass);
        //die;
         if ($user_detail==1){
            $this->session->set_userdata('username',"$username");
            redirect("home/index");
         }else {
            $this->session->set_flashdata('flash_msg', 'Invalid User name and Password');
            redirect("home/login");
         }

    }



    public function logout(){
        //session_destroy();
        $this->session->unset_userdata('username');
        redirect("home/index");

    }


    public function registerprocess(){

        //$services=$this->load->model('Servicesmodel');
        $this->load->library('session');
        $email=$this->input->post('email');
        $password=$this->input->post('password');	
        $pass=md5($password);

        $phone=$this->input->post('phone');
        $companyname=$this->input->post('companyname');
        $fname=$this->input->post('firstname');	
        $lname=$this->input->post('lastname');
       // $name=$fname.' '.$lname;
       $name=$fname;



        $data = array(
            'email' =>"$email",
            'companyname' =>"$companyname",
            'phone'=>$phone,'name'=>"$name",'password'=>"$pass",'lastname'=>"$lname"
         );
         //$this->db->insert('category', $data);
    
         //$insert_id = $this->db->insert_id();
        // print_r($data);
         //die;
        
        $user_detail=$this->frontend->insertdt($data,'userlogin');
     
         
        $this->session->set_flashdata('flash_msg', 'You are registered Successfully');
            redirect("home/register");
        

    }



    function addToCart($proID){
        
        // Fetch specific product by ID
        $product = $this->product->getRows($proID);
        
        // Add product to the cart
        $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['price'],
            'name'    => $product['name'],
            'image' => $product['image']
        );
        $this->cart->insert($data);
        
        // Redirect to the cart page
        redirect('cart/');
    }



    public function clearencesale($prod_slug = null)
	{
        $this->data['page_title'] = "Products";
        //$custID=1;


        $custname=$this->session->userdata('username');


        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
            
       



            $config = array();
      

        $config["base_url"] = base_url() . "Home/clearencesale";
        $config["total_rows"] = $this->frontend->get_countproductsclear(null,[], [],null,'-5');
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['first_link']       = false;
        $config['last_link']        = false;
        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['attributes']       = ['class' => 'page-link'];
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data["links"] = $this->pagination->create_links();	
        $limit=array('limit'=>"$config[per_page]",'offset'=>$page);

            $this->data['productsclear'] = $this->frontend->getProductsclear(null,$limit, [],null,'-5');
            $this->data['clearencesale'] = $this->frontend->getProductsclearbest(null, [], [], '-3','-5');
            //$this->data['products'] = $this->frontend->getProducts();
            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;
            //print_r( $this->data['categories']);
            $this->data['metatag']= $this->frontend->getmetatag();
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();
//echo "jjj";
//die;

            $this->load->view('clearencesale', $this->data);
        }

    //}


    public function productdetails(){


        $this->data['page_title'] = "Products";
        //$custID=1;


        $custname=$this->session->userdata('username');

        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }

        $this->data['metatag']= $this->frontend->getmetatag();
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();



        $this->load->view('product-details', $this->data);



    }

    public function bulkenquiry(){

$this->data['page_title'] = "Contact Us";
$this->data['metatag']= $this->frontend->getmetatag();
$this->data['getga']= $this->frontend->getga();
$this->data['menus']=$this->frontend->get_menus();

$this->data['gt']=$this->db->get('site')->row();
$this->data['homepagedetails']= $this->frontend->homepagedetails();
$this->data['site']= $this->frontend->sitedetails();

$custname=$this->session->userdata('username');


$custID=$this->product->getcustdata($custname);

if($custname!=''){

    $custID=$this->product->getcustdata($custname);


   
        //$custID=1;
        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
}
else{
$this->data['wishlistcount'] =0;
}
$this->load->view('bulkenquiry', $this->data);

    }


    public function  searchproducts(){

        $this->data['page_title'] = "Search Result";
        //$custID=1;


        $custname=$this->session->userdata('username');


       


        if($custname!=''){

            $custID=$this->product->getcustdata($custname);
    
    
           
                //$custID=1;
                $this->db->where('customer_id',$custID);
                $this->db->select('*');
                $this->db->from('wishlist');
                $query = $this->db->get();
                $this->data['wishlistcount'] = $query->num_rows();
    }
    else{
        $this->data['wishlistcount'] =0;
    }
        //$serquery='TeSys Deca ';

        $serquery=$this->input->post('serquery');
        if ($serquery==''){
            $serquery=$this->uri->segment(3) ;
        }
        if (empty($prod_slug) || ($prod_slug === 'listall')) {

            $config = array();
      

            $config["base_url"] = base_url() . "Home/searchproducts/$serquery";
           $config["total_rows"] = $this->frontend->get_countproductssearch($serquery);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            //$config['use_page_numbers'] = TRUE;
            //$config['page_query_string'] = TRUE;
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['first_link']       = false;
            $config['last_link']        = false;
            $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul>';
            $config['attributes']       = ['class' => 'page-link'];
            $config['first_tag_open']   = '<li class="page-item">';
            $config['first_tag_close']  = '</li>';
            $config['prev_tag_open']    = '<li class="page-item">';
            $config['prev_tag_close']   = '</li>';
            $config['next_tag_open']    = '<li class="page-item">';
            $config['next_tag_close']   = '</li>';
            $config['last_tag_open']    = '<li class="page-item">';
            $config['last_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['num_tag_open']     = '<li class="page-item">';
            $config['num_tag_close']    = '</li>';
    
            $this->pagination->initialize($config);
          $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->data["links"] = $this->pagination->create_links();	
            $limit=array('limit'=>"$config[per_page]",'offset'=>$page);
            //print_r($limit);
    
                //$this->data['productsclear'] = $this->frontend->getProductsclear(null,$limit, [],null,'-5');
                //$this->data['clearencesale'] = $this->frontend->getProductsclearbest(null, [], [], '-3','-5');

            $this->data['products'] = $this->frontend->getProductssearch($serquery,$limit);          
            $this->data['best_selling'] = $this->frontend->getProductssearchbestselling($serquery);
            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;
            $this->data['metatag']= $this->frontend->getmetatag();
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();
            //$this->data['productdetails'] = $this->frontend->getProductAllDetails($this->data['product']['prod_id']);


            $this->load->view('searchresult', $this->data);
        }


    }


    public function contactenquiryprocess(){
        $name=$this->input->post('name');
        $subject=$this->input->post('msg_subject');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $message=$this->input->post('message');	
        $data = array(
            'cus_name' =>"$name",
            'cus_subject' =>"$subject",
            'cus_email' =>"$email",
            'cus_phone' =>"$phone",
            'cus_message' =>"$message",
            //'packages'=>"$packages",
            //'note'=>"$note",
            //'businesswebsiteduration'=>"$businesswebsiteduration"
         );
         $this->db->insert('contact_us',$data);
         //echo $this->db->last_query();
         $toemailid='sumilaifix@gmail.com';
         
        $this->htmlmailcontactus($name,$subject,$email,$phone,$message,$email,$toemailid);
        echo "Your enquiry send successfully";
        }



        public function htmlmailcontactus($name,$subject,$email,$phone,$msg,$fromemailid,$toemailid){

            $from_email=$email;
            $message=$msg;
            
            //$to_email =$toemailid;
            //$to_email = 'sumila.c@gmail.com';
            $config = array(
               'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
               'smtp_host' => 'smtp.gmail.com',
               'smtp_port' => 587,
               'smtp_user' => 'sumilaifix@gmail.com',
               //'smtp_user' => 'crayoprojects2022@gmail.com',
               //'smtp_pass' => 'wosmqbffmatsefdz',
               'smtp_pass'=>'jcqa cvfq iwrc plsu',
               'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
               'mailtype' => 'html', //plaintext 'text' mails or 'html'
               'smtp_timeout' => '4', //in seconds
               'charset' => 'utf-8',
               'wordwrap' => TRUE,
               'newline' => "\r\n",
           );
        
            $this->load->library('email', $config);
        
          $this->email->set_newline("\r\n");
        
          
        
            $this->email->from($from_email,$name);
        
            $data = array(
        
               'name'=>$name,'subject'=>$subject,'email'=>$email,'phone'=>$phone,'message'=>$message
        
                 );
        
                 //$userEmail='sumilaifix@gmail.com';
                 $subject='Contact Us Enquiries';
                 /*$this->db->select('*');
                 $this->db->from('contact_us');
                 $query = $this->db->get();
                 $contactusdte=$query->row();
                 $fn1=$contactusdte->toemail1;
                 $fn2=$contactusdte->toemail2;
                 $fn3=$contactusdte->toemail3;*/
                 
                 $fn1="sumilaifix@gmail.com";
                 $this->email->to($fn1);
                 //$this->email->to($fn2);
                 //$this->email->bcc(array($fn2,$fn3));
          $this->email->subject($subject); // replace it with relevant subject
        
          
        
             $body = $this->load->view('contactusenquiresemail1.php',$data,TRUE);
            //die;
        
          $this->email->message($body); 
        
            $this->email->send();
        
          }





















}
