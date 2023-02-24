<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_department extends Model
{
    use HasFactory;
    protected $table = 'user_department';
    protected $fillable = ['users_id', 'department_id'];

    public function departement()
    {
        return $this->belongsTo(department::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
