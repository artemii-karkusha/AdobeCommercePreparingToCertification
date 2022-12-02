<?php

/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Block\Block\System\Config\Form\Field;

use Magento\Backend\Block\Widget\Button;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Exception\LocalizedException;

class ExampleOfButton extends Field
{
    /**
     * @var string
     */
    protected $_template = 'ArtemiiKarkusha_AdobeCommercePreparingToCertification::system/config/system/storage/media/field_type_is_button.phtml';

    /**
     * Return element html
     *
     * @param AbstractElement $element
     * @return string
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        return $this->_toHtml();
    }

    /**
     * Generate synchronize button html
     *
     * @return string
     */
    public function getButtonHtml(): string
    {
        try {
            $button = $this->getLayout()->createBlock(
                Button::class
            )->setData(
                [
                    'id' => 'field_type_is_button',
                    'label' => __('Field type is button'),
                ]
            );
            $getButtonHtml = $button->toHtml();
        } catch (LocalizedException $localizedException) {
            $this->_logger->error(
                $localizedException->getMessage(),
                [__CLASS__]
            );
            $getButtonHtml = '';
        }

        return $getButtonHtml;
    }
}
