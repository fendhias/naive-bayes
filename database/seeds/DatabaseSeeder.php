<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('brands')->insert(array(
            array('brand' => 'Xiaomi', 'username' => '@xiaomiindonesia'),
            array('brand' => 'Oppo', 'username' => '@OPPOIndonesia'),
            array('brand' => 'Vivo', 'username' => '@vivo_indonesia'),
            array('brand' => 'Huawei', 'username' => '@Huaweiindonesia'),
        ));
    }
}
