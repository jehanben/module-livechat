<?php
/**
 *
 * @category    Aligent
 * @package     Aligent_LiveChat
 * @author      Jehan Ryan <ryan.jehan@gmail.com>
 */

namespace Aligent\LiveChat\Block\Adminhtml\GroupRule\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 * @package Magento\Customer\Block\Adminhtml\Edit
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var BlockRepositoryInterface
     */

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    /**
     * Return Group Rule ID
     *
     * @return int|null
     * @throws NoSuchEntityException
     */
    public function getRuleId()
    {
        try {
            return $this->context->getRequest()->getParam('rule_id');

        } catch (NoSuchEntityException $e) {
            throw new NoSuchEntityException(__('No LiveChat group rule found.'));
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
