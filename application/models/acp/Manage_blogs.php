<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_blogs extends Ifix_Model
{
	public function __construct()
    {   
        parent::__construct();
    }

    // Function to get all blogs
    // $uid = blog id; Get a specific blogs
    public function getBlogs($cid = null)
	{
        if (!empty($cid)) $this->db->select('B.*, UNIX_TIMESTAMP(B.blog_added_date) AS unix_blog_added_date');
        else $this->db->select('B.*, UNIX_TIMESTAMP(B.blog_added_date) AS unix_blog_added_date');
        $this->db->from('blogs AS B')->where(array('B.blog_status != ' => 0));
        if (!empty($cid)) {
            $this->db->where(array('B.blog_id' => $cid));
            $getBlogs = $this->db->get()->row_array();
        } else {
            $getBlogs = $this->db->get()->result_array();
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

    // Function to save & update blog details
    public function saveBlog($blog = array())
    {
        if (!empty($blog)) {
            $resp = false;
            $blogImages = $blog['blog_images'];
            unset($blog['blog_images']);
			if (isset($blog['blog_id']) && !empty($blog['blog_id'])) {
				// Edit blog
                $blog_id = $blog['blog_id'];
                $where = array('blog_id' => $blog_id);
                unset($blog['blog_id']);
                unset($blog['blog_added_by']);
				unset($blog['blog_added_date']);
				// unset($blog['blog_status']);
				$this->db->update("{$this->table["blogs"]}", $blog, $where);
                $resp = true;
			} else {
				// Add blog
                unset($blog['blog_id']);
                $this->db->insert("{$this->table["blogs"]}", $blog);
                $blog_id = $this->db->insert_id();
                $resp = true;
			}

            // Save blog images
            if ($resp && isset($blogImages) && !empty($blogImages)) {
                $existDtl = array();
                foreach ($blogImages as $key => $BGvalue) {
                    $detailExist = $this->db->select('blog_img_id')->from('blog_images')->where(array('blog_img_bgid' => $blog_id, 'blog_img_image' => $BGvalue['blog_img_image']))->get()->row_array();
                    $existDtl[] = $BGvalue['blog_img_image'];
                    if (!empty($detailExist)) {
                        $this->db->update('blog_images', $BGvalue, array('blog_img_bgid' => $blog_id, 'blog_img_image' => $BGvalue['blog_img_image']));
                    } else {
                        $insert = array_merge($BGvalue, array('blog_img_bgid' => $blog_id, 'blog_img_status' => 1));
                        $this->db->insert('blog_images', $insert);
                    }
                }
                // Remove unwanted details
                if (!empty($existDtl)) {
                    $delete = $this->db->select('blog_img_id')->from('blog_images')->where(array('blog_img_bgid' => $blog_id))->where_not_in('blog_img_image', $existDtl)->get()->result_array();
                    if (!empty($delete)) {
                        foreach ($delete as $key => $deleteval) {
                            $this->db->delete('blog_images', array('blog_img_bgid' => $blog_id, 'blog_img_id' => $deleteval['blog_img_id']));
                        }
                    }
                }
            }
            return $resp;
        } else return false;
    }

    // Activate, Inactivate & Delete a Blog
    // 0:Trashed; 1:Draft; 2:Published;
	public function action($blog = null, $action = null)
	{
		if (!empty($blog)) {
			return $this->db->update("{$this->table["blogs"]}", array('blog_status' => $action), array('blog_id' => $blog));
		}
        return false;
	}

    // Slug for blog name
    public function doSlugify($text = null, $except = null)
    {
        if (!empty($text)) {
            $check = array();
            $slugify = slugify($text);
            do {
                if (!empty($check)) $slugify = $slugify.'-'.count($check);
                $where = array('blog_canonial_name' => $slugify);
                if (!empty($except)) $where = array_merge($where, array('blog_id != ' => $except));
                $check = $this->db->select('blog_canonial_name')->from('blogs')->where($where)->get()->result_array();
            } while (!empty($check));
            return array('slugText' => $slugify);
        }
    }

}