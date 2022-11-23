<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel\DeliveryServiceResource;
use Magento\Framework\Model\AbstractModel;

class DeliveryServiceModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'delivery_service_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(DeliveryServiceResource::class);
    }
}
