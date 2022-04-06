<?php

namespace App\Http\Resources\Systems;

use App\Http\Resources\Categories\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SystemResource extends JsonResource
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
            'avatar'        => $this->avatar ? env('APP_URL').$this->avatar : '',
            'address'       => $this->address,
            'category'      => new CategoryResource($this->category)
        ];
    }
}
