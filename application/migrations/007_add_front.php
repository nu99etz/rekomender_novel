<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_front extends CI_Migration {

  public function up() {

    $query = "CREATE TABLE front_settings";
    $query .= "(";
    $query .= "front_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "front_title VARCHAR(255),";
    $query .= "front_subtitle VARCHAR(255),";
    $query .= "front_about VARCHAR(255),";
    $query .= "front_color VARCHAR(255),";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ")";
    $this->db->query($query);

  }

  public function down() {

    $this->dbforge->drop_table('front_settings');

  }

}
