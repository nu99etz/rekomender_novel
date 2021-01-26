<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MainModel extends CI_Model
{

  public function getListModule()
  {
  }

  public function getLog($status)
  {
    date_default_timezone_set($this->item->config("app_timezone"));
    if ($status == "add") {
      $log = array(
        'added_time' => date("Y-m-d"),
        'updated_time' => null,
        'deleted_time' => null,
        'is_aktif' => 0,
        'is_delete' => 0
      );
    } else if ($status == "upd") {
      $log = array(
        'updated_time' => date("Y-m-d"),
        'is_aktif' => 0,
        'is_delete' => 0
      );
    } else if ($status == "del") {
      $log = array(
        'deleted_time' => date("Y-m-d"),
        'is_aktif' => 0,
        'is_delete' => 1
      );
    }
    return $log;
  }

  // Fungsi Untuk Menentukan Schema
  public function getSchemas($schemas)
  {
    $data['kepegawaian'] = 'kepegawaian';
    $data['wilayah'] = 'wilayah';
    $data['auth'] = 'auth';
    return $data[$schemas];
  }

  private function getDataTablesQuery($table, $search_column, $order_column, $order, $where = null)
  { 
    $this->db->from($table);
    if(!empty($where)) {
      $this->db->where($where);
    }
    $i = 0;
    foreach ($search_column as $item) {
      if ($_POST['search']['value']) {
        if ($i === 0) {
          $this->db->group_start();
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }
        if (count($search_column) - 1 == $i) {
          $this->db->group_end();
        }
      }
      $i++;
    }
    if (isset($_POST['order'])) {
      $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($order)) {
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function getDataTables($table, $search_column, $order_column, $order, $where = null)
  {
    $this->getDataTablesQuery($table, $search_column, $order_column, $order, $where);
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function getDataTablesCountFiltered($table, $search_column, $order_column, $order, $where = null)
  {
    $this->getDataTablesQuery($table, $search_column, $order_column, $order);
    $query = $this->db->get()->num_rows();
    return $query;
  }

  public function getDataTablesCountAll($table, $search_column, $order_column, $order, $where = null)
  {
    $this->db->from($table);
    if(!empty($where)) {
      $this->db->where($where);
    }
    return $this->db->count_all_results();
  }

  public function getValidationMessages()
  {
    $validation = array(
      'required' => '{field} wajib diisi.',
      'min_length' => '{field} minimal {param} karakter',
      'max_length' => '{field} maximal {param} karakter'
    );
  }
}
