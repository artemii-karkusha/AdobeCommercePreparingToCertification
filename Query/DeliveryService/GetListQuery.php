<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Query\DeliveryService;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Mapper\DeliveryServiceDataMapper;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel\DeliveryServiceModel\DeliveryServiceCollection;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel\DeliveryServiceModel\DeliveryServiceCollectionFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;

/**
 * Get DeliveryService list by search criteria query.
 */
class GetListQuery
{
    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param DeliveryServiceCollectionFactory $entityCollectionFactory
     * @param DeliveryServiceDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        private CollectionProcessorInterface $collectionProcessor,
        private DeliveryServiceCollectionFactory $entityCollectionFactory,
        private DeliveryServiceDataMapper $entityDataMapper,
        private SearchCriteriaBuilder $searchCriteriaBuilder,
        private SearchResultsInterfaceFactory $searchResultFactory
    ) {}

    /**
     * Get DeliveryService list by search criteria.
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return SearchResultsInterface
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): SearchResultsInterface
    {
        /** @var DeliveryServiceCollection $deliveryServiceCollection */
        $deliveryServiceCollection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $deliveryServiceCollection);
        }

        $deliveryServiceDtos = $this->entityDataMapper->map($deliveryServiceCollection);

        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($deliveryServiceDtos);
        $searchResult->setTotalCount($deliveryServiceCollection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
