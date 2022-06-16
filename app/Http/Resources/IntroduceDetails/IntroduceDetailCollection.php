<?php

namespace App\Http\Resources\IntroduceDetails;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IntroduceDetailCollection extends ResourceCollection
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
            'title'      => $this->title,
            'avatar'     => $this->avatar,
            'description'=> $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
