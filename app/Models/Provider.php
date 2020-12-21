<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class Provider extends Authenticatable
{
    use HasFactory, Notifiable;

    // public $table='provider';
    // optional: to secure that this Model corresponds to table: provider
    protected $guard = 'provider';
    public $table='providers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'secondName',
        'zip',
        'city',
        'street',
        'website',
        'businessName',
        'birthDate',
        "openingHours",
        'phoneNumber',
        'description',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getProviderByIdWithRecommend(int $id){
        return DB::transaction(function () use ($id) {
            $provider = DB::table('providers')
                ->select('providers.id', 'businessName', 'providers.image', 'openingHours', 'description', 'city', 'street', 'zip', 'drinks.name','drinks.image AS drinksImage', 'type', 'alcoholContent')
                ->where('providers.id', '=', $id)
                ->leftJoin('drinks_offers', 'providers.id', '=', 'drinks_offers.provider_id')
                ->where('recommended', "=", true)
                ->leftJoin('drinks', 'drinks_offers.drink_id', '=', 'drinks.id')
                ->take(3)
                ->get();
            if ($provider->isEmpty())
               $provider= DB::table('providers')
                    ->select('providers.id', 'businessName', 'providers.image', 'openingHours', 'description', 'city', 'street', 'zip')
                    ->where('providers.id', '=', $id)->get();

            return $provider;
        });
    }
    public static function getProviderByIdWithAllDrinks(int $id){
            return DB::table('providers')
                ->select('providers.id','businessName','providers.image','openingHours','description','city','street','zip','drinks.name','drinks.image AS drinksImage','type','alcoholContent')
                ->where('providers.id','=',$id)
                ->leftJoin('drinks_offers', 'providers.id', '=', 'drinks_offers.provider_id')
                ->leftJoin('drinks','drinks_offers.drink_id','=','drinks.id')
                ->get();
    }
    public static function getProvidersWithDrinksByDrinkId(int $drink_id,int $take=3){
        return DB::table('providers')
            ->select('providers.image','providers.id','businessName')
            ->leftJoin('drinks_offers', 'providers.id', '=', 'drinks_offers.provider_id')
            ->where('drinks_offers.drink_id','=',$drink_id)
            ->take($take)
            ->get();
    }


}
