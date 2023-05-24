<?php

namespace App;

use App\Player;

class TennisMatch
{
    protected $player1;
    protected $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }
    public function score()
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader()->name;
        };

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return "{$this->pointsToTerm($this->player1->points)}-{$this->pointsToTerm($this->player2->points)}";
    }

    public function leader()
    {
        return $this->player1->points > $this->player2->points ? $this->player1 : $this->player2;
    }

    public function isDeuce()
    {
        return $this->canbeWon() && $this->player1->points === $this->player2->points;
    }

    public function hasAdvantage()
    {
        if (!$this->canbeWon()) {
            return false;
        }

        return !$this->isDeuce();
    }

    public function pointTo(Player $player)
    {
        return $player->score();
    }

    public function hasWinner()
    {
        if (((max($this->player1->points, $this->player2->points) >= 4)) && (abs($this->player1->points - $this->player2->points) >= 2)) {
            return true;
        }
    }

    public function pointsToTerm($points)
    {
        return match ($points) {
            0 => 'love',
            1 => 'fifteen',
            2 => 'thirty',
            3 => 'forty'
        };
    }

    public function canbeWon()
    {
        return $this->player1->points >= 3 && $this->player2->points >= 3;
    }
}
