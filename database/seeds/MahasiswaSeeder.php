<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;



class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $DATA_SKRIPSI = [
            'Sistem Informasi Penjualan',
            'Sistem Informasi E-Commerce',
            'Sistem Informasi Rekruitment',
            'Sistem Informasi Penggajian',
            'Sistem Informasi Pencatatan',
            'Sistem Informasi Management',
            'Sistem Informasi HRD',
            'Sistem Informasi Preventive',
            'Sistem Informasi E-learning',
            'Sistem Informasi Penjadwalan',
            'Sistem Informasi Pemantauan Cuaca',
            'Sistem Informasi Monitoring',
            'Sistem Informasi Risk Management',
            'Sistem Informasi Peminjaman',
            'Sistem Informasi Perpustakaan',
            'Sistem Informasi Akademik',
            'Sistem Informasi E-Commerce',
            'Sistem Informasi Rekruitment',
            'Sistem Informasi Penggajian',
            'Sistem Informasi Pencatatan',
        ];

        //for 2019 SI
        for($i = 0; $i< 16; $i++){
            DB::table('mahasiswas')->insert([
                [
                    'nim' => '720118000'.$i,
                    'tahun_lulus' => '2019',
                    'kode_prodi' => 'SI',
                    'nama_lengkap' => $faker->firstname,
                    'no_telepon' => '081317726873',
                    'email' => $faker->email,
                    'password' => bcrypt('12345'),
                    'alamat' => 'jl. palem raya rawa bogo, jatiasih',
                    'kode_pos' => '17042',
                    'photo' => null,
                    'tanggal_ujian_skripsi' => '2019-08-17',
                    'judul_skripsi' => $DATA_SKRIPSI[$i],
                    'dospem_1' => 'B. Gunawan S, ST., M.Kom ',
                    'dospem_2' => 'Fauziah  S.Kom, MMSI',
                    'ipk' => $faker->numberBetween(28,40),
                    'status' => 'verified',
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]
            ]);
        }

        //for 2019 SK
        for($i = 0; $i< 20; $i++){
            DB::table('mahasiswas')->insert([
                [
                    'nim' => '720118001'.$i,
                    'tahun_lulus' => '2019',
                    'kode_prodi' => 'SK',
                    'nama_lengkap' => $faker->firstname,
                    'no_telepon' => '081317726873',
                    'email' => $faker->email,
                    'password' => bcrypt('12345'),
                    'alamat' => 'jl. palem raya rawa bogo, jatiasih',
                    'kode_pos' => '17042',
                    'photo' => null,
                    'tanggal_ujian_skripsi' => '2019-08-17',
                    'judul_skripsi' => $DATA_SKRIPSI[$i],
                    'dospem_1' => 'B. Gunawan S, ST., M.Kom ',
                    'dospem_2' => 'Fauziah  S.Kom, MMSI',
                    'ipk' => $faker->numberBetween(28,40),
                    'status' => 'verified',
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]
            ]);
        }

        

        //for 2020 SI
        for($i = 0; $i< 19; $i++){
            DB::table('mahasiswas')->insert([
                [
                    'nim' => '720119000'.$i,
                    'tahun_lulus' => '2020',
                    'kode_prodi' => 'SI',
                    'nama_lengkap' => $faker->name,
                    'no_telepon' => '081317726873',
                    'email' => $faker->email,
                    'password' => bcrypt('12345'),
                    'alamat' => 'jl. palem raya rawa bogo, jatiasih',
                    'kode_pos' => '17042',
                    'photo' => null,
                    'tanggal_ujian_skripsi' => '2020-08-17',
                    'judul_skripsi' => $DATA_SKRIPSI[$i],
                    'dospem_1' => 'B. Gunawan S, ST., M.Kom ',
                    'dospem_2' => 'Alex S.T M.Kom',
                    'ipk' => $faker->numberBetween(28,40),
                    'status' => 'verified',
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]
            ]);
        }

        //for 2020 SK
        for($i = 0; $i< 15; $i++){
            DB::table('mahasiswas')->insert([
                [
                    'nim' => '720119001'.$i,
                    'tahun_lulus' => '2020',
                    'kode_prodi' => 'SI',
                    'nama_lengkap' => $faker->name,
                    'no_telepon' => '081317726873',
                    'email' => $faker->email,
                    'password' => bcrypt('12345'),
                    'alamat' => 'jl. palem raya rawa bogo, jatiasih',
                    'kode_pos' => '17042',
                    'photo' => null,
                    'tanggal_ujian_skripsi' => '2020-08-17',
                    'judul_skripsi' => $DATA_SKRIPSI[$i],
                    'dospem_1' => 'B. Gunawan S, ST., M.Kom ',
                    'dospem_2' => 'Alex S.T M.Kom',
                    'ipk' => $faker->numberBetween(28,40),
                    'status' => 'verified',
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]
            ]);
        }


        //for 2021 SI
        for($i = 0; $i< 20; $i++){
            DB::table('mahasiswas')->insert([
                [
                    'nim' => '72012000'.$i,
                    'tahun_lulus' => '2021',
                    'kode_prodi' => 'SI',
                    'nama_lengkap' => $faker->name,
                    'no_telepon' => '081317726873',
                    'email' => $faker->email,
                    'password' => bcrypt('12345'),
                    'alamat' => 'jl. palem raya rawa bogo, jatiasih',
                    'kode_pos' => '17042',
                    'photo' => null,
                    'tanggal_ujian_skripsi' => '2021-08-17',
                    'judul_skripsi' => $DATA_SKRIPSI[$i],
                    'dospem_1' => 'B. Gunawan S, ST., M.Kom ',
                    'dospem_2' => 'Alex S.T M.Kom',
                    'ipk' => $faker->numberBetween(28,40),
                    'status' => 'verified',
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]
            ]);
        }

        //for 2021 SK
         for($i = 0; $i< 20; $i++){
            DB::table('mahasiswas')->insert([
                [
                    'nim' => '72012001'.$i,
                    'tahun_lulus' => '2021',
                    'kode_prodi' => 'SI',
                    'nama_lengkap' => $faker->name,
                    'no_telepon' => '081317726873',
                    'email' => $faker->email,
                    'password' => bcrypt('12345'),
                    'alamat' => 'jl. palem raya rawa bogo, jatiasih',
                    'kode_pos' => '17042',
                    'photo' => null,
                    'tanggal_ujian_skripsi' => '2021-08-17',
                    'judul_skripsi' => $DATA_SKRIPSI[$i],
                    'dospem_1' => 'B. Gunawan S, ST., M.Kom ',
                    'dospem_2' => 'Alex S.T M.Kom',
                    'ipk' => $faker->numberBetween(28,40),
                    'status' => 'verified',
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ]
            ]);
        }
        
        
    
    }
}
