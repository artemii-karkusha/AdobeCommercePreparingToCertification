<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel\DeliveryServiceResource;
use Magento\Framework\Model\AbstractModel;

/**
 * Delivery Service Model
 */
class DeliveryServiceModel extends AbstractModel
{

    public const CACHE_TAG = 'delivery_service';

    /**
     * @var string
     */
    protected $_eventPrefix = 'delivery_service_model';

    /**
     * Initialize DeliveryService model.
     *
     * @return void
     *
     * @noinspection MagicMethodsValidityInspection
     * @noinspection PhpMissingParentCallCommonInspection
     */
    protected function _construct(): void
    {
        $this->_init(DeliveryServiceResource::class);
    }
}
