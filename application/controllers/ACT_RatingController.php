<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('MainController.php');

class ACT_RatingController extends MainController
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('ACT_RatingModel', 'act_rating');
  }

  public function ajax()
  {
    $list = $this->act_rating->Draw();
    $record = array();
    $no = $_POST['start'];
    foreach ($list as $status) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $status['no_novel'];
      $row[] = $status['nama_novel'];
      $url_gmbr = base_url() . 'assets/novel/' . $status['sampul_novel'];
      $row[] = '<img src="' . $url_gmbr . '" class="rounded" alt="..." width="100" height="50" >';
      $jml_rating = $this->act_rating->getRating($this->session->userdata('username'), $status['id_novel']);
      $row[] = $jml_rating;
      if ($jml_rating > 0) {
        $rating = '';
        $np = 0;
        $sisa_rating = 5 - $jml_rating;
        for ($i = 0; $i < $jml_rating; $i++) {
          $tot = $i + 1;
          $rating .= '<span class="fa fa-star checked" id="star' . $tot . '" onclick="goRating(' . $this->session->userdata('username') . ',' . $status['id_novel'] . ',' . $tot . ')"></span>';
          $np++;
        }
        for ($j = 0; $j < $sisa_rating; $j++) {
          $ty = $np + 1;
          $rating .= '<span class="fa fa-star" id="star' . $ty . '" onclick="goRating(' . $this->session->userdata('username') . ',' . $status['id_novel'] . ',' . $ty . ')"></span>';
          $np++;
        }
      } else {
        $rating = '';
        for ($k = 0; $k < 5; $k++) {
          $tot = $k + 1;
          $rating .= '<span class="fa fa-star" id="star' . $tot . '" onclick="goRating(' . $this->session->userdata('username') . ',' . $status['id_novel'] . ',' . $tot . ')"></span>';
        }
      }
      $row[] = $rating;
      $record[] = $row;
    }
    $response = array(
      'draw' => $_POST['draw'],
      'recordsTotal' => $this->act_rating->recordsTotal(),
      'recordsFiltered' => $this->act_rating->recordsFiltered(),
      'data' => $record
    );
    echo json_encode($response);
  }

  public function index()
  {
    $layout = 'act_rating/list_data';
    $this->getLayout($layout);
  }

  public function goRating($id_user, $id_novel, $jumlah_rating)
  {
    $action = $this->act_rating->ratingAction($id_user, $id_novel, $jumlah_rating);
    if ($action['status'] == 'success') {
      $response = array(
        'status' => 'success',
        'messages' => 'Anda Sukses Merating ' . $jumlah_rating . " Bintang"
      );
    } else if ($action['status'] == 'updated') {
      $response = array(
        'status' => 'success',
        'messages' => 'Anda Sukses Mengubah Rating ' . $jumlah_rating . " Bintang"
      );
    } else if ($action['status'] == 'failed') {
      $response = array(
        'status' => 'failed',
        'messages' => $action['messages']
      );
    }
    echo json_encode($response);
  }

  public function destroy($id)
  {
    $action = $this->act_rating->deleteAction($id);
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
