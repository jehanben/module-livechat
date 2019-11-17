<?php
/**
 *
 * @category    Aligent
 * @package     Aligent_LiveChat
 * @author      Jehan Ryan <ryan.jehan@gmail.com>
 */

namespace Aligent\LiveChat\Controller\Adminhtml\GroupRule;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Aligent\LiveChat\Model\ChatGroupRuleFactory;


class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Rules')));
        $resultPage->setActiveMenu('Aligent_LiveChat::alg_livechat');

        return $resultPage;
    }
}
