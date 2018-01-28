<?php

namespace App\Http\Controllers\Auth;

use App\Bank;
use App\User;
use App\Wear;
use App\Stats;
use App\Skills;
use App\Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|min:1|max:15|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $player = User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);

        $playerId = $player->id;
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
            $key::create(['user_id' => $playerId, 'data' => '{}']);
        }

        foreach ($models['static'] as $key) {
            $key::create(['user_id' => $playerId]);
        }

        return $player;
    }
}
