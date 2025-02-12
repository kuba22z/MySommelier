<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrinksOffer extends Model
{
    use HasFactory;
    public $table='drinks_offers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'recommended',
        'drink_id',
        'provider_id'
    ];

    public static function insertOffer(int $drinksID,int $providerID,bool $recommend=false)
    {
        DB::table('drinks_offers')->insert(
            ['provider_id' => $providerID,
                'drink_id' => $drinksID,
                'recommended' => $recommend
            ]
        );
    }
    public static function updateRecommended(int $provider_id,array $recommendedIds)
    {
        DB::transaction(function () use ($provider_id,$recommendedIds) {
            DB::table('drinks_offers')->where('provider_id', '=', $provider_id)->whereNotIn('drink_id', $recommendedIds)->update(['recommended' => false]);
            DB::table('drinks_offers')->where('provider_id', '=', $provider_id)->whereIn('drink_id', $recommendedIds)->update(['recommended' => true]);
        });
    }
    public static function removeOffer(int $provider_id,int $drink_id)
    {
        DB::table('drinks_offers')->where('provider_id', '=', $provider_id)->where('drink_id', '=', $drink_id)->delete();
    }
    public static function getDrinkOffers(int $provider_id): \Illuminate\Support\Collection
    {

       return DB::table('drinks_offers')->select('name','recommended','drink_id')
            ->where('provider_id','=',$provider_id)
            ->leftJoin('drinks', 'drinks.id', '=', 'drinks_offers.drink_id')
            ->get();
    }


}
