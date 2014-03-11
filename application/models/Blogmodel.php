<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogmodel  extends CI_Model{
    var $title="";
    var $content="";
    var $date="";

    function __construct(){
        parent::__construct();
    }

    function get_last_ten_entries(){
        $query=$this->db->get('entries',10);
        return $query->result();
    }


    /*
     * $offset 指定行的位置
     * $rowsPerPage  每页显示行数,默认设置为5行
     */
    function get_limit($offset,$rowsPerPage=5)
    {
        //起始位置处理
        //$offset = (($offset>0 ? $offset : 1) -1) * $rowsPerPage;

//        //条件初始化
//        $where = array('state'=>0);
//        //条件
//        $this->db->where( $where );

        //在order、group或limit前查询总数
        $db = clone($this->db);
        $total = $this->db->count_all_results('entries');
        // echo $this->db->last_query();
        //echo '<hr/>';

        $this->db = $db;
        //$this->db->order_by('id desc');
        $this->db->limit($rowsPerPage, $offset);
        $query = $this->db->get('entries');

        $data = $query->result_array();

        //sql调试方法
        //echo $this->db->last_query();

        //return 数据和总数
        return array('data'=>$data, 'totalRows'=>$total);
    }


    function get_entries($pageNumber,$rowsPerPage){
        // $query=$this->db->get('entries',);
    }
    function get_by_id($id){
        $query=$this->db->get_where("entries",array("id"=>$id));
        return $query->row(0);
    }

    function insert_entry(){
        $this->title=$_POST['title'];
        $this->content=$_POST['content'];
        $this->date=time();

        $this->db->insert('entries',$this);
    }

    function update_entry(){
      $this->title=$_POST['title'];
      $this->content=$_POST['content'];
      $this->date=time();

      $this->db->update('entries',$this,array('id'=>$_POST['id']));
    }

    function delete_by_id($id){
        $this->db->delete('entries', array('id' => $id));
    }
}