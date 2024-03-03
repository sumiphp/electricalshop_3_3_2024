<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load form library & helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
        $this->load->model('Manage_frontend', 'frontend');
        
        $this->controller = 'checkout';

       




    }
    
    function index(){
        // Redirect if the cart is empty
        if($this->cart->total_items() <= 0){
            redirect('productssample/');
        }
        
        $custData = $data = array();
        
        // If order request is submitted
        $submit = $this->input->post('placeOrder');
        if(isset($submit)){
            // Form field validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            
            // Prepare customer data
            $custData = array(
                'name'     => strip_tags($this->input->post('name')),
                'email'     => strip_tags($this->input->post('email')),
                'phone'     => strip_tags($this->input->post('phone')),
                'address'=> strip_tags($this->input->post('address'))
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert customer data
                $insert = $this->product->insertCustomer($custData);
                
                // Check customer data insert status
                if($insert){
                    // Insert order
                    $order = $this->placeOrder($insert);
                    
                    // If the order submission is successful
                    if($order){
                        $this->session->set_userdata('success_msg', 'Order placed successfully.');
                        redirect($this->controller.'/orderSuccess/'.$order);
                    }else{
                        $data['error_msg'] = 'Order submission failed, please try again.';
                    }
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        // Customer data
        $data['custData'] = $custData;
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        
        // Pass products data to the view

        //print_r($cartItems);
        //die;


        $data['menus']=$this->frontend->get_menus();
        $data['gt']=$this->db->get('site')->row();
        $data['site']= $this->frontend->sitedetails();
        $data['homepagedetails']= $this->frontend->homepagedetails();

        $this->categories = $this->frontend->getCategories();
        $data['recent_categories'] = array_slice($this->categories, 0, 9);

   $username=$this->session->userdata('username');
   //die;

  //$custID=10;
   $custname=$this->session->userdata('username');


   $custID=$this->product->getcustdata($custname);
   $this->db->where('customer_id',$custID);
   $this->db->select('*');
   $this->db->from('wishlist');
   $query = $this->db->get();
   $data['wishlistcount'] = $query->num_rows();
   //echo $custID;
   $data['custdetails']=$this->product->getcustdetails($custID);
   //print_r($data['custdetails']);
   //die;
   $data['countries']=$this->product->getcountries();
 $this->load->view('checkout', $data);


        //$this->load->view($this->controller.'/index', $data);
    }
    
    //function placeOrder($custID){

        function placeOrder(){


        // Insert order data

        //echo $custID;
        //die;
        $custname=$this->session->userdata('username');
 

       $custID=$this->product->getcustdata($custname);

    $fname=$this->input->post('fname');
     $lname=$this->input->post('lname');
     $cname=$this->input->post('cname');
     $saddress=$this->input->post('saddress');
     $apartment=$this->input->post('apartment');
     $city=$this->input->post('city');

     $country=$this->input->post('country');
     $zip=$this->input->post('zip');
     $eadd=$this->input->post('eadd');
     $pnumber=$this->input->post('pnumber');
     $ship_to_different_address=$this->input->post('ship_to_different_address');

if ($ship_to_different_address==1){
     $fname=$this->input->post('fname1');
     $lname=$this->input->post('lname1');
     $cname=$this->input->post('cname1');
     $saddress=$this->input->post('saddress1');
     $apartment=$this->input->post('apartment1');
     $city=$this->input->post('city1');

     $country=$this->input->post('country1');
     $zip=$this->input->post('zip1');
     $eadd=$this->input->post('eadd1');
     $pnumber=$this->input->post('pnumber1');
}

$name=$fname.','.$lname;

$billdetail=array('name'=>$name,'companyname'=>$cname,'address'=>$saddress,'zip'=>$zip,'email'=> $eadd,'phone'=>$pnumber);
$insertbill = $this->product->insertbill($billdetail);



        $ordData = array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total()
        );
        $insertOrder = $this->product->insertOrder($ordData);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['order_id']     = $insertOrder;
                $ordItemData[$i]['product_id']     = $item['id'];
                $ordItemData[$i]['quantity']     = $item['qty'];
                $ordItemData[$i]['sub_total']     = $item["subtotal"];
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->product->insertOrderItems($ordItemData);
                
                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy();
                    
                    // Return order ID
                    //return $insertOrder;
                    $ordID=$insertOrder;
                    $data['order'] = $this->product->getOrder($ordID);
                    //print_r($data['order']);
        
                    // Load order details view
                    //$this->load->view($this->controller.'/order-success', $data);


                  
            
                    $this->categories = $this->frontend->getCategories();
                    $data['recent_categories'] = array_slice($this->categories, 0, 9);

  //$this->load->view('order-success', $data);
  //redirect(orderSuccess($ordID));
  //echo $ordID;
  //die;
  redirect("checkout/orderSuccess?ordid=".$ordID);


                }
            }
        }
        return false;
    }
    
    //function orderSuccess($ordID){

        function orderSuccess(){
           $ordID=$_GET['ordid'];
        // Fetch order data from the database
        $data['order'] = $this->product->getOrder($ordID);
        $data['menus']=$this->frontend->get_menus();
        $data['gt']=$this->db->get('site')->row();
        $data['site']= $this->frontend->sitedetails();
        $data['homepagedetails']= $this->frontend->homepagedetails();
        $this->categories = $this->frontend->getCategories();
        $data['recent_categories'] = array_slice($this->categories, 0, 9);

        
        // Load order details view
        //$this->load->view($this->controller.'/order-success', $data);
        //$custID=1;
        $custname=$this->session->userdata('username');
 

        $custID=$this->product->getcustdata($custname);
        $data['custIDdt']=$this->product->getcustdatadt($custname);
        $this->db->where('customer_id',$custID);
        $this->db->select('*');
        $this->db->from('wishlist');
        $query = $this->db->get();
        $data['wishlistcount'] = $query->num_rows();
        $this->load->view('order-success', $data);
    }
    





//$custname=$this->session->userdata('username');
 

//echo $custID=$this->product->getcustdata($custname);



public function deletewishlist(){
    $id=$_GET['id'];
    $this->db->where('id',$id);
    $this->db->delete('wishlist');
    echo ($this->db->affected_rows() != 1) ? 'Error in deleting Product' : 'Product deleted Successfully from wishlist';
}


public function addwishlist(){

    $id=$_GET['id'];
    //$this->db->where('id',$id);
    //echo $id;
    //die;

    $custname=$this->session->userdata('username');


    $custID=$this->product->getcustdata($custname);
    //$custID=1;
    $data=array("customer_id"=>$custID,"product_id"=>$id);

    $this->db->insert('wishlist',$data);

    $this->db->where('customer_id',$custID);
    $this->db->select('*');
	$this->db->from('wishlist');
	$query = $this->db->get();
	echo $rowcount = $query->num_rows();


    //echo "4";


}


public function countwishlist(){
    //$custID=1;
    $custname=$this->session->userdata('username');


    $custID=$this->product->getcustdata($custname);
    $this->db->where('customer_id',$custID);
    $this->db->select('*');
	$this->db->from('wishlist');
	$query = $this->db->get();
	return $rowcount = $query->num_rows();


}
}



//}

?>