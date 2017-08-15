<?php


namespace AppBundle;

use AppBundle\Controller\GameRuleExecuter;
use AppBundle\Entity\Board;
use AppBundle\Entity\Cell;

/**
 * Class GameManager
 * @package AppBundle
 */
class GameManager
{
    private $gameRuleExecuter;
    private $board;

    /**
     * GameManager constructor.
     * @param GameRuleExecuter $gameRuleExecuter
     * @param int $boardLength
     * @param int $boardWidth
     */
    public function __construct(GameRuleExecuter $gameRuleExecuter, int $boardLength, int $boardWidth)
    {
        $this->gameRuleExecuter = $gameRuleExecuter;
        $this->board = new Board($boardLength, $boardWidth);
    }

    /**
     *
     */
    public function manage()
    {
        $cells = $this->board->cells;
        /** @var Cell $cell */
        foreach ($cells as $cell) {
            $this->gameRuleExecuter->calculateLivingStatus($cell, $this->board);
        }

        //TODO: serialize board to send it back to session
        return $this->board;
    }
}