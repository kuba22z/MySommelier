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
             ['image' => "storage/captchas/add1.png", "result" => Crypt::encrypt(29)],
            ['image' => "storage/captchas/add2.png", "result" =>  Crypt::encrypt(28)],
            ['image' => "storage/captchas/add3.png", "result" => Crypt::encrypt(20)],
            ['image' => "storage/captchas/add4.png", "result" =>  Crypt::encrypt(18)],
            ['image' => "storage/captchas/add5.png", "result" =>  Crypt::encrypt(26)],
            ['image' => "storage/captchas/add6.png", "result" =>  Crypt::encrypt(33)],
            ['image' => "storage/captchas/add7.png", "result" =>  Crypt::encrypt(8)],
            ['image' => "storage/captchas/add8.png", "result" => Crypt::encrypt(23)],
            ['image' => "storage/captchas/add9.png", "result" =>  Crypt::encrypt(18)],
            ['image' => "storage/captchas/add10.png", "result" =>  Crypt::encrypt(15)],
            ['image' => "storage/captchas/add11.png", "result" =>  Crypt::encrypt(27)],
            ['image' => "storage/captchas/add12.png", "result" =>  Crypt::encrypt(23)],
            ['image' => "storage/captchas/add13.png", "result" =>  Crypt::encrypt(20)],
            ['image' => "storage/captchas/add14.png", "result" =>  Crypt::encrypt(33)],
            ['image' => "storage/captchas/add15.png", "result" =>  Crypt::encrypt(24)],
            ['image' => "storage/captchas/add16.png", "result" =>  Crypt::encrypt(21)],
            ['image' => "storage/captchas/add17.png", "result" =>  Crypt::encrypt(23)],
            ['image' => "storage/captchas/add18.png", "result" =>  Crypt::encrypt(15)],
            ['image' => "storage/captchas/add19.png", "result" =>  Crypt::encrypt(21)],
            ['image' => "storage/captchas/add20.png", "result" =>  Crypt::encrypt(15)],
            ]);
    }
}
