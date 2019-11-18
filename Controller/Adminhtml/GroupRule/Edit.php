<?php


namespace Aligent\LiveChat\Controller\Adminhtml\GroupRule;


use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{
    public function execute()
    {
        $ruleId = $this->getRequest()->getParam('rule_id');

        if ($ruleId) {
            try {
                $model = $this->_objectManager->create('Aligent\LiveChat\Model\ChatGroupRule')->load($ruleId);
                $pageTitle = __('Edit LiveChat Group Rule - ' . sprintf("%s", $model->getRuleName()));
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addError(__('This Group Rule longer exists.'));
                /** @var Redirect $resultRedirect */
                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
                return $resultRedirect->setPath('grouprule/*/');
            }
        } else {
            $pageTitle = __('New LiveChat Group Rule');
        }

        $breadcrumb = $ruleId ? __('Edit LiveChat Group Rule') : __('New LiveChat Group Rule');
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->addBreadcrumb($breadcrumb, $breadcrumb);
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;
    }
}
