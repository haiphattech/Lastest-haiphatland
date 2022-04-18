<?php

namespace App\Http\Resources\Journals;

use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Images\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JournalResource extends JsonResource
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
            'list_pages'    => ImageResource::collection($this->images),
            'category'      => new CategoryResource($this->category)
        ];
    }
}
