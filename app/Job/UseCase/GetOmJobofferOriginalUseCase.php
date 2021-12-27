<?php

namespace App\Job\UseCase;

use App\Models\CorporationJoboffer;

final class GetOmJobofferOriginalUseCase
{

    public function handle()
    {
        //OM求人(独自)取得
        $jobs = CorporationJoboffer::getOriginalJobs()
            ->get();
        return
            $jobs;
    }
}
