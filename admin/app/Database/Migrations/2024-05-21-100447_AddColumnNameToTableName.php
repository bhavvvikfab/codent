<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnNameToTableName extends Migration
{
    public function up()
    {
        $this->forge->addColumn('specialist/practices', 
        [
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'email', // Specify the position of the new column
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'name', // Specify the position of the new column
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
