<?php

namespace Database\Seeders;

use Faker\Provider\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CaptchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('captchaImages')->insert([
             ['image' => "captchas/addition1.png", "result" => Crypt::encrypt(17)],
            ['image' => "captchas/addition2.png", "result" =>  Crypt::encrypt(19)],
            ['image' => "captchas/addition3.png", "result" => Crypt::encrypt(18)],
            ['image' => "captchas/addition4.png", "result" =>  Crypt::encrypt(23)],
            ['image' => "captchas/addition5.png", "result" =>  Crypt::encrypt(30)],
            ['image' => "captchas/addition6.png", "result" =>  Crypt::encrypt(7)],
            ['image' => "captchas/addition7.png", "result" =>  Crypt::encrypt(17)],
            ['image' => "captchas/addition8.png", "result" => Crypt::encrypt(39)],
            ['image' => "captchas/addition9.png", "result" =>  Crypt::encrypt(14)],
            ['image' => "captchas/addition10.png", "result" =>  Crypt::encrypt(12)],
            ['image' => "captchas/addition11.png", "result" =>  Crypt::encrypt(18)],
            ['image' => "captchas/addition12.png", "result" =>  Crypt::encrypt(15)],
            ['image' => "captchas/addition13.png", "result" =>  Crypt::encrypt(8)],
            ['image' => "captchas/addition14.png", "result" =>  Crypt::encrypt(29)],
            ['image' => "captchas/addition15.png", "result" =>  Crypt::encrypt(24)],
            ['image' => "captchas/addition16.png", "result" =>  Crypt::encrypt(4)],
            ['image' => "captchas/addition17.png", "result" =>  Crypt::encrypt(37)],
            ['image' => "captchas/addition18.png", "result" =>  Crypt::encrypt(25)],
            ['image' => "captchas/addition19.png", "result" =>  Crypt::encrypt(20)],
            ['image' => "captchas/addition20.png", "result" =>  Crypt::encrypt(21)],
            ]);
    }
}
