<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hp
 * Date: 14-3-1
 * Time: 下午4:35
 */
class Blog extends My_Controller
{

   public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('Blogmodel', 'blog');
    }

    public function index2()
    {
        $data['query'] = $this->blog->get_last_ten_entries();
        $this->load->view("bloglist", $data);
    }

    public function index(){
        //导入分也库
        $this->load->library('pagination');

        $rowsPerPage=2;
        //查询数据
        $queryResult=$this->blog->get_limit($this->uri->segment(3),$rowsPerPage);
        $totalRows=$queryResult['totalRows'];

        //初始化分页参数
        $config['base_url'] =base_url("blog/index");
        $config['total_rows'] = $totalRows;
        $config['per_page'] =$rowsPerPage;
        $config['first_link'] = '首页';
        $config['last_link'] = '末页';
        $config['next_link'] = '下一页';
        $config['prev_link'] = '上一页';
        $config['full_tag_open'] = '<p style="border:1px solid blue;padding:6px;">';
        $config['full_tag_close'] = '</p>';
        $config['cur_tag_open'] = '<a style="background:#0055cc;padding:2px 4px;">';
        $config['cur_tag_close'] = '</a>';
        $config['display_pages'] = true;
        $config['anchor_class'] = ""; //给链接添加 CSS 类

        $this->pagination->initialize($config);

        //输出分页
        //echo $this->pagination->create_links();
        $this->load->view("bloglist2",array("result"=>$queryResult));

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