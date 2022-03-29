<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\Categories\CategoryResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'avatar' => env('APP_URL').$this->avatar,
            'cover' => env('APP_URL').$this->cover,
            'video' => $this->video,
            'description' => $this->description,
            'category' => new CategoryResource($this->category),
            'created_at'    => Carbon::parse($this->created_at)->format('H:i d-m-Y'),
        ];
    }
}
