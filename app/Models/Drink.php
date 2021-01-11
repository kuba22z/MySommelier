<?php

namespace App\Models;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Drink extends Model
{
    use HasFactory;

    public $table = 'drinks';

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
        'image',
    ];

    public static function getThisName(string $id): Collection
    {
        return DB::table('drinks')->select('id', 'image', 'name', 'type', 'alcoholContent')->where('id', '=', $id)->get();
    }

    public static function getLikeEAN(string $ean): Collection
    {
        return DB::table('drinks')->select('id', 'image', 'name', 'type', 'alcoholContent')->where('EAN', 'LIKE', "{$ean}%")->get();
    }

    public static function getLikeName(string $name)
    {
        return DB::table('drinks')->select('id', 'name')->where('name', 'LIKE', "%{$name}%")->take(10)->get();
    }

    public static function getDrinkByIDWithSubstances($drink_id)
    {

        return DB::table('drinks')
            ->select('alcoholContent', 'image', 'drinks.name', 'origin', 'type',
                DB::Raw('group_concat(substances.name) as substances'))
            ->leftJoin('drinks_substances', 'drinks.id', '=', 'drinks_substances.drink_id')
            ->leftJoin('substances', 'drinks_substances.substance_id', '=', 'substances.id')
            ->where('drinks.id', '=', $drink_id)
            ->groupBy('drinks.name', 'image', 'alcoholContent', 'origin', 'type')
            ->get();

    }

    public static function getDrinkByID($drink_id)
    {
        return DB::table('drinks')
            ->select('alcoholContent', 'image', 'drinks.name', 'origin', 'type')
            ->where('drinks.id', '=', $drink_id)
            ->get();
    }

    public static function getDrinkByWhereClauselWithSubstances(array $whereClausel, array $substances,bool $allergen)
    {
   if($substances!==[] || $allergen===false)
            return
                DB::table('drinks')
                    ->select('alcoholContent', 'image', 'drinks.name', 'type', 'drinks.id',
                        DB::Raw('group_concat(substances.name) as substances'),DB::Raw('group_concat(substances.isAllergen) as isAllergen'))
                    ->leftJoin('drinks_substances', 'drinks.id', '=', 'drinks_substances.drink_id')
                    ->leftJoin('substances', 'drinks_substances.substance_id', '=', 'substances.id')
                    ->where($whereClausel)
                    ->groupBy('alcoholContent', 'image', 'drinks.name', 'type', 'drinks.id')
                    ->get();
        else
          return DB::table('drinks')
                ->select('alcoholContent', 'image', 'drinks.name', 'type', 'drinks.id')
                ->where($whereClausel)
                ->get();
    }

    /*  Um Inhaltstoffe mit einem OR und LIKE operator zu suchen

               ->where(function ($query) use($allergen, $substances) {
                    foreach ($substances as $substance){
                        $query->orwhere('substances.name', 'LIKE', "%{$substance}%");

                    }   })*/

    public static function createDrink(array $substancesA, Request $req)
    {

        //If an exception is thrown within the transaction closure, t
        //he transaction will automatically be rolled back. If the
        // closure executes successfully, the transaction will automatically be committed

       return DB::transaction(function () use ($substancesA, $req) {
//create new drink if the name not exists
            try {
                $drink = new Drink($req->except('_token', 'drinksImage', 'substances'));
                $drink->save();
                $drinkID = $drink->getAttribute('id');
            } catch (Exception $e) {
                return false;
            }

//create new substances if the name not exists
            foreach ($substancesA as $key => $subA) {
                try {
                    $s = new Substance([
                        'name' => $subA[0],
                        'isAllergen' => $subA[1]
                    ]);
                    $s->save();
                    $substanceID = $s->getAttribute('id');
                } catch (Exception $e) {
                    $substanceID = Substance::getIDbyName($subA[0])[0]->id;
                }

//create values which connect substances with drinks

                $drinksSub = new DrinksSubstance([
                    'drink_id' => $drinkID,
                    'substance_id' => $substanceID]);
                $drinksSub->save();
            }
        }, 40);

    }

    public static function createDrinkSeeder(array $substancesA, array $req)
    {

        //If an exception is thrown within the transaction closure, t
        //he transaction will automatically be rolled back. If the
        // closure executes successfully, the transaction will automatically be committed

        DB::transaction(function () use ($substancesA, $req) {
//create new drink if the name not exists and ean not exists
            try {
                $drink = new Drink($req);
                $drink->save();
                $drinkID = $drink->getAttribute('id');
            } catch (Exception $e) {
                //if the drink already exists -> stop this insert
                return;
            }

//create new substances if the name not exists
            foreach ($substancesA as $key => $subA) {
                try {
                    $s = new Substance([
                        'name' => $subA[0],
                        'isAllergen' => $subA[1]
                    ]);
                    $s->save();
                    $substanceID = $s->getAttribute('id');
                } catch (Exception $e) {
                    //if the substance already exists -> get the ID for the follow insert
                    $substanceID = Substance::getIDbyName($subA[0])[0]->id;
                }

//create values which connect substances with drinks

                $drinksSub = new DrinksSubstance([
                    'drink_id' => $drinkID,
                    'substance_id' => $substanceID]);
                $drinksSub->save();
            }
        }, 40);

    }
    public static function getImagePathByEan(int $ean) :Collection{

        return DB::table('drinks')->select('image')->where('EAN', '=', $ean)->get();
    }

    public static function deleteByEAN($ean){

        DB::table('drinks')->where('EAN', '=', "$ean")->delete();
    }


}
