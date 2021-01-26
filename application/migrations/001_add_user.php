<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

  public function up() {

    $this->dbforge->add_field(array(
      'users_id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'users_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'users_password' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      ),
      'last_login' => array(
        'type' => 'TIMESTAMP'
      ),
      'is_login' => array(
        'type' => 'INT',
        'constraint' => 2
      )
    ));

    $this->dbforge->add_key('users_id',TRUE);
    $this->dbforge->create_table('users');

  }

  public function down() {

    $this->dbforge->drop_table('users');

  }
}
