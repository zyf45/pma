<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipPosition extends Model
{

    protected $fillable = ['employer_id','title', 'content', 'major', 'major', 'photo'];

    //获取拥有此实习岗位的雇主
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
