<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumn extends Migration
{
    public function up()
    {
        $fields = [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE, // or FALSE if the column should not allow NULL values
            ],
        ];
        
        $this->forge->addColumn('specialist/practices', $fields);
    }

    public function down()
    {
        //
    }
}
