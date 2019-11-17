<?php


namespace Aligent\LiveChat\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ChatGroupRule extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('live_chat_rule', 'rule_id');
    }
}
