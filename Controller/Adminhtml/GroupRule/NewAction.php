<?php
/**
 *
 * @category    Aligent
 * @package     Aligent_LiveChat
 * @author      Jehan Ryan <ryan.jehan@gmail.com>
 */

namespace Aligent\LiveChat\Controller\Adminhtml\GroupRule;


use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Forward;
use Magento\Framework\Controller\ResultFactory;

class NewAction extends Action
{
    /**
     * New Item Function Controller
     * @return Forward
     */
    public function execute()
    {
        /** @var Forward $resultForward */
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        return $resultForward->forward('edit');
    }
}
