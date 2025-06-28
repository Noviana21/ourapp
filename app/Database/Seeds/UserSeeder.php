<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'aventurine',
            'email'    => 'aventurine@gmail.com',
            'password' => password_hash('aventurine21', PASSWORD_DEFAULT)
        ];

        $this->db->table('users')->insert($data);
    }
}
