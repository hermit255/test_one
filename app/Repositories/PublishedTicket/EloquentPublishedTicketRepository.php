<?php

namespace App\Repositories\PublishedTicket;

use App\Models\PublishedTicket;

use App\Repositories\UtilityTrait;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EloquentPublishedTicketRepository implements PublishedTicketRepository
{
    use UtilityTrait;

    private $modelName = PublishedTicket::class;

    function getAll(): Collection
    {
        /* dbから対象データを取得 */
        $model = new $this->modelName;
        $paginator = $model->with(['ticket_class'])->orderBy('id')->get();
        return $paginator;
    }
    /* 一覧データ取得
     * @return Illuminate\Pagination\LengthAwarePaginator カラム名:値の構造を持つ標準クラスオブジェクトの配列
     */
    function getPage( int $perPage ): LengthAwarePaginator
    {
        /* dbから対象データを取得 */
        $model = new $this->modelName;
        $paginator = $model->with(['ticket_class'])->orderBy('id')->paginate( $perPage );
        return $paginator;
    }
    /* 新規データ保存
     * @array $params POSTパラメータ ticket_classテーブルのカラム名:値の連想配列
     */
    function getById(int $id): object
    {
        /* dbから対象データを取得 */
        $model = new $this->modelName;
        $array = $model->with('ticket_type')->find($id)->toArray();
        $object = $this->convertToObject( $array );
        return $object;
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