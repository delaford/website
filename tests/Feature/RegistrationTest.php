<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected $user = [];

    public function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }

    /** @test */
    public function a_player_has_all_of_their_tabs_created()
    {
        $this->assertNotNull($this->user->bank);
        $this->assertNotNull($this->user->inventory);
        $this->assertNotNull($this->user->skills);
        $this->assertNotNull($this->user->stats);
        $this->assertNotNull($this->user->wear);
    }

    /** @test */
    public function a_player_can_access_to_their_tabs()
    {
        $this->assertEquals($this->user->bank->user_id, $this->user->id);
        $this->assertEquals($this->user->inventory->user_id, $this->user->id);
        $this->assertEquals($this->user->skills->user_id, $this->user->id);
        $this->assertEquals($this->user->bank->user_id, $this->user->id);
        $this->assertEquals($this->user->stats->user_id, $this->user->id);
        $this->assertEquals($this->user->wear->user_id, $this->user->id);
    }

    /** @test */
    public function a_player_has_their_information_created()
    {
        $this->assertDatabaseHas('users', [
            'id'           => $this->user->id,
            'username'     => $this->user->username,
            'x'            => 14,
            'y'            => 108,
            'map'          => 1,
            'online'       => 0,
            'member_level' => 1,
            'level'        => 1,
            'hp_current'   => 10,
            'hp_max'       => 10,
        ]);
    }

    /** @test */
    public function a_player_has_their_wear_created()
    {
        $this->assertDatabaseHas('wears', [
            'user_id'    => $this->user->id,
            'armor'      => null,
            'arrows_id'  => null,
            'arrows_qty' => null,
            'back'       => null,
            'feet'       => null,
            'gloves'     => null,
            'ring'       => null,
            'head'       => null,
            'left_hand'  => null,
            'right_hand' => null,
            'necklace'   => null,
        ]);
    }

    /** @test */
    public function a_player_has_their_account_stats_created()
    {
        $this->assertDatabaseHas('stats', [
            'user_id'         => $this->user->id,
            'damage_given'    => 0,
            'damage_taken'    => 0,
            'deaths'          => 0,
            'monsters_killed' => 0,
            'times_logged'    => 0,
        ]);
    }

    /** @test */
    public function a_player_has_their_bank_created()
    {
        $this->assertDatabaseHas('banks', [
            'user_id' => $this->user->id,
        ]);
    }

    /** @test */
    public function a_player_has_their_inventory_created()
    {
        $this->assertDatabaseHas('inventories', [
            'user_id' => $this->user->id,
        ]);
    }
}
