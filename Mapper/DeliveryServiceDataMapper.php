<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Mapper;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\Data\DeliveryServiceInterface;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\Data\DeliveryServiceInterfaceFactory;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\DeliveryServiceModel;
use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Converts a collection of DeliveryService entities to an array of data transfer objects.
 */
class DeliveryServiceDataMapper
{
    /**
     * @param DeliveryServiceInterfaceFactory $entityDtoFactory
     */
    public function __construct(
        private DeliveryServiceInterfaceFactory $entityDtoFactory
    ) {
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|DeliveryServiceInterface[]
     */
    public function map(AbstractCollection $collection): array
    {
        $entityDtos = [];
        /** @var DeliveryServiceModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var DeliveryServiceInterface|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $entityDtos[] = $entityDto;
        }

        return $entityDtos;
    }
}
