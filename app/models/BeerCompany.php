<?php

namespace App\models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * app\models\BeerCompany
 *
 * @property int $id
 * @property string $name
 * @method static Builder|BeerCompany newModelQuery()
 * @method static Builder|BeerCompany newQuery()
 * @method static Builder|BeerCompany query()
 * @mixin \Eloquent
 */

class BeerCompany extends Model
{
    public const TABLE_NAME = 'beer_producers';
    public const ID = 'id';
    public const NAME = 'name';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::NAME
    ];
    public function beers()
    {
        return $this->belongsTo(Beer::class, self::ID,  Beer::COMPANY);
    }
}
