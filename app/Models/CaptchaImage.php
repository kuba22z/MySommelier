<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CaptchaImage extends Model
{
    use HasFactory;
    public $table='captcha_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'result'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'result'
    ];

public function getCaptchaImage(int $captchaID)
{
    return DB::table('captcha_images')->find($captchaID);
}

}
