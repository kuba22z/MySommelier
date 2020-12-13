<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinksSubstance extends Model
{
    use HasFactory;
    public $table='drinks_substances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'drink_id',
        'substance_id'
    ];
    public $incrementing = false;


}
