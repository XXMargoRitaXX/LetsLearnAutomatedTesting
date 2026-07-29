<?php

namespace LetsLearnAutomatedTesting\Tests;

use PHPUnit\Framework\TestCase;

use function LetsLearnAutomatedTesting\Players\createPlayer;
use function LetsLearnAutomatedTesting\Players\deletePlayer;
use function LetsLearnAutomatedTesting\Players\getPlayer;
use function LetsLearnAutomatedTesting\Players\listOfPlayers;
use function LetsLearnAutomatedTesting\Players\updatePlayer;

/* Хуки (англ. hook – крюк, ловушка; подцепить, поймать) – 
специальные методы, вызываемые фреймворком на определенные события. */

class PlayersTest extends TestCase
{
    private array $players;

    // setUp() - автоматически вызывается перед каждым тестом
    protected function setUp(): void
    {
        $this->players = [
            'Player1' => ['score' => '988'],
            'Player2' => ['score' => '1201'],
        ];
    }

    public function testGetPlayer(): void
    {
        $player = getPlayer($this->players, 'Player1');
        $this->assertEquals('988', $player['score']);
    }

    public function testGetWrongPlayer(): void
    {
        $player = getPlayer($this->players, 'Player0');
        $this->assertNull($player);
    }

    public function testCreatePlayerWithScore(): void
    {
        $result = createPlayer($this->players, 'Player3', 5);

        $this->assertTrue($result);
        $this->assertArrayHasKey('Player3', $this->players);
        $this->assertEquals(
            ['score' => 5],
            $this->players['Player3']
        );
    }

    public function testCreatePlayerWithoutScore(): void
    {
        $result = createPlayer($this->players, 'Player3');

        $this->assertTrue($result);
        $this->assertArrayHasKey('Player3', $this->players);
        $this->assertEquals(
            ['score' => 0],
            $this->players['Player3']
        );
    }

    public function testCreateDuplicatePlayer(): void
    {
        createPlayer($this->players, 'Player3', 5);
        $result = createPlayer($this->players, 'Player3', 5);

        $this->assertFalse($result);
        $this->assertArrayHasKey('Player3', $this->players);
    }

    public function testUpdatePlayer(): void
    {
        $result = updatePlayer($this->players, 'Player2', 1250);

        $this->assertTrue($result);
        $this->assertEquals(1250, $this->players['Player2']['score']);
    }

    public function testUpdateNotExistsPlayer(): void
    {
        $result = updatePlayer($this->players, 'Player0', 5000);
        $this->assertFalse($result);
    }

    public function testDeletePlayer(): void
    {
        $result = deletePlayer($this->players, 'Player1');

        $this->assertTrue($result);
        $this->assertArrayNotHasKey('Player1', $this->players);
    }

    public function testDeleteNotExistsPlayer(): void
    {
        $result = deletePlayer($this->players, 'Player0');
        $this->assertFalse($result);
    }

    public function testListOfPlayers(): void
    {
        $expectedList = [
            ['nickname' => 'Player1', 'score' => 988],
            ['nickname' => 'Player2', 'score' => 1201],
        ];
        $result = listOfPlayers($this->players);

        $this->assertEquals($expectedList, $result);
    }

    public function testListOfEmptyPlayers(): void
    {
        $expectedList = [];
        $result = listOfPlayers([]);

        $this->assertEquals($expectedList, $result);
    }
}
