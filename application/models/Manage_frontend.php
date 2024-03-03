<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_frontend extends CI_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get all products


    //(null, [], [], 3);


    public function getProducts($where = null, $limit = array(), $sort = array(), $prod_opt_type = null, $productsByBrand = null, $productsByCategory = null)
	{
        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
            ->from('products AS P')->where_in('P.prod_status', array(1));
        if (!empty($where)) {
            $this->db->where($where);
            $getProducts = $this->db->get()->row_array();
        }
        if (!empty($prod_opt_type)) {
            $this->db->like('prod_opt_type', $prod_opt_type);
        }
        if (!empty($productsByCategory)) {
            $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id');
            $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
            $this->db->where('C.cat_canonial_name', $productsByCategory);
        }
        if (!empty($productsByBrand)) {
            $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id');
            $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id');
            $this->db->where('B.brand_canonial_name', $productsByBrand);
        }
        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('P.prod_id', 'DESC');
        } else if (empty($where)) {
            $this->db->order_by('P.prod_id', 'DESC');
        }
        //print_r($limit);
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        if (empty($where)) {
            $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->result_array();
        }
   //echo $this->db->last_query();
		return $getProducts;
    }


    //getProductspage


    public function getProductsclear($where = null, $limit = array(), $sort = array(), $prod_opt_type = null, $clearsale= null){


        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
        ->from('products AS P')->where_in('P.prod_status', array(1));
    if (!empty($where)) {
        $this->db->where($where);
        $getProducts = $this->db->get()->row_array();
    }
    if (!empty($prod_opt_type)) {
        $this->db->like('prod_opt_type', $prod_opt_type);
    }

    if (!empty($clearsale)) {
        $this->db->like('prod_opt_type',$clearsale);
    }
    if (!empty($productsByCategory)) {
        $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id');
        $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
        $this->db->where('C.cat_canonial_name', $productsByCategory);
    }
    if (!empty($productsByBrand)) {
        $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id');
        $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id');
        $this->db->where('B.brand_canonial_name', $productsByBrand);
    }
    if (!empty($sort)) {
        if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
        else $this->db->order_by('P.prod_id', 'DESC');
    } else if (empty($where)) {
        $this->db->order_by('P.prod_id', 'DESC');
    }
    //print_r($limit);
    if (!empty($limit)) {
        if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
        else $this->db->limit($limit['limit'], 0);
    }
    if (empty($where)) {
        //$where='clearsaleflag=1';
        //$this->db->where($where);
        $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->result_array();
    }
//echo $this->db->last_query();
    return $getProducts;

    }








    

    public function  get_countproductsclear($where = null, $limit = array(), $sort = array(), $prod_opt_type = null, $clearsale= null){


        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
        ->from('products AS P')->where_in('P.prod_status', array(1));
    if (!empty($where)) {
        $this->db->where($where);
        $getProducts = $this->db->get()->row_array();
    }
    if (!empty($prod_opt_type)) {
        $this->db->like('prod_opt_type', $prod_opt_type);
    }

    if (!empty($clearsale)) {
        $this->db->like('prod_opt_type',$clearsale);
    }
    if (!empty($productsByCategory)) {
        $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id');
        $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
        $this->db->where('C.cat_canonial_name', $productsByCategory);
    }
    if (!empty($productsByBrand)) {
        $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id');
        $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id');
        $this->db->where('B.brand_canonial_name', $productsByBrand);
    }
    if (!empty($sort)) {
        if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
        else $this->db->order_by('P.prod_id', 'DESC');
    } else if (empty($where)) {
        $this->db->order_by('P.prod_id', 'DESC');
    }
    //print_r($limit);
    if (!empty($limit)) {
        if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
        else $this->db->limit($limit['limit'], 0);
    }
    if (empty($where)) {
        //$where='clearsaleflag=1';
        //$this->db->where($where);
        $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->num_rows();
    }
//echo $this->db->last_query();
    return $getProducts;

    }


    public function getProductsclearbest($where = null, $limit = array(), $sort = array(), $prod_opt_type = null, $clearsale= null){


        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
        ->from('products AS P')->where_in('P.prod_status', array(1));
    if (!empty($where)) {
        $this->db->where($where);
        $getProducts = $this->db->get()->row_array();
    }
    if (!empty($prod_opt_type)) {
        $this->db->like('prod_opt_type', $prod_opt_type);
    }

    if (!empty($clearsale)) {
        $this->db->like('prod_opt_type',$clearsale);
    }
    if (!empty($productsByCategory)) {
        $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id');
        $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
        $this->db->where('C.cat_canonial_name', $productsByCategory);
    }
    if (!empty($productsByBrand)) {
        $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id');
        $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id');
        $this->db->where('B.brand_canonial_name', $productsByBrand);
    }
    if (!empty($sort)) {
        if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
        else $this->db->order_by('P.prod_id', 'DESC');
    } else if (empty($where)) {
        $this->db->order_by('P.prod_id', 'DESC');
    }
    //print_r($limit);
    if (!empty($limit)) {
        if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
        else $this->db->limit($limit['limit'], 0);
    }
    if (empty($where)) {
        //$where='clearsaleflag=1';
        //$this->db->where($where);
        $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->result_array();
    }
    //echo $this->db->last_query();
    return $getProducts;

    }


    public function get_countProducts($where = null, $limit = array(), $sort = array(), $prod_opt_type = null, $productsByBrand = null, $productsByCategory = null)
	{
        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
            ->from('products AS P')->where_in('P.prod_status', array(1));
        if (!empty($where)) {
            $this->db->where($where);
            $getProducts = $this->db->get()->row_array();
        }
        if (!empty($prod_opt_type)) {
            $this->db->like('prod_opt_type', $prod_opt_type);
        }
        if (!empty($productsByCategory)) {
            $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id');
            $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
            $this->db->where('C.cat_canonial_name', $productsByCategory);
        }
        if (!empty($productsByBrand)) {
            $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id');
            $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id');
            $this->db->where('B.brand_canonial_name', $productsByBrand);
        }
        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('P.prod_id', 'DESC');
        } else if (empty($where)) {
            $this->db->order_by('P.prod_id', 'DESC');
        }
        //print_r($limit);
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        if (empty($where)) {
            //$getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->result_array();
            $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->num_rows();
        }
        //echo $this->db->last_query();
		return $getProducts;
    }


    public function getProductspage($where = null, $limit = array(), $sort = array(), $prod_opt_type = null, $productsByBrand = null, $productsByCategory = null)
	{





    }



    // Function to get all blogs
    public function getBlogs($where = null, $limit = array(), $sort = array())
	{
        $this->db->select('B.*, UNIX_TIMESTAMP(B.blog_added_date) AS unix_blog_added_date, U.user_firstname')
        ->from('blogs AS B')
        ->join('users AS U', 'U.user_id = B.blog_added_by', '')
        ->where_in('B.blog_status', array(2));
        if (!empty($where)) {
            $this->db->where($where);
            $getBlogs = $this->db->get()->row_array();
        }
        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('B.blog_id', 'DESC');
        } else if (empty($where)) {
            $this->db->order_by('B.blog_id', 'DESC');
        }
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        if (empty($where)) {
            $getBlogs = $this->db->order_by('B.blog_id', 'DESC')->get()->result_array();
        }
		return $getBlogs;
    }

    // Function to get images of blog
    // $pid = blog id; Get a specific blog
    public function getBlogImages($pid = null)
	{
        $getBlogImages = array();
        $this->db->select('BI.*')
            ->from('blog_images BI')
            ->join('blogs AS B', 'B.blog_id = BI.blog_img_bgid')
            ->where(array('BI.blog_img_status' => 1))
            ->where_in('B.blog_status', array(2, 1));
        if (!empty($pid)) {
            $this->db->where(array('B.blog_id' => $pid));
        }
        $getBlogImages = $this->db->get()->result_array();
		return $getBlogImages;
    }

    // Function to get category of product
    public function getCategories($cid = null, $limit = array(), $sort = array())
	{
        $getCategories = array();
        $this->db->select('C.*, UNIX_TIMESTAMP(C.cat_updated_date) AS unix_cat_updated_date')->from('category C');
        $this->db->where_in('C.cat_status', array(0, 1));
        if (!empty($cid)) {
            $this->db->where(array('C.cat_id' => $cid));
            $getCategories = $this->db->get()->row_array();
        }
        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('C.cat_id', 'DESC');
        } else {
            $this->db->order_by('C.cat_id', 'DESC');
        }
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        if (empty($cid)) {
            $getCategories = $this->db->order_by('C.cat_id', 'DESC')->get()->result_array();
        }
		return $getCategories;
    }

    // Function to get 2 random Brand details for Home page
    public function getRandomCategories()
    {
        $getCategories = $this->getCategories();
        $randomArray = $chkArr = [];
        if (count($getCategories) > 2) {
            while (count($randomArray) < 2) {
                $randomKey = mt_rand(0, count($getCategories)-1);
                if (!in_array($getCategories[$randomKey]['cat_id'], $chkArr)) {
                    $randomArray[] = $getCategories[$randomKey];
                    $chkArr[] = $getCategories[$randomKey]['cat_id'];
                }
            }
        } else $randomArray = $getCategories;
        return $randomArray;
    }

    // Function to get brand of product
    public function getBrands($bid = null, $limit = array(), $sort = array())
    {
        $getBrands = array();
        $this->db->select('B.*, UNIX_TIMESTAMP(B.brand_updated_date) AS unix_brand_updated_date')->from('brands B');
        $this->db->where_in('B.brand_status', array(0, 1));
        if (!empty($bid)) {
            $this->db->where(array('B.brand_id' => $bid));
            $getBrands = $this->db->get()->row_array();
        }
        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('B.brand_id', 'DESC');
        } else {
            $this->db->order_by('B.brand_id', 'DESC');
        }
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        if (empty($bid)) {
            $getBrands = $this->db->order_by('B.brand_id', 'DESC')->get()->result_array();
        }
        return $getBrands;
    }

    // Function to get 2 random Brand details for Home page
    public function getRandomBrands()
    {
        $getBrands = $this->getBrands();
        $randomArray = $chkArr = [];
        if (count($getBrands) > 3) {
            while (count($randomArray) < 3) {
                $randomKey = mt_rand(0, count($getBrands)-1);
                if (!in_array($getBrands[$randomKey]['brand_id'], $chkArr)) {
                    $randomArray[] = $getBrands[$randomKey];
                    $chkArr[] = $getBrands[$randomKey]['brand_id'];
                }
            }
        } else $randomArray = $getBrands;
        return $randomArray;
    }

    // Function to get all deals
    public function getDeals($did = null, $limit = array(), $sort = array())
	{
        $getDeals = array();
        $this->db->select('D.*, UNIX_TIMESTAMP(D.deal_updated_date) AS unix_deal_updated_date')->from('deals D');
        $this->db->where_in('D.deal_status', array(0, 1));
        if (!empty($did)) {
            $this->db->where(array('D.deal_id' => $did));
            $getDeals = $this->db->get()->row_array();
        }
        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('D.deal_id', 'DESC');
        } else {
            $this->db->order_by('D.deal_id', 'DESC');
        }
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        if (empty($did)) {
            $getDeals = $this->db->order_by('D.deal_id', 'DESC')->get()->result_array();
        }
		return $getDeals;
    }

    // Function to get all details of product
    public function getProductAllDetails($pid = null)
	{
        $getProducts = array('Details' => array(), 'Category' => array(), 'Recommendation' => array(), 'Types' => array(), 'TechnicalDataSheetHierarchy' => array());
        if (!empty($pid)) {
            $getProducts = array('Details' => $this->getProductDetails($pid), 'Category' => $this->getProductCategories($pid), 'Brand' => $this->getProductBrands($pid), 'Images' => $this->getProductImages($pid), 'Recommendation' => $this->getProductRelated($pid), 'TechnicalDataSheetHierarchy' => $this->getProductTechnicalDataSheetHierarchy($pid));
        }
		return $getProducts;
    }

    // Function to get details of product
    public function getProductDetails($pid = null)
	{
        $getProducts = array();
        $this->db->select('PD.*, PDT.*')
            ->from('product_details PD')
            ->join('products AS P', 'P.prod_id = PD.prod_dt_prodid')
            ->join('product_detail_type PDT', 'PDT.pd_type_id = PD.prod_dt_typeid AND PDT.pd_type_status = 1')
            ->where_in('P.prod_status', array(1));
        if (!empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
        }
        $getProducts = $this->db->get()->result_array();
		return $getProducts;
    }

    // Function to get images of product
    public function getProductImages($pid = null)
	{
        $getProducts = array();
        $this->db->from('product_images PI')
            ->join('products AS P', 'P.prod_id = PI.pd_img_pid')
            ->where(array('PI.pd_img_status' => 1))
            ->where_in('P.prod_status', array(0, 1));
        if (!empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
        }
        $getProducts = $this->db->get()->result_array();
		return $getProducts;
    }

    // Function to get category of product
    // $pid = product id; Get a specific product
    public function getProductCategories($pid = null)
	{
        $getProducts = array();
        $this->db->from('product_category PC')
            ->join('products AS P', 'P.prod_id = PC.pc_prod_id')
            ->join('category C', 'C.cat_id = PC.pc_cat_id')
            ->where_in('P.prod_status', array(0, 1))
            ->where_in('C.cat_status', array(0, 1));
        if (!empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
        }
        $getProducts = $this->db->get()->result_array();
		return $getProducts;
    }

    // Function to get brand of product
    public function getProductBrands($pid = null)
    {
        $getProductBrands = array();
        $this->db->from('product_brand PB')
            ->join('products AS P', 'P.prod_id = PB.pb_prod_id')
            ->join('brands B', 'B.brand_id = PB.pb_brand_id')
            ->where_in('P.prod_status', array(0, 1))
            ->where_in('B.brand_status', array(0, 1));
        if (!empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
        }
        $getProductBrands = $this->db->get()->result_array();
        return $getProductBrands;
    }

    // Function to get similar or related products of a product
    public function getProductRelated($pid = null)
	{
        $getProducts = array();
        $this->db->select('P.*')
            ->from('product_related PR')
            ->join('products AS P', 'P.prod_id = PR.pr_related_prod_id AND PR.pr_status = 1')
            ->where_in('P.prod_status', array(1));
        if (!empty($pid)) {
            $this->db->where(array('PR.pr_prod_id' => $pid));
        }
        $getProducts = $this->db->get()->result_array();
		return $getProducts;
    }

    // Function to get tech_sheet of product
    // $pid = product id; Get a specific product
    public function getProductTechnicalDataSheetHierarchy($pid = null)
	{
        $getProductTechnicalDataSheetHierarchy = array();
        $this->db->select('PTS.*')
            ->from('product_tech_sheet PTS')
            ->join('products AS P', 'P.prod_id = PTS.tech_sheet_prod_id')
            ->where_in('P.prod_status', array(0, 1));
        if (! empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
        }
        $getProductTechnicalDataSheetHierarchy = $this->db->get()->result_array();
        if (! empty($pid)) {
            $reordered = [];
            foreach ($getProductTechnicalDataSheetHierarchy as $record) {
                $reordered[(! empty($record['tech_sheet_hierarchy']))? $record['tech_sheet_hierarchy'] : 'TDS_0'] = $record;
            }
            $getProductTechnicalDataSheetHierarchy = $reordered;
        }
		return $getProductTechnicalDataSheetHierarchy;
    }

    // Function to Save data from contact us form submission
    public function saveContactUsData($send = array())
    {
        if (!empty($send)) {
            $send['cus_added_date'] = mysql_datetime();
            $send['cus_updated_user'] = $send['customer_id'] = NULL;
            $send['cus_status'] = 1; // 0: Trashed; 1: Unreaded;
            return $this->db->insert('contact_us', $send);
        }
    }

    // Update product view on user view
    public function productViewed($pid = null)
    {
        if (!empty($pid)) {
            $view = $this->db->select('P.prod_views')
                ->from('products AS P')->where_in('P.prod_status', array(1))
                ->where(array('P.prod_id' => $pid))
                ->get()->row_array();
            if (!empty($view)) {
                $this->db->update('products', array('prod_views' => $view['prod_views'] + 1), array('prod_id' => $pid));
            }
        }
    }

    public function getmetatag(){
        $this->db->from('metadetails');
    $query = $this->db->get();
    return $metadt=$query->row();

    }

    public function getga(){
        $this->db->from('site');
    $query = $this->db->get();
    return $sitedt=$query->row();

    }

    public function homepagedetails(){
        $this->db->from('homepagedetails');
        $query = $this->db->get();
        return $dt=$query->row();

    }

    public function sitedetails(){
        $this->db->from('site');
        $query = $this->db->get();
        return $dt=$query->row();

    }


    function get_menus(){
        $this->db->where('menutype',1);
        $this->db->where('status',1);
        $this->db->order_by("orderno", "asc");
        $this->db->select('*');
        $this->db->from('menus');
        $query = $this->db->get();
        return $query->result_array();
    
    }


    function get_carousalactive(){
        $this->db->where('active',1);
        $this->db->select('*');
        $this->db->from('carousel');
        $query = $this->db->get();
        return $query->result_array();
    
    
    }
    function get_countcarousel(){
    $this->db->select('*');
        $this->db->from('carousel');
        $query = $this->db->get();
        return $query->num_rows();
    
    
    }
    
    public function get_carousel($limit,$start){
        $this->db->limit($limit,$start);
        //$this->db->limit($limit,$start);
        $this->db->select('*');
        $this->db->from('carousel');
        $query = $this->db->get();
        return $query->result_array();
    
    
    
    }

    public function mostviewed(){


        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
        ->from('products AS P');
        //->where_in('P.prod_status', array(1));
        //$this->db->where('prod_views',1);
        $this->db->where('prod_views!=',0);
        //if (empty($where)) {
            $getProducts = $this->db->order_by('P.prod_views', 'DESC')->get()->result_array();
        //}
        //echo $this->db->last_query();
        //die;
		return $getProducts;


    }

    public function insertdt($data,$table){

        $query = $this->db->insert($table,$data);
        return $query;


    }




    public function get_user($username,$password){


        $this->db->where('email',$username);
        $this->db->where('password',$password);
        $this->db->select('*');
        $this->db->from('userlogin'); 
    
        $query=$this->db->get();    
    //echo $this->db->last_query();
        if ($query->num_rows() > 0){
            return 1;
        }
        else{
            return 0;
        }
    }



    public function getProductssearch($serstring,$limit)
	{
        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
            ->from('products AS P')->where_in('P.prod_status', array(1));
            
        //if (!empty($where)) {
           // $this->db->where($where);
            //$getProducts = $this->db->get()->row_array();
        //}
        //if (!empty($prod_opt_type)) {
            //$this->db->like('prod_opt_type', $prod_opt_type);
        //}
        //if (!empty($productsByCategory)) {
            $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id',);
            $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
            //$this->db->where('C.cat_canonial_name', $productsByCategory);
        //}
        //if (!empty($productsByBrand)) {
            $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id','left');
            $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id','left');
            //$this->db->where('B.brand_canonial_name', $productsByBrand);
        //}

        $this->db->join('product_details PD', 'P.prod_id = PD.prod_dt_prodid');


        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('P.prod_id', 'DESC');
        } else if (empty($where)) {
            $this->db->order_by('P.prod_id', 'DESC');
        }
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        $this->db->like('prod_name',"$serstring" );
        $this->db->or_like('cat_name',"$serstring" );
        $this->db->or_like('brand_name ',"$serstring");
        $this->db->or_like('prod_dt_desc',"$serstring" );
      if (empty($where)) {
           $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->result_array();
        }
     //echo $this->db->last_query();
		return $getProducts;
    }





    public function get_countproductssearch($serstring)
	{
        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
            ->from('products AS P')->where_in('P.prod_status', array(1));
            
        //if (!empty($where)) {
           // $this->db->where($where);
            //$getProducts = $this->db->get()->row_array();
        //}
        //if (!empty($prod_opt_type)) {
            //$this->db->like('prod_opt_type', $prod_opt_type);
        //}
        //if (!empty($productsByCategory)) {
            $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id',);
            $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
            //$this->db->where('C.cat_canonial_name', $productsByCategory);
        //}
        //if (!empty($productsByBrand)) {
            $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id','left');
            $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id','left');
            //$this->db->where('B.brand_canonial_name', $productsByBrand);
        //}

        $this->db->join('product_details PD', 'P.prod_id = PD.prod_dt_prodid');


        if (!empty($sort)) {
            if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
            else $this->db->order_by('P.prod_id', 'DESC');
        } else if (empty($where)) {
            $this->db->order_by('P.prod_id', 'DESC');
        }
        if (!empty($limit)) {
            if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
            else $this->db->limit($limit['limit'], 0);
        }
        $this->db->like('prod_name',"$serstring" );
        $this->db->or_like('cat_name',"$serstring" );
        $this->db->or_like('brand_name ',"$serstring");
        $this->db->or_like('prod_dt_desc',"$serstring" );
      if (empty($where)) {
           $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->num_rows();
        }
     //echo $this->db->last_query();
		return $getProducts;
    }


    public function getProductssearchbestselling($serstring){


        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date')
        ->from('products AS P')->where_in('P.prod_status', array(1));
        $prod_opt_type=3;
        
    //if (!empty($where)) {
       // $this->db->where($where);
        //$getProducts = $this->db->get()->row_array();
    //}
    //if (!empty($prod_opt_type)) {
        //$this->db->like('prod_opt_type', $prod_opt_type);
    //}
    //if (!empty($productsByCategory)) {
        $this->db->join('product_category AS PC', 'PC.pc_prod_id = P.prod_id');
        $this->db->join('category AS C', 'C.cat_id = PC.pc_cat_id');
        //$this->db->where('C.cat_canonial_name', $productsByCategory);
    //}
    //if (!empty($productsByBrand)) {
        $this->db->join('product_brand AS PB', 'PB.pb_prod_id = P.prod_id','left');
        $this->db->join('brands AS B', 'B.brand_id = PB.pb_brand_id','left');
        //$this->db->where('B.brand_canonial_name', $productsByBrand);
    //}


    
  $this->db->join('product_details PD', 'P.prod_id = PD.prod_dt_prodid');
    //$this->db->join('product_detail_type PDT', 'PDT.pd_type_id = PD.prod_dt_typeid AND PDT.pd_type_status = 1');


    if (!empty($sort)) {
        if (isset($sort['field']) && isset($sort['order'])) $this->db->order_by($sort['field'], $sort['order']);
        else $this->db->order_by('P.prod_id', 'DESC');
    } else if (empty($where)) {
        $this->db->order_by('P.prod_id', 'DESC');
    }
    if (!empty($limit)) {
        if (isset($limit['offset'])) $this->db->limit($limit['limit'], $limit['offset']);
        else $this->db->limit($limit['limit'], 0);
    }
    $this->db->like('prod_name',"$serstring" );
    $this->db->or_like('cat_name',"$serstring" );
    $this->db->or_like('brand_name ',"$serstring");
    $this->db->or_like('prod_dt_desc',"$serstring" );
    $this->db->like('P.prod_opt_type',$prod_opt_type);
    /*$this->db->like('P.prod_dt_typeid',15);*/
  //if (empty($where)) {
       $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->result_array();
    //}*/


    
    //echo $this->db->last_query();
    return $getProducts;


    }


    public function getProductssort(){
        
    }




}