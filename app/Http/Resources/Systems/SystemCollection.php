<?php

namespace App\Http\Resources\Systems;

use App\Http\Resources\Categories\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SystemCollection extends ResourceCollection
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
            'data' => $this->collection,

            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage()
            ],
        ];
//        return [
//            'id'            => $this->id,
//            'name'          => $this->name,
//            'avatar'        => env('APP_URL').$this->avatar,
//            'address'       => $this->address,
//            'category'      => new CategoryResource($this->category)
//        ];
    }
}
