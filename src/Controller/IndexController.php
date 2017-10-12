<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\CPanel\Doctrine\Controller;

use MSBios\CPanel\Doctrine\Mvc\Controller\AbstractLazyActionController;
use MSBios\Voting\CPanel\Controller\IndexController as DefaultIndexController;
use MSBios\Voting\Resource\Doctrine\Entity\Poll;

/**
 * Class IndexController
 * @package MSBios\Voting\CPanel\Doctrine\Controller
 */
class IndexController extends AbstractLazyActionController
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->setObjectPrototype(new Poll);
    }

    public function getResourceId()
    {
        return DefaultIndexController::class;
    }
}
