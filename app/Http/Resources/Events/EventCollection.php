<?php

namespace App\Http\Resources\Events;

use App\Http\Resources\Categories\CategoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
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
            'id'        => $this->id,
            'name'      => $this->name,
            'avatar'    => env('APP_URL').$this->avatar,
            'cover'     => env('APP_URL').$this->cover,
            'slug'      => $this->slug,
            'place'     => $this->place,
            'address'   => $this->address,
            'description'=> $this->description,
            'start_time'=> date('H:i d-m-Y', strtotime($this->start_time)),
            'end_time'  => date('H:i d-m-Y', strtotime($this->end_time)),
            'cate_slug' => new CategoryResource($this->category),
        ];
    }
}
