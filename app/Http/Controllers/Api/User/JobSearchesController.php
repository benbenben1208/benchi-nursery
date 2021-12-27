<?php

namespace App\Http\Controllers\Api\User;

use App\Consts\JobConditionConsts;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Job\UseCase\SearchJoboffersCrawledUseCase;
use App\Job\UseCase\SearchJoboffersOmOriginalUseCase;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSearchesController extends Controller
{
    public function searchJobOffers(Request $request)
    {
        $this->limit = 10;
        //ダイエット
        if (!(empty($request->query() || empty(Auth::guard('users'))))) {
            //ここにユーザーの検索条件を保存する処理を書く(メソッドを作り呼び出す)
        }

        //OM求人(独自)取得
        $useCase = new SearchJoboffersOmOriginalUseCase();
        $omOriginalJoboffers = $useCase->handle($request, $this->limit);

        //OM求人(ハロワ、indeed)取得
        $useCase = new SearchJoboffersCrawledUseCase();
        $omCrawledJoboffers = $useCase->handle($request, $this->limit);


        $mergeOmJoboffers = $omOriginalJoboffers->merge($omCrawledJoboffers);

        return JobResource::collection($mergeOmJoboffers)->toJson();
    }
    public function getConditions(JobService $jobService)
    {
        return [
            'city' => $jobService->getJobConditions(),
            'work_type' => JobConditionConsts::WORK_TYPES,
        ];
    }
}
