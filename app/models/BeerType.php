<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BeerType extends Model
{
    public const TABLE_NAME = 'beer_types';
    public const ID = 'id';
    public const NAME = 'name';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::NAME
    ];

    public function beers()
    {
        return $this->belongsTo(Beer::class, self::ID,  Beer::TYPE);
    }
}
