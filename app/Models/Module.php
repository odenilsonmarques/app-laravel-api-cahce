<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id'];

    //metodo para relacionar um ou mais modulo a um curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
