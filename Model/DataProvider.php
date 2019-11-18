<?php


namespace Aligent\LiveChat\Model;

use Magento\Ui\DataProvider\AbstractDataProvider;
use  Aligent\LiveChat\Model\ResourceModel\ChatGroupRule\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var CollectionFactory
     */
    private $ruleCollectionFactory;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $ruleCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $ruleCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->ruleCollectionFactory = $ruleCollectionFactory;
        $this->collection = $this->ruleCollectionFactory->create();
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $rule) {
            $this->loadedData[$rule->getRuleId()] = $rule->getData();
        }
        return $this->loadedData;
    }
}
