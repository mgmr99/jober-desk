<?php

namespace App\Models;

use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model 
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'title',
        'company_name',
        'logo',
        'address',
        'salary',
        'description',
        'deadline',
        'type',
        'designation',
        'experience',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('salary', 'LIKE', "%{$search}%")
                    ->orWhere('designation', 'LIKE', "%{$search}%")
                    ->orWhere('experience', 'LIKE', "%{$search}%")
                    ->orWhere('deadline', 'LIKE', "%{$search}%")
                    ->orWhere('type', 'LIKE', "%{$search}%")
                    ->orWhere('company_name', 'LIKE', "%{$search}%");
            });
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // Check if 'deadline' exists in $attributes
        if (array_key_exists('deadline', $this->attributes)) {
            $this->attributes['deadline'] = date('Y-m-d', strtotime($this->attributes['deadline']));
            // Check if 'deadline' is set and less than current date
            if (!empty($this->attributes['deadline']) && $this->attributes['deadline'] < date('Y-m-d')) {
                $this->attributes['status'] = 0;
            } else {
                $this->attributes['status'] = 1;
            }
        }
    }

}
