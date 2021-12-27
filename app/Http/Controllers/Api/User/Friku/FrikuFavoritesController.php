<?php

namespace App\Http\Controllers\Api\User\Friku;

use App\Http\Controllers\Controller;
use App\Models\FrikuJoboffer;
use App\Models\User;
use Illuminate\Http\Request;

class FrikuFavoritesController extends Controller
{
    public function frikuFavorites(FrikuJoboffer $frikuJoboffer)    //既にfavoritesテ
    {
        $frikuJoboffer->frikuFavorited()->detach(auth()->guard('users')->id());
        $frikuJoboffer->frikuFavorited()->attach(auth()->guard('users')->id());
        $user = User::findOrFail(auth()->guard('users')->id());
        $favoriteJobs = $user->frikuFavorites;

        return response()->json($favoriteJobs, 201);
    }
    public function frikuUnfavorite(FrikuJoboffer $frikuJoboffer)
    {
        $frikuJoboffer->frikuFavorited()->detach(auth()->guard('users')->id());
        $user = User::findOrFail(auth()->guard('users')->id());
        $favoriteAll = $user->frikuFavorites();
        return response()->json($favoriteAll);
    }
}
