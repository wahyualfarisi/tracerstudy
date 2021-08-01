<?php

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            [
                'id_mahasiswa' => 1,
                'nim' => '7201160111',
                'tahun_lulus' => '2021',
                'kode_prodi' => 'SI',
                'nama_lengkap' => 'Wahyu Alfarisi',
                'no_telepon' => '081317726873',
                'email' => 'wahyualfarisi30@gmail.com',
                'password' => bcrypt('12345'),
                'alamat' => 'jl. palem raya rawa bogo, jatiasih',
                'kode_pos' => '17042',
                'photo' => null,
                'tanggal_ujian_skripsi' => '2021-08-17',
                'judul_skripsi' => 'Sistem informasi tracer study',
                'dospem_1' => 'B. Gunawan',
                'dospem_2' => 'Fauziah',
                'ipk' => '40',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]
        ]);
    }
}
