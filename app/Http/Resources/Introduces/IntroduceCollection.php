<?php

namespace App\Http\Resources\Introduces;

use App\Http\Resources\Categories\CategoryResource;
use App\Repositories\IntroduceDetailRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IntroduceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
            'serial'    => $this->serial,
            'created_at' => $this->created_at,
            'cate_slug'  => new CategoryResource($this->category),
            'details'    => IntroduceDetailRepository::collection($this->introduceDetails)
        ];
    }
}
