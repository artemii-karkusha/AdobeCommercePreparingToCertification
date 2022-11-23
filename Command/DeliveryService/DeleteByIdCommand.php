<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */
declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Command\DeliveryService;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Api\Data\DeliveryServiceInterface;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\DeliveryServiceModel;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\DeliveryServiceModelFactory;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\ResourceModel\DeliveryServiceResource;
use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Delete DeliveryService by id Command.
 */
class DeleteByIdCommand
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var DeliveryServiceModelFactory
     */
    private $modelFactory;

    /**
     * @var DeliveryServiceResource
     */
    private $resource;

    /**
     * @param LoggerInterface $logger
     * @param DeliveryServiceModelFactory $modelFactory
     * @param DeliveryServiceResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        DeliveryServiceModelFactory $modelFactory,
        DeliveryServiceResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * Delete DeliveryService.
     *
     * @param int $entityId
     *
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void
    {
        try {
            /** @var DeliveryServiceModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, DeliveryServiceInterface::ENTITY_ID);

            if (!$model->getData(DeliveryServiceInterface::ENTITY_ID)) {
                throw new NoSuchEntityException(
                    __(
                        'Could not find DeliveryService with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete DeliveryService. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete DeliveryService.'));
        }
    }
}
