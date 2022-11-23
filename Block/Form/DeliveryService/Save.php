<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Block\Form\DeliveryService;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Save entity button.
 */
class Save extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Save button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            'Save',
            'save primary',
            '',
            [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save'
            ],
            30
        );
    }
}
