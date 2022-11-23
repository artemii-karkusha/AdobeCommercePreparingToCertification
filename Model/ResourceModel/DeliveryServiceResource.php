<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\Data\DeliveryServiceInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class DeliveryServiceResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'delivery_service_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('delivery_service', DeliveryServiceInterface::ENTITY_ID);
        $this->_useIsObjectNew = true;
    }
}
