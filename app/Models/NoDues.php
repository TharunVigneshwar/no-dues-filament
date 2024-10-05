<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoDues extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'semester_id', 'fix_fees_detail_id', 'paying_fees', 'balance_fees', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function fees()
    {
        return $this->belongsTo(FixFeesDetail::class, 'fix_fees_detail_id');
    }
}
