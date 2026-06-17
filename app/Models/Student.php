<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'email', 'phone', 'birth_date', 'classroom_id'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class)->withTrashed();
    }
}
