<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hp
 * Date: 14-3-1
 * Time: 下午4:35
 */
class Upload extends My_Controller{
   function __construct(){
       parent::__construct();
       $this->load->helper("form");
   }
   public function index(){
       $this->load->view("fileupload",array('error' => ' ' ));
   }
    public function do_upload(){

        $uploadFolder='./uploads/';
        if(!is_dir($uploadFolder)){
            mkdir($uploadFolder,0777);//使用最大权限创建文件夹
        }
        $config['upload_path'] =$uploadFolder;///*这里的uploads是相对于index.php的,也就是入口文件,这个千万不要弄错哦!
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('fileupload', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }

}