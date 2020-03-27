<?php

namespace App\Repositories\PublishedTicket;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface PublishedTicketRepository
{
    /* 一覧データ取得
     * @return Illuminate\Pagination\LengthAwarePaginator<object> カラム名:値の構造を持つ標準クラスオブジェクトの配列
     */
    function getPage( int $perPage ): LengthAwarePaginator;
    function getAll(): Collection;
    /* ID指定でデータ取得(編集画面で使用)
     * @param int $id ticket_classesテーブルでのID
     * @return object カラム名:値の構造を持つ標準クラスオブジェクト
     */
    function getById(int $id): object;
}