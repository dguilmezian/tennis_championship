<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_can_create_player()
    {
        $player = Player::factory()->create([
            'name' => 'John Doe',
            'skill_level' => 80,
            'gender' => 1,
            'velocity' => 75,
            'strength' => 85,
            'reaction' => 0,
        ]);

        $this->assertInstanceOf(Player::class, $player);
        $this->assertEquals('John Doe', $player->name);
        $this->assertEquals(80, $player->skill_level);
        $this->assertEquals(1, $player->gender);
        $this->assertEquals(75, $player->velocity);
        $this->assertEquals(85, $player->strength);
        $this->assertEquals(0, $player->reaction);
    }

    public function test_can_update_player()
    {
        $player = Player::factory()->create();

        $data = [
            'name' => 'Jane Doe',
            'skill_level' => 90,
            'gender' => 0,
            'velocity' => 80,
            'strength' => 90,
            'reaction' => 10,
        ];

        $player->update($data);

        $this->assertInstanceOf(Player::class, $player);
        $this->assertEquals('Jane Doe', $player->name);
        $this->assertEquals(90, $player->skill_level);
        $this->assertEquals(0, $player->gender);
        $this->assertEquals(80, $player->velocity);
        $this->assertEquals(90, $player->strength);
        $this->assertEquals(10, $player->reaction);
    }

    public function test_can_delete_player()
    {
        $player = Player::factory()->create();

        $this->assertTrue($player->delete());
    }
}
