<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_subsmission extends CI_Migration {

  public function up() {

    $query = "CREATE TABLE submission";
    $query .= "(";
    $query .= "submission_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "submission_title VARCHAR(255),";
    $query .= "submission_authors INT UNSIGNED,";
    $query .= "submission_file VARCHAR(255),";
    $query .= "submission_decission INT,";
    $query .= "submission_upload_time TIMESTAMP,";
    $query .= "is_delete INT,";
    $query .= "FOREIGN KEY(submission_authors) REFERENCES authors(authors_id) ON UPDATE CASCADE ON DELETE CASCADE );";
    // Periode
    $query .= " CREATE TABLE periode";
    $query .= "(";
    $query .= "periode_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "periode_name VARCHAR(255),";
    $query .= "periode_theme VARCHAR(255),";
    $query .= "periode_start DATE,";
    $query .= "periode_finish DATE,";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ");";
    // Settings
    $query .= " CREATE TABLE base_settings";
    $query .= "(";
    $query .= "base_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "base_company_name VARCHAR(255),";
    $query .= "base_dashboard_color VARCHAR(255),";
    $query .= "base_contact_us VARCHAR(255),";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ");";
    // Front
    $query .= " CREATE TABLE front_settings";
    $query .= "(";
    $query .= "front_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "front_title VARCHAR(255),";
    $query .= "front_subtitle VARCHAR(255),";
    $query .= "front_about VARCHAR(255),";
    $query .= "front_color VARCHAR(255),";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ");";
    // Front content
    $query .= " CREATE TABLE front_content";
    $query .= "(";
    $query .= "front_content_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "front_content_title VARCHAR(255),";
    $query .= "front_content_content VARCHAR(255),";
    $query .= "front_content_add_time TIMESTAMP,";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ");";
    // Speakers
    $query .= " CREATE TABLE speakers";
    $query .= "(";
    $query .= "speakers_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $query .= "speakers_name VARCHAR(255),";
    $query .= "speakers_job VARCHAR(255),";
    $query .= "speakers_image VARCHAR(255),";
    $query .= "speakers_add_time TIMESTAMP,";
    $query .= "is_active INT,";
    $query .= "is_delete INT";
    $query .= ");";

    $this->db->query($query);

  }

  public function down() {

    $this->dbforge->drop_table('submission');
    $this->dbforge->drop_table('periode');
    $this->dbforge->drop_table('base_settings');
    $this->dbforge->drop_table('front_settings');
    $this->dbforge->drop_table('front_content');
    $this->dbforge->drop_table('speakers');

  }

}
