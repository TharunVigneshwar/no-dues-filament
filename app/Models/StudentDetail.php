<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'semester_id', 'fix_fees_detail_id', 'fees', 'balance_fees'];
}
