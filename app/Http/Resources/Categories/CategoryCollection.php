<?php

namespace App\Http\Resources\Categories;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
            "id"            => $this->id,
            "name"          => $this->name,
            "slug"          => $this->slug,
            "cover"         => $this->cover ? env('APP_URL').$this->cover : '',
            'images'        => $this->images,
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
