<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Cart extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
        
        $this->load->model('Manage_frontend', 'frontend');
        $this->categories = $this->frontend->getCategories();
    }
    
    function index(){
        $data = array();
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        $data['gt']=$this->db->get('site')->row();
        $data['site']= $this->frontend->sitedetails();
        $data['homepagedetails']= $this->frontend->homepagedetails();
        $data['recent_categories'] = array_slice($this->categories, 0, 9);
        $data['menus']=$this->frontend->get_menus();
        
        // Load the cart view
       // $this->load->view('cart/index', $data);
       //$custID=1;
       $custname=$this->session->userdata('username');


    $custID=$this->product->getcustdata($custname);
       $this->db->where('customer_id',$custID);
       $this->db->select('*');
       $this->db->from('wishlist');
       $query = $this->db->get();
       $data['wishlistcount'] = $query->num_rows();
       $this->load->view('cart', $data);

    }
    
    function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
    
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('cart/');
    }
    
}

?>