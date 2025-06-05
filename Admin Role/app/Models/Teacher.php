<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Teacher extends Model
{
    use SoftDeletes;

    protected $table = 'teachers';
    protected $primaryKey = 'teacher_id';
    protected $fillable = [
        'teacher_name',
        'teacher_nik',
        'teacher_specialization',
        'teacher_position',
        'teacher_email',
        'teacher_phone',
        'teacher_photo',
        'teacher_password',
    ];
    protected $hidden = [
        'teacher_password',
        'remember_token',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    public $timestamps = true;
    public function setTeacherPasswordAttribute($value)
    {
        $this->attributes['teacher_password'] = Hash::make($value);
    }
    public function getAuthPassword()
    {
        return $this->teacher_password;
    }
}
