<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i<= 100; $i++){
            DB::table('pekerjaans')->insert([
                [
                    'id_mahasiswa' => $faker->numberBetWeen(1, 90),
                    'nama_perusahaan' => $faker->company,
                    'pekerjaan' => $faker->jobTitle,
                    'jabatan'   => 'Senior',
                    'tanggal_bekerja' => '2020-09-20',
                    'tanggal_selesai' => '2020-12-25',
                    'isCurrent' => 0
                ]
            ]);
        }
    }
}
