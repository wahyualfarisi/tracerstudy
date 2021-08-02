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
                'nama_perusahaan' => 'PT. Teknologi Indonesia Sentosa',
                'pekerjaan' => 'Software Engineer',
                'jabatan'   => 'Senior',
                'tanggal_bekerja' => '2020-09-20',
                'tanggal_selesai' => '2020-12-25',
                'isCurrent' => 0
            ],
            [
                'id_mahasiswa' => 1,
                'nama_perusahaan' => 'PT. Ide Dua Sen',
                'pekerjaan' => 'Programmer',
                'jabatan'   => 'Senior',
                'tanggal_bekerja' => '2021-01-01',
                'tanggal_selesai' => '2021-03-30',
                'isCurrent' => 0
            ],
            [
                'id_mahasiswa' => 1,
                'nama_perusahaan' => 'Sekretariat Wakil Presiden',
                'pekerjaan' => 'Front End Developer',
                'jabatan'   => 'Senior',
                'tanggal_bekerja' => '2021-03-30',
                'tanggal_selesai' => null,
                'isCurrent' => 1
            ]
        ]);
    }
}
