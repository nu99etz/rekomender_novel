<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MS_NovelModel extends MainModel
{

  public function getTable()
  {
    return 'ms_novel';
  }

  public function getKey()
  {
    return 'id_novel';
  }

  public function getColumnOrder()
  {
    return array(null, 'no_novel', 'nama_novel', 'authors_novel', 'genre_novel', 'year_novel', null, null);
  }

  public function getColumnSearch()
  {
    return array('no_novel', 'nama_novel', 'authors_novel', 'genre_novel', 'year_novel');
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
    $this->db->like('nama_novel', $search);
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

    if(count($post['genre_novel']) > 1) {
      $kat = implode(',',$post['genre_novel']);
    } else {
      $kat = implode('', $post['genre_novel']);
    }

    $this->form_validation->set_rules('no_novel', 'No Novel', 'required');
    $this->form_validation->set_rules('nama_novel', 'Nama Novel', 'required');
    $this->form_validation->set_rules('authors_novel', 'Pembuat Novel', 'required');
    $this->form_validation->set_rules('year_novel', 'Year Novel', 'required');
    if ($this->form_validation->run()) {

      // cek apa ada file upload
      if (!empty($_FILES['sampul_novel']['name'])) {
        $upload = $this->customupload->Upload('sampul_novel', $post['no_novel'], 'novel');
        if ($upload['status'] == 'ok') {
          $files = $upload['file'];
        } else if ($upload['status'] == 'error') {
          $response = array(
            'status' => 'failed',
            'messages' => $upload['messages']
          );
          return $response;
        }
      } else if (empty($_FILES['sampul_novel']['name'])) {
        $files = null;
      }

      $data = array(
        'no_novel' => $post['no_novel'],
        'nama_novel' => $post['nama_novel'],
        'authors_novel' => $post['authors_novel'],
        'genre_novel' => $kat,
        'year_novel' => $post['year_novel'],
        'sampul_novel' => $files
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

    $sql = $this->db->select('*')->from($this->getTable())->where($this->getKey(), $id)->where(1, 1)->limit(1)->get();
    $check = $sql->result_array();

    if(count($post['genre_novel']) > 1) {
      $kat = implode(',',$post['genre_novel']);
    } else {
      $kat = implode('', $post['genre_novel']);
    }

    $this->form_validation->set_rules('no_novel', 'No Novel', 'required');
    $this->form_validation->set_rules('nama_novel', 'Nama Novel', 'required');
    $this->form_validation->set_rules('authors_novel', 'Pembuat Novel', 'required');
    $this->form_validation->set_rules('year_novel', 'Year Novel', 'required');
    if ($this->form_validation->run()) {

      // cek apa ada file upload
      if (!empty($_FILES['sampul_novel']['name'])) {
        $upload = $this->customupload->Upload('sampul_novel', $post['no_novel'], 'novel');
        if ($upload['status'] == 'ok') {
          $files = $upload['file'];
        } else if ($upload['status'] == 'error') {
          $response = array(
            'status' => 'failed',
            'messages' => $upload['messages']
          );
          return $response;
        }
      } else if (empty($_FILES['sampul_novel']['name'])) {
        $files = $check[0]['sampul_novel'];
      }

      $data = array(
        'no_novel' => $post['no_novel'],
        'nama_novel' => $post['nama_novel'],
        'authors_novel' => $post['authors_novel'],
        'genre_novel' => $kat,
        'year_novel' => $post['year_novel'],
        'sampul_novel' => $files
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
