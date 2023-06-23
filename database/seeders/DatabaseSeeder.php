<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(30)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('children')->insert([
            'mothers_id' => 1,
            'nama' => 'Yuyun Agustin',
            'nik' => 1234567890123456,
            'tempat_lahir' => 'Jl. Sukabumi No.31 RT.00 RW.00 Jakarta',
            'tanggal_lahir' => '2023-08-29',
            'usia' => '1',
            'jenis_kelamin' => 'L',
        ]);

        DB::table('children')->insert([
            'mothers_id' => 2,
            'nama' => 'Wati Pratami',
            'nik' => 1234567890123456,
            'tempat_lahir' => 'Jl. Sukabumi No.33 RT.00 RW.00 Jakarta',
            'tanggal_lahir' => '2022-09-17',
            'usia' => '1',
            'jenis_kelamin' => 'P',
        ]);

        DB::table('children')->insert([
            'mothers_id' => 3,
            'nama' => 'Krisna Pratama',
            'nik' => 1234567890123456,
            'tempat_lahir' => 'Jl. Sukabumi No.33 RT.00 RW.00 Jakarta',
            'tanggal_lahir' => '2022-09-17',
            'usia' => '1',
            'jenis_kelamin' => 'L',
        ]);

        DB::table('children')->insert([
            'mothers_id' => 3,
            'nama' => 'Jundri Pradua',
            'nik' => 1234567890123456,
            'tempat_lahir' => 'Jl. Sukabumi No.33 RT.00 RW.00 Jakarta',
            'tanggal_lahir' => '2022-12-17',
            'usia' => '1',
            'jenis_kelamin' => 'L',
        ]);

        DB::table('mothers')->insert([
            'nama' => 'Anggita Sukma',
            'nik' => 1234567890123444,
            'alamat' => 'Jl. Sukabumi No.31 RT.00 RW.00 Jakarta',
            'no_tlp' => '085367261128',
        ]);

        DB::table('mothers')->insert([
            'nama' => 'Susi Ningsih',
            'nik' => 1234567890123444,
            'alamat' => 'Jl. Sukabumi No.33 RT.00 RW.00 Jakarta',
            'no_tlp' => '085367261192',
        ]);

        DB::table('mothers')->insert([
            'nama' => 'Sinta Pertiwi',
            'nik' => 1234567890123333,
            'alamat' => 'Jl. Sukabumi No.36 RT.00 RW.00 Jakarta',
            'no_tlp' => '085367261199',
        ]);


        DB::table('posyandus')->insert([
            'child_id' => 1,
            'berat_badan' => 15.2,
            'tinggi_badan' => 98,
            'lingkaran_kepala' => 50,
            'status' => 'N',
            'status_gizi' => 'H',
        ]);
        

        DB::table('posyandus')->insert([
            'child_id' => 2,
            'berat_badan' => 10.8,
            'tinggi_badan' => 76,
            'lingkaran_kepala' => 47,
            'status' => 'TP',
            'status_gizi' => 'K',
        ]);

        DB::table('posyandus')->insert([
            'child_id' => 3,
            'berat_badan' => 55.2,
            'tinggi_badan' => 98,
            'lingkaran_kepala' => 50,
            'status' => 'N',
            'status_gizi' => 'H',
        ]);

        DB::table('posyandus')->insert([
            'child_id' => 4,
            'berat_badan' => 60.2,
            'tinggi_badan' => 98,
            'lingkaran_kepala' => 50,
            'status' => 'N',
            'status_gizi' => 'H',
        ]);


    }
}
