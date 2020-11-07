<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        //return $request->method();
        //return $request->path();
        //return $request->fullUrl();
    }
}

/*

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        // Will return only validated data

        $validated = $request->validated();
    }
}


 */
