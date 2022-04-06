<?php

namespace App\Http\Resources\Recruits;

use App\Http\Resources\Categories\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RecruitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'date_end'      => $this->date_end,
            'address'       => $this->location,
            'file'          => env('APP_URL').'/file/mau-ho-so.doc',
            'category'      => new CategoryResource($this->category)
        ];
    }
}
