<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\Categories\CategoryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'avatar' => $this->avatar,
            'cover' => $this->cover,
            'video' => $this->video,
            'category' => new CategoryResource($this->category)
        ];
    }
}
