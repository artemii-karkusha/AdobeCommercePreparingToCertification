<?php
/**
 * @author Artemii Karkusha
 * @copyright Copyright (c) (https://www.linkedin.com/in/artemiy-karkusha/)
 */

declare(strict_types=1);

namespace ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Indexer;

use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\DeliveryServiceModel;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Indexer\DeliveryService\Action\Full
    as PerformerOfFullIndexing;
use ArtemiiKarkusha\AdobeCommercePreparingToCertification\Model\Indexer\DeliveryService\Action\Rows
    as PerformerOfIndexing;
use Magento\Framework\Indexer\ActionInterface as IndexerActionInterface;
use Magento\Framework\Indexer\CacheContext;
use Magento\Framework\Indexer\IndexerRegistry;
use Magento\Framework\Mview\ActionInterface as MviewActionInterface;

/**
 * Delivery service indexer
 */
class DeliveryService implements IndexerActionInterface, MviewActionInterface
{
    /**
     * Indexer ID in configuration
     */
    public const INDEXER_ID = 'delivery_service';

    /**
     * @param IndexerRegistry $indexerRegistry
     * @param CacheContext $cacheContext
     * @param PerformerOfIndexing $performerOfIndexing
     * @param PerformerOfFullIndexing $performerOfFullIndexing
     */
    public function __construct(
        private IndexerRegistry $indexerRegistry,
        private CacheContext $cacheContext,
        private PerformerOfIndexing $performerOfIndexing,
        private PerformerOfFullIndexing $performerOfFullIndexing
    ) {
    }

    /**
     * @inheritDoc
     */
    public function execute($ids): void
    {
        $this->registerEntities($ids);
        if ($this->canNotBeIndexed()) {
            return;
        }

        $this->performerOfIndexing->reindex($ids);
    }

    /**
     * @inheritDoc
     */
    public function executeRow($id): void
    {
        $this->execute([$id]);
    }

    /**
     * @inheritDoc
     */
    public function executeList(array $ids): void
    {
        $this->execute($ids);
    }

    /**
     * @inheritDoc
     */
    public function executeFull(): void
    {
        $this->performerOfFullIndexing->execute();
    }

    /**
     * Add entities to cache context
     *
     * @param int[] $ids
     * @return void
     * @since 100.0.11
     */
    private function registerEntities(array $ids): void
    {
        $this->cacheContext->registerEntities(DeliveryServiceModel::CACHE_TAG, $ids);
    }

    /**
     * Checks indexer ready
     *
     * @return bool
     */
    private function canNotBeIndexed(): bool
    {
        $indexer = $this->indexerRegistry->get(self::INDEXER_ID);
        return !$indexer->isScheduled() || !$indexer->isWorking();
    }
}
