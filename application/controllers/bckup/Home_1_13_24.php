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


        $custID=$this->product->getcustdata($custname);


       
            //$custID=1;
            $this->db->where('customer_id',$custID);
            $this->db->select('*');
            $this->db->from('wishlist');
            $query = $this->db->get();
            $this->data['wishlistcount'] = $query->num_rows();
        
        
       



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


       $custID=$this->product->getcustdata($custname);



        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
		$this->load->view('aboutus', $this->data);
	}

    public function products($prod_slug = null)
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

    public function productsByBrand($brand = null)
    {
        $this->data['page_title'] = "Products";
        if (empty($brand)) {
            show404();
        } else {
            $this->data['brands'] = $this->frontend->getBrands();
            $this->data['categories'] = $this->categories;
            $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3, $brand, null);
            $this->data['products'] = $this->frontend->getProducts(null, [], [], null, $brand, null);
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            
        $custname=$this->session->userdata('username');


        $custID=$this->product->getcustdata($custname);

            //$custID=1;
            $this->db->where('customer_id',$custID);
            $this->db->select('*');
            $this->db->from('wishlist');
            $query = $this->db->get();
            $this->data['wishlistcount'] = $query->num_rows();
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
            $this->data['best_selling'] = $this->frontend->getProducts(null, [], [], 3, null, $category);
            $this->data['products'] = $this->frontend->getProducts(null, [], [], null, null, $category);
            $this->data['getga']= $this->frontend->getga();
            $this->data['menus']=$this->frontend->get_menus();

            $this->data['gt']=$this->db->get('site')->row();
            $this->data['homepagedetails']= $this->frontend->homepagedetails();
            $this->data['site']= $this->frontend->sitedetails();

            
        $custname=$this->session->userdata('username');


        $custID=$this->product->getcustdata($custname);

           // $custID=1;
            $this->db->where('customer_id',$custID);
            $this->db->select('*');
            $this->db->from('wishlist');
            $query = $this->db->get();
            $this->data['wishlistcount'] = $query->num_rows();
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


        $custID=$this->product->getcustdata($custname);

        //$custID=1;
        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
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


  $custID=$this->product->getcustdata($custname);

  //$custID=1;
  $this->db->where('customer_id',$custID);
  $this->db->select('*');
  $this->db->from('wishlist');
  $query = $this->db->get();
  $this->data['wishlistcount'] = $query->num_rows();


        $this->load->view('login', $this->data);

        
    }



    public function register(){

        $this->data['menus']=$this->frontend->get_menus();
        $this->data['gt']=$this->db->get('site')->row();
        $this->data['site']= $this->frontend->sitedetails();
        $this->data['homepagedetails']= $this->frontend->homepagedetails();
       
        
        $custname=$this->session->userdata('username');


        $custID=$this->product->getcustdata($custname);

        //$custID=1;
        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
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


        $custID=$this->product->getcustdata($custname);

        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
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


        $custID=$this->product->getcustdata($custname);

        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $this->data['wishlistcount'] = $query->num_rows();
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
        $fname=$this->input->post('fname');	
        $lname=$this->input->post('lname');
        $name=$fname.' '.$lname;



        $data = array(
            'email' =>"$email",
            'companyname' =>"$companyname",
            'phone'=>$phone,'name'=>"$name",'password'=>"$pass"
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














}