<?php

namespace App\Http\Resources\Managers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ManagerCollection extends ResourceCollection
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
            'name'   => $this->fullname,
            'position' => $this->position,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
