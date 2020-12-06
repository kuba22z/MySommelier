<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public static function insertOffer(int $drinksID,int $providerID)
    {
        DB::table('drinks_offers')->insert(
            ['provider_id' => $providerID,
                'drink_id' => $drinksID,
                'recommended' => false
            ]
        );
    }
    public static function updateRecommended(int $provider_id,array $notRecommendedIds,array $recommendedIds)
    {
        DB::beginTransaction();
        if($notRecommendedIds!=[])
            DB::table('drinks_offers')->where('provider_id','=',$provider_id)->whereIn('drink_id',$notRecommendedIds)->update(['recommended'=>false]);
        if($recommendedIds!=[])
            DB::table('drinks_offers')->where('provider_id','=',$provider_id)->whereIn('drink_id',$recommendedIds)->update(['recommended'=>true]);
        DB::commit();
    }
    public static function removeOffer(int $provider_id,int $drink_id){
        DB::table('drinks_offers')->where('provider_id', '=', $provider_id)->where('drink_id', '=', $drink_id)->delete();
    }

}
