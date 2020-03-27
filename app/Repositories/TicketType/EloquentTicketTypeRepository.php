<?php

namespace App\Repositories\TicketType;

use App\Models\TicketType;
use App\Repositories\EloquentRepository;

use Illuminate\Support\Collection;

class EloquentTicketTypeRepository extends EloquentRepository implements TicketTypeRepository
{
    protected $modelName = TicketType::class;
    protected static $attributes = [
        'id' => ['jp' => 'チケット種別ID', 'format' => '%d'],
        'name' => ['jp' => 'チケット種別名', 'format' => '%s'],
        'created_at' => ['jp' => '作成日時', 'format' => 'Y/m/d H:i:s'],
        'updated_at' => ['jp' => '更新日時', 'format' => 'Y/m/d H:i:s'],
    ];
}