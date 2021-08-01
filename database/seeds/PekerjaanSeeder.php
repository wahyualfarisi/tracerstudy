<?php

use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerjaans')->insert([
            [
                'id_mahasiswa' => 1,
                'pekerjaan' => 'Software Engineer',
                'jabatan'   => 'Senior',
                'tanggal_bekerja' => '2020-09-20',
                'tanggal_selesai' => '2020-12-25',
                'isCurrent' => 0
            ],
            [
                'id_mahasiswa' => 1,
                'pekerjaan' => 'Programmer',
                'jabatan'   => 'Senior',
                'tanggal_bekerja' => '2021-01-01',
                'tanggal_selesai' => '2021-03-30',
                'isCurrent' => 0
            ],
            [
                'id_mahasiswa' => 1,
                'pekerjaan' => 'Front End Developer',
                'jabatan'   => 'Senior',
                'tanggal_bekerja' => '2021-03-30',
                'tanggal_selesai' => null,
                'isCurrent' => 1
            ]
        ]);
    }
}
