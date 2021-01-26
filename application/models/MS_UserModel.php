<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MS_UserModel extends MainModel
{

  public function getTable($view = null)
  {
    if (!empty($view) && $view == 'view') {
      return 'v_ms_user';
    } else {
      return 'ms_user';
    }
  }

  public function getKey()
  {
    return 'id_user';
  }

  public function getColumnOrder()
  {
    return array(null, 'username', 'nama_user', 'password', 'nama_role', null);
  }

  public function getColumnSearch()
  {
    return array('username', 'nama_user', 'password', 'nama_role');
  }

  public function getOrder()
  {
    return array($this->getKey() => 'ASC');
  }

  public function getRole()
  {
    $search = $this->input->get('q');
    $sql = $this->db->select('*')->from('ms_role')->like('nama_role', $search)->get();
    return $sql->result_array();
  }

  public function getAll()
  {
    $search = $this->input->get('q');
    $this->db->select('*');
    $this->db->from($this->getTable());
    $this->db->like('nama_user', $search);
    $this->db->where('role', 2);
    return $this->db->get()->result_array();
  }

  public function getTotal()
  {
    $sql = "SELECT*FROM " . $this->getTable('view');
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

  public function storeAction()
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if (!empty($post['role'])) {
      $role = $post['role'];
    } else if (empty($post['role'])) {
      $role = 2;
    }
    if ($this->form_validation->run()) {
      $data = array(
        'username' => $post['username'],
        'nama_user' => $post['nama_user'],
        'password' => hash('md5', $post['password']),
        'role' => $role
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
    $sql = "SELECT*FROM " . $this->getTable('view') . " WHERE " . $this->getKey() . " = " . $id;
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function editAction($id)
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
    if (!empty($post['role'])) {
      $role = $post['role'];
    } else if (empty($post['role'])) {
      $role = 2;
    }
    if ($this->form_validation->run()) {
      $data = array(
        'username' => $post['username'],
        'nama_user' => $post['nama_user'],
        'role' => $role
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
