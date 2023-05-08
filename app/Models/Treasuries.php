<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Treasuries extends Model
{
  protected $table="treasuries";
  protected $fillable=[
 'name','is_master','last_isal_exchange','last_isal_collect','created_at','updated_at','added_by','updated_by','com_code','date','active'
    ];
}
