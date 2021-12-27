<?php
namespace App\Services;
use App\Consts\JobConditionConsts;

class JobService {
    public function getJobConditions()
    {
        $city = JobConditionConsts::CITY;
        //mapでindexをリセットする。(連想配列の形になるとオブジェクトにされてしまうっぽい）
        $city = collect($city)->map(function($town, $index){
            return collect($town)->values();
        });
        return $city;
    }
    public  function convertStringName($jobs)
    {

        $job = collect($jobs)->each(function ($job) {

            $job->work_type = isset($job->work_type)
                ? JobConditionConsts::WORK_TYPES[$job->work_type]
                : '';
            $job->job_type = isset($job->job_type)
                ? JobConditionConsts::JOB_TYPES[$job->job_type]
                : '';
            $job->hiring_system = isset($job->hiring_system) && array_key_exists($job->hiring_system, JobConditionConsts::HIRING_SYSTEMS)
                ? JobConditionConsts::HIRING_SYSTEMS[$job->hiring_system]
                : '';
            $job->salary_pattern = isset($job->salary_pattern)
                ? JobConditionConsts::SALARY_PATTERN[$job->salary_pattern]
                : '';
            $job->trial = isset($job->traial)
                ? JobConditionConsts::TRIALS[$job->traial]
                : '';
            $job->travel_cost = isset($job->travel_cost)
                ? JobConditionConsts::TRAVEL_COSTS[$job->travel_cost]
                : '';
        });
        return $job;
    }
}
