<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MS_RecommenderModel extends MainModel
{

  public function getTable($view = null)
  {
    if(!empty($view) && $view == 'view') {
      return 'v_ms_rating';
    } else {
      return 'ms_rating';
    }
  }

  public function getKey()
  {
    return 'id_rating';
  }

  public function getNovelName($id)
  {
    $where = array(
      'id_novel' => $id,
      1 => 1
    );
    $novel_sql = $this->db->select('nama_novel')->from('ms_novel')->where($where)->get();
    $novel_query = $novel_sql->row_array();
    return $novel_query['nama_novel'];
  }

  public function getUserName($id)
  {
    $where = array(
      'id_user' => $id,
      1 => 1
    );
    $user_sql = $this->db->select('nama_user')->from('ms_user')->where($where)->get();
    $user_query = $user_sql->row_array();
    return $user_query['nama_user'];
  }

  public function sample_mapping()
  { 
    $mapping = array();
    $person = array();
    $novel = array();
    $rate = array();
    $sql = $this->db->select('*')->from('ms_rating')->get();
    $query = $sql->result_array();
    foreach ($query as $key => $value) {
     $person[$this->getUserName($value['id_user'])][$this->getNovelName($value['id_novel'])] = $value['jumlah_rating'];
     $mapping = $person;
    }
    return $mapping;
  }
}
