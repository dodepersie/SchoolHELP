<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'school';
  protected $primaryKey = 'id_school';
  protected $dates = ['deleted_at'];
  protected $fillable = [
    'id_user',
    'sch_name',
    'sch_city',
    'sch_address',
  ];

  public function getAdminAttribute() {
    return User::find($this->id_user);
  }

  public function getTotalAdministratorAttribute()
  {
    return User::where(['id_school'=>$this->id_school])->count();
  }
}
