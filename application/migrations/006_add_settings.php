<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_settings extends CI_Migration {

  public function up() {

    $query = "CREATE TABLE base_settings";
    $query .= "(";
    $query .= "base_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "base_company_name VARCHAR(255),";
    $query .= "base_dashboard_color VARCHAR(255),";
    $query .= "base_contact_us VARCHAR(255),";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ")";
    $this->db->query($query);

  }

  public function down() {

    $this->dbforge->drop_table('base_settings');

  }

}
