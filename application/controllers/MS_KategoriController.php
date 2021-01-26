<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('MainController.php');

class MS_KategoriController extends MainController
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('MS_KategoriModel', 'ms_kategori');
    if ($this->session->userdata('role') != 1) {
      redirect('404');
    }
  }

  public function ajax()
  {
    $list = $this->ms_kategori->Draw();
    $record = array();
    $no = $_POST['start'];
    foreach ($list as $status) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $status['nama_kategori'];
      $button = '<button type="button" name="update" id="' . $status['id_kategori'] . '" class="edit btn btn-warning btn-sm"><i class = "fa fa-edit"></i></button> ';
      $button .= '<button type="button" name="delete" id="' . $status['id_kategori'] . '" class="delete btn btn-danger btn-sm"><i class = "fa fa-trash"></i></button> ';
      $row[] = $button;
      $record[] = $row;
    }
    $response = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->ms_kategori->recordsTotal(),
      'recordsFiltered' => $this->ms_kategori->recordsFiltered(),
      'data' => $record
    );
    echo json_encode($response);
  }

  public function index()
  {
    $layout = array(
      'ms_kategori/modal_input',
      'ms_kategori/list_data',
    );
    $this->getLayout($layout);
  }

  public function ajax_select2()
  {
    $list = $this->ms_kategori->getAll();
    $id = array();
    $text = array();
    foreach ($list as $lists) {
      $response[] = array(
        'id' => $lists['id_kategori'],
        'text' => $lists['nama_kategori']
      );
    }
    echo json_encode($response);
  }

  public function store()
  {
    $action = $this->ms_kategori->storeAction();
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
    $list = $this->ms_kategori->getID($id);
    $response = array(
      'status' => 'success',
      'data' => $list
    );
    echo json_encode($response);
  }

  public function update($id)
  {
    $action = $this->ms_kategori->editAction($id);
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
    $action = $this->ms_kategori->deleteAction($id);
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
