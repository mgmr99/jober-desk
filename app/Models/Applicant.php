<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table = 'applicants';
    protected $fillable = [
        'user_id',
        'job_id',
        'name',
        'email',
        'address',
        'contact',
        'resume',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    } 

    public function jobs()
    {
        return $this->belongsToMany(Job::class,'applicants','user_id','job_id');
    }
    
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
    }
}
