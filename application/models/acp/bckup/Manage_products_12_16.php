<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_products extends CI_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get all products
    // $pid = product id; Get a specific product
    public function getProducts($pid = null)
	{
        $this->db->select('P.*, UNIX_TIMESTAMP(P.prod_updated_date) AS unix_prod_updated_date, CONCAT(U.user_firstname, " ", U.user_lastname) AS user_name')
        ->join('users U', 'U.user_id = P.prod_added_user')
        ->from('products AS P')->where_in('P.prod_status', array(0, 1));
        if (!empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
            $getProducts = $this->db->get()->row_array();
        } else {
            $getProducts = $this->db->order_by('P.prod_id', 'DESC')->get()->result_array();
        }
		return $getProducts;
    }

    // Function to get all details of product
    // $pid = product id; Get a specific product
    public function getProductAllDetails($pid = null)
	{
        $getProducts = array('Product' => array(), 'Details' => array(), 'Images' => array(), 'Category' => array(), 'Similar' => array());
        if (!empty($pid)) {
            $getProducts = array(
                'Product' => $this->getProducts($pid),
                'Details' => $this->getProductDetails($pid),
                'Images' => $this->getProductImages($pid),
                'Category' => $this->getProductCategories($pid),
                'Brand' => $this->getProductBrands($pid),
                'Similar' => $this->getProductRelated($pid),
                'data_sheet' => $this->getProductTechnicalDataSheetHierarchy($pid),
            );
        }
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

    // Function to get details of product
    // $pid = product id; Get a specific product
    public function getProductDetails($pid = null)
	{
        $getProducts = array();
        $this->db->from('product_details PD')
            ->join('products AS P', 'P.prod_id = PD.prod_dt_prodid')
            ->join('product_detail_type PDT', 'PDT.pd_type_id = PD.prod_dt_typeid AND PDT.pd_type_status = 1')
            ->where_in('P.prod_status', array(0, 1));
        if (!empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
        }
        $getProducts = $this->db->get()->result_array();
		return $getProducts;
    }

    // Function to get type of product
    // $tid = product type id; Get a specific product type
    public function getProductDetailTypes($tid = null)
	{
        $getProductDetailTypes = array();
        $this->db->select('PDT.* , UNIX_TIMESTAMP(PDT.pd_type_updated_date) AS unix_updated_time')
        ->from('product_detail_type PDT');
        $this->db->where(array('PDT.pd_type_status' => '1'));
        if (!empty($tid)) {
            $this->db->where(array('PDT.pd_type_id' => $tid));
            $getProductDetailTypes = $this->db->get()->row_array();
        } else {
            $getProductDetailTypes = $this->db->order_by('PDT.pd_type_id', 'DESC')->get()->result_array();
        }
		return $getProductDetailTypes;
    }

    // Function to get images of product
    // $pid = product id; Get a specific product
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

    // Function to get category of product
    // $cid = product category id; Get a specific product category
    public function getCategories($cid = null)
	{
        $getCategories = array();
        $this->db->select('C.*, UNIX_TIMESTAMP(C.cat_updated_date) AS unix_cat_updated_date')->from('category C');
        $this->db->where_in('C.cat_status', array(0, 1));
        if (!empty($cid)) {
            $this->db->where(array('C.cat_id' => $cid));
            $getCategories = $this->db->get()->row_array();
        } else {
            $getCategories = $this->db->order_by('C.cat_id', 'DESC')->get()->result_array();
        }
		return $getCategories;
    }

    // Function to get brand of product
    // $pid = product id; Get a specific product
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

    // Function to get brand of product
    // $bid = product brand id; Get a specific product brand
    public function getBrands($bid = null)
    {
        $getBrands = array();
        $this->db->select('B.*, UNIX_TIMESTAMP(B.brand_updated_date) AS unix_brand_updated_date')->from('brands B');
        $this->db->where_in('B.brand_status', array(0, 1));
        if (!empty($bid)) {
            $this->db->where(array('B.brand_id' => $bid));
            $getBrands = $this->db->get()->row_array();
        } else {
            $getBrands = $this->db->order_by('B.brand_id', 'DESC')->get()->result_array();
        }
        return $getBrands;
    }

    // Function to get similar or related products of a product
    // $pid = product id; Get a specific product
    public function getProductRelated($pid = null)
	{
        $getProducts = array();
        $this->db->from('product_related PR')
            ->join('products AS P', 'P.prod_id = PR.pr_prod_id AND PR.pr_status = 1')
            ->where_in('P.prod_status', array(0, 1));
        if (!empty($pid)) {
            $this->db->where(array('P.prod_id' => $pid));
        }
        $getProducts = $this->db->get()->result_array();
		return $getProducts;
    }

    // Function to save product
    public function saveProduct($prod = array())
	{
        $saveProduct = array();
        if (!empty($prod)) {            
            // Save product
            $this->db->trans_begin();

            $productData = array(
                'prod_name' => trim($prod['prod_name']),
                'prod_canonial_name' => trim($prod['prod_canonial_name']),
                'prod_primary_image' => trim($prod['prod_primary_image']),
                'prod_opt_type' => trim($prod['prod_opt_type']),
                'prod_added_user' => trim($prod['prod_added_user']),
                'prod_updated_user' => trim($prod['prod_updated_user']),
                'prod_status' => 1,
                'prod_added_date' => ((!isset($prod['pid']))? mysql_datetime() : NULL),
                'prod_updated_date' => ((isset($prod['pid']))? mysql_datetime() : NULL),
                'metatag' => trim($prod['metatag']),
            );

            if (isset($prod['pid']) && !empty($prod['pid'])) {
                // Update product
                unset($productData['prod_added_user']);
                unset($productData['prod_added_date']);
                unset($productData['prod_status']);
                $this->db->update('products', $productData, array('prod_id' => $prod['pid']));
                $prodID = $prod['pid'];
            } else {
                // Add product
                unset($productData['prod_updated_user']);
                unset($productData['prod_updated_date']);
                $this->db->insert('products', $productData);
                $prodID = $this->db->insert_id();
            }

            // Save product details
            if (isset($prod['prod_details']) && !empty($prod['prod_details'])) {
                $prodDetails = array();
                foreach ($prod['prod_details'] as $key => $detail) {
                    $prodDetails[] = array(
                        'prod_dt_prodid' => $prodID,
                        'prod_dt_typeid' => $detail['prod_dt_typeid'],
                        'prod_dt_desc' => $detail['prod_dt_desc']
                    );
                }
                if (!empty($prodDetails)) {
                    if (isset($prod['pid']) && !empty($prod['pid'])) {
                        $existDtl = array();
                        foreach ($prodDetails as $key => $PDvalue) {
                            $detailExist = $this->db->select('prod_dt_typeid')->from('product_details')->where(array('prod_dt_prodid' => $prodID, 'prod_dt_typeid' => $PDvalue['prod_dt_typeid']))->get()->row_array();
                            $existDtl[] = $PDvalue['prod_dt_typeid'];
                            if (!empty($detailExist)) {
                                $this->db->update('product_details', $PDvalue, array('prod_dt_prodid' => $prodID, 'prod_dt_typeid' => $PDvalue['prod_dt_typeid']));
                            } else {
                                $this->db->insert('product_details', $PDvalue);
                            }
                        }
                        // Remove unwanted details
                        if (!empty($existDtl)) {
                            $delete = $this->db->select('prod_dt_typeid')->from('product_details')->where(array('prod_dt_prodid' => $prodID))->where_not_in('prod_dt_typeid', $existDtl)->get()->result_array();
                            if (!empty($delete)) {
                                foreach ($delete as $key => $deleteval) {
                                    $this->db->delete('product_details', array('prod_dt_prodid' => $prodID, 'prod_dt_typeid' => $deleteval['prod_dt_typeid']));
                                }
                            }
                        }
                    } else {
                        $this->db->insert_batch('product_details', $prodDetails);
                    }
                }
            }

            // Save product category
            if (isset($prod['prod_category']) && !empty($prod['prod_category'])) {
                $existDtl = array();
                $catExist = $this->db->select('pc_cat_id')->from('product_category')->where(array('pc_prod_id' => $prodID, 'pc_cat_id' => $prod['prod_category']))->get()->row_array();
                if (empty($catExist)) {
                    $this->db->insert('product_category', array('pc_cat_id' => $prod['prod_category'], 'pc_prod_id' => $prodID));
                    $existDtl[] = $prod['prod_category'];
                }
                // Remove unwanted details
                if (!empty($existDtl)) {
                    $delete = $this->db->select('pc_cat_id')->from('product_category')->where(array('pc_prod_id' => $prodID))->where_not_in('pc_cat_id', $existDtl)->get()->result_array();
                    if (!empty($delete)) {
                        foreach ($delete as $key => $deleteval) {
                            $this->db->delete('product_category', array('pc_prod_id' => $prodID, 'pc_cat_id' => $deleteval['pc_cat_id']));
                        }
                    }
                }
            }

            // Save product brand
            if (isset($prod['prod_brand']) && !empty($prod['prod_brand'])) {
                $existDtl = array();
                $brandExist = $this->db->select('pb_brand_id')->from('product_brand')->where(array('pb_prod_id' => $prodID, 'pb_brand_id' => $prod['prod_brand']))->get()->row_array();
                if (empty($brandExist)) {
                    $this->db->insert('product_brand', array('pb_brand_id' => $prod['prod_brand'], 'pb_prod_id' => $prodID));
                    $existDtl[] = $prod['prod_brand'];
                }
                // Remove unwanted details
                if (!empty($existDtl)) {
                    $delete = $this->db->select('pb_brand_id')->from('product_brand')->where(array('pb_prod_id' => $prodID))->where_not_in('pb_brand_id', $existDtl)->get()->result_array();
                    if (!empty($delete)) {
                        foreach ($delete as $key => $deleteval) {
                            $this->db->delete('product_brand', array('pb_prod_id' => $prodID, 'pb_brand_id' => $deleteval['pb_brand_id']));
                        }
                    }
                }
            }

            // Save product images
            if (isset($prod['prod_images']) && !empty($prod['prod_images'])) {
                $existDtl = array();
                foreach ($prod['prod_images'] as $key => $PDvalue) {
                    $detailExist = $this->db->select('pd_img_id')->from('product_images')->where(array('pd_img_pid' => $prodID, 'pd_img_image' => $PDvalue['pd_img_image']))->get()->row_array();
                    $existDtl[] = $PDvalue['pd_img_image'];
                    if (!empty($detailExist)) {
                        $this->db->update('product_images', $PDvalue, array('pd_img_pid' => $prodID, 'pd_img_image' => $PDvalue['pd_img_image']));
                    } else {
                        $insert = array_merge($PDvalue, array('pd_img_pid' => $prodID, 'pd_img_status' => 1));
                        $this->db->insert('product_images', $insert);
                    }
                }
                // Remove unwanted details
                if (!empty($existDtl)) {
                    $delete = $this->db->select('pd_img_id')->from('product_images')->where(array('pd_img_pid' => $prodID))->where_not_in('pd_img_image', $existDtl)->get()->result_array();
                    if (!empty($delete)) {
                        foreach ($delete as $key => $deleteval) {
                            $this->db->delete('product_images', array('pd_img_pid' => $prodID, 'pd_img_id' => $deleteval['pd_img_id']));
                        }
                    }
                }
            }

            // Save related or similar products
            if (isset($prod['related_prod']) && !empty($prod['related_prod'])) {
                $existDtl = array();
                foreach ($prod['related_prod'] as $key => $relProd) {
                    $detailExist = $this->db->select('pr_id')->from('product_related')->where(array('pr_prod_id' => $prodID, 'pr_related_prod_id' => $relProd))->get()->row_array();
                    $existDtl[] = $relProd;
                    if (!empty($detailExist)) {
                        $this->db->update('product_related', array('pr_updated_date' => mysql_datetime()), array('pr_prod_id' => $prodID, 'pr_related_prod_id' => $relProd));
                    } else {
                        $this->db->insert('product_related', array('pr_prod_id' => $prodID, 'pr_related_prod_id' => $relProd, 'pr_added_user' => ((isset($prod['pid']) && !empty($prod['pid']))? $productData['prod_updated_user'] : $productData['prod_added_user']), 'pr_status' => 1, 'pr_added_date' => mysql_datetime()));
                    }
                }
                // Remove unwanted details
                if (!empty($existDtl)) {
                    $delete = $this->db->select('pr_id')->from('product_related')->where(array('pr_prod_id' => $prodID))->where_not_in('pr_related_prod_id', $existDtl)->get()->result_array();
                    if (!empty($delete)) {
                        foreach ($delete as $key => $deleteval) {
                            $this->db->delete('product_related', array('pr_prod_id' => $prodID, 'pr_id' => $deleteval['pr_id']));
                        }
                    }
                }
            }

            // Save technical data sheet value
            if (isset($prod['tech_data_sheet']) && ! empty($prod['tech_data_sheet'])) {
                $this->db->delete('product_tech_sheet', array('tech_sheet_prod_id' => $prodID));
                foreach ($prod['tech_data_sheet'] as $k => $sheetData) {
                    $sheetData = array_merge($sheetData, ['tech_sheet_prod_id' => $prodID]);
                    $this->db->insert('product_tech_sheet', $sheetData);
                }
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        }
		return $saveProduct;
    }

    // Product delete / lock / unlock
	public function action($prod = null, $action = null)
	{
		if (!empty($prod) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                $this->db->update('products', array('prod_status' => 2), array('prod_id' => $prod));
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				$this->db->update('products', array('prod_status' => 1), array('prod_id' => $prod));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				$this->db->update('products', array('prod_status' => 0), array('prod_id' => $prod));
                return true;
			}
		}
        return false;
	}

    // Save or update product detail type
	public function saveProductType($typeAdd = array())
	{
		if (!empty($typeAdd)) {
            if (isset($typeAdd['pd_type_id']) && !empty($typeAdd['pd_type_id'])) {
                // Update product type
                $typeAdd['pd_type_updated_date'] = mysql_datetime();
                $this->db->update('product_detail_type', $typeAdd, array('pd_type_id'=>$typeAdd['pd_type_id']));
                return true;
            } else {
                // Add product type
                $typeAdd['pd_type_status'] = 1;
                $typeAdd['pd_type_system'] = 0;
                $typeAdd['pd_type_added_date'] = mysql_datetime();
                $this->db->insert('product_detail_type', $typeAdd);
                return true;
            }
        }
        return false;
    }

    // Product detail type delete
	public function actionProductType($prodtype = null, $action = null)
	{
		if (!empty($prodtype) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                $this->db->update('product_detail_type', array('pd_type_status' => 0), array('pd_type_id' => $prodtype));
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				$this->db->update('product_detail_type', array('pd_type_status' => 1), array('pd_type_id' => $prodtype));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				$this->db->update('product_detail_type', array('pd_type_status' => 0), array('pd_type_id' => $prodtype));
                return true;
			}
		}
        return false;
	}

    // Save or update product category
	public function saveProductCategory($catg = array())
	{
		if (!empty($catg)) {
            if (isset($catg['cat_id']) && !empty($catg['cat_id'])) {
                // Update product category
                $catg['cat_updated_date'] = mysql_datetime();
                $this->db->update('category', $catg, array('cat_id' => $catg['cat_id']));
                return true;
            } else {
                // Add product category
                $catg['cat_status'] = 1;
                $catg['cat_added_date'] = mysql_datetime();
                $this->db->insert('category', $catg);
                return true;
            }
        }
        return false;
    }

    // Product category delete / lock / unlock
	public function actionCategory($catg = null, $action = null)
	{
		if (!empty($catg) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                $this->db->update('category', array('cat_status' => 2), array('cat_id' => $catg));
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				$this->db->update('category', array('cat_status' => 1), array('cat_id' => $catg));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				$this->db->update('category', array('cat_status' => 0), array('cat_id' => $catg));
                return true;
			}
		}
        return false;
	}

    // Save or update product brand
	public function saveProductBrand($brand = array())
	{
		if (!empty($brand)) {
            if (isset($brand['brand_id']) && !empty($brand['brand_id'])) {
                // Update product brand
                $brand['brand_updated_date'] = mysql_datetime();
                $this->db->update('brands', $brand, array('brand_id' => $brand['brand_id']));
                return true;
            } else {
                // Add product brand
                $brand['brand_status'] = 1;
                $brand['brand_added_date'] = mysql_datetime();
                $this->db->insert('brands', $brand);
                return true;
            }
        }
        return false;
    }

    // Product brand delete / lock / unlock
	public function actionBrand($brand = null, $action = null)
	{
		if (!empty($brand) && !empty($action)) {
			if ($action == 'delete') { // Delete this product
                $this->db->update('brands', array('brand_status' => 2), array('brand_id' => $brand));
                return true;
			} else if ($action == 'unlock') { // Make available in frontend
				$this->db->update('brands', array('brand_status' => 1), array('brand_id' => $brand));
                return true;
			} else if ($action == 'lock') { // Make unavailable in frontend
				$this->db->update('brands', array('brand_status' => 0), array('brand_id' => $brand));
                return true;
			}
		}
        return false;
	}

    // Slug for product name
    public function doSlugify($text = null, $except = null)
    {
        if (!empty($text)) {
            $check = array();
            $slugify = slugify($text);
            do {
                if (!empty($check)) $slugify = $slugify.'-'.count($check);
                $where = array('prod_canonial_name' => $slugify);
                if (!empty($except)) $where = array_merge($where, array('prod_id != ' => $except));
                $check = $this->db->select('prod_canonial_name')->from('products')->where($where)->get()->result_array();
            } while (!empty($check));
            return array('slugText' => $slugify);
        }
    }

    // Slug for brand name
    public function doBrandSlugify($text = null, $except = null)
    {
        if (!empty($text)) {
            $check = array();
            $slugify = slugify($text);
            do {
                if (!empty($check)) $slugify = $slugify.'-'.count($check);
                $where = array('brand_canonial_name' => $slugify);
                if (!empty($except)) $where = array_merge($where, array('brand_id != ' => $except));
                $check = $this->db->select('brand_canonial_name')->from('brands')->where($where)->get()->result_array();
            } while (!empty($check));
            return array('slugText' => $slugify);
        }
    }

    // Slug for category name
    public function doCatgSlugify($text = null, $except = null)
    {
        if (!empty($text)) {
            $check = array();
            $slugify = slugify($text);
            do {
                if (!empty($check)) $slugify = $slugify.'-'.count($check);
                $where = array('cat_canonial_name' => $slugify);
                if (!empty($except)) $where = array_merge($where, array('cat_id != ' => $except));
                $check = $this->db->select('cat_canonial_name')->from('category')->where($where)->get()->result_array();
            } while (!empty($check));
            return array('slugText' => $slugify);
        }
    }

    // Function to get all blogs
    public function getBlogs()
	{
        $this->db->from('')->where(array('blog_status' => 2));
        $getBlogs = $this->db->get()->result_array();
		return $getBlogs;
    }

}