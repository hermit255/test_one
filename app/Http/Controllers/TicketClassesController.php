<?php

namespace App\Http\Controllers;

use App\Repositories\TicketClass\TicketClassRepository;
use App\Services\GetTicketClassListService;
use App\Services\GetTicketClassService;
use App\Services\CreateTicketClassService;
use App\Services\SaveTicketClassService;
use App\Services\ModRequestService;

use Illuminate\Http\Request;

class TicketClassesController extends Controller
{
    public function list (
        TicketClassRepository $repos,
        GetTicketClassListService $service
    )
    {
        $data = $service( $repos );
        return view('TicketClass.list', [
            'body' => $data['body'],
            'titles' => $data['titles'],
            'paginator' => $data['paginator'],
        ]);
    }
    public function create (
        TicketClassRepository $repos,
        CreateTicketClassService $service
    )
    {
        $data = $service($repos);
        return view('TicketClass.edit', [
            'body' => $data['body'],
            'titles' => $data['titles'],
        ]);
    }
    public function edit (
        int $ticketClassId = null,
        TicketClassRepository $repos,
        GetTicketClassService $service
    )
    {
        $data = $service($ticketClassId, $repos);
        return view('TicketClass.edit', [
            'body' => $data['ticketClass'],
            'titles' => $data['titles'],
        ]);
    }

    public function createConfirm (
        Request $request,
        ModRequestService $service
    )
    {
        $data = $service( $request->all() );
        return view('TicketClass.editConfirm', [
            'params' => $data['params'],
            'titles' => $data['titles'],
        ]);
    }

    public function editConfirm (
        Request $request,
        ModRequestService $service
    )
    {
        $data = $service($request);
        return view('TicketClass.editConfirm', [
            'params' => $data['params'],
            'titles' => $data['titles'],
        ]);
    }
    public function save (
        Request $request,
        TicketClassRepository $repos,
        SaveTicketClassService $service
    )
    {
        $service( $request->all(), $repos );
        return redirect()->action('TicketClassesController@list');
    }
}
