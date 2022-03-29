<?php

namespace App\Http\Resources\Categories;

use App\Http\Resources\Images\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            "id"            => $this->id,
            "name"          => $this->name,
            "slug"          => $this->slug,
            "cover"         => $this->cover ? env('APP_URL').$this->cover : '',
            'images'        => ImageResource::collection($this->images),
            "description"   => $this->description,
            "parent_id"     => $this->parent_id,
            "serial"        => $this->serial,
            "lang"          => $this->lang,
            "parent_lang"   => $this->parent_lang,
            "type"          => $this->type,
            "status"        => $this->status,
            "noi_bat"       => $this->noi_bat,
        ];
    }
}
