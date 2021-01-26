<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('MainController.php');

class MS_UserController extends MainController
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('MS_UserModel', 'ms_user');
    if ($this->session->userdata('role') != 1) {
      redirect('404');
    }
  }

  public function ajax()
  {
    $list = $this->ms_user->Draw();
    $record = array();
    $no = $_POST['start'];
    foreach ($list as $status) {
      if ($status['nama_role'] != "Super Admin") {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $status['username'];
        $row[] = $status['nama_user'];
        $row[] = $status['password'];
        $row[] = $status['nama_role'];
        $button = '<button type="button" name="update" id="' . $status['id_user'] . '" class="edit btn btn-warning btn-sm"><i class = "fa fa-edit"></i></button> ';
        $button .= '<button type="button" name="delete" id="' . $status['id_user'] . '" class="delete btn btn-danger btn-sm"><i class = "fa fa-trash"></i></button> ';
        $row[] = $button;
        $record[] = $row;
      }
    }
    $response = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->ms_user->recordsTotal(),
      'recordsFiltered' => $this->ms_user->recordsFiltered(),
      'data' => $record
    );
    echo json_encode($response);
  }

  public function index()
  {
    $layout = array(
      'ms_user/modal_input',
      'ms_user/list_data',
    );
    $this->getLayout($layout);
  }

  public function ajax_select2()
  {
    $list = $this->ms_user->getAll();
    $id = array();
    $text = array();
    foreach ($list as $lists) {
      $response[] = array(
        'id' => $lists['id_user'],
        'text' => $lists['nama_user']
      );
    }
    echo json_encode($response);
  }

  public function role_select2()
  {
    $list = $this->ms_user->getRole();
    foreach ($list as $lists) {
      $response[] = array(
        'id' => $lists['id_role'],
        'text' => $lists['nama_role']
      );
    }
    echo json_encode($response);
  }

  public function store()
  {
    $action = $this->ms_user->storeAction();
    if ($action['status'] == 'success') {
      $response = array(
        'status' => 'success',
        'messages' => 'Data Sukses Tersimpan'
      );
    } else if ($action['status'] == 'failed') {
      $response = array(
        'status' => 'failed',
        'messages' => 'Data Gagal Tersimpan'
      );
    } else if ($action['status'] == 'notvalid') {
      $response = array(
        'status' => 'notvalid',
        'messages' => validation_errors()
      );
    }
    echo json_encode($response);
  }

  public function edit($id)
  {
    $list = $this->ms_user->getID($id);
    $response = array(
      'status' => 'success',
      'data' => $list
    );
    echo json_encode($response);
  }

  public function update($id)
  {
    $action = $this->ms_user->editAction($id);
    if ($action['status'] == 'success') {
      $response = array(
        'status' => 'success',
        'messages' => 'Data Sukses Diubah'
      );
    } else if ($action['status'] == 'failed') {
      $response = array(
        'status' => 'failed',
        'messages' => 'Data Gagal Diubah'
      );
    } else if ($action['status'] == 'notvalid') {
      $response = array(
        'status' => 'notvalid',
        'messages' => validation_errors()
      );
    }
    echo json_encode($response);
  }

  public function destroy($id)
  {
    $action = $this->ms_user->deleteAction($id);
    if ($action) {
      $response = array(
        'status' => 'success',
        'header' => 'Sukses',
        'messages' => 'Data Sukses Dihapus'
      );
    } else {
      $response = array(
        'status' => 'failed',
        'header' => 'Gagal',
        'messages' => 'Data Gagal Dihapus'
      );
    }
    echo json_encode($response);
  }
}
