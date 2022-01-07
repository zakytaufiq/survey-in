<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisFasos extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded = ['id'];

    // public function dataSurvey()
    // {
    //     return $this->belongsTo(DataSurvey::class, 'fa);
    // }
    public function fasos()
    {
        return $this->hasMany(Fasos::class, 'jenis_fasos_id');
    }
}
