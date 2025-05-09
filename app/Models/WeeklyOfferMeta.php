<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyOfferMeta extends Model
{
   protected $table = 'weekly_offer_meta';
   protected $fillable = [
       'text',
       'validity'
   ];
   public $timestamps = true;
}
