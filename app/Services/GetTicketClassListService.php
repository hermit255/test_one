<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

use  App\Repositories\TicketClass\TicketClassRepository;

class GetTicketClassListService
{
    private $perPage = 5;

    private $attributes = [
        'id' => ['title' => '商品ID', 'format' => '%s'],
        'seq' => ['title' => '表示順', 'format' => '%d'],
        'name' => ['title' => '商品名', 'format' => null],
        'ticket_type' => ['title' => 'チケット種別', 'format' => '%s'],
        'rental_type' => ['title' => 'レンタル', 'format' => '%s'],
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
        /* 例: "2020/01/01: 01:01:01" */
        // 'created_at' => ['title' => '作成日時', 'format' => 'Y/m/d H:i:s'],
        // 'updated_at' => ['title' => '更新日時', 'format' => 'Y/m/d H:i:s'],
    ];
    public function __invoke ( TicketClassRepository $repos ) {
        $paginator = $repos->getPage( $this->perPage );
        return [
            'body' => $this->getTableData( $paginator ),
            'titles' => $this->getTableHeader(),
            'paginator' => $paginator,
        ];
    }
    /* テーブルフォーマットを取得する
     */
    private function getFormat () {
        foreach ( $this->attributes as $key => $properties ) {
            $return[$key] = $properties['format'];
        }
        return $return;
    }
    /* テーブルヘッダを取得する
     */
    private function getTableHeader () {
        foreach ( $this->attributes as $key => $properties ) {
            $return[$key] = $properties['title'];
        }
        return $return;
    }
    /* テーブルデータを取得する
     * 柔軟性を持たせるためにページごとの処理は泥臭く書く方針
     * @param array $data
     */
    private function getTableData ( LengthAwarePaginator $data ): array {
        $format = $this->getFormat();
        /* 必要な行だけを再格納+書式調整する */
        $return = [];
        foreach ( $data as $row ) {
            $return[] = $this->formatTableData( $row, $format );
        }
        return $return;
    }
    /* テーブルデータを取得する
     * 柔軟性を持たせるためにページごとの処理は泥臭く書く方針
     * @param array $data
     */
    private function formatTableData ( object $row, array $format ): object {
        $return = new \stdClass;
        /* 同書式の処理をコピペできるように変数$keyを挟む */
        $key = 'id';
        $return->$key = $row->$key;
        $key = 'seq';
        $return->$key = $row->$key;
        $key = 'name';
        $return->$key = $row->$key;
        $key = 'ticket_type_id';
        /* チケット種別はIDから名前に置き換える */
        $return->ticket_type = $row->ticket_type->name;
        /* レンタルはIDから名前に置き換える */
        $return->rental_type = $row->rental_type->name;
        $key = 'original_price';
        $return->$key = sprintf($format[$key], number_format($row->$key));
        $key = 'discount_price';
        $return->$key = sprintf($format[$key], number_format($row->$key));
        $key = 'number_per_package';
        $return->$key = sprintf($format[$key], number_format($row->$key));
        $key = 'available_from';
        $return->$key = date($format[$key], strtotime($row->$key));
        $key = 'available_to';
        $return->$key = date($format[$key], strtotime($row->$key));
        $key = 'on_sale_from';
        $return->$key = date($format[$key], strtotime($row->$key));
        $key = 'on_sale_to';
        $return->$key = date($format[$key], strtotime($row->$key));
        // $key = 'created_at';
        // $return->$key = date($format[$key], strtotime($row->$key));
        // $key = 'updated_at';
        // $return->$key = date($format[$key], strtotime($row->$key));
        return $return;
    }
}