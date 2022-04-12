<?php

namespace App\Http\Resources\Introduces;

use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\IntroduceDetails\IntroduceDetailResource;
use App\Repositories\IntroduceDetailRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class IntroduceResource extends JsonResource
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
            'id'         => $this->id,
            'title_font' => $this->title_font,
            'title'      => $this->title,
            'avatar'    => $this->avatar ? env('APP_URL').$this->avatar : '',
            'description'=> $this->description,
            'created_at' => $this->created_at,
            'cate_slug'  => new CategoryResource($this->category),
            'details'    => IntroduceDetailResource::collection($this->introduceDetails)
        ];
    }
}
