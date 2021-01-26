<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends MainModel
{

  public function __construct()
  {

    parent::__construct();
    $this->load->library('form_validation');
  }

  public function getTable()
  {
    return 'ms_user';
  }

  public function getKey()
  {
    return 'id_user';
  }

  public function authValidation()
  {

    $post = $this->input->post();
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run()) {
      $response = array(
        'status' => 'success'
      );
    } else {
      $response = array(
        'status' => 'failed'
      );
    }
    return $response;
  }

  public function authCheck($user)
  {

    $this->db->select('*')->from($this->getTable())->where("username", $user);
    $data = $this->db->get()->row_array();
    return $data;
  }

  public function updateLogin($id, $status)
  {

    $data = array(
      'is_login' => $status
    );
    $update = $this->db->where("id_user", $id)->update($this->getTable(), $data);
    if ($update) {
      $response = array(
        'status' => 'success'
      );
    } else if (!$update) {
      $response = array(
        'status' => 'failed'
      );
    }
    return $response;
  }

  public function storeAction()
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run()) {
      $data = array(
        'username' => $post['username'],
        'nama_user' => $post['nama_user'],
        'password' => hash('md5', $post['password']),
        'role' => 2
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
}
