<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hp
 * Date: 14-3-1
 * Time: 下午4:35
 */
class Blog extends CI_Controller
{

   public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('Blogmodel', 'blog');
    }

    public function index()
    {
        $data['query'] = $this->blog->get_last_ten_entries();
        $this->load->view("bloglist", $data);
    }


    public function detail()
    {
        // echo $this->uri->segment(3);
        $data["blog"] = $this->blog->get_by_id($this->uri->segment(3));
        $this->load->view("blogdetail", $data);
    }


    public function addBlogPage()
    {
        $this->load->view("blogAdd");
    }

    public function addBlog()
    {
        $this->blog->insert_entry();
        redirect(base_url("blog"), 'location');
    }

    public function updatePage()
    {
        $id = $this->uri->segment(3);
        $data["blog"] = $this->blog->get_by_id($this->uri->segment(3));
        $this->load->view("blogupdate", $data);

    }

    public function update()
    {
        $this->blog->update_entry();
        redirect(base_url("blog", "location"));
    }

    public function del()
    {
        $id = $this->uri->segment(3);
        $this->blog->delete_by_id($id);
        redirect(base_url("blog"), "location");
    }

}