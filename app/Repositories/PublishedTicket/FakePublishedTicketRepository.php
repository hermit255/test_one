<?php

namespace App\Repositories\PublishedTicket;

use App\Repositories\UtilityTrait;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class FakePublishedTicketRepository implements PublishedTicketRepository
{
    use UtilityTrait;

    /* 一覧データ取得
     * @return Illuminate\Pagination\LengthAwarePaginator カラム名:値の構造を持つ標準クラスオブジェクトの配列
     */
    function getPage( int $perPage ): LengthAwarePaginator
    {
        $object_1 = [
            "id" => 1,
            "ticket_class_id" => 3,
            "user_id_purchaser" => 5,
            "purchased_at" => "2006-05-29 08:50:59",
            "user_id_owner" => 3,
            "tel" => "0400-46-7443",
            "used_at" => "1993-06-14 15:54:12",
            "branch_id_used_at" => 9,
            "download_status" => 1,
            "downloaded_at" => "1982-09-18 21:45:32",
            "created_at" => "2020-03-19T10:13:43.000000Z",
            "updated_at" => "2020-03-19T10:13:43.000000Z",
            "ticket_class" => [
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
            ],
            "purchaser" => [
                "id"=> 5,
                "name"=> "犬山 猫吉",
            ],
            "owner" => [
                "id"=> 3,
                "name"=> "佐藤 猛",
            ],
            "branch_used_at" => [
                "id"=> 9,
                "name"=> "初台店",
            ],
        ];
        $object_1 = json_decode(json_encode($object_1),false);
        $object_2 = [
            "id" => 2,
            "ticket_class_id" => 2,
            "user_id_purchaser" => 6,
            "purchased_at" => "2006-05-29 08:50:59",
            "user_id_owner" => 2,
            "tel" => "0400-46-7443",
            "used_at" => "1993-06-14 15:54:12",
            "branch_id_used_at" => 8,
            "download_status" => 1,
            "downloaded_at" => "1982-09-18 21:45:32",
            "created_at" => "2020-03-19T10:13:43.000000Z",
            "updated_at" => "2020-03-19T10:13:43.000000Z",
            "ticket_class" => [
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
            ],
            "purchaser" => [
                "id"=> 6,
                "name"=> "鳥山 獅子丸",
            ],
            "owner" => [
                "id"=> 2,
                "name"=> "山田 健四郎",
            ],
            "branch_used_at" => [
                "id"=> 8,
                "name"=> "津田沼店",
            ],
        ];
        $object_2 = json_decode(json_encode($object_2),false);
        return new LengthAwarePaginator( [$object_1, $object_2], 1, 5 );
    }
    function getAll(): Collection
    {
        $object_1 = [
            "id" => 1,
            "ticket_class_id" => 3,
            "user_id_purchaser" => 5,
            "purchased_at" => "2006-05-29 08:50:59",
            "user_id_owner" => 3,
            "tel" => "0400-46-7443",
            "used_at" => "1993-06-14 15:54:12",
            "branch_id_used_at" => 9,
            "download_status" => 1,
            "downloaded_at" => "1982-09-18 21:45:32",
            "created_at" => "2020-03-19T10:13:43.000000Z",
            "updated_at" => "2020-03-19T10:13:43.000000Z",
            "ticket_class" => [
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
            ],
            "purchaser" => [
                "id"=> 5,
                "name"=> "犬山 猫吉",
            ],
            "owner" => [
                "id"=> 3,
                "name"=> "佐藤 猛",
            ],
            "branch_used_at" => [
                "id"=> 9,
                "name"=> "初台店",
            ],
        ];
        $object_1 = json_decode(json_encode($object_1),false);
        $object_2 = (object)[
            "id" => 2,
            "ticket_class_id" => 2,
            "user_id_purchaser" => 6,
            "purchased_at" => "2006-05-29 08:50:59",
            "user_id_owner" => 2,
            "tel" => "0400-46-7443",
            "used_at" => "1993-06-14 15:54:12",
            "branch_id_used_at" => 8,
            "download_status" => 1,
            "downloaded_at" => "1982-09-18 21:45:32",
            "created_at" => "2020-03-19T10:13:43.000000Z",
            "updated_at" => "2020-03-19T10:13:43.000000Z",
            "ticket_class" => [
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
            ],
            "purchaser" => [
                "id"=> 6,
                "name"=> "鳥山 獅子丸",
            ],
            "owner" => [
                "id"=> 2,
                "name"=> "山田 健四郎",
            ],
            "branch_used_at" => [
                "id"=> 8,
                "name"=> "津田沼店",
            ],
        ];
        $object_2 = json_decode(json_encode($object_2),false);
        return collect($object_1, $object_2);
    }
    /* 新規データ保存
     * @array $params POSTパラメータ ticket_classesテーブルのカラム名:値の連想配列
     */
    function getById(int $id): object
    {
        $object = [
            "id" => 1,
            "ticket_class_id" => 3,
            "user_id_purchaser" => 5,
            "purchased_at" => "2006-05-29 08:50:59",
            "user_id_owner" => 3,
            "tel" => "0400-46-7443",
            "used_at" => "1993-06-14 15:54:12",
            "branch_id_used_at" => 9,
            "download_status" => 1,
            "downloaded_at" => "1982-09-18 21:45:32",
            "created_at" => "2020-03-19T10:13:43.000000Z",
            "updated_at" => "2020-03-19T10:13:43.000000Z",
            "ticket_class" => [
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
            ],
            "purchaser" => [
                "id"=> 5,
                "name"=> "犬山 猫吉",
            ],
            "owner" => [
                "id"=> 3,
                "name"=> "佐藤 猛",
            ],
            "branch_used_at" => [
                "id"=> 9,
                "name"=> "初台店",
            ],
        ];
        return json_decode(json_encode($object),false);
    }
}