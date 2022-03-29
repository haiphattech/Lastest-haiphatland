<?php

namespace App\Http\Resources\Events;

use App\Http\Resources\Categories\CategoryResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'id'        => $this->id,
            'name'      => $this->name,
            'avatar'    => env('APP_URL').$this->avatar,
            'cover'     => env('APP_URL').$this->cover,
            'slug'      => $this->slug,
            'place'     => $this->place,
            'address'   => $this->address,
            'description'=> $this->description,
            'start_time'=> Carbon::parse($this->start_time)->format('H:i d-m-Y'),
            'end_time'  => Carbon::parse($this->end_time)->format('H:i d-m-Y'),
            'cate_slug' => new CategoryResource($this->category),
            'created_at'    => Carbon::parse($this->created_at)->format('H:i d-m-Y'),
        ];
    }
}
