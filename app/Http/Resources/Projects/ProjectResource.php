<?php

namespace App\Http\Resources\Projects;

use App\Http\Resources\Categories\CategoryResource;
use App\Http\Resources\Investors\InvestorResource;
use App\Http\Resources\News\NewsResource;
use App\Http\Resources\ProjectDetails\ProjectDetailResource;
use App\Models\ProjectDetail;
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
            'avatar' => $this->avatar ? env('APP_URL').$this->avatar : '',
            'cover' => $this->cover ? env('APP_URL').$this->cover : '',
            'video' => $this->video,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'description' => $this->description,
            'province' => $this->province,
            'design' => $this->design,
            'sales_policy' => $this->sales_policy,
            'list_video' => $this->list_video,
            'quy_mo' => $this->quy_mo,
            'status_project' => isset($this->statusProject->name) ? $this->statusProject->name : '',
            'news_projects' => NewsResource::collection($this->news),
            'contents' => ProjectDetailResource::collection($this->projectDetails),
            'category' => new CategoryResource($this->category),
            'investor' => $this->investor ? new InvestorResource($this->investor) : '',
//            'manager' => $this->manager ? new InvestorResource($this->manager) : '',
            'created_at'    => $this->created_at,
        ];
    }
}
