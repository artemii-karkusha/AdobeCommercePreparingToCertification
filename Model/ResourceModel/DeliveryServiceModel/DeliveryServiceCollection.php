<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 *
 * @noinspection ClassOverridesFieldOfSuperClassInspection
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel\DeliveryServiceModel;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\DeliveryServiceModel;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel\DeliveryServiceResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class DeliveryServiceCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'delivery_service_collection';

    /**
     * Initialize collection model.
     * @noinspection MagicMethodsValidityInspection
     */
    protected function _construct(): void
    {
        $this->_init(DeliveryServiceModel::class, DeliveryServiceResource::class);
    }
}
