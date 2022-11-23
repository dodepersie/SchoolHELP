<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  use SoftDeletes;
  protected $primaryKey = 'id_user';
  protected $dates = ['date_of_birth'];
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'id_school',
    'staff_id',
    'username',
    'password',
    'full_name',
    'occupation',
    'date_of_birth',
    'email',
    'phone_number',
    'position',
    'role_user',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function getSchoolAttribute()
  {
    return School::find($this->id_school);
  }

  public function getTotalRequestsAttribute()
  {
    return mRequest::where('id_user',$this->id_user)->count();
  }

  public function getAgeAttribute()
  {
    $year = date_diff(date_create($this->date_of_birth), date_create('today'))->y;
//    return $year > 1 ? $year.' years old' : $year.' year old';
    return $year;
  }
}
