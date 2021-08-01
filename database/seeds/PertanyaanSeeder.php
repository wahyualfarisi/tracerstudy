<?php

use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pertanyaans')->insert([
            [
                'id_pertanyaan' => 1,
                'pertanyaan' => 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memperoleh pekerjaan pertama ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 2,
                'pertanyaan' => 'Sebutkan sumberdana dalam pembiayaan kuliah?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 3,
                'pertanyaan' => 'Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 4,
                'pertanyaan' => 'Seberapa erat hubungan antara bidang studi dengan pekerjaan anda ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 5,
                'pertanyaan' => 'Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 6,
                'pertanyaan' => 'Kira-kira berapa pendapatan anda setiap bulannya ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 7,
                'pertanyaan' => 'Menurut anda seberapa besar penekanan pada metode pembelajaran yang dilaksanakan di program studi anda ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 8,
                'pertanyaan' => 'Kapan anda mulai mencari pekerjaan ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 9,
                'pertanyaan' => 'Bagaimana anda mencari pekerjaan tersebut ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 10,
                'pertanyaan' => 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memperoleh pekerjaan pertama?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 11,
                'pertanyaan' => 'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 12,
                'pertanyaan' => 'Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 13,
                'pertanyaan' => 'Bagaimana anda menggambarkan situasi anda saat ini ? ',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 14,
                'pertanyaan' => 'Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 15,
                'pertanyaan' => 'Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'pertanyaan' => 'Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'pertanyaan' => 'Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya ?',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ]
        ]);
    }
}
