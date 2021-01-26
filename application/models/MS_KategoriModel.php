<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MS_KategoriModel extends MainModel
{

  public function getTable()
  {
    return 'ms_kategori';
  }

  public function getKey()
  {
    return 'id_kategori';
  }

  public function getName($id)
  {
    $where = array(
      'id_kategori' => $id,
      1 => 1
    );
    $novel_sql = $this->db->select('nama_kategori')->from('ms_kategori')->where($where)->get();
    $novel_query = $novel_sql->row_array();
    return $novel_query['nama_kategori'];
  }

  public function getColumnOrder()
  {
    return array(null, 'id_kategori', 'nama_kategori', null);
  }

  public function getColumnSearch()
  {
    return array('id_kategori', 'nama_kategori');
  }

  public function getOrder()
  {
    return array($this->getKey() => 'ASC');
  }

  public function getAll()
  {
    $search = $this->input->get('q');
    $this->db->select('*');
    $this->db->from($this->getTable('view'));
    $this->db->like('nama_kategori', $search);
    return $this->db->get()->result_array();
  }

  public function getTotal()
  {
    $sql = "SELECT*FROM " . $this->getTable();
    return $this->db->query($sql)->num_rows();
  }

  public function Draw()
  {
    return $this->getDataTables($this->getTable(), $this->getColumnSearch(), $this->getColumnOrder(), $this->getOrder());
  }

  public function recordsTotal()
  {
    return $this->getDataTablesCountAll($this->getTable(), $this->getColumnSearch(), $this->getColumnOrder(), $this->getOrder());
  }

  public function recordsFiltered()
  {
    return $this->getDataTablesCountFiltered($this->getTable(), $this->getColumnSearch(), $this->getColumnOrder(), $this->getOrder());
  }

  public function storeAction()
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    if ($this->form_validation->run()) {

      $data = array(
        'nama_kategori' => $post['nama_kategori'],
      );
      $insert = $this->db->insert($this->getTable(), $data);
      if ($insert) {
        $response = array(
          'status' => 'success'
        );
      } else if (!$insert) {
        $response = array(
          'status' => 'failed'
        );
      }
    } else {
      $response = array(
        'status' => 'notvalid'
      );
    }
    return $response;
  }

  public function getID($id)
  {
    $sql = "SELECT*FROM " . $this->getTable() . " WHERE " . $this->getKey() . " = " . $id;
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function editAction($id)
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    if ($this->form_validation->run()) {

      $data = array(
        'nama_kategori' => $post['nama_kategori'],
      );
      $this->db->where($this->getKey(), $id);
      $update = $this->db->update($this->getTable(), $data);
      if ($update) {
        $response = array(
          'status' => 'success'
        );
      } else if (!$update) {
        $response = array(
          'status' => 'failed'
        );
      }
    } else {
      $response = array(
        'status' => 'notvalid'
      );
    }
    return $response;
  }

  public function deleteAction($id)
  {
    $sql = "DELETE FROM " . $this->getTable() . " WHERE " . $this->getKey() . " = " . $id;
    $query = $this->db->query($sql);
    return true;
  }
}
