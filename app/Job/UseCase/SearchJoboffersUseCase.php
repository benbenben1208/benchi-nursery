<?php

namespace App\Job\UseCase;

use App\Models\CorporationJoboffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
final class SearchJoboffersUseCase
{

    public function handle(Request $request, int $limit)
    {
        //リクエストから検索条件を取得し、検索条件に合致する求人情報を取得。
        $corporationJoboffers = CorporationJoboffer::with('favorites')
            ->whereKeyword($request->keyword)
            ->searchAddress($request->city)
            ->searchHiringSystem($request->hiring_system)
            ->searchPeriod($request->period)
            ->searchWorkType($request->work_type)
            ->orderBy('created_at', 'desc')
            ->take($limit);


        return $corporationJoboffers;
    }
}
