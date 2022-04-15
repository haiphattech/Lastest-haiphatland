<?php

namespace App\Http\Resources\Investors;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InvestorCollection extends ResourceCollection
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
            'name'   => $this->name_company,
            'avatar' => $this->avatar  ? env('APP_URL').$this->avatar : '',
            'phone' => $this->phone,
            'fax' => $this->fax,
            'email' => $this->email,
            'address' => $this->address,
            'description' => $this->description,
        ];
    }
}
