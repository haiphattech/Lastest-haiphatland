<?php

namespace App\Http\Resources\Menus;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'key'           => $this->key,
            'data'          => unserialize($this->data),
            'status'        => $this->status,
            'lang'          => $this->lang,
            'parent_lang'   => $this->parent_lang,
            'created_at'    => Carbon::parse($this->created_at)->format('H:i d-m-Y'),
        ];
    }
}
