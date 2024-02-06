<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\produk;
use App\Models\wallet;
use App\Models\kategori;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $dataUser = [
            [
                'nama' => 'salman',
                'email' => 'salman@gmail.com',
                'role' => 'customer',
                'password' => bcrypt('salman'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'fikri',
                'email' => 'fikri@gmail.com',
                'role' => 'kantin',
                'password' => bcrypt('fikri'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'setiadi',
                'email' => 'setiadi@gmail.com',
                'role' => 'bank',
                'password' => bcrypt('setiadi'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($dataUser as $key => $val) {
            User::create($val);
        }

        $dataKategori = [
            [
                'nama_kategori' => 'Makanan',
            ],
            [
                'nama_kategori' => 'Minuman',
            ],
        ];

        foreach ($dataKategori as $key => $val) {
            kategori::create($val);
        }

        // Produk Seeder
        $dataProduk = [
            [
                'nama_produk' => 'Vit',
                'harga' => 3000,
                'stok' => 10,
                'foto' => 'default.png',
                'desc' => 'minuman air mineral saingan Aqua',
                'id_kategori' => 1,
            ],
            [
                'nama_produk' => 'Mie Ayam',
                'harga' => 10000,
                'stok' => 10,
                'foto' => 'default.png',
                'desc' => 'mie pake ayam',
                'id_kategori' => 2,
            ],
        ];

        foreach ($dataProduk as $key => $val) {
            produk::create($val);
        }

        // Wallet Seeder
        $dataWallet = [
            [
                'rekening' => '641234567890',
                'id_user' => 1,
                'saldo' => 100000,
                'status' => 'aktif'
            ],
            [
                'rekening' => '640987654321',
                'id_user' => 2,
                'saldo' => 100000,
                'status' => 'aktif'
            ],
            [
                'rekening' => '641212343456',
                'id_user' => 3,
                'saldo' => 100000,
                'status' => 'aktif'
            ],
            [
                'rekening' => '640909878765',
                'id_user' => 4,
                'saldo' => 100000,
                'status' => 'aktif'
            ],
        ];

        foreach ($dataWallet as $key => $val) {
            wallet::create($val);
        }
    }
}