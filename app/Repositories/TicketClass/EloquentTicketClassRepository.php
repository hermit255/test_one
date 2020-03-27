<?php

namespace App\Repositories\TicketClass;

use App\Models\TicketClass;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\UtilityTrait;

class EloquentTicketClassRepository implements TicketClassRepository
{
    use UtilityTrait;

    private $modelName = TicketClass::class;
    /* 一覧データ取得
     * @return Illuminate\Pagination\LengthAwarePaginator
    */
    function getPage( int $perPage ): LengthAwarePaginator
    {
        /* dbから対象データを取得 */
        $model = new $this->modelName;
        $paginator = $model->with(['ticket_type', 'rental_type'])->orderBy('seq')->paginate( $perPage );
       // $paginator = $this->convertPaginatorItemsToStdObj();
        return $paginator;
    }
    /* ID指定でデータ取得(編集画面で使用)
     * @param int $id ticket_classesテーブルでのID
     * @return object カラム名:値の構造を持つ標準クラスオブジェクト
     */
    function getById(int $id): object
    {
        /* dbから対象データを取得 */
        $model = new $this->modelName;
        $object = $model->with('ticket_type')->find($id);
        return $object;
    }
    function create(): object {
        return new $this->modelName;
    }
    /* 新規データ保存
     * @array $params POSTパラメータ ticket_classesテーブルのカラム名:値の連想配列
     */
    function store( array $params ): void
    {
        if ( isset( $params['id'] ) ) throw new \Exception("新規作成時にIDは不要です");
        $model = new $this->modelName;
        $model->fill( $params );
        $model->save();
    }
    /* 既存データ更新
     * @array $params POSTパラメータ ticket_classesテーブルのカラム名:値の連想配列
     */
    function update( array $params ): void
    {
        try {
            $model = ($this->modelName)::find( $params['id'] );
            if ( empty( $model ) ) throw new \Exception("更新先のIDがありません");
        } catch ( \Exception $e ) {
            throw $e;
        }
        $model->fill( $params );
        $model->save();
    }
    /* Modelへの保存を新規と更新で共通化した処理
     * @return array<string> フォーマット文字列の配列 ex. ["%s", "Y/m/d"]
     */
    private function save( array $params ): void
    {
        $model = new $this->modelName;
        $model->updateOrCreate(['id' => ($params->id ?? 100)], $params);
    }
}