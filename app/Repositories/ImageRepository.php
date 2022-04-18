<?php
namespace App\Repositories;

use App\Repositories\Support\AbstractRepository;
use App\Models\Image;

class ImageRepository extends AbstractRepository
{
    public function model(){
        return Image::class;
    }
    public function getImageByCategoryId($cate_id)
    {
        return $this->model->where('category_id', $cate_id)->orderBy('id', 'DESC')->get();
    }
    public function getImagePageByJournalId($journal_id)
    {
        return $this->model->where('journal_id', $journal_id)->orderBy('page', 'ASC')->get();
    }
}
