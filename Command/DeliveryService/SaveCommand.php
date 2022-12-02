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
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * Save DeliveryService Command.
 */
class SaveCommand
{
    /**
     * @param LoggerInterface $logger
     * @param DeliveryServiceModelFactory $modelFactory
     * @param DeliveryServiceResource $resource
     */
    public function __construct(
        private LoggerInterface $logger,
        private DeliveryServiceModelFactory $modelFactory,
        private DeliveryServiceResource $resource
    ) {
    }

    /**
     * Save DeliveryService.
     *
     * @param DeliveryServiceInterface $deliveryService
     *
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(DeliveryServiceInterface $deliveryService): int
    {
        try {
            /** @var DeliveryServiceModel $model */
            $model = $this->modelFactory->create();
            $model->addData($deliveryService->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(DeliveryServiceInterface::ENTITY_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save DeliveryService. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save DeliveryService.'));
        }

        return (int)$model->getData(DeliveryServiceInterface::ENTITY_ID);
    }
}
