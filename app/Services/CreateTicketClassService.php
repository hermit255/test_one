<?php

namespace App\Services;

use  App\Repositories\TicketClass\TicketClassRepository;

class CreateTicketClassService
{
    private $attributes = [
        'id' => ['title' => '商品ID', 'format' => '%s'],
        'seq' => ['title' => '表示順', 'format' => '%d'],
        'name' => ['title' => '商品名', 'format' => null],
        'ticket_type_id' => ['title' => 'チケット種別', 'format' => '%s'],
        'rental_type_id' => ['title' => 'レンタル', 'format' => '%s'],
        /* 例: "￥1,000" */
        'original_price' => ['title' => '価格', 'format' => "￥%s"],
        'discount_price' => ['title' => '割引価格', 'format' => "￥%s"],
        /* 例: "1,000枚" */
        'number_per_package' => ['title' => '枚数', 'format' => '%d枚'],
        /* 例: "2020/01/01" */
        'available_from' => ['title' => '利用期限(始)', 'format' => 'Y/m/d'],
        'available_to' => ['title' => '利用期限(終)', 'format' => 'Y/m/d'],
        'on_sale_from' => ['title' => '表示期限(始)', 'format' => 'Y/m/d'],
        'on_sale_to' => ['title' => '表示期限(終)', 'format' => 'Y/m/d'],
    ];
    public function __invoke (TicketClassRepository $repos): array {
        /* object $ticketClass */
        $body = $repos->create();
        $titles = [];
        foreach ( $this->attributes as $key => $properties ) {
            $titles[$key] = $properties['title'];
        }
        /* id はあるが該当レコードが無い場合は区別する（またの機会に考える） */
        return [
            /* stdClass */
            'body' => $body,
            /* stdClass */
            'titles' => $titles,
        ];
    }
}