<?php


namespace Aligent\LiveChat\Model\Config\Source\ChatGroupRule;

use Aligent\LiveChat\Model\ResourceModel\ChatGroupRule\Collection;

class RuleSet implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var Collection
     */
    private $ruleCollection;

    /**
     * RuleSet constructor.
     *
     * @param Collection $ruleCollection
     */
    public function __construct(
        Collection $ruleCollection
    )
    {
        $this->ruleCollection = $ruleCollection;
    }

    /**
     * Return options array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $this->ruleCollection->addFieldToSelect('rule_id')
            ->addFieldToSelect('rule_name')
            ->getSelect()
            ->group('rule_id');
        $options = $this->ruleCollection->toOptionArray();
        return $options;
    }
}
