<?php

namespace Oro\Bundle\GridBundle\Tests\Unit\Action;

use Oro\Bundle\GridBundle\Action\ActionInterface;
use Oro\Bundle\GridBundle\Action\DeleteAction;

class DeleteActionTest extends AbstractActionTestCase
{
    /**
     * Prepare redirect action model
     *
     * @param array $arguments
     */
    protected function initializeAbstractActionMock($arguments = array())
    {
        $arguments = $this->getAbstractActionArguments($arguments);
        $this->model = new DeleteAction($arguments['aclManager']);
    }

    public function testGetType()
    {
        $this->initializeAbstractActionMock();

        $this->assertEquals(ActionInterface::TYPE_DELETE, $this->model->getType());
    }

    public function testSetOptions()
    {
        $options = array(
            'link' => '/delete_link',
        );
        $this->initializeAbstractActionMock();

        $this->model->setOptions($options);
        $this->assertEquals($options, $this->model->getOptions());
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage There is no option "link" for action "".
     */
    public function testSetOptionsError()
    {
        $options = array();
        $this->initializeAbstractActionMock();
        $this->model->setOptions($options);
    }
}
