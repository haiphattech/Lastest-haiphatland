<?php

namespace App\Http\Resources\News;

use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Users\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'start'         => $this->start,
            'view'          => $this->view,
            'created_at'    => Carbon::parse($this->created_at)->format('H:i d-m-Y'),
            'created_by'    => new UserResource($this->user),
            'category'      => new CategoryResource($this->category)
        ];
    }
}
