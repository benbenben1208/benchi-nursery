<?php

namespace App\Http\Resources;

use App\Consts\JobConditionConsts;
use App\Models\FrikuCompany;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {

        $this->resource->hiring_system = array_key_exists($this->resource->hiring_system, JobConditionConsts::HIRING_SYSTEMS)
        ? JobConditionConsts::HIRING_SYSTEMS[$this->resource->hiring_system]
        : "" ;

        // if($this->resource->type_of_job){
        //     $this->type_of_job = $this->resource->type_of_job[0];
        // }

        return [
             'id' => $this->id,
            'company_id' => $this->resource->company_id,
            'url' => $this->resource->url,
            'job_offer_status' => $this->resource->job_offer_status,
            "preview_id" => $this->resource->preview_id,
            'company_name' => $this->resource->company_name,
            'item_name' => $this->resource->item_name,
            'work_type' => JobConditionConsts::WORK_TYPES[$this->resource->work_type],
            'hiring_system' => $this->hiring_system,
            'job_type' => JobConditionConsts::JOB_TYPES[$this->resource->job_type],
            'job_description' => $this->resource->job_description,
            'work_time' => $this->resource->work_time,
            "work_flow" => $this->resource->work_flow,
            "trial" => JobConditionConsts::TRIALS[$this->resource->trial],
            "trial_condition" => $this->resource->trial_condition,
            "trial_period" => $this->resource->trial_period,
            "holiday_description" => $this->resource->holiday_description,
            "welfare_description" => $this->resource->welfare_description,
            "period_min" => $this->resource->period_min,
            "shift_circle" => $this->resource->shift_circle,
            "environment_gender_ratio" => $this->resource->environment_gender_ratio,
            "worker_message" => $this->resource->worker_message,
            "work_location" => $this->resource->worker_location ,
            "access" => $this->resource->access,
            "zip_code" => $this->resource->zip_code,
            "prefecture" => $this->resource->prefecture,
            "city" => $this->resource->city,
            "building" => $this->resource->building,
            "salary_pattern" => JobConditionConsts::SALARY_PATTERN[$this->resource->salary_pattern] ,
            "salary_min" => $this->resource->salary_min,
            "salary_max" => $this->resource->salary_max,
            "salary_description" => $this->resource->salary_description,
            "travel_cost" => JobConditionConsts::TRAVEL_COSTS[$this->resource->travel_cost] ,
            "travel_cost_description" => $this->resource->travel_cost_description,
            "shift_income_example" => $this->resource->shift_income_example,
            "image1_caption" => $this->resource->image1_caption,
            "image2_caption" => $this->resource->image2_caption,
            "image3_caption" => $this->resource->image3_caption,
            "image4_caption" => $this->resource->image4_caption,
            "applied_flow" => $this->resource->applied_flow,
            "phone" => $this->resource->phone,
            "recruit_number" => $this->resource->recruit_number,
            "recruit_number_description" => $this->resource->recruit_number_description,
            'is_crawled' => $this->resource->is_crawled,
            "image1" => $this->resource->image1,
            "image2" => $this->resource->image2,
            "image3" => $this->resource->image3,
            "image4" => $this->resource->image4,
            "type_of_job" => $this->resource->type_of_job,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
