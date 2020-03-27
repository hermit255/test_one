<?php

namespace App\Services;

use  App\Repositories\PublishedTicket\PublishedTicketRepository;

use Illuminate\Support\Collection;

class GetPublishedTicketAllService
{
    private $perPage = 5;

    private $attributes = [
        'id' => ['title' => 'チケットシリアル', 'format' => '%d'],
        'ticket_class' => ['title' => 'チケット名', 'format' => '%d'],
        'available_from' => ['title' => '有効期限()', 'format' => 'Y/m/d'],
        'available_to' => ['title' => '有効期限()', 'format' => 'Y/m/d'],
        'purchaser' => ['title' => '購入者名', 'format' => '%s'],
        'owner' => ['title' => '所有者名', 'format' => '%s'],
        'purchased_at' => ['title' => '購入日時', 'format' => 'Y/m/d'],
        'used_at' => ['title' => '使用日時', 'format' => 'Y/m/d'],
        'branch_used_at' => ['title' => '使用店舗名', 'format' => '%s'],
        'download_status' => ['title' => 'ダウンロードステータス', 'format' => '%d'],
        'downloaded_at' => ['title' => 'ダウンロード日時', 'format' => 'Y/m/d'],
        'tel' => ['title' => '緊急連絡先', 'format' => '%s'],
    ];
    /* @param PublishedTicketRepository $repos 発行済チケットデータ
    /* @return array< $data 発行済チケットデータ
     */
    public function __invoke (PublishedTicketRepository $repos): array {
        $all = $repos->getAll();
        return [
            'body' => $this->getTableData( $all ),
            'titles' => $this->getTableHeader(),
        ];
    }
    /* カラムごとのフォーマットを取得する
    /* @return array<string> $return カラム物理名:フォーマット文字列の連想配列
     */
    private function getFormat (): array {
        foreach ( $this->attributes as $key => $properties ) {
            $return[$key] = $properties['format'];
        }
        return $return;
    }
    /* テーブルヘッダを取得する
    /* @return array<string> $return カラム物理名:論理名の連想配列
     */
    private function getTableHeader (): array {
        foreach ( $this->attributes as $key => $properties ) {
            $return[$key] = $properties['title'];
        }
        return $return;
    }
    /* リポジトリから取得したデータをテーブルように加工して返す
     * @param Illuminate\Support\Collection $data 発行済みチケットオブジェクトの配列(未成型)
    /* @return array<object> $return 発行済みチケットオブジェクトの配列(成型後)
     */
    private function getTableData ( Collection $data ): array {
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
     * @param object $row 発行済みチケットオブジェクト(未成型)
     * @param array $format カラム物理名:フォーマット文字列の連想配列
     */
    private function formatTableData ( object $row, array $format ): object {
        $return = new \stdClass;
        /* 同書式の処理をコピペできるように変数$keyを挟む */
        $key = 'id';
        $return->$key = $row->$key;
        $key = 'ticket_class';
        $return->$key = $row->ticket_class->name ?? 'no-data';
        $key = 'available_from';
        $return->$key = date($row->ticket_class->available_from, strtotime($row->ticket_class->available_from));
        $key = 'available_to';
        $return->$key = date($row->ticket_class->available_to, strtotime($row->ticket_class->available_to));
        $key = 'purchaser';
        $return->$key = $row->$key->name;
        $key = 'owner';
        $return->$key = $row->$key->name;
        $key = 'purchased_at';
        $return->$key = date($format[$key], strtotime($row->$key));
        $key = 'used_at';
        $return->$key = date($format[$key], strtotime($row->$key));
        $key = 'branch_used_at';
        $return->$key = $row->$key->name;
        $key = 'download_status';
        $return->$key = $row->$key ? "済" : "未";
        $key = 'downloaded_at';
        $return->$key = date($format[$key], strtotime($row->$key));
        $key = 'tel';
        $return->$key = $row->$key;
        return $return;
    }
}