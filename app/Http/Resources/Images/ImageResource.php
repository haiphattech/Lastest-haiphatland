<?php

namespace App\Http\Resources\Images;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'id'     => $this->id,
            'url'    => $this->url ? env('APP_URL').$this->url : '',
            'page'   => $this->page,
        ];
    }
}
