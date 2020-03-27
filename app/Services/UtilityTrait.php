<?php

namespace App\Services;

class GetTicketClassService
{
    /*
     * @param array<object> $body データ本体：オブジェクトが格納された配列
     * @param array<string> $headers ヘッダ：カラム名が格納された配列
     */
    public function createCSV ( array $body, array $header ) {
        $csv = fopen('php://output', 'w');
        /* ヘッダ部分の書き込み */
        if ($header)
        mb_convert_encoding('SJIS-win', 'UTF-8', $header);
        fputcsv($csv, $header);

        /* データボディ部分の書き込み */
        /* オブジェクトを想定しているので配列に変換する */
        $array_array = json_decode(json_encode($body), true);
        mb_convert_encoding('SJIS-win', 'UTF-8', $array_array);
        foreach ( $array_array as $row ) {
            fputcsv($csv, $row);
        }
        fclose($csv);
    }
}