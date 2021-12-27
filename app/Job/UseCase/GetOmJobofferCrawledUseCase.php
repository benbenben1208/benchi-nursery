<?php

namespace App\Job\UseCase;

use App\Models\CorporationJoboffer;

final class GetOmJobofferCrawledUseCase
{

    public function handle()
    {
          //OM求人(ハロワインディード)取得,返却
          $jobs = CorporationJoboffer::getCrawledJobs()
            ->get();

        return
           $jobs;

    }
}
