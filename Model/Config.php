<?php
/**
 *
 * @category    Aligent
 * @package     Aligent_LiveChat
 * @author      Jehan Ryan <ryan.jehan@gmail.com>
 */

namespace Aligent\LiveChat\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Tests\NamingConvention\true\string;

/**
 * Class Config
 * Get the Core config data.
 * @package Aligent\LiveChat\Model
 */
class Config
{
    const KEY_ENABLE            = "aligent_livechat/general/enable";
    const KEY_LICENSE_NUMBER    = "aligent_livechat/general/license_number";
    const KEY_GROUP_RULES       = "aligent_livechat/advance/group";
    const KEY_PARAMS            = "aligent_livechat/advance/params";

    /**
     * @var int
     */
    protected $storeId = null;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Set StoreId
     *
     * @param int $storeId
     * @return $this
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
        return $this;
    }

    /**
     * IsEnabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(self::KEY_ENABLE,
            ScopeInterface::SCOPE_STORE,
            $this->storeId
        );
    }

    /**
     * Get License number from config data
     * @return string
     */
    public function getLicenseNumber()
    {
        return $this->scopeConfig->getValue(self::KEY_LICENSE_NUMBER,
            ScopeInterface::SCOPE_STORE,
            $this->storeId
        );
    }

    /**
     * Get chat group rules from config data
     * @return string
     */
    public function getChatGroupRule()
    {
        return $this->scopeConfig->getValue(self::KEY_GROUP_RULES,
            ScopeInterface::SCOPE_STORE,
            $this->storeId
        );
    }

    /**
     * Get chat group rules from config data
     * @return string
     */
    public function getChatCustomParam()
    {
        return $this->scopeConfig->getValue(self::KEY_PARAMS,
            ScopeInterface::SCOPE_STORE,
            $this->storeId
        );
    }
}
