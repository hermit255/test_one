<?php

namespace App\Repositories\TicketClass;

use App\Repositories\UtilityTrait;

use Illuminate\Pagination\LengthAwarePaginator;

class FakeTicketClassRepository implements TicketClassRepository
{
    use UtilityTrait;

    /* 一覧データ取得
     * @return array<object> カラム名:値の構造を持つ標準クラスオブジェクトの配列
    */
    function getPage( int $perPage ): LengthAwarePaginator
    {
        $object_1 = [
            "id"=> 1,
            "seq"=> 1,
            "name"=> "商品名1",
            "ticket_type_id" => "2",
            "rental_type_id" => "レンタル1点",
            "original_price"=> "5500",
            "discount_price"=> "1600",
            "number_per_package"=> "2",
            "available_from"=> "2017/01/05",
            "available_to"=> "2009/10/16",
            "on_sale_from"=> "1996/05/04",
            "on_sale_to"=> "2018/07/28",
            "ticket_type" => [
                "name" => "種別2",
            ],
            "rental_type" => [
                "name" => "レンタル1点",
            ],
        ];
        $object_1 = json_decode(json_encode($object_1),false);
        $object_2 = [
            "id"=> 3,
            "seq"=> 2,
            "name"=> "商品名3",
            "ticket_type_id"=> "1",
            "rental_type_id"=> "2",
            "original_price"=> "5500",
            "discount_price"=> "1600",
            "number_per_package"=> "5",
            "available_from"=> "2017/01/05",
            "available_to"=> "2009/10/16",
            "on_sale_from"=> "1996/05/04",
            "on_sale_to"=> "2018/07/28",
            "ticket_type" => [
                "name" => "種別3",
            ],
            "rental_type" => [
                "name" => "フルレンタル",
            ],
        ];
        $object_2 = json_decode(json_encode($object_2),false);
        return new LengthAwarePaginator( [$object_1, $object_2], 1, 5 );
    }
    /* ID指定でデータ取得(編集画面で使用)
     * @param int $id ticket_classesテーブルでのID
     * @return object カラム名:値の構造を持つ標準クラスオブジェクト
     */
    function getById(int $id): object
    {
        $object = [
            "id"=> 1,
            "seq"=> 1,
            "name"=> "商品名1",
            "ticket_type_id" => "2",
            "rental_type_id" => "レンタル1点",
            "original_price"=> "5500",
            "discount_price"=> "1600",
            "number_per_package"=> "2",
            "available_from"=> "2017/01/05",
            "available_to"=> "2009/10/16",
            "on_sale_from"=> "1996/05/04",
            "on_sale_to"=> "2018/07/28",
            "ticket_type" => [
                "name" => "種別2",
            ],
            "rental_type" => [
                "name" => "レンタル1点",
            ],
        ];
        return json_decode(json_encode($object),false);;
    }
    function create(): object {
        $object = (object)[
            "id"=> "",
            "seq"=> "",
            "name"=> "",
            "ticket_type_id" => "",
            "rental_type_id" => "",
            "original_price"=> "",
            "discount_price"=> "",
            "number_per_package"=> "",
            "available_from"=> "",
            "available_to"=> "",
            "on_sale_from"=> "",
            "on_sale_to"=> "",
        ];
        return $object;
    }
    /* 新規データ保存
     * @array $params POSTパラメータ ticket_classesテーブルのカラム名:値の連想配列
     */
    function store( array $params ): void {}
    /* 既存データ更新
     * @array $params POSTパラメータ ticket_classesテーブルのカラム名:値の連想配列
     */
    function update( array $params ): void {}
    /* Modelへの保存を新規と更新で共通化した処理
     * @return array<string> フォーマット文字列の配列 ex. ["%s", "Y/m/d"]
     */
    private function save( array $params ): void {}
}