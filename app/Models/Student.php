<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }


    public function semester()
    {
        return $this->hasMany(Semester::class);
    }
}
