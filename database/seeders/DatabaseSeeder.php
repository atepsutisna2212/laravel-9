<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('tb_karyawan')->insert([
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Budi Santoso',
                'nip' => '1234567890',
                'jabatan' => 'Manager',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'telp' => '081234567890',
                'email' => 'budi.santoso@example.com',
                'foto' => 'budi.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Siti Aminah',
                'nip' => '2345678901',
                'jabatan' => 'HRD',
                'alamat' => 'Jl. Sudirman No. 20, Bandung',
                'telp' => '081234567891',
                'email' => 'siti.aminah@example.com',
                'foto' => 'siti.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Andi Pratama',
                'nip' => '3456789012',
                'jabatan' => 'IT Support',
                'alamat' => 'Jl. Ahmad Yani No. 15, Surabaya',
                'telp' => '081234567892',
                'email' => 'andi.pratama@example.com',
                'foto' => 'andi.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Rina Wijaya',
                'nip' => '4567890123',
                'jabatan' => 'Marketing',
                'alamat' => 'Jl. Diponegoro No. 5, Semarang',
                'telp' => '081234567893',
                'email' => 'rina.wijaya@example.com',
                'foto' => 'rina.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Dewi Kusuma',
                'nip' => '5678901234',
                'jabatan' => 'Finance',
                'alamat' => 'Jl. Gajah Mada No. 8, Medan',
                'telp' => '081234567894',
                'email' => 'dewi.kusuma@example.com',
                'foto' => 'dewi.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Agus Saputra',
                'nip' => '6789012345',
                'jabatan' => 'Supervisor',
                'alamat' => 'Jl. Kartini No. 12, Yogyakarta',
                'telp' => '081234567895',
                'email' => 'agus.saputra@example.com',
                'foto' => 'agus.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Novi Handayani',
                'nip' => '7890123456',
                'jabatan' => 'Secretary',
                'alamat' => 'Jl. Cendrawasih No. 3, Bali',
                'telp' => '081234567896',
                'email' => 'novi.handayani@example.com',
                'foto' => 'novi.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Fajar Prakoso',
                'nip' => '8901234567',
                'jabatan' => 'Developer',
                'alamat' => 'Jl. Melati No. 7, Makassar',
                'telp' => '081234567897',
                'email' => 'fajar.prakoso@example.com',
                'foto' => 'fajar.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Lina Anggraeni',
                'nip' => '9012345678',
                'jabatan' => 'Designer',
                'alamat' => 'Jl. Pahlawan No. 9, Palembang',
                'telp' => '081234567898',
                'email' => 'lina.anggraeni@example.com',
                'foto' => 'lina.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
            [
                'id_karyawan' => null,
                'nama_karyawan' => 'Eko Budianto',
                'nip' => '0123456789',
                'jabatan' => 'Accountant',
                'alamat' => 'Jl. Kenanga No. 6, Lampung',
                'telp' => '081234567899',
                'email' => 'eko.budianto@example.com',
                'foto' => 'eko.jpg',
                'created_by' => 'admin',
                'created_at' => now()
            ],
        ]);
    }
}
