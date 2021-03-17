<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const STATUS = ['active' => 'Active', 'inactive' => 'Inactive'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'address',
        'gender',
        'hobbies',
        'city_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name . ' ' . $this->last_name);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'hobbies' => 'array'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
