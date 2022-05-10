<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'candidates';
    protected $fillable = [
        'fullname',
        'phone',
        'email',
        'url_cv',
        'introduce',
        'created_by',
        'recruit_id',
    ];
    public function langs()
    {
        return $this->belongsTo(Language::class, 'lang', 'key');
    }
    public function recruit()
    {
        return $this->belongsTo(Recruit::class, 'recruit_id');
    }
}
