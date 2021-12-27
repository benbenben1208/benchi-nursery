<?php

namespace App\Http\Controllers\Api\User\OwnedMaker;

use App\Consts\JobConditionConsts;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Job\UseCase\SearchJoboffersCrawledUseCase;
use App\Job\UseCase\SearchJoboffersOmNotOriginalUseCase;
use App\Job\UseCase\SearchJoboffersOmOriginalUseCase;
use App\Job\UseCase\SearchJoboffersUseCase;
use App\Models\CorporationApplicant;
use App\Models\CorporationApplicantschedule;
use App\Models\CorporationCompanyschedule;
use App\Models\CorporationJoboffer;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Providers\ApplyServiceProvider;
use App\Services\applyService;
use App\Services\JobService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    private $limit;

    public function omJobAll()
    {
        $joboffers = CorporationJoboffer::all();

        return $joboffers->pluck('id');;
    }
    public function showJoboffer(CorporationJoboffer $corporationJoboffer)
    {
        //ここで、応募済かどうかを取得する。
        return collect(new JobResource($corporationJoboffer));
    }
    //OMオリジナル求人に応募するときのアクション
    public function applyOmOriginalJoboffer(
        Request $request,
        CorporationJoboffer $corporationJoboffer ,
        CorporationApplicant $applicant,
        CorporationApplicantschedule $applicantschedule,
        applyService $applyService
    )
    {

        //ここから応募処理を書く
        $user = User::with('corporationApplicant')->where('id', Auth::guard('users')->id())->first();
        $isApplied = $corporationJoboffer->isAlreadyAppliedByUser($corporationJoboffer, $user);
        if($isApplied){
            return response()->json([
                'message' => 'すでに応募済みです。',
            ], 400);
        }
        $applicant = $applicant->getApplicant($user)->first();

        $scheduleArray = $applyService->createScheduleArray($request, $corporationJoboffer->id, $applicant->id);
        //ユーザーの面接申込日データを作成

        $applicantschedule->create($scheduleArray);
        $schedules = CorporationApplicantschedule::with('corporationJoboffer')->where('applicant_id', $user->id)->get();
        $joboffer = $schedules->map(function ($schedule) {
            return $schedule->corporationJoboffer;
        });
        return response()->json($joboffer, 201, ['message' => 'success']);



    }


    //TODO: もう使うことはないかもしれないけど、後々、企業とユーザーの面接日程調整の機能がついたときのために、残しておく。
    // public function applyOm(CorporationJoboffer $corporationJoboffer)
    // {
    //     //当該求人を取得
    //     $corporationJoboffer = CorporationJoboffer::with('corporationApplicantSchedules.corporationApplicant', 'corporationCompany.authUser')
    //         ->where('id', $corporationJoboffer->id)
    //         ->first();
    //     $user = User::findOrFail(1);
    //     //申込済みかどうかを判定して返す。
    //     $isApplied = $corporationJoboffer->isAlreadyApplied($corporationJoboffer, $user);
    //     //申込済みなら、申込済みのメッセージを返す


    //     //企業の面接日時の候補を取得する。
    //     $candidateDatetimes = CorporationCompanyschedule::where([
    //         [
    //             'company_id',  $corporationJoboffer->company_id,
    //         ],
    //         [
    //             'start_time' , '>' , now(),
    //         ]
    //         ])
    //         ->get();
    //     //面接日時の候補が存在してなければ、応募完了画面へと遷移する。
    //     if(empty($candidateDatetimes)){
    //         //応募完了画面へと遷移させる。
    //     }
    //     //30分ごとに、start_time end_timeを区切る。
    //     $result = [];
    //     foreach($candidateDatetimes as $candidateDatetime){
    //         $start_time = Carbon::parse($candidateDatetime->start_time);

    //         //終了時刻から１時間を引く。
    //         $end_time = Carbon::parse($candidateDatetime->end_time)->subMinute(60);
    //         //開始時刻から終了時刻までを30分おきに区切る。
    //         //↓の$start_time->lte($end_time)は、$start_time <= $end_timeと同じ。
    //         while ($start_time->lte($end_time)) {
    //             //start_timeとend_timeの間を30分おきに区切る。
    //             $result[] = $start_time->toDateTimeString();
    //             $start_time = $start_time->addMinute(30);
    //         }
    //     }
    //     //面接日時の候補は$resultに格納されている。
    //     if(empty($candidateDatetimes)){
    //         //企業が面接日程を入力していない場合は、応募完了画面へと遷移する
    //     }


    //     //面接日時の候補が存在していれば、面接日時の候補を返す。

    // }
}
