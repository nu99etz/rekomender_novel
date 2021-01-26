<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MS_RatingModel extends MainModel
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

  public function getColumnOrder()
  {
    return array(null, 'nama_user', 'nama_novel', 'jumlah_rating', null);
  }

  public function getColumnSearch()
  {
    return array('nama_user', 'nama_novel', 'jumlah_rating');
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
