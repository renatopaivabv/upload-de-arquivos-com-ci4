<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFilesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id',
            'nome' => ['type' => 'varchar', 'constraint' => 197],
            'arquivo' => ['type' => 'varchar', 'constraint' => 197],
            'extensao' => ['type' => 'varchar', 'constraint' => 10],
        ]);

        $this->forge->createTable('files');
    }

    public function down()
    {
        $this->forge->dropTable('files');
    }
}
