<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class GameOfLifeController
 * @package AppBundle\Controller
 */
class GameOfLifeController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
        /**
        gameLogicProcessor();
        outputHandler();
         **/


        //TODO: write gameState//LivingCells as JSON in Entity Obj.
    }
}
