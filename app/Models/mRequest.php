<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mRequest extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'request';
  protected $primaryKey = 'id_request';
  protected $dates = ['req_proposed_date',];
  protected $fillable = [
    'id_school',
    'id_user',
    'req_description',
    'req_proposed_datetime',
    'req_student_level',
    'req_no_of_student',
    'req_resource_type',
    'req_no_of_resource',
    'req_type',
    'req_status',
  ];

  public function getSchoolAttribute()
  {
    return School::find($this->id_school);
  }

  public function getAdminAttribute()
  {
    return User::find($this->id_user);
  }

  public function getTotalOfferAttribute()
  {
    return Offer::where('id_request', $this->id_request)->count();
  }

  public function getProposedDateTimeAttribute()
  {
    return date('d F Y H:i:s', strtotime($this->req_proposed_datetime));
  }

  public function getCreatedAtAttribute()
  {
    return date('d F Y', strtotime($this->attributes['created_at']));
  }
}
