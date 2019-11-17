<?php
/**
 *
 * @category    Aligent
 * @package     Aligent_LiveChat
 * @author      Jehan Ryan <ryan.jehan@gmail.com>
 *
 */

namespace Aligent\LiveChat\Model;


use Magento\Framework\Model\AbstractModel;

class ChatGroupRule extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Aligent\LiveChat\Model\ResourceModel\ChatGroupRule');
    }
}
