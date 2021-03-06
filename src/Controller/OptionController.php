<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\CPanel\Doctrine\Controller;

use Doctrine\DBAL\Query\QueryBuilder;
use MSBios\CPanel\Doctrine\Mvc\Controller\AbstractActionController;
use MSBios\Voting\CPanel\Controller\OptionController as DefaultOptionController;
use MSBios\Voting\Resource\Doctrine\Entity\Option;
use MSBios\Voting\Resource\Doctrine\Entity\Poll;
use Zend\Form\FormInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class OptionController
 * @package MSBios\Voting\CPanel\Doctrine\Controller
 */
class OptionController extends AbstractActionController
{

    /**
     * @inheritdoc
     *
     * @return mixed|Option
     */
    protected static function factory()
    {
        return new Option;
    }

    /**
     * @param MvcEvent $e
     * @return mixed
     */
    public function onDispatch(MvcEvent $e)
    {
        // TODO: Maybe move to route listener
        $e->getRouter()->setDefaultParam(
            'poll_id',
            $e->getRouteMatch()->getParam('poll_id')
        );

        return parent::onDispatch($e);
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return DefaultOptionController::class;
    }

    /**
     * @param string $alias
     * @return QueryBuilder|\Zend\Http\Response
     */
    protected function getQueryBuilder($alias = 'resource')
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = parent::getQueryBuilder('o');
        $queryBuilder->where('o.poll = :pollId');
        $queryBuilder->setParameter(':pollId', $this->params()->fromRoute('poll_id'));
        return $queryBuilder;
    }

    /**
     * @return \Zend\Http\Response|\Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        /** @var int $id */
        $id = (int)$this->params()->fromRoute('poll_id', 0);

        /** @var Object $object */
        $object = $this->getObjectManager()->find(Poll::class, $id);

        /** @var int $id */
        if (! $object) {
            return $this->redirect()->toRoute(
                'cpanel/poll',
                ['action' => 'add']
            );
        }

        return parent::indexAction();
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        /** @var FormInterface $form */
        $form = parent::getForm();
        $form->get('poll')->setValue(
            $this->params()->fromRoute('poll_id')
        );
        return $form;
    }
}
