<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $playerId = $user->id;
            $data = serialize(json_encode('{}'));

            $models = [
                'dynamic' => [
                    Bank::class,
                    Inventory::class,
                ],
                'static' => [
                    Skills::class,
                    Stats::class,
                    Wear::class
                ]
            ];

            foreach ($models['dynamic'] as $key) {
                $key::create(['user_id' => $playerId, 'data' => $data]);
            }

            foreach ($models['static'] as $key) {
                $key::create(['user_id' => $playerId]);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'x', 'y', 'map', 'online', 'member_level', 'level', 'hp_current', 'hp_max'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'online' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A player has one bank to store their items in
     */
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    /**
     * A player has one inventory to slot their items
     */
    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    /**
     * A player has one set of skills to level up
     */
    public function skills()
    {
        return $this->hasOne(Skills::class);
    }

    /**
     * A player has one set of statistics to be tracked
     */
    public function stats()
    {
        return $this->hasOne(Stats::class);
    }

    /**
     * A player can only wear one set of items/clothes
     */
    public function wear()
    {
        return $this->hasOne(Wear::class);
    }
}
