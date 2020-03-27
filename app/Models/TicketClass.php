<?php

namespace App\Models;

use App\Models\TicketType;
use App\Models\RentalType;

use Illuminate\Database\Eloquent\Model;

class TicketClass extends Model
{
  protected $guarded = ['created_at'];
  function ticket_type () {
      return $this->belongsTo(TicketType::class, 'ticket_type_id');
  }
  function rental_type () {
      return $this->belongsTo(RentalType::class, 'rental_type_id');
  }
}