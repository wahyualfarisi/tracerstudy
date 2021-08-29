<?php

use Illuminate\Database\Seeder;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jawabans')->insert([
            //untuk pertanyaan no. 1
            [
                'id_pertanyaan' => 1,
                'jawaban' => '3 sampai 6 bulan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 1,
                'jawaban' => '6 sampai 12 bulan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 1,
                'jawaban' => '> 1 Tahun',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 1,
                'jawaban' => 'Belum Bekerja',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 2
            [
                'id_pertanyaan' => 2,
                'jawaban' => 'Biaya Sendiri / Keluarga',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 2,
                'jawaban' => 'Beasiswa ADIK',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 2,
                'jawaban' => 'Beasiswa BIDIKMISI',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 2,
                'jawaban' => 'Beasiswa PPA',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 2,
                'jawaban' => 'Beasiswa AFIRMASI',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 2,
                'jawaban' => ' Beasiswa Perusahaan/Swasta',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 3
            [
                'id_pertanyaan' => 3,
                'jawaban' => 'Ya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 3,
                'jawaban' => 'Tidak',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 4
            [
                'id_pertanyaan' => 4,
                'jawaban' => 'Sangat Erat',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 4,
                'jawaban' => 'Erat',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 4,
                'jawaban' => 'Cukup Erat',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 4,
                'jawaban' => 'Kurang Erat',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 4,
                'jawaban' => 'Tidak Sama Sekali',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 5
            [
                'id_pertanyaan' => 5,
                'jawaban' => 'Setingkat Lebih Tinggi',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 5,
                'jawaban' => 'Tingkat yang sama',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 5,
                'jawaban' => 'Setingkat Lebih Rendah',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 5,
                'jawaban' => 'Tidak Perlu Pendidikan Tinggi',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 6
            [
                'id_pertanyaan' => 6,
                'jawaban' => '> 3,000,000',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 6,
                'jawaban' => '> 5,000,000',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 6,
                'jawaban' => '> 8,000,000',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 6,
                'jawaban' => '> 10,000,000',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 6,
                'jawaban' => '> 15,000,000',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 6,
                'jawaban' => '> 25,000,000',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 6,
                'jawaban' => '> 50,000,000',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 7
            [
                'id_pertanyaan' => 7,
                'jawaban' => 'Sangat Besar',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 7,
                'jawaban' => 'Besar',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 7,
                'jawaban' => 'Cukup Besar',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 7,
                'jawaban' => 'Kurang',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 7,
                'jawaban' => 'Tidak Sama Sekali',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 8
            [
                'id_pertanyaan' => 8,
                'jawaban' => '> 2 Bulan Sesuah Lulus',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 8,
                'jawaban' => '> 6 Bulan Sesudah Lulus',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 8,
                'jawaban' => '> 1 Tahun Sesudah Lulus',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 9
            [
                'id_pertanyaan' => 9,
                'jawaban' => 'Melalui iklan di koran/majalah, brosur',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 9,
                'jawaban' => 'Melamar ke perusahaam tanpa mengetahui lowongan ',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 9,
                'jawaban' => 'Pergi ke bursa/pameran kerja',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 9,
                'jawaban' => 'Mencari lewat internet/iklan online/milis',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 9,
                'jawaban' => 'Dihubungi oleh perusahaan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 9,
                'jawaban' => 'Menghubungi Kemenakertrans',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 9,
                'jawaban' => 'Menghubungi agen tenaga kerja komersial/swasta',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 10
            [
                'id_pertanyaan' => 10,
                'jawaban' => '1 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 10,
                'jawaban' => '2 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 10,
                'jawaban' => '3 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 10,
                'jawaban' => '5 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 11
            [
                'id_pertanyaan' => 11,
                'jawaban' => '1 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 11,
                'jawaban' => '2 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 11,
                'jawaban' => '3 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 11,
                'jawaban' => '5 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 12
            [
                'id_pertanyaan' => 12,
                'jawaban' => '1 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 12,
                'jawaban' => '2 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 12,
                'jawaban' => '3 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 12,
                'jawaban' => '5 Perusahan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 13
            [
                'id_pertanyaan' => 13,
                'jawaban' => 'Saya masih belajar/melanjutkan kuliah profesi pascasarjana',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 13,
                'jawaban' => 'Saya menikah',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 13,
                'jawaban' => 'Saya sibuk dengan keluarga dan anak-anak',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 13,
                'jawaban' => 'Saya sekarang sedang mencari pekerjaan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 14
            [
                'id_pertanyaan' => 14,
                'jawaban' => 'Tidak',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 14,
                'jawaban' => 'Tidak, tapi saya sedang menunggu hasil lamaran kerja',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 14,
                'jawaban' => 'Ya, saya akan mulai bekerja dalam 2 minggu ke depan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 14,
                'jawaban' => 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 15
            [
                'id_pertanyaan' => 15,
                'jawaban' => 'Instansi pemerintah (termasuk BUMN)',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 15,
                'jawaban' => 'Organisasi non-profit/Lembaga Swadaya Masyarakat',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 15,
                'jawaban' => 'Perusahaan swasta',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 15,
                'jawaban' => 'Wiraswasta/perusahaan sendiri',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 16
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Pertanyaan tidak sesuai, pekerjaan saya sekarang sudah sesuai dengan pendidikan saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Saya belum mendapatkan pekerjaan yang lebih sesuai',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Di pekerjakan ini saya memperoleh prospek karir yang baik',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya degan pendidikan saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Saya dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Pekerjaan saya saat ini lebih aman/terjamin/secure',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Pekerjaan saya sekarang lebih menarik',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 16,
                'jawaban' => 'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

            //untuk pertanyaan no. 17
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Pertanyaan tidak sesuai, pekerjaan saya sekarang sudah sesuai dengan pendidikan saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Saya belum mendapatkan pekerjaan yang lebih sesuai',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Di pekerjakan ini saya memperoleh prospek karir yang baik',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya degan pendidikan saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Saya dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Pekerjaan saya saat ini lebih aman/terjamin/secure',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Pekerjaan saya sekarang lebih menarik',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],
            [
                'id_pertanyaan' => 17,
                'jawaban' => 'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ],

        ]);
    }
}
