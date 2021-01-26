<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_authors extends CI_Migration {

  public function up() {

    $query = "CREATE TABLE authors";
    $query .= "(";
    $query .= "authors_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "authors_first_name VARCHAR(255),";
    $query .= "authors_last_name VARCHAR(255),";
    $query .= "authors_email VARCHAR(255),";
    $query .= "authors_country INT UNSIGNED,";
    $query .= "authors_address VARCHAR(255),";
    $query .= "authors_phone_number CHAR(20),";
    $query .= "authors_organization VARCHAR(255),";
    $query .= "register_time TIMESTAMP,";
    $query .= "is_delete INT,";
    $query .= "FOREIGN KEY(authors_country) REFERENCES country(country_id) ON UPDATE CASCADE ON DELETE CASCADE )";
    $this->db->query($query);

  }

  public function down() {

    $this->dbforge->drop_table('authors');

  }
}
