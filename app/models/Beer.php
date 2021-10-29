<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class Beer extends Model
{
    public const TABLE_NAME = 'beer';
    public const ID = 'id';
    public const NAME = 'name';
    public const COMPANY = 'company';
    public const TYPE = 'type';
    public const DESCRIPTION = 'description';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::NAME,
        self::COMPANY,
        self::TYPE,
        self::DESCRIPTION
    ];

    public function beerType()
    {
        return $this->hasOne(BeerType::class,  BeerType::ID, self::TYPE);
    }

    public function beerCompany()
    {
        return $this->hasMany(BeerCompany::class,  BeerCompany::ID, self::COMPANY);
    }
}
