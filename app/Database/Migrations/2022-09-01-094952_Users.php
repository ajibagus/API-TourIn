<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'=> [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'email'=> [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'username'=> [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password'=> [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
