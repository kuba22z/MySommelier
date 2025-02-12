<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Substance extends Model
{
    use HasFactory;
    public $table='substances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'isAllergen'

    ];

    public static function getIDbyName($name){

        return DB::table('substances')->select('id')->where('name','=',$name)->get();
    }

}
