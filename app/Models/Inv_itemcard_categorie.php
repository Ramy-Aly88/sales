<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_itemcard_categorie extends Model
{
    protected $table="inv_itemcard_categories";
    protected $fillable=[
         'name','created_at','updated_at','added_by','updated_by','com_code','date','active'
      ];
}
