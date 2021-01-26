<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ACT_RatingModel extends MainModel
{

  public function getTable($view = null)
  {
    if (!empty($view) && $view == 'view') {
      return 'ms_novel';
    } else {
      return 'ms_rating';
    }
  }

  public function getKey()
  {
    return 'id_novel';
  }

  public function getColumnOrder()
  {
    return array(null, 'no_novel', 'nama_novel', null, null, null);
  }

  public function getColumnSearch()
  {
    return array('no_novel', 'nama_novel');
  }

  public function getOrder()
  {
    return array($this->getKey() => 'ASC');
  }

  public function getTotal()
  {
    $sql = "SELECT*FROM " . $this->getTable();
    return $this->db->query($sql)->num_rows();
  }

  public function getRating($user, $novel)
  {
    $where = array(
      'id_user' => $user,
      'id_novel' => $novel
    );
    $sql = $this->db->select('jumlah_rating')->from('ms_rating')->where($where)->where(array(1 => 1))->get();
    $query = $sql->row_array();
    if (empty($query['jumlah_rating'])) {
      return '0';
    }
    return $query['jumlah_rating'];
  }

  public function Draw()
  {
    return $this->getDataTables($this->getTable('view'), $this->getColumnSearch(), $this->getColumnOrder(), $this->getOrder());
  }

  public function recordsTotal()
  {
    return $this->getDataTablesCountAll($this->getTable('view'), $this->getColumnSearch(), $this->getColumnOrder(), $this->getOrder());
  }

  public function recordsFiltered()
  {
    return $this->getDataTablesCountFiltered($this->getTable('view'), $this->getColumnSearch(), $this->getColumnOrder(), $this->getOrder());
  }

  public function ratingAction($id_user, $id_novel, $total_rating)
  {
    $post = $this->input->post();
    $where = array(
      'id_user' => $id_user,
      'id_novel' => $id_novel,
      1 => 1
    );
    $data = array(
      'id_user' => $id_user,
      'id_novel' => $id_novel,
      'jumlah_rating' => $total_rating
    );
    $sql = $this->db->select('*')->from('ms_rating')->where($where)->limit(1)->get();
    $query = $sql->result_array();
    if (empty($query)) {
      $insert = $this->db->insert('ms_rating', $data);
      if ($insert) {
        $response = array(
          'status' => 'success'
        );
      } else if (!$insert) {
        $response = array(
          'status' => 'failed',
          'messages' => 'Gagal Insert'
        );
      }
    } else if (!empty($query)) {
      $this->db->where(array('id_user' => $id_user, 'id_novel' => $id_novel));
      $update = $this->db->update('ms_rating', array('jumlah_rating' => $total_rating));
      if ($update) {
        $response = array(
          'status' => 'updated'
        );
      } else if (!$update) {
        $response = array(
          'status' => 'failed',
          'messages' => 'Gagal Update'
        );
      }
    }

    return $response;
  }

  public function getID($id)
  {
    $sql = "SELECT*FROM " . $this->getTable('view') . " WHERE " . $this->getKey() . " = " . $id;
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function deleteAction($id)
  {
    $sql = "DELETE FROM " . $this->getTable() . " WHERE " . $this->getKey() . " = " . $id;
    $query = $this->db->query($sql);
    return true;
  }
}
