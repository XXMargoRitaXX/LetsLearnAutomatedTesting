<?php

namespace LetsLearnAutomatedTesting\Players;

function createPlayer(array &$players, string $nickname, int $score = 0): bool
{
    if (array_key_exists($nickname, $players)) {
        return false;
    }

    $players[$nickname] = ['score' => $score];
    return true;
}

function getPlayer(array $players, string $nickname): ?array
{
    return $players[$nickname] ?? null;
}

function updatePlayer(array &$players, string $nickname, int $newScore): bool
{
    if (!array_key_exists($nickname, $players)) {
        return false;
    }

    $players[$nickname]['score'] = $newScore;
    return true;
}

function deletePlayer(array &$players, string $nickname): bool
{
    if (!array_key_exists($nickname, $players)) {
        return false;
    }

    unset($players[$nickname]);
    return true;
}

function listOfPlayers(array $players): array
{
    return array_map(
        function (string $nickname) use ($players): array {
            return ['nickname' => $nickname, ...$players[$nickname]];
        },
        array_keys($players)
    );
}
