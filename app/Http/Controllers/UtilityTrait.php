<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\StreamedResponse;

trait UtilityTrait
{
    /*
     * @param array<object> $body データ本体：オブジェクトが格納された配列
     * @param array<string> $headers ヘッダ：カラム名が格納された配列
     * @param string $fileName ダウンロードファイル名
     */
    function createCsvResponse ( array $body, array $header = null , string $fileName): StreamedResponse {
        $callback = function () use ($body, $header) {
            $csv = fopen('php://output', 'w');
            /* ヘッダ部分の書き込み */
            if ( !empty( $header )) {
                $header = mb_convert_encoding($header, 'SJIS', 'UTF-8');
                fputcsv($csv, $header);
            }
            /* データボディ部分の書き込み */
            /* オブジェクトを想定しているので配列に変換する */
             $array_array = json_decode(json_encode($body), true);
             $array_array = mb_convert_encoding($array_array, 'SJIS');
             foreach ( $array_array as $row ) {
                 fputcsv($csv, $row);
             }
            fclose($csv);
        };
        $response = response()->streamDownload($callback, $fileName);
        return $response;
    }
}