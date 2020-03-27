<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UtilityTrait;

use App\Repositories\PublishedTicket\PublishedTicketRepository;
use App\Services\GetPublishedTicketListService;
use App\Services\GetPublishedTicketAllService;

use Illuminate\Http\Request;

class PublishedTicketController extends Controller
{
    use UtilityTrait;

    public function list (
        PublishedTicketRepository $repos,
        GetPublishedTicketListService $service,
        Request $request
    )
    {
        $data = $service( $repos );
        return view('PublishedTicket.list', [
            'body' => $data['body'],
            'titles' => $data['titles'],
            'paginator' => $data['paginator'],
        ]);
    }
    public function download_csv (
        PublishedTicketRepository $repos,
        GetPublishedTicketAllService $service
    )
    {
        $data = $service( $repos );
        $fileName = 'published_ticket_list_'. date('Ymd_Hi'). '.csv';
        return $this->createCsvResponse($data['body'], $data['titles'], $fileName);
    }
}
