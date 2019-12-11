<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $guarded = ['*'];

    const STATUS_DONE  = 1;
    const STATUS_WATING = 0;

    protected $status = [
        1 => [
            'name'  => 'Đã xử lí',
            'class' => 'label-success'
        ],
        0 => [
            'name'  => 'Chờ xử lí',
            'class' => 'label-default'
        ],
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->tr_status, '[N\A]');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tr_user_id');
    }
}
