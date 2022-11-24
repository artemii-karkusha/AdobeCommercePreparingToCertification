<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Config\Source;

class ListOfValues implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 1, 'label' => __('Value 1')],
            ['value' => 2, 'label' => __('Value 2')],
            ['value' => 3, 'label' => __('Value 3')],
            ['value' => 4, 'label' => __('Value 4')],
            ['value' => 5, 'label' => __('Value 5')],
            ['value' => 6, 'label' => __('Value 6')],
            ['value' => 7, 'label' => __('Value 7')],
            ['value' => 8, 'label' => __('Value 8')],
        ];
    }
}
