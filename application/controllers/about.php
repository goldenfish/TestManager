<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hp
 * Date: 14-3-1
 * Time: 下午4:35
 */
class About extends CI_Controller{

   public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        $this->load->view("about");
    }

}