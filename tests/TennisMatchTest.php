<?php

use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{

    /**
    @dataProvider scores
     */
    public function test_it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch(
            $player1 = new Player('John'),
            $player2 = new Player('Ama'));
        for ($i = 0; $i < $playerOnePoints; $i++) {
            $player1->score();
        }
        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $player2->score();
        }
        $this->assertEquals($score, $match->score());
    }

    public static function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [3, 0, 'forty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [4, 0, 'Winner: John'],
            [4, 3, 'Advantage: John'],
            [3, 4, 'Advantage: Ama'],
            [0, 4, 'Winner: Ama'],

        ];
    }
}
