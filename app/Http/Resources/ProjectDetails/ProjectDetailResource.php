<?php

namespace App\Http\Resources\ProjectDetails;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDetailResource extends JsonResource
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
            'title'         => $this->title,
            'icon'          => $this->icon ? env('APP_URL').$this->icon : '',
            'content'       => $this->content,
        ];
    }
}
