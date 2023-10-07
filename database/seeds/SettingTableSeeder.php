<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>" software student",
            'short_des'=>" poly software enginering student",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"Poly - Bahirdar, Ethiopia",
            'email'=>"eshop@gmail.com",
            'phone'=>"251 985187059",
        );
        DB::table('settings')->insert($data);
    }
}
