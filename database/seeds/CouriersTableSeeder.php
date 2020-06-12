<?php

use App\Courier;
use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['courier_code' => 'pos', 'name' => 'POS'],
            ['courier_code' => 'jne', 'name' => 'JNE'],
            ['courier_code' => 'tiki', 'name' => 'TIKI']
        ];
        Courier::insert($data);
    }
}
