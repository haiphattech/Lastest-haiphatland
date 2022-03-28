<?php

namespace App\Http\Resources\Activies;

use App\Http\Resources\Categories\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivetyResource extends JsonResource
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
            'slug'          => $this->slug,
            'avatar'        => env('APP_URL').$this->avatar,
            'description'   => $this->description,
            'content'       => $this->content,
            'display_home'  => $this->display_home,
            'status'        => $this->status,
            'lang'          => $this->lang,
            'parent_lang'   => $this->parent_lang,
            'category'      => new CategoryResource($this->category)
        ];
    }
}
