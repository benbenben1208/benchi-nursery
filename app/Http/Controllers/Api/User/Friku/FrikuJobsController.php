<?php

namespace App\Http\Controllers\Api\User\Friku;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrikuCompanyResource;
use App\Http\Resources\JobResource;
use App\Models\FrikuCompany;
use App\Models\FrikuJoboffer;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;

class FrikuJobsController extends Controller
{
    public function pickupJobAll()
    {
        // $pickUpJobs = FrikuJoboffer::where('is_pickup', 1);
        $pickUpJobs = FrikuJoboffer::whereHas('frikuCompany', function ($query) {
            $query->where('is_pickup', true);
        })->get();
        return $pickUpJobs->pluck('id');
    }
    public function show(FrikuJoboffer $frikuJoboffer)
    {

        return collect(new JobResource($frikuJoboffer));
    }

    //企業の求人一覧を取得
    public function pickUpCompanyJoboffers($frikuCompany)
    {
        $frikuCompany = FrikuCompany::with('frikuJoboffers')->findOrFail($frikuCompany);
        if (!$frikuCompany->is_pickup) {
            return response()->json(['message' => 'pickUp企業の求人ではありません']);
        }
        $pickUpJobs =  $frikuCompany->frikuJoboffers;

        return JobResource::collection($pickUpJobs)->toJson();
        // return collect(new JobResource($pickUpJobs));
    }
    public function featureCompanyJoboffers($frikuCompany)
    {
        $frikuCompany = FrikuCompany::with('frikuJoboffers')->findOrFail($frikuCompany);
        if ($frikuCompany->is_pickup) {
            return response()->json(['message' => '注目企業の求人ではありません']);
        }
        $featureJobs =  $frikuCompany->frikuJoboffers;

        return JobResource::collection($featureJobs)->toJson();
    }
}
