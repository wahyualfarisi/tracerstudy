<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'tu@test.com',
                'password' => bcrypt('12345'),
                'nama_lengkap' => 'Kartono',
                'level' => 'TU',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'email' => 'emy@test.com',
                'password' => bcrypt('12345'),
                'nama_lengkap' => 'Sri Mulyani',
                'level' => 'SBK',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]
        ]);
    }
}
