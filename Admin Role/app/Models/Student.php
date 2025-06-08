<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    use SoftDeletes;

    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'student_name',
        'student_nim',
        'student_specialization',
        'student_class',
        'student_major',
        'student_email',
        'student_phone',
        'student_photo',
        'student_password',
    ];
    protected $hidden = [
        'student_password',
        'remember_token',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    public $timestamps = true;

    public function getAuthPassword()
    {
        return $this->student_password;
    }

    public function setStudentPasswordAttribute($value)
    {
        $this->attributes['student_password'] = Hash::make($value);
    }
}
