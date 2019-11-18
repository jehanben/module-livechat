<?php
/**
 *
 * @category    Aligent
 * @package     Aligent_LiveChat
 * @author      Jehan Ryan <ryan.jehan@gmail.com>
 */

namespace Aligent\LiveChat\Controller\Adminhtml\GroupRule;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action
{
    /**
     * @var PostDataProcessor
     */
    protected $dataProcessor;

    /**
     * Save constructor.
     *
     * @param Action\Context $context
     * @param PostDataProcessor $dataProcessor
     */
    public function __construct(
        Action\Context $context,
        PostDataProcessor $dataProcessor
    ) {
        $this->dataProcessor = $dataProcessor;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $id = $this->getRequest()->getParam('rule_id');
            $model = $this->_objectManager->create('Aligent\LiveChat\Model\ChatGroupRule')->load($id);
            if (!$model->getRuleId() && $id) {
                $this->messageManager->addError(__('This item no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            // init model and set data
            $model->setData($data);

            if (!$this->dataProcessor->validateRequireEntry($data)) {
                return $resultRedirect->setPath('*/*/edit', ['rule_id' => $model->geRuletId(), '_current' => true]);
            }

            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                $this->messageManager->addSuccess(__('LiveChat Group Rule Saved.'));

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath(
                        '*/*/edit',
                        ['rule_id' => $this->chatGroupRuleFactory->getRuleId(),
                            '_current' => true]
                    );
                }
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addException($e, __('Something went wrong while saving the rule.'));
            }

            return $resultRedirect->setPath('*/*/edit', ['rule_id' => $this->getRequest()->getParam('rule_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
