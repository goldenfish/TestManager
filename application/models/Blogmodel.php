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