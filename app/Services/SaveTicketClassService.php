<?php

namespace App\Services;

use  App\Repositories\TicketClass\TicketClassRepository;

class SaveTicketClassService
{
    public function __invoke (Array $params, TicketClassRepository $ticketClass) {
        unset($params['_token']);
        if ( empty($params['id']) ) {
            $ticketClass->store($params);
        } else {
            $ticketClass->update($params);
        }
    }
}