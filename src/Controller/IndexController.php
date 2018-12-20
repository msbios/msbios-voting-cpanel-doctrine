<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\CPanel\Doctrine\Controller;

use MSBios\CPanel\Doctrine\Mvc\Controller\AbstractActionController;
use MSBios\Voting\CPanel\Controller\IndexController as DefaultIndexController;
use MSBios\Voting\Resource\Doctrine\Entity\Poll;

/**
 * Class IndexController
 * @package MSBios\Voting\CPanel\Doctrine\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getResourceId()
    {
        return DefaultIndexController::class;
    }

    /**
     * @inheritdoc
     *
     * @return mixed|Poll
     */
    protected static function factory()
    {
        return new Poll;
    }
}
