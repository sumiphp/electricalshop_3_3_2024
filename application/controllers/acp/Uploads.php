<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!checkLogIn()) { redirect('acp'); } // Check Login
		$this->loggedInUser = loggedInUser(); // Logged In user details
		$oneMB = '1048576';
		$this->uploadConfig = array(
			'askforservice' => array(
				'upload_path' => './assets/uploads/askforservice/',
				'max_size' => $oneMB * 5, // In 1,048,576B = 1024 KB = 1 MB
				'allowed_types' => '*',
				'remove_spaces' => TRUE
			), 'site' => array(
				'upload_path' => './assets/uploads/site/',
				'max_size' => $oneMB * 5, // In 1,048,576B = 1024 KB = 1 MB
				'allowed_types' => '*',
				'extension' => array('bmp', 'jpeg', 'jpg', 'png', 'ico', 'svg'),
				'remove_spaces' => TRUE
			), 'staffs' => array(
				'upload_path' => './assets/uploads/users/',
				'max_size' => $oneMB * 5, // In 1,048,576B = 1024 KB = 1 MB
				'allowed_types' => '*',
				'extension' => array('bmp', 'jpeg', 'jpg', 'png', 'webp'),
				'remove_spaces' => TRUE
			), 'blogs' => array(
				'upload_path' => './assets/uploads/blogs/',
				'max_size' => $oneMB * 20, // In 1048576B = 1000 KB = 1 MB
				'allowed_types' => '*',
				'extension' => array('bmp', 'jpeg', 'jpg', 'png', 'webp', 'gif', 'svg'),
				'remove_spaces' => TRUE
			), 'map' => array(
				'upload_path' => './assets/uploads/site/',
				'max_size' => $oneMB * 5, // In 1048576B = 1000 KB = 1 MB
				'allowed_types' => '*',
				'extension' => array('png', 'svg'),
				'remove_spaces' => TRUE
			), 'products' => array(
				'upload_path' => './assets/uploads/products/',
				'max_size' => $oneMB * 20, // In 1048576B = 1000 KB = 1 MB
				'allowed_types' => '*',
				'extension' => array('jpeg', 'jpg', 'png', 'webp', 'svg'),
				'remove_spaces' => TRUE
			), 'tnc' => array(
				'upload_path' => './assets/uploads/tnc/',
				'max_size' => $oneMB * 5, // In 1,048,576B = 1024 KB = 1 MB
				'allowed_types' => '*',
				'remove_spaces' => TRUE
			), 'brands' => array(
				'upload_path' => './assets/uploads/brands/',
				'max_size' => $oneMB * 20, // In 1048576B = 1000 KB = 1 MB
				'allowed_types' => '*',
				'extension' => array('jpeg', 'jpg', 'png', 'webp', 'svg'),
				'remove_spaces' => TRUE
			), 'categories' => array(
				'upload_path' => './assets/uploads/categories/',
				'max_size' => $oneMB * 20, // In 1048576B = 1000 KB = 1 MB
				'allowed_types' => '*',
				'extension' => array('jpeg', 'jpg', 'png', 'webp', 'svg'),
				'remove_spaces' => TRUE
			)
		);
    }

	public function doUpload($key = null)
	{
		if (!empty($key) && isset($this->uploadConfig[$key])) {
			if(!empty($_FILES['file']['name'])){
				// allowed_types
				$ext = ((isset($this->uploadConfig[$key]['extension']) && !empty($this->uploadConfig[$key]['extension']))? $this->uploadConfig[$key]['extension'] : array());
				$fname = preg_replace("/[^A-Za-z0-9.]/", '_', $_FILES['file']['name']);
				$this->uploadConfig[$key]['file_name'] = $fname;
				$this->load->library('upload', $this->uploadConfig[$key]);
				$pathinfo = pathinfo($_FILES['file']['name']);
				if ((empty($ext)) || (!empty($ext) && (array_key_exists('extension', $pathinfo)) && ($pathinfo['extension'] != '') && (in_array(strtolower($pathinfo['extension']), $ext)))) {
					if (file_exists(FCPATH.str_replace('.', '', $this->uploadConfig[$key]['upload_path']).$fname)) {
						unlink($this->uploadConfig[$key]['upload_path'].$fname);
					}
					if (!$this->upload->do_upload('file')) {
						send_json_response(array('status' => false, 'message' => $this->upload->display_errors()));
					} else {
						if ($key !== 'banners') {
							$imagesize = getimagesize(FCPATH.str_replace('.', '', $this->uploadConfig[$key]['upload_path']).$fname);
							$maxw = 600;
							if ($maxw < $imagesize[0]) {
								$ratio = 1;
								if ( $imagesize[0] > $imagesize[1] ) {
									$ratio = $maxw / $imagesize[0];
								} else {
									$ratio = $maxw / $imagesize[0]; // Resize format for image with higher upload height
								}
								$new_width = round( $imagesize[0] * $ratio ); //get the smaller value from cal # floor()
								$new_height = round( $imagesize[1] * $ratio );
								// $fileSize in Byte
								// 1 MB => 1000 KB => 1000000 Byte
								$this->load->library('image_lib');
								$config['image_library'] = 'gd2';
								$config['source_image'] = FCPATH.str_replace('.', '', $this->uploadConfig[$key]['upload_path']).$fname;
								$config['maintain_ratio'] = TRUE;
								$config['width'] = $new_width;
								$config['height'] = $new_height;
								$config['quality'] = '60';
								$this->image_lib->initialize($config); 
								if (!$this->image_lib->resize()){
									send_json_response(array('status' => false, 'message' => $this->image_lib->display_errors()));
								}
							}
						}
						
						send_json_response(array('status' => true, 'file' => $this->upload->data(), 'link' => site_url().str_replace('./', '', $this->uploadConfig[$key]['upload_path']).$fname));
					} 
				} else {
					$extensions = '';
					foreach ($ext as $key => $value) {
						$extensions .= ((trim($extensions) != '')? ', ' : '').$value;
					}
					send_json_response(array('status' => false, 'message' => 'Unable to upload, allowed filetypes are: '.$extensions));
				}
			}
		} else {
			send_json_response(array('status' => false, 'message' => 'Unable to upload, configuration failure.'));
		}
	}

}
