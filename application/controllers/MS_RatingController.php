<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('MainController.php');

class MS_RatingController extends MainController
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('MS_RatingModel', 'ms_rating');
    if($this->session->userdata('role') != 1) {
      redirect('404');
    }
  }

  public function ajax()
  {
    $list = $this->ms_rating->Draw();
    $record = array();
    $no = $_POST['start'];
    foreach ($list as $status) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $status['nama_user'];
      $row[] = $status['nama_novel'];
      $row[] = $status['jumlah_rating'];
      $button = '<button type="button" name="delete" id="' . $status['id_rating'] . '" class="delete btn btn-danger btn-sm"><i class = "fa fa-trash"></i></button> ';
      $row[] = $button;
      $record[] = $row;
    }
    $response = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->ms_rating->recordsTotal(),
      'recordsFiltered' => $this->ms_rating->recordsFiltered(),
      'data' => $record
    );
    echo json_encode($response);
  }

  public function index()
  {
    $layout = 'ms_rating/list_data';
    $this->getLayout($layout);
  }

  public function destroy($id)
  {
    $action = $this->ms_rating->deleteAction($id);
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
