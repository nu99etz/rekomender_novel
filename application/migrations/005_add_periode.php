<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_periode extends CI_Migration {

  public function up() {

    $query = "CREATE TABLE periode";
    $query .= "(";
    $query .= "periode_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "periode_name VARCHAR(255),";
    $query .= "periode_theme VARCHAR(255),";
    $query .= "periode_start DATE,";
    $query .= "periode_finish DATE,";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ")";
    $this->db->query($query);

  }

  public function down() {

    $this->dbforge->drop_table('periode');

  }

}
