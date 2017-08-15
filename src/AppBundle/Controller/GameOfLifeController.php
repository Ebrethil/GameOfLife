<?php

namespace AppBundle\Controller;

use AppBundle\GameManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class GameOfLifeController
 * @package AppBundle\Controller
 */
class GameOfLifeController extends Controller
{
    private $gameManger;

    /**
     * DefaultController constructor.
     * @param $gameManger
     */
    public function __construct(GameManager $gameManger)
    {
        $this->gameManger = $gameManger;
    }


    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        $board = $this->gameManger->manage();
        return $this->render('', array('name' => $name));



        //TODO: write gameState//LivingCells as JSON in Entity Obj.
    }
}
