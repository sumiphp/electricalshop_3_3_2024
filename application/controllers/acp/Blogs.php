<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = "Blogs";
		$this->data['main_menu_active'] = 'Blogs';
		$this->data['sub_menu_active'] = '';
		$this->data['innersub_menu_active'] = '';
		$this->data['page_breadcrumb'] = array("Blogs" => array('active' => true, 'link' => site_url().'acp/Blogs'));
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$this->load->model('acp/Manage_blogs', 'acpBlogs');
		if (!hasUserAccess(14)) acp_show403();
		date_default_timezone_set(TIMEZONE);
	}

	// Initial Listing
	public function index()
	{
		$this->data['page_title'] = "List Blogs";
		$this->data['page_breadcrumb'] = array("Blogs" => array('active' => false, 'link' => site_url().'acp/Blogs'), "List Blogs" => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = "List Blogs";
		$this->load->view('acp/blogs', $this->data);
	}

	// Ajax Listing
	public function getBlogsTable()
	{
		if ($this->input->is_ajax_request()) {
			$this->data['blogs'] = $this->acpBlogs->getBlogs();
			$this->load->view('acp/includes/blogsTable', $this->data);
		}
	}

	// Add/Edit blogs
	public function add($cid = null, $view = false)
	{
		$this->data['page_title'] = ((empty($cid))? "Add" : (($view)? "View" : "Edit" ))." Blog";
		$this->data['page_breadcrumb'] = array("Blogs" => array('active' => false, 'link' => site_url().'acp/Blogs'), ((empty($cid))? "Add" : "Edit") => array('active' => true, 'link' => ''));
		$this->data['sub_menu_active'] = ((empty($cid))? "Add Blogs" : "List Blogs");
		$this->data['blog'] = array();
		if (!empty($cid)) {
			$this->data['blog'] = $this->acpBlogs->getBlogs($cid);
			$this->data['blog']['Images'] = $this->acpBlogs->getBlogImages($cid);
		}
		$this->load->view('acp/addBlogs', $this->data);
	}

	// Save or Update a blog
	public function save()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$blog = $this->input->post(null, true);
			// Blog image
			$blog_images = array();
			if (isset($blog['blogImages']) && !empty($blog['blogImages'])) {
				foreach ($blog['imgdesc'] as $key => $imgdesc) {
					if ((trim($imgdesc['title']) !='') && isset($imgdesc['val'])) $blog[$imgdesc['title']] = $imgdesc['val'];
				}
				$blogImages = explode(',', $blog['blogImages']);
				foreach ($blogImages as $key => $image) {
					$blog_img_image = trim(str_replace('~', '', $image));
					if (isset($blog['pimgdesc_'.str_replace('.', '_', $blog_img_image)])) {
						$blog_images[] = array(
							'blog_img_image' => $blog_img_image,
							'blog_img_description' => (isset($blog['pimgdesc_'.str_replace('.', '_', $blog_img_image)]))? $blog['pimgdesc_'.str_replace('.', '_', $blog_img_image)] : '',
							'blog_img_added_user' => $this->loggedInUser['user_id'],
						);
					}
				}
			}
			$blogContent = html_escape($this->input->post('blogContent', FALSE));
			$blogAdd = array(
				'blog_id' => $blog['blog_id'],
				'blog_name' => trim($blog['blog_name']),
				'blog_canonial_name' => trim($blog['blog_canonial_name']),
				'blog_subject' => trim($blog['blog_subject']),
				'blog_content' => trim($blogContent),
				'blog_featured_image' => str_replace(' ', '_', trim($blog['blog_featured_image'])),
				'blog_images' => $blog_images,
				'blog_notify' => ((isset($blog['blog_notify']) && !empty($blog['blog_notify']))? $blog['blog_notify'] : 0),
				'blog_added_by' => $this->loggedInUser['user_id'],
				'blog_updated_by' => $this->loggedInUser['user_id'],
				'blog_added_date' => mysql_datetime(),
				'blog_status' => $blog['blog_status'],
			);
			if (isset($blog['blog_id']) && !empty($blog['blog_id'])) {
				$blogAdd = array_merge($blogAdd, array('blog_updated_date' => mysql_datetime()));
			}
			$save = $this->acpBlogs->saveBlog($blogAdd);
			if ($save) {
				generateSitemapContent();
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Blog '.((isset($blog['blog_id']) && !empty($blog['blog_id']))? 'updated' : 'added').' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

	// Slug for blog name
	public function doSlugify()
	{
		if ($this->input->is_ajax_request()) {
			$text = $this->input->post('text', true);
			$except = $this->input->post('except', true);
			$resp = false;
			if (!empty($text) && (trim($text) != '')) $resp = $this->acpBlogs->doSlugify($text, $except);
			if ($resp) {
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Blog slug created successfully.', 'slugText' => $resp['slugText']));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		}
	}

	// 0:Trashed; 1:Draft; 2:Published; a Blog
	public function action()
	{
		if ($this->input->is_ajax_request()) {
			// Fetching data from form
			$blog = $this->input->post('blog', true);
			$action = $this->input->post('action', true); // 0:Trashed; 1:Draft; 2:Published;
			$resp = $this->acpBlogs->action($blog, $action);
			if ($resp) {
				generateSitemapContent();
				send_json_response(array('status' => 'success', 'title' => 'Success', 'message' => 'Blog '.(($action == '0')? 'deleted' : (($action == '1')? 'drafted' : 'published')).' successfully.'));
			} else {
				send_json_response(array('status' => 'error', 'title' => 'Error', 'message' => 'Oops! Something has went wrong.'));
			}
		} else {
			acp_show404();
		}
	}

}