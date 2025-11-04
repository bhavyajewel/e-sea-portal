<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_reset_columns_to_login extends CI_Migration {

    public function up() {
        // Add reset_token column
        $this->dbforge->add_column('login', [
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE,
                'default' => NULL
            ],
            'reset_expires' => [
                'type' => 'DATETIME',
                'null' => TRUE,
                'default' => NULL
            ]
        ]);
    }

    public function down() {
        // Drop the columns if migration is rolled back
        $this->dbforge->drop_column('login', 'reset_token');
        $this->dbforge->drop_column('login', 'reset_expires');
    }
}
