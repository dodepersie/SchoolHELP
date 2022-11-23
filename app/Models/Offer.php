<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class offer extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'offer';
  protected $primaryKey = 'id_offer';
  protected $fillable = [
    'id_request',
    'id_user',
    'ofr_remarks',
    'ofr_status',
  ];

  public function getAssistanceRequestAttribute()
  {
    return mRequest::find($this->id_request);
  }

  public function getUserAttribute()
  {
    return User::find($this->id_user);
  }

  public function getCreatedAtAttribute()
  {
    return date('d F Y', strtotime($this->attributes['created_at']));
  }
}
