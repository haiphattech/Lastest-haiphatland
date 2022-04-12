<?php

namespace App\Http\Resources\IntroduceDetails;

use Illuminate\Http\Resources\Json\JsonResource;

class IntroduceDetailResource extends JsonResource
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
            'title'      => $this->title,
            'avatar'    => $this->avatar ? env('APP_URL').$this->avatar : '',
            'description'=> $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
