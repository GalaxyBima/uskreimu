<?php

namespace Database\Seeders;

use App\Models\wallet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datawallet = [
            [
                'rekening' => '5227-4721-9016-7772',
                'id_user' => 1,
                'saldo' => 100000,
                'status' => 'aktif'
            ],
            [
                'rekening' => '5200-7638-2875-5843',
                'id_user' => 2,
               'saldo' => 200000,
               'status' => 'aktif'
            ],
            [
                'rekening' => '5201-6891-4141-7937',
                'id_user' => 3,
                'saldo' => 200000,
                'status'=> 'aktif',
            ],
            [
               'rekening' => '5263-1303-2933-4177',
                'id_user' => 4,
               'saldo' => 200000,
               'status'=> 'aktif',
            ]
        ];

        foreach ($datawallet as $key => $val){
            wallet::create($val);
        }
    }
}
