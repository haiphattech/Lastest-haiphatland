<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Language;
use App\Repositories\Support\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class LanguageRepository extends AbstractRepository
{
    public function model()
    {
        return Language::class;
    }
    public function getLanguage()
    {
        return $this->model->where('key','<>', 'vi')->get();
    }

}
