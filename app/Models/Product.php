<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $guarded = ['*'];
    
    const STATUS_PUBLIC  = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    const SUGGESTION_ON = 1;
    const SUGGESTION_OFF = 0;

    const NEW_ON = 1;
    const NEW_OFF = 0;

    protected $status = [
        1 => [
            'name'  => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name'  => 'Private',
            'class' => 'label-default'
        ],
    ];

    protected $hot = [
        1 => [
            'name'  => 'Nổi bật',
            'class' => 'label-success'
        ],
        0 => [
            'name'  => 'Không',
            'class' => 'label-default'
        ],
    ];

    protected $suggestion = [
        1 => [
            'name'  => 'Gợi ý',
            'class' => 'label-success'
        ],
        0 => [
            'name'  => 'Không gợi ý',
            'class' => 'label-default'
        ],
    ];

    protected $new = [
        1 => [
            'name'  => 'Mới',
            'class' => 'label-success'
        ],
        0 => [
            'name'  => 'Cũ',
            'class' => 'label-default'
        ],
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->pro_active, '[N\A]');
    }

    public function getHot()
    {
        return array_get($this->hot, $this->pro_hot, '[N\A]');
    }

    public function getSuggestion()
    {
        return array_get($this->suggestion, $this->pro_suggestion, '[N\A]');
    }

    public function getNew()
    {
        return array_get($this->new, $this->pro_new, '[N\A]');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }
}
