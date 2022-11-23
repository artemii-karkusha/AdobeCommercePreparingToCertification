<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Block\Form\DeliveryService;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\Data\DeliveryServiceInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Delete entity button.
 */
class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Delete button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            'Delete',
            'delete',
            sprintf(
                "deleteConfirm('%s', '%s')",
                __('Are you sure you want to delete this deliveryservice?'),
                $this->getUrl(
                    '*/*/delete',
                    [DeliveryServiceInterface::ENTITY_ID => $this->getEntityId()]
                )
            ),
            [],
            20
        );
    }
}
