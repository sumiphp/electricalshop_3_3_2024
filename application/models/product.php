<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model{
    
    function __construct() {
        $this->proTable = 'products';
        $this->custTable = 'customers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }
    
    /*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        //$this->db->where('status', '1');
        if($id){
            $this->db->where('prod_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
           // $this->db->order_by('name', 'asc');
           $this->db->order_by('prod_name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    
    /*
     * Fetch order data from the database
     * @param id returns a single record of the specified ID
     */
    public function getOrder($id){
        $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();

        // Get order items
        //$this->db->select('i.*, p.image, p.name, p.price');
        $this->db->select('i.*, p.prod_primary_image, p.prod_name,pi.prod_dt_desc as price');
       
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.prod_id = i.product_id', 'left');
        $this->db->join('product_details as pi', 'pi.prod_dt_prodid = p.prod_id', 'left');
        $this->db->where('i.order_id', $id);


        //$this->db->where('prod_dt_prodid',$product['prod_id']);
        $this->db->where('prod_dt_typeid',4);
        $query2 = $this->db->get();
        //echo $this->db->last_query();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    
    /*
     * Insert customer data in the database
     * @param data array
     */
    public function insertCustomer($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer data
        $insert = $this->db->insert($this->custTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order data in the database
     * @param data array
     */
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);
       // echo $this->db->last_query();
//echo $this->db->insert_id();
        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert?true:false;
        //return $insert?$this->db->insert_id():false;
    }



    public function insertbill($billdetail){

        $insert = $this->db->insert('billingdetails',$billdetail);
        //echo $this->db->last_query();
        //die;
 //echo $this->db->insert_id();
         // Return the status
         return $insert?$this->db->insert_id():false;



    }



    public function getcustdata($custID){
        $this->db->where('email',$custID);
        $dt=$this->db->get('userlogin')->row();
       //echo $this->db->last_query();
        return $dt->userid;




    }


    public function getcustdatadt($custID){
        $this->db->where('email',$custID);
        $dt=$this->db->get('userlogin')->row();
       //echo $this->db->last_query();
        return $dt;




    }







    public function custwishlist($custID){
        $this->db->where('customer_id',$custID);
        $dt=$this->db->get('wishlist')->result_array();
        return $dt;



    }



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
        $custID=1;
        $data=array("customer_id"=>$custID,"product_id"=>$id);

        $this->db->insert('wishlist',$data);

        echo "4";


    }


    public function getcustdetails($custID){
        $this->db->where('userid',$custID);
        $dt=$this->db->get('userlogin')->row();
        return $dt;
    }



    public function getcountries(){

        //$this->db->where('customer_id',$custID);
        $dt=$this->db->get('countries')->result_array();
        return $dt;

    }




}

?>