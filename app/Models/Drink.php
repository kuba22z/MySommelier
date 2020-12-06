<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drink extends Model
{
    use HasFactory;
    public $table='drinks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ean',
        'product',
        'type',
        'origin',
        'alcoholContent',
        'description',
        'image',
    ];
public function getLikeName(String $name): \Illuminate\Support\Collection
{
    return DB::table('drinks')->select('id','image','name','type','alcoholContent')->where('name','LIKE',$name)->get();
}




}
