<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable implements JWTSubject
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
            $data = json_encode('{}');

            $models = [
                'array' => [
                    Inventory::class,
                    Bank::class,
                ],
                'static' => [
                    Skills::class,
                    Stats::class,
                    Wear::class,
                ],
            ];

            foreach ($models['array'] as $key) {
                $key::create(['user_id' => $playerId, 'data' => []]);
            }

            foreach ($models['static'] as $key) {
                $key::create(['user_id' => $playerId]);
            }
        });

        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'uuid', 'email', 'password', 'x', 'y', 'map', 'online', 'member_level', 'level', 'hp_current', 'hp_max', 'inventory', 'wear',
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
     * A player has one bank to store their items in.
     */
    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    /**
     * A player has one inventory to slot their items.
     */
    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    /**
     * A player has one set of skills to level up.
     */
    public function skills()
    {
        return $this->hasOne(Skills::class);
    }

    /**
     * A player has one set of statistics to be tracked.
     */
    public function stats()
    {
        return $this->hasOne(Stats::class);
    }

    /**
     * A player can only wear one set of items/clothes.
     */
    public function wear()
    {
        return $this->hasOne(Wear::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Eloquent Model method
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setOnline($status = true)
    {
        $this->update(['online' => $status]);
    }
}
