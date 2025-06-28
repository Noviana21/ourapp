<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => ['type' => 'INT', 'auto_increment' => true, 'unsigned' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100]
        ]);
        $this->forge->addKey('category_id', true);
        $this->forge->createTable('categories');
    }
    public function down()
    {
        $this->forge->dropTable('categories');
    }
}