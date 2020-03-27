<?php

namespace App\Repositories\TicketClass;

use Illuminate\Pagination\LengthAwarePaginator;

interface TicketClassRepository
{
    /* 一覧データ取得
     * @return array<object> カラム名:値の構造を持つ標準クラスオブジェクトの配列
    */
    function getPage( int $perPage ): LengthAwarePaginator;
    /* ID指定でデータ取得(編集画面で使用)
     * @param int $id ticket_classesテーブルでのID
     * @return object カラム名:値の構造を持つ標準クラスオブジェクト
     */
    function getById(int $id): object;
    /* 新規データ作成
     * @return object TicketClass
     */
    function create(): object;
    /* 新規データ保存
     * @array $params POSTパラメータ ticket_classesテーブルのカラム名:値の連想配列
     */
    function store( array $params ): void;
    /* 既存データ更新
     * @array $params POSTパラメータ ticket_classesテーブルのカラム名:値の連想配列
     */
    function update( array $params ): void;
}