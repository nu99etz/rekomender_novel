<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_country extends CI_Migration {

  public function up() {

    $this->dbforge->add_field(array(
      'country_id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'country_code' => array(
        'type' => 'CHAR',
        'constraint' => '5'
      ),
      'country_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100'
      )
    ));

    $this->dbforge->add_key('country_id',TRUE);
    $this->dbforge->create_table('country');

  }

  public function down() {

    $this->dbforge->drop_table('country');

  }
}
