<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('MainController.php');

class MS_RecommenderController extends MainController
{

  public function __construct()
  {

    parent::__construct();
    $this->load->model('MS_RecommenderModel', 'ms_recom');
  }

  public function ajax()
  {
    $this->maintence->Debug($this->ms_recom->sample_mapping());
  }

  public function index()
  {
    if($this->session->userdata('role') != 1) {
      redirect('404');
    }
    
    $layout = 'ms_rekom/list_data';
    $this->getLayout($layout);
  }

  public function index2()
  {
    $layout = 'act_rekom/list_data';
    $this->getLayout($layout);
  }

  public function getRecomend($id_user)
  {
    $record = array();
    $data = $this->ms_recom->sample_mapping();
    $where = array(
      'id_user' => $id_user,
      1 => 1
    );
    $user = $this->db->select('*')->from('ms_user')->limit(1)->where($where)->get();
    $queryuser = $user->row_array();
    $check = $this->db->select('*')->from('ms_rating')->where(array('id_user' => $id_user, 1 => 1))->get();
    $querychck = $check->result_array();
    if (empty($querychck)) {
      $response = array(
        'data' => $record
      );
    } else {
      $recom = $this->recommenderitembased->getRecommendations($data, $queryuser['nama_user']);
      $no = 1;
      foreach ($recom as $key => $value) {
        $row = array();
        $row[] = $no;
        $row[] = $key;
        $row[] = $value;
        $record[] = $row;
        $no++;
      }
      $response = array(
        'data' => $record
      );
    }
    echo json_encode($response);
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
