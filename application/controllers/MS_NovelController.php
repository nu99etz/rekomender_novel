<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('MainController.php');

class MS_NovelController extends MainController
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('MS_NovelModel', 'ms_novel');
    $this->load->model('MS_KategoriModel', 'ms_kategori');
    if ($this->session->userdata('role') != 1) {
      redirect('404');
    }
  }

  public function ajax()
  {
    $list = $this->ms_novel->Draw();
    $record = array();
    $no = $_POST['start'];
    foreach ($list as $status) {
      $no++;
      $row = array();
      $row_kat = array();
      $kategori = explode(',',$status['genre_novel']);
      foreach($kategori as $kat => $value) {
        $row_kat[] = $this->ms_kategori->getName($value);
      }
      if(count($row_kat) > 1) {
        $imp = implode(',',$row_kat);
      } else {
        $imp = implode('',$row_kat);
      }
      $row[] = $no;
      $row[] = $status['no_novel'];
      $row[] = $status['nama_novel'];
      $row[] = $status['authors_novel'];
      $row[] = $imp;
      $row[] = $status['year_novel'];
      $url_gmbr = base_url() . 'assets/novel/' . $status['sampul_novel'];
      $row[] = '<img src="' . $url_gmbr . '" class="rounded" alt="..." width="50" height="100" >';
      $button = '<button type="button" name="update" id="' . $status['id_novel'] . '" class="edit btn btn-warning btn-sm"><i class = "fa fa-edit"></i></button> ';
      $button .= '<button type="button" name="delete" id="' . $status['id_novel'] . '" class="delete btn btn-danger btn-sm"><i class = "fa fa-trash"></i></button> ';
      $row[] = $button;
      $record[] = $row;
    }
    $response = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->ms_novel->recordsTotal(),
      'recordsFiltered' => $this->ms_novel->recordsFiltered(),
      'data' => $record
    );
    echo json_encode($response);
  }

  public function index()
  {
    $layout = array(
      'ms_novel/modal_input',
      'ms_novel/list_data',
    );
    $this->getLayout($layout);
  }

  public function ajax_select2()
  {
    $list = $this->ms_novel->getAll();
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
    $list = $this->ms_novel->getRole();
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
    $action = $this->ms_novel->storeAction();
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
    $list = $this->ms_novel->getID($id);
    foreach ($list as $status) {
      $row = array();
      $row_kat = array();
      $kategori = explode(',',$status['genre_novel']);
      foreach($kategori as $kat => $value) {
        $row_kat[] = $this->ms_kategori->getName($value);
      }
      if(count($row_kat) > 1) {
        $imp = implode(',',$row_kat);
      } else {
        $imp = implode('',$row_kat);
      }
      $row['id_novel'] = $status['id_novel'];
      $row['no_novel'] = $status['no_novel'];
      $row['nama_novel'] = $status['nama_novel'];
      $row['authors_novel'] = $status['authors_novel'];
      $row['id_genre'] = $status['genre_novel'];
      $row['genre_novel'] = $imp;
      $row['year_novel'] = $status['year_novel'];
      $row['sampul_novel'] = $status['sampul_novel'];
      $record[] = $row;
    }
    $response = array(
      'status' => 'success',
      'data' => $record
    );
    echo json_encode($response);
  }

  public function update($id)
  {
    $action = $this->ms_novel->editAction($id);
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
    $action = $this->ms_novel->deleteAction($id);
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
