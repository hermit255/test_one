<?php

namespace App\Models;

use App\Models\TicketClass;

use Illuminate\Database\Eloquent\Model;

class PublishedTicket extends Model
{
  protected $guarded = ['created_at'];
  function ticket_class () {
      return $this->belongsTo(TicketClass::class, 'ticket_class_id');
  }
  function purchaser () {
      return $this->belongsTo(TicketClass::class, 'user_id_purchaser');
  }
  function owner () {
      return $this->belongsTo(TicketClass::class, 'user_id_owner');
  }
  function branch_used_at () {
      return $this->belongsTo(TicketClass::class, 'branch_id_used_at');
  }
}