<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FrikuCompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         // $table->id();
        // $table->string('username_kana');
        // $table->string('first_name_kana');
        // $table->string('last_name_kana');
        // $table->string('company_phone');
        // $table->string('site_url');
        // $table->boolean('is_registered');
        // $table->uuid('temp_id');
        // $table->string('password_change_id')->nullable();
        // $table->timestamp('pw_id_created_at')->nullable();
        // $table->integer('plan');
        // $table->timestamp('charged_at')->nullable();
        // $table->timestamp('not_charged_at')->nullable();
        // $table->foreignId('user_id')->constrained('staffs')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');
        // $table->timestamps();
        return [
            'id' => $this->id,
            'user_name_kana' => $this->resource->user_name_kana,
            'first_name_kana' => $this->resource->first_name_kana,
            'last_name_kana' => $this->resource->last_name_kana,
            'company_phone' => $this->resource->company_phone,
            'site_url' => $this->resource->site_url,
            'is_registered' => $this->resource->is_registered,
            'temp_id' => $this->resource->temp_id,
            'password_change_id' => $this->resource->password_change_id,
            'pw_id_created_at' => $this->resource->pw_id_created_at,
            'plan' => $this->resource->plan,
            'charged_at' => $this->resource->charged_at,
            'not_charged_at' => $this->resource->not_charged_at,
            'user_id' => $this->resource->user_id,
            'frikuJoboffers' => JobResource::collection($this->resource->frikuJoboffers),
        ];
    }
}
